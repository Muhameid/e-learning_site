<?php
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

// Traitement du formulaire d'ajout de cours et de ses détails
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_course'])) {
    $subject_id = $_POST['subject_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (empty($subject_id) || empty($name) || empty($description)) {
        $error = 'Tous les champs sont obligatoires pour ajouter un cours.';
    } else {
        $stmt = $con->prepare('INSERT INTO cours (name, description, subject_id) VALUES (?, ?, ?)');
        $stmt->bind_param('ssi', $name, $description, $subject_id);
        if ($stmt->execute()) {
            $course_id = $stmt->insert_id; // Récupérer l'ID du cours ajouté
            $success = 'Cours ajouté avec succès.';

            // Ajouter des chapitres
            if (isset($_POST['chapter_titles']) && isset($_POST['chapter_contents'])) {
                $chapter_titles = $_POST['chapter_titles'];
                $chapter_contents = $_POST['chapter_contents'];
                for ($i = 0; $i < count($chapter_titles); $i++) {
                    if (!empty($chapter_titles[$i]) && !empty($chapter_contents[$i])) {
                        $stmt = $con->prepare('INSERT INTO course_parts (course_id, title, content) VALUES (?, ?, ?)');
                        $stmt->bind_param('iss', $course_id, $chapter_titles[$i], $chapter_contents[$i]);
                        $stmt->execute();
                    }
                }
            }

            // Ajouter des exercices
            if (isset($_POST['exercise_questions']) && isset($_POST['exercise_answers'])) {
                $exercise_questions = $_POST['exercise_questions'];
                $exercise_answers = $_POST['exercise_answers'];
                for ($i = 0; $i < count($exercise_questions); $i++) {
                    if (!empty($exercise_questions[$i]) && !empty($exercise_answers[$i])) {
                        $stmt = $con->prepare('INSERT INTO exercises (course_id, question, answer) VALUES (?, ?, ?)');
                        $stmt->bind_param('iss', $course_id, $exercise_questions[$i], $exercise_answers[$i]);
                        $stmt->execute();
                    }
                }
            }

            // Ajouter des études de cas
            if (isset($_POST['case_studies']) && isset($_POST['case_solutions'])) {
                $case_studies = $_POST['case_studies'];
                $case_solutions = $_POST['case_solutions'];
                for ($i = 0; $i < count($case_studies); $i++) {
                    if (!empty($case_studies[$i]) && !empty($case_solutions[$i])) {
                        $stmt = $con->prepare('INSERT INTO case_studies (course_id, study, solution) VALUES (?, ?, ?)');
                        $stmt->bind_param('iss', $course_id, $case_studies[$i], $case_solutions[$i]);
                        $stmt->execute();
                    }
                }
            }

        } else {
            $error = 'Erreur lors de l\'ajout du cours.';
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Cours et ses Détails</title>
    <style>
        .course-container, .details-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        h2, h3 {
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
        .form-group .add-more {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group .add-more:hover {
            background-color: #0056b3;
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

        function addMoreFields(type) {
            const container = document.getElementById(type + '-container');
            const div = document.createElement('div');
            div.className = 'form-group';
            div.innerHTML = `
                <label>${type === 'chapter' ? 'Titre du Chapitre' : type === 'exercise' ? 'Question' : 'Étude'}</label>
                <textarea name="${type === 'chapter' ? 'chapter_titles[]' : type === 'exercise' ? 'exercise_questions[]' : 'case_studies[]'}" required></textarea>
                <label>${type === 'chapter' ? 'Contenu' : type === 'exercise' ? 'Réponse' : 'Solution'}</label>
                <textarea name="${type === 'chapter' ? 'chapter_contents[]' : type === 'exercise' ? 'exercise_answers[]' : 'case_solutions[]'}" required></textarea>
            `;
            container.appendChild(div);
        }
    </script>
</head>
<body>
    <div class="course-container">
        <h2>Ajouter un Cours et ses Détails</h2>
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
                <select id="subcategory" name="subject_id" required>
                    <option value="">Sélectionner une matière</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nom du Cours</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required></textarea>
            </div>

            <div class="details-container">
                <h3>Ajouter des Chapitres</h3>
                <div id="chapter-container" class="form-group">
                    <label>Titre du Chapitre</label>
                    <textarea name="chapter_titles[]" required></textarea>
                    <label>Contenu</label>
                    <textarea name="chapter_contents[]" required></textarea>
                </div>
                <button type="button" class="add-more" onclick="addMoreFields('chapter')">Ajouter un autre chapitre</button>

                <h3>Ajouter des Exercices</h3>
                <div id="exercise-container" class="form-group">
                    <label>Question</label>
                    <textarea name="exercise_questions[]" required></textarea>
                    <textarea name="exercise_answers[]" required></textarea>
                </div>
                <button type="button" class="add-more" onclick="addMoreFields('exercise')">Ajouter un autre exercice</button>

                <h3>Ajouter des Études de Cas</h3>
                <div id="case-container" class="form-group">
                    <label>Étude de Cas</label>
                    <textarea name="case_studies[]" required></textarea>
                    <label>Solution</label>
                    <textarea name="case_solutions[]" required></textarea>
                </div>
                <button type="button" class="add-more" onclick="addMoreFields('case')">Ajouter une autre étude de cas</button>
            </div>

            <div class="form-group">
                <button type="submit" name="add_course" class="btn">Ajouter le Cours</button>
            </div>
        </form>
    </div>
</body>
</html>
