<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - BTS Mastery</title>
        <?php
        try {
            // Connexion à la base de données
            $bdd = new PDO('mysql:host=localhost;dbname=bts_express', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupération du nom du cours
            $stmt_course = $bdd->prepare("SELECT name FROM cours WHERE id = :course_id");
            $stmt_course->bindParam(':course_id', $_GET['id']);
            $stmt_course->execute();
            $course = $stmt_course->fetch(PDO::FETCH_ASSOC);

            // Affichage du nom du cours dans le titre de la page
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
    </title>
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
            background-color: #f2f2f2;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            position: relative;
            /* Pour positionner le bouton de fermeture */
        }

        .course-header {
            color: white;
            background-color: #6a0dad;
            padding: 10px 20px;
            margin: -20px -20px 20px -20px;
            box-sizing: border-box;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #6a0dad;
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
            font-size: 30px;
            cursor: pointer;
        }

        .nav-button {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #6a0dad;
            color: white;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-button:hover {
            background-color: #4b007d;
        }

        .next-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6a0dad;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .next-button:hover {
            background-color: #4b007d;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="dropdown" onclick="toggleDropdown('chapitres-dropdown', 'chapitres-arrow', this)">
            <h5>Chapitres</h5>
            <span id="chapitres-arrow">&#9654;</span>
        </div>
        <div id="chapitres-dropdown" class="dropdown-content">
            <?php
            try {
                // Requête pour récupérer les chapitres du cours actuel
                $stmt_chapters = $bdd->prepare("SELECT * FROM course_parts WHERE course_id = :course_id");
                $stmt_chapters->bindParam(':course_id', $_GET['id']);
                $stmt_chapters->execute();

                // Affichage des chapitres
                while ($chapter = $stmt_chapters->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div>' . htmlspecialchars($chapter['title']) . '</div><br>';
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('exercices-dropdown', 'exercices-arrow', this)">
            <h5>Exercices</h5>
            <span id="exercices-arrow">&#9654;</span>
        </div>
        <div id="exercices-dropdown" class="dropdown-content">
            <?php
            try {
                // Requête pour récupérer les exercices du cours actuel
                $stmt_exercises = $bdd->prepare("SELECT * FROM exercises WHERE course_id = :course_id");
                $stmt_exercises->bindParam(':course_id', $_GET['id']);
                $stmt_exercises->execute();

                // Affichage des exercices
                while ($exercise = $stmt_exercises->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div>' . htmlspecialchars($exercise['name']) . '</div><br>';
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('corrections-exercices-dropdown', 'corrections-exercices-arrow', this)">
            <h5>Corrections: Exercices</h5>
            <span id="corrections-exercices-arrow">&#9654;</span>
        </div>
        <div id="corrections-exercices-dropdown" class="dropdown-content">
            <?php
            try {
                // Requête pour récupérer les corrections des exercices du cours actuel
                $stmt_corrections = $bdd->prepare("
                    SELECT e.id AS exercise_id, e.question AS correction_name, e.answer AS correction_content
                    FROM exercises e
                    WHERE e.course_id = :course_id
                ");
                $stmt_corrections->bindParam(':course_id', $_GET['id']);
                $stmt_corrections->execute();

                // Affichage des corrections des exercices
                while ($correction = $stmt_corrections->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div>' . htmlspecialchars($correction['correction_name']) . '</div><br>';
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('etudes-dropdown', 'etudes-arrow', this)">
            <h5>Études de cas</h5>
            <span id="etudes-arrow">&#9654;</span>
        </div>
        <div id="etudes-dropdown" class="dropdown-content">
            <?php
            try {
                // Requête pour récupérer les études de cas du cours actuel
                $stmt_case_studies = $bdd->prepare("SELECT * FROM case_studies WHERE course_id = :course_id");
                $stmt_case_studies->bindParam(':course_id', $_GET['id']);
                $stmt_case_studies->execute();

                // Affichage des études de cas
                while ($case_study = $stmt_case_studies->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div>' . htmlspecialchars($case_study['study']) . '</div><br>';
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
        <div class="dropdown" onclick="toggleDropdown('corrections-etudes-dropdown', 'corrections-etudes-arrow', this)">
            <h5>Corrections: Études de cas</h5>
            <span id="corrections-etudes-arrow">&#9654;</span>
        </div>
        <div id="corrections-etudes-dropdown" class="dropdown-content">
            <?php
            try {
                // Requête pour récupérer les corrections des études de cas du cours actuel
                $stmt_case_corrections = $bdd->prepare("
                    SELECT cs.id AS case_id, cs.study AS case_study_name, cs.solution AS case_solution_name, cs.content AS case_solution_content
                    FROM case_studies cs
                    WHERE cs.course_id = :course_id
                ");
                $stmt_case_corrections->bindParam(':course_id', $_GET['id']);
                $stmt_case_corrections->execute();

                // Affichage des corrections des études de cas
                while ($case_correction = $stmt_case_corrections->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div>Correction pour l'étude de cas portant sur  : " . htmlspecialchars($case_correction['case_study_name']) . "</div><br>";
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <div class="content">
        <div class="course-header">
            <h1 id="chapter" style="color: #f2f2f2;">
                <?php
                try {
                    echo htmlspecialchars($course['name']);
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
                ?>
            </h1>
        </div>

        <!-- Bouton pour quitter le cours et revenir en arrière -->
        <button class="close-button" onclick="window.history.back();">&times;</button>

        <?php
        try {
            // Requête pour récupérer tous les contenus du cours actuel (chapitres, exercices, corrections, études de cas)
            $stmt_contents = $bdd->prepare("
                SELECT cp.id AS part_id, cp.title AS part_title, cp.content AS part_content, 'chapter' AS part_type
                FROM course_parts cp
                WHERE cp.course_id = :course_id
                UNION ALL
                SELECT e.id AS part_id, e.name AS part_title, e.content AS part_content, 'exercise' AS part_type
                FROM exercises e
                WHERE e.course_id = :course_id
                UNION ALL
                SELECT e.id AS part_id, CONCAT('Correction: ', e.question) AS part_title, e.answer AS part_content, 'correction' AS part_type
                FROM exercises e
                WHERE e.course_id = :course_id
                UNION ALL
                SELECT cs.id AS part_id, cs.study AS part_title, cs.solution AS part_content, 'case_study' AS part_type
                FROM case_studies cs
                WHERE cs.course_id = :course_id
                UNION ALL
                SELECT cs.id AS part_id, cs.name AS part_title, cs.content AS part_content, 'case_correction' AS part_type
                FROM case_studies cs
                WHERE cs.course_id = :course_id
                ORDER BY 
                    CASE
                        WHEN part_type = 'chapter' THEN 1
                        WHEN part_type = 'exercise' THEN 2
                        WHEN part_type = 'correction' THEN 3
                        WHEN part_type = 'case_study' THEN 4
                        WHEN part_type = 'case_correction' THEN 5
                        ELSE 6
                    END,
                    part_id
            ");
            $stmt_contents->bindParam(':course_id', $_GET['id']);
            $stmt_contents->execute();

            // Stockage des contenus dans un tableau JavaScript
            $contents = array();
            while ($content = $stmt_contents->fetch(PDO::FETCH_ASSOC)) {
                $contents[] = $content;
            }

            // Si aucun contenu n'est trouvé, afficher un message d'erreur
            if (empty($contents)) {
                echo '<p>Aucun contenu trouvé pour ce cours.</p>';
            } else {
                // Affichage initial du premier contenu
                echo '<div id="content-container">';
                echo '<h2>' . htmlspecialchars($contents[0]['part_title']) . '</h2>';
                echo '<div id="' . $contents[0]['part_type'] . '-' . $contents[0]['part_id'] . '">';
                echo '<p id="monTexte" style="font-size: 18px; color: black;">' . htmlspecialchars($contents[0]['part_content']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>

        <!-- Bouton pour passer au contenu suivant -->
        <button id="nextButton" class="next-button" onclick="nextContent()">Contenu Suivant</button>

        <script>
            var currentContentIndex = 0;
            var contents = <?php echo json_encode($contents); ?>;

            function nextContent() {
                currentContentIndex++;
                if (currentContentIndex < contents.length) {
                    var contentContainer = document.getElementById('content-container');
                    contentContainer.innerHTML = `
                        <h2>${contents[currentContentIndex]['part_title']}</h2>
                        <div id="${contents[currentContentIndex]['part_type']}-${contents[currentContentIndex]['part_id']}">
                            <p id="monTexte" style="font-size: 18px; color: black;">${contents[currentContentIndex]['part_content']}</p>
                        </div>
                    `;
                    applyFormatting();
                } else {
                    var nextButton = document.getElementById('nextButton');
                    nextButton.style.display = 'none';
                    contentContainer.innerHTML += '<p>Fin des contenus.</p>';
                }
            }

            function applyFormatting() {
                // Sélectionnez l'élément contenant votre texte
                const texte = document.getElementById('monTexte');

                // Remplacez les occurrences de ".", "!", "?" par eux-mêmes suivis de deux retours à la ligne
                texte.innerHTML = texte.innerHTML.replace(/(\.|\!|\?)/g, '$1<br><br>');

                // Remplacez les occurrences de ":" par lui-même suivi d'un retour à la ligne
                texte.innerHTML = texte.innerHTML.replace(/(\:|\;)/g, '$1<br>');
            }

            // Appliquer le formatage au contenu initial
            applyFormatting();
        </script>
    </div>

    <script>
        function toggleDropdown(contentId, arrowId, dropdown) {
            var content = document.getElementById(contentId);
            var arrow = document.getElementById(arrowId);
            if (content.style.display === "block") {
                content.style.display = "none";
                arrow.classList.remove('rotate');
                dropdown.classList.remove('active');
            } else {
                content.style.display = "block";
                arrow.classList.add('rotate');
                dropdown.classList.add('active');
            }
        }
    </script>
</body>

</html>