<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adresse email à laquelle envoyer le message
    $to = "contact@bts-express.fr"; // Remplacez par votre adresse email

    // Sujet de l'email
    $subject = "Nouveau message de contact de $name";

    // Contenu de l'email
    $body = "Vous avez reçu un nouveau message de contact.\n\n".
            "Nom: $name\n".
            "Email: $email\n".
            "Message:\n$message";

    // En-têtes de l'email
    $headers = "From: $email";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'envoi du message.";
    }
} else {
    // Redirection si le formulaire n'est pas soumis via POST
    header("Location: contact.php");
    exit;
}
?>
