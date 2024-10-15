<?php


if (!isset($_GET['course_id'])) {
    die('Aucun cours sélectionné.');
}

$course_id = $_GET['course_id'];

// Récupérer les détails du cours
$query = $con->prepare('SELECT name, description FROM cours WHERE id = ?');
$query->bind_param('i', $course_id);
$query->execute();
$query->bind_result($course_name, $course_description);
$query->fetch();
$query->close();

// Récupérer les parties
$query = $con->prepare('SELECT title, content FROM course_parts WHERE course_id = ?');
$query->bind_param('i', $course_id);
$query->execute();
$parts = $query->get_result()->fetch_all(MYSQLI_ASSOC);
$query->close();

// Récupérer les exercices
$query = $con->prepare('SELECT question, answer FROM exercises WHERE course_id = ?');
$query->bind_param('i', $course_id);
$query->execute();
$exercises = $query->get_result()->fetch_all(MYSQLI_ASSOC);
$query->close();

// Récupérer les études de cas
$query = $con->prepare('SELECT study, solution FROM case_studies WHERE course_id = ?');
$query->bind_param('i', $course_id);
$query->execute();
$case_studies = $query->get_result()->fetch_all(MYSQLI_ASSOC);
$query->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Détails du Cours</title>
    <style>
        .course-details-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .course-details-container h2 {
            text-align: center;
            color: #333;
        }
        .part, .exercise, .case-study {
            margin-bottom: 15px;
        }
        .part h3, .exercise h3, .case-study h3 {
            color: #333;
        }
        .part p, .exercise p, .case-study p {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="course-details-container">
        <h2><?php echo htmlspecialchars($course_name); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($course_description)); ?></p>

        <h3>Parties</h3>
        <?php foreach ($parts as $part): ?>
            <div class="part">
                <h3><?php echo htmlspecialchars($part['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($part['content'])); ?></p>
            </div>
        <?php endforeach; ?>

        <h3>Exercices</h3>
        <?php foreach ($exercises as $exercise): ?>
            <div class="exercise">
                <h3>Question</h3>
                <p><?php echo nl2br(htmlspecialchars($exercise['question'])); ?></p>
                <h3>Réponse</h3>
                <p><?php echo nl2br(htmlspecialchars($exercise['answer'])); ?></p>
            </div>
        <?php endforeach; ?>

        <h3>Études de Cas</h3>
        <?php foreach ($case_studies as $case_study): ?>
            <div class="case-study">
                <h3>Étude</h3>
                <p><?php echo nl2br(htmlspecialchars($case_study['study'])); ?></p>
                <h3>Solution</h3>
                <p><?php echo nl2br(htmlspecialchars($case_study['solution'])); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
