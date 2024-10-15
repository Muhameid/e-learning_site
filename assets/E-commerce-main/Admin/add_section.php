<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'require/top.php'; // Assurez-vous que ce fichier contient la connexion à la base de données

$error = '';
$success = '';

// Récupérer toutes les formations
$query = 'SELECT id, category FROM categories';
$result = $con->query($query);
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

// Traitement du formulaire d'ajout de section
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_section'])) {
    var_dump($_POST); // Déboguer les données reçues

    $subcat_id = isset($_POST['subcat_id']) ? $_POST['subcat_id'] : null;
    $section_name = isset($_POST['section_name']) ? $_POST['section_name'] : null;
    $section_description = isset($_POST['section_description']) ? $_POST['section_description'] : null;

    if (empty($subcat_id) || empty($section_name) || empty($section_description)) {
        $error = 'Tous les champs sont obligatoires pour ajouter une section.';
    } else {
        $stmt = $con->prepare('INSERT INTO sections (subcat_id, section_name, section_description) VALUES (?, ?, ?)');
        $stmt->bind_param('iss', $subcat_id, $section_name, $section_description);
        if ($stmt->execute()) {
            $success = 'Section ajoutée avec succès.';
        } else {
            $error = 'Erreur lors de l\'ajout de la section.';
        }
        $stmt->close();
    }
}

// Récupérer toutes les sections existantes
$querySections = 'SELECT s.id, s.subcat_id, s.section_name, s.section_description, c.category 
                 FROM sections s
                 JOIN subcategories sc ON s.subcat_id = sc.id
                 JOIN categories c ON sc.cat_id = c.id';
$resultSections = $con->query($querySections);
$sections = [];
while ($row = $resultSections->fetch_assoc()) {
    $sections[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Sections - BTS Mastery</title>
    <style>
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group select, 
        .form-group input[type="text"], 
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group .btn:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin-bottom: 15px;
        }
        .message.error {
            color: red;
        }
        .message.success {
            color: green;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn-action {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-action.delete {
            background-color: #dc3545;
        }
    </style>
    <script>
        function fetchSubcategories(categoryId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetch_subcategories.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status === 200) {
                    document.getElementById('subcategory').innerHTML = this.responseText;
                }
            };
            xhr.send('category_id=' + categoryId);
        }

        function editSection(id) {
            // Code pour charger les détails de la section dans le formulaire de modification
            // Par exemple, utiliser une requête AJAX pour récupérer les détails et remplir les champs du formulaire
            console.log('Modifier la section avec ID : ' + id);
        }

        function deleteSection(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette section ?')) {
                // Code pour supprimer la section avec ID spécifié
                console.log('Supprimer la section avec ID : ' + id);
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Gestion des Sections</h2>
        <?php if ($error): ?>
            <p class="message error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="message success"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>Formation</label>
                <select name="category_id" onchange="fetchSubcategories(this.value)" required>
                    <option value="">Sélectionner une formation</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Matière</label>
                <select id="subcategory" name="subcat_id" required>
                    <option value="">Sélectionner une matière</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nom de la Section</label>
                <input type="text" name="section_name" required>
            </div>
            <div class="form-group">
                <label>Description de la Section</label>
                <textarea name="section_description" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="add_section" class="btn">Ajouter la Section</button>
            </div>
        </form>
    </div>

    <!-- Tableau des Sections -->
    <div class="form-container">
        <h2>Liste des Sections</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Formation</th>
                    <th>Matière</th>
                    <th>Nom de la Section</th>
                    <th>Description de la Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sections as $section): ?>
                    <tr>
                        <td><?php echo $section['id']; ?></td>
                        <td><?php echo $section['category']; ?></td>
                        <td><?php echo $section['section_name']; ?></td>
                        <td><?php echo $section['section_description']; ?></td>
                        <td><?php echo $section['section_description']; ?></td>
                        <td>
                            
                            <button class="btn-action delete" onclick="deleteSection(<?php echo $section['id']; ?>)">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
