<?php
// Assurez-vous de bien inclure la connexion à la base de données
require 'require/top.php';

if (isset($_POST['subject_id'])) {
    $subject_id = $_POST['subject_id'];

    // Requête pour récupérer les sections liées à la matière spécifique
    $query = "SELECT id, section_name FROM sections WHERE subcat_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $subject_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Générer les options HTML pour les sections
    $sections = [];
    while ($row = $result->fetch_assoc()) {
        $sections[] = $row;
    }

    // Réponse AJAX : renvoyer les options HTML
    foreach ($sections as $section) {
        echo "<option value='{$section['id']}'>{$section['section_name']}</option>";
    }
}
?>
<h2><?php echo htmlspecialchars($contents[0]['part_title']); ?></h2>