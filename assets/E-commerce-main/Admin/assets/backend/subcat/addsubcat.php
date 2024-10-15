<?php
require('../../../../utility/utility.php');

// Récupération des valeurs postées
$value = get_safe_value($con, $_POST['name']);
$pcat = get_safe_value($con, $_POST['pcat']);
$sale = get_safe_value($con, $_POST['sale']);
$status = 1; 
$result = array();

// Vérification si la sous-catégorie existe déjà
$cq = "SELECT * FROM subcategories WHERE subcat='$value'";
$cr = mysqli_query($con, $cq);
$cro = mysqli_num_rows($cr);

if ($cro == 0) {
    // Vérification du nombre actuel de sous-catégories pour cette catégorie
    $qyery = "INSERT INTO subcategories(subcat, cat_id, status) VALUES ('$value', '$pcat', '$status')";
    
    if (mysqli_query($con, $qyery)) {
        // Succès de l'insertion, retourne l'ID de la nouvelle sous-catégorie
        $id = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM subcategories WHERE subcat='$value'"));
        $result['id'] = $id['id'];
        $result['status'] = 1; // Statut 1 pour succès d'ajout
        echo json_encode($result);
    } else {
        // Échec de l'insertion
        $result['status'] = 0; // Statut 0 pour erreur
        echo json_encode($result);
    }
} else {
    // La sous-catégorie existe déjà
    $result['status'] = 3; // Statut 3 pour sous-catégorie déjà existante
    echo json_encode($result);
}
?>
