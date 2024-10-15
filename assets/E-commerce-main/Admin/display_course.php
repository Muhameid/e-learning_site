<?php
require 'require/top.php'; // Assurez-vous que ce fichier contient la connexion à la base de données

// Récupérer les cours et leurs détails
$query = "
    SELECT 
        cours.id AS course_id, 
        cours.name AS course_name, 
        cours.description AS course_description,
        course_parts.id AS part_id, 
        course_parts.title AS part_title, 
        course_parts.content AS part_content,
        exercises.id AS exercise_id, 
        exercises.question AS exercise_question, 
        exercises.answer AS exercise_answer,
        case_studies.id AS case_id, 
        case_studies.study AS case_study, 
        case_studies.solution AS case_solution
    FROM 
        cours
    LEFT JOIN 
        course_parts ON cours.id = course_parts.course_id
    LEFT JOIN 
        exercises ON cours.id = exercises.course_id
    LEFT JOIN 
        case_studies ON cours.id = case_studies.course_id
    ORDER BY 
        cours.id, course_parts.id, exercises.id, case_studies.id
";

$result = $con->query($query);

$courses = [];
while ($row = $result->fetch_assoc()) {
    $course_id = $row['course_id'];
    if (!isset($courses[$course_id])) {
        $courses[$course_id] = [
            'name' => $row['course_name'],
            'description' => $row['course_description'],
            'parts' => [],
            'exercises' => [],
            'case_studies' => []
        ];
    }

    if ($row['part_id']) {
        $courses[$course_id]['parts'][] = [
            'title' => $row['part_title'],
            'content' => $row['part_content']
        ];
    }

    if ($row['exercise_id']) {
        $courses[$course_id]['exercises'][] = [
            'question' => $row['exercise_question'],
            'answer' => $row['exercise_answer']
        ];
    }

    if ($row['case_id']) {
        $courses[$course_id]['case_studies'][] = [
            'study' => $row['case_study'],
            'solution' => $row['case_solution']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Cours</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
        }
        .sidebar {
            width: 300px;
            background-color: #fff;
            border-right: 1px solid #ccc;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
        }
        .content {
            flex: 1;
            background-color: #f2f2f2; /* Fond pour la partie de contenu */
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }
        .course-header {
            color: #fff;
            background-color: #6a0dad; /* Fond violet */
            padding: 10px 20px;
            margin: -20px -20px 20px -20px;
            box-sizing: border-box;
        }
        h2 {
            color: #6a0dad; /* Violet */
        }
        .dropdown {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        .dropdown:hover {
            background-color: #6a0dad;
            color: #fff;
        }
        .dropdown.active {
            background-color: #ccc;
        }
        .dropdown-content {
            display: none;
            margin-left: 20px;
            padding-left: 10px;
            border-left: 2px solid #ccc;
        }
        .dropdown-content a {
            display: block;
            margin: 5px 0;
            text-decoration: none;
            color: #000;
            font-size: 0.9em;
            transition: color 0.3s;
        }
        .dropdown-content a:hover {
            color: #6a0dad;
        }
        .rotate {
            transform: rotate(90deg);
        }
        .search-container {
            padding: 10px 0;
        }
        .search-input {
            width: calc(100% - 40px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .search-button img {
            width: 20px;
            height: 20px;
        }
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="search-container">
            <form action="/search" method="get">
                <input type="text" class="search-input" name="q" placeholder="Rechercher...">
                <button type="submit" class="search-button">
                    <img src="assets/images/icon-recherche.png" alt="Rechercher">
                </button>
            </form>
        </div>
        <div class="dropdown" onclick="toggleDropdown('cours-dropdown', 'cours-arrow', this)">
            <h5>Chapitres</h5>
            <span id="cours-arrow">&#9654;</span>
        </div>
        <div id="cours-dropdown" class="dropdown-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <a href="#course-<?php echo $course_id; ?>"><?php echo htmlspecialchars($course['name']); ?></a>
            <?php endforeach; ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('exercices-dropdown', 'exercices-arrow', this)">
            <h5>Exercices</h5>
            <span id="exercices-arrow">&#9654;</span>
        </div>
        <div id="exercices-dropdown" class="dropdown-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <?php foreach ($course['exercises'] as $exercise): ?>
                    <a href="exercise-<?php echo $exercise['exercise_id']; ?>"><?php echo htmlspecialchars($exercise['question']); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('corrections-dropdown', 'corrections-arrow', this)">
            <h5>Exercices : corrections</h5>
            <span id="corrections-arrow">&#9654;</span>
        </div>
        <div id="corrections-dropdown" class="dropdown-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <?php foreach ($course['exercises'] as $exercise): ?>
                    <a href="#correction-exercise-<?php echo $exercise['exercise_id']; ?>">Correction : <?php echo htmlspecialchars($exercise['question']); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('etude-dropdown', 'etude-arrow', this)">
            <h5>Étude de cas</h5>
            <span id="etude-arrow">&#9654;</span>
        </div>
        <div id="etude-dropdown" class="dropdown-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <?php foreach ($course['case_studies'] as $case_study): ?>
                    <a href="#case-study-<?php echo $case_study['case_id']; ?>"><?php echo htmlspecialchars($case_study['study']); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('corrections-etude-dropdown', 'corrections-etude-arrow', this)">
            <h5>Étude de cas : corrections</h5>
            <span id="corrections-etude-arrow">&#9654;</span>
        </div>
        <div id="corrections-etude-dropdown" class="dropdown-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <?php foreach ($course['case_studies'] as $case_study): ?>
                    <a href="#correction-case-study-<?php echo $case_study['case_id']; ?>">Corrections : <?php echo htmlspecialchars($case_study['study']); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="content">
        <div class="course-header">
            <h1 id="cours">Nom du Cours</h1>
            <button class="close-button" onclick="returnToHome()" style="background-color: white;"><a href="cours.php">&#10006;</a></button>
        </div>
        <div class="main-content">
            <?php foreach ($courses as $course_id => $course): ?>
                <div id="course-<?php echo $course_id; ?>" class="more-info about-info">
                    <div class="service-item">
                        <div class="text-left-and-center" style="padding: 100px;">
                            <h1 style="font-weight: bold; font-size: 40px; color:black;text-align: left;"><?php echo htmlspecialchars($course['name']); ?></h1>
                            <br>
                            <p style="font-size: 18px; color:black"><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>

                            <?php if (!empty($course['parts'])): ?>
                                <h2>Chapitres</h2>
                                <?php foreach ($course['parts'] as $part): ?>
                                    <div id="part-<?php echo $part['part_id']; ?>">
                                        <strong><?php echo htmlspecialchars($part['title']); ?></strong>
                                        <p><?php echo nl2br(htmlspecialchars($part['content'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if (!empty($course['exercises'])): ?>
                                <h2>Exercices</h2>
                                <?php foreach ($course['exercises'] as $exercise): ?>
                                    <div id="exercise-<?php echo $exercise['exercise_id']; ?>">
                                        <strong>Question :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($exercise['question'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if (!empty($course['exercises'])): ?>
                                <h2>Corrections: Exercices</h2>
                                <?php foreach ($course['exercises'] as $exercise): ?>
                                    <div id="correction-exercise-<?php echo $exercise['exercise_id']; ?>">
                                        <strong>Question :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($exercise['question'])); ?></p>
                                        <strong>Réponse :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($exercise['answer'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if (!empty($course['case_studies'])): ?>
                                <h2>Étude de cas</h2>
                                <?php foreach ($course['case_studies'] as $case_study): ?>
                                    <div id="case-study-<?php echo $case_study['case_id']; ?>">
                                        <strong>Étude :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($case_study['study'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if (!empty($course['case_studies'])): ?>
                                <h2>Corrections: Étude de cas</h2>
                                <?php foreach ($course['case_studies'] as $case_study): ?>
                                    <div id="correction-case-study-<?php echo $case_study['case_id']; ?>">
                                        <strong>Étude :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($case_study['study'])); ?></p>
                                        <strong>Solution :</strong>
                                        <p><?php echo nl2br(htmlspecialchars($case_study['solution'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        function toggleDropdown(dropdownId, arrowId, element) {
            var content = document.getElementById(dropdownId);
            var arrow = document.getElementById(arrowId);
            var isActive = content.style.display === 'block';

            // Collapse all dropdowns
            var allDropdowns = document.querySelectorAll('.dropdown-content');
            var allArrows = document.querySelectorAll('.dropdown > span');
            var allDropdownElements = document.querySelectorAll('.dropdown');
            allDropdowns.forEach(function(dropdown) {
                dropdown.style.display = 'none';
            });
            allArrows.forEach(function(arrow) {
                arrow.classList.remove('rotate');
            });
            allDropdownElements.forEach(function(el) {
                el.classList.remove('active');
            });

            // Expand the clicked dropdown if it was not already active
            if (!isActive) {
                content.style.display = 'block';
                arrow.classList.add('rotate');
                element.classList.add('active');
            }
        }
    </script>
</body>
</html>
