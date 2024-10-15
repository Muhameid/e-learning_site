<?php
require('require/db.php'); // Assurez-vous que ce fichier inclut la connexion à votre base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_nicename = mysqli_real_escape_string($con, $_POST['nicename']);
    $u_display_name = mysqli_real_escape_string($con, $_POST['displayName']);
    $u_name = mysqli_real_escape_string($con, $_POST['name']);
    $u_email = mysqli_real_escape_string($con, $_POST['email']);
    $u_mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $u_password = mysqli_real_escape_string($con, $_POST['pass']);
    $u_role = mysqli_real_escape_string($con, $_POST['role']);

    // Cryptage du mot de passe en SHA1
    $u_password = sha1($u_password);

    // Requête d'insertion dans la base de données
    $query = "INSERT INTO users (u_nicename, u_display_name, u_name, u_email, u_mobile, u_password, u_role)
              VALUES ('$u_nicename', '$u_display_name', '$u_name', '$u_email', '$u_mobile', '$u_password', '$u_role')";

    if (mysqli_query($con, $query)) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => mysqli_error($con)));
    }
}
?>
