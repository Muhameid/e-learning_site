<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Vérifier si l'adresse e-mail existe dans la base de données
    // Connexion à la base de données (ajustez les paramètres selon votre configuration)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bts_express";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    $sql = "SELECT ID FROM wp_users WHERE user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Générer un token unique
        $token = bin2hex(random_bytes(50));

        // Insérer le token dans la base de données avec un délai d'expiration
        $expire_at = date("Y-m-d H:i:s", strtotime('+1 hour'));
        $sql = "INSERT INTO password_resets (email, token, expire_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $token, $expire_at);
        $stmt->execute();

        // Envoyer l'e-mail de réinitialisation de mot de passe
        $reset_link = "http://btsexpress2/reset_password.php?token=" . $token;
        $subject = "Réinitialisation de votre mot de passe";
        $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : " . $reset_link;
        $headers = "From: contact@bts-express.fr";

        if (mail($email, $subject, $message, $headers)) {
            echo "Un lien de réinitialisation a été envoyé à votre adresse e-mail.";
        } else {
            echo "Une erreur est survenue lors de l'envoi de l'e-mail.";
        }
    } else {
        echo "Aucun compte n'est associé à cette adresse e-mail.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération de mot de passe - BTS Mastery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="email"],
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        button[type="submit"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button[type="submit"] {
            background-color: #ff7f00;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #ff5f00;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <form action="password_reset.php" method="post">
        <h2>Récupération de mot de passe</h2>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Envoyer le lien de réinitialisation</button>
    </form>
</body>
</html>

