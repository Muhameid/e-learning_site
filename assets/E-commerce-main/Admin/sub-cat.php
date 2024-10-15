<?php
ob_start(); // Démarre la mise en mémoire tampon de sortie
require('require/top.php');

// Traitement du formulaire d'ajout de matière
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-subcat'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $pcat = mysqli_real_escape_string($con, $_POST['pcat']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $type_matiere = mysqli_real_escape_string($con, $_POST['type_matiere']);
    $coefficients = mysqli_real_escape_string($con, $_POST['coefficients']);

    // Insertion des données dans la base de données
    $query = "INSERT INTO subcategories (subcat, cat_id, description_matiere, type_matiere, coefficients, Date_publication) VALUES ('$name', '$pcat', '$description', '$type_matiere', '$coefficients', NOW())";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo "<script>alert('Matière ajoutée avec succès !');</script>";
        echo "<script>window.location.href = 'sub-cat.php';</script>"; // Redirection JavaScript après succès
        exit(); // Arrête l'exécution du script pour éviter toute sortie inattendue
    } else {
        echo "<script>alert('Erreur lors de l\\'ajout de la matière');</script>";
    }
}

// Traitement de la suppression de matière
if (isset($_POST['delete-subcat'])) {
    $subcat_id = mysqli_real_escape_string($con, $_POST['subcat_id']);

    // Suppression de la matière dans la base de données
    $query = "DELETE FROM subcategories WHERE id = '$subcat_id'";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo "<script>alert('Matière supprimée avec succès !');</script>";
        echo "<script>window.location.href = 'sub-cat.php';</script>"; // Redirection JavaScript après succès
        exit(); // Arrête l'exécution du script pour éviter toute sortie inattendue
    } else {
        echo "<script>alert('Erreur lors de la suppression de la matière');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body {
            font-size: 16px;
            line-height: 1.6;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .path {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .path a {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s;
        }

        .path a:hover {
            color: #343a40;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-container .add {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
        }

        .btn-container .add:hover {
            background-color: #0056b3;
        }

        .search-field {
            border: 1px solid #ced4da;
            padding: 8px;
            border-radius: 5px;
            font-size: 14px;
        }

        .subcat-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .subcat-table th,
        .subcat-table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
            font-size: 16px;
        }

        .subcat-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .subcat-table td {
            background-color: #fff;
        }

        .subcat-table tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .action-btns {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .action-btns button {
            margin: 0 5px;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            font-size: 14px;
        }

        .action-btns .edit-btn {
            background-color: #6c757d;
            color: white;
        }

        .action-btns .edit-btn:hover {
            background-color: #343a40;
        }

        .action-btns .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .action-btns .delete-btn:hover {
            background-color: #c82333;
        }

        /* Style pour le formulaire d'ajout */
        #addForm {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: #f1f1f1;
        }

        #addForm label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        #addForm input[type='text'],
        #addForm textarea,
        #addForm select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        #addForm input[type='submit'] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #addForm input[type='submit']:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function showAddForm() {
            var addForm = document.getElementById('addForm');
            if (addForm.style.display === 'none') {
                addForm.style.display = 'block';
            } else {
                addForm.style.display = 'none';
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="path">
            <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
            <span>/</span>
            <a href="categories.php">Catégories</a><span> /</span>
            <a href="sub-cat.php">Sous-Catégories</a>
        </div>

        <div class="btn-container">
            <button class="add" onclick="showAddForm()">
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Ajouter une matière
            </button>
            <input type="text" class="search-field" placeholder="Rechercher par catégorie" id="sfield" onkeyup="search('sfield','nos')" />
        </div>

        <!-- Formulaire d'ajout de matière -->
        <div id="addForm">
            <h3>Ajouter une matière</h3>
            <form method="POST">
                <label for="name">Nom de la matière :</label>
                <input type="text" id="name" name="name" required>

                <label for="pcat">Catégorie :</label>
                <select id="pcat" name="pcat" required>
                    <?php
                    $query = "SELECT * FROM categories";
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
                    <?php
                    }
                    ?>
                </select>

                <label for="description">Description :</label>
                <textarea id="description" name="description" required></textarea>

                <label for="type_matiere">Type de matière :</label>
                <select id="type_matiere" name="type_matiere" required>
                    <option value="Générale">Les Matières Générales</option>
                    <option value="Technique">Les Matières Techniques</option>
                </select>

                <label for="coefficients">Coefficient :</label>
                <input type="text" id="coefficients" name="coefficients" required>

                <input type="submit" name="add-subcat" value="Ajouter">
            </form>
        </div>

        <!-- Tableau des sous-catégories -->
        <div class="cat-table">
            <table class="subcat-table" id="nos">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Type de matière</th>
                        <th>Coefficient</th>
                        <th>Date de publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT subcategories.*, categories.category FROM subcategories JOIN categories ON subcategories.cat_id = categories.id";
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo $row['subcat'] ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td><?php echo $row['description_matiere'] ?></td>
                            <td><?php echo $row['type_matiere'] ?></td>
                            <td><?php echo $row['coefficients'] ?></td>
                            <td><?php echo $row['Date_publication'] ?></td>
                            <td class="action-btns">
                                
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="subcat_id" value="<?php echo $row['id'] ?>">
                                    <button type="submit" name="delete-subcat" class="delete-btn">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
