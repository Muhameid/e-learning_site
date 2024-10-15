<?php
require('require/top.php');

// Vérification des données postées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $user_login = mysqli_real_escape_string($con, $_POST['user_login']);
    $user_pass = sha1(mysqli_real_escape_string($con, $_POST['user_pass'])); // Hachage du mot de passe avec sha1
    $user_nicename = mysqli_real_escape_string($con, $_POST['user_nicename']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_status = mysqli_real_escape_string($con, $_POST['user_status']);
    $display_name = mysqli_real_escape_string($con, $_POST['display_name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

    // Insertion des données dans la table wp_users
    $query = "INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_status, display_name, mobile)
              VALUES ('$user_login', '$user_pass', '$user_nicename', '$user_email', '$user_status', '$display_name', '$mobile')";

    if (mysqli_query($con, $query)) {
        $message = "Utilisateur ajouté avec succès.";
    } else {
        $error_message = "Erreur: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur ou un administrateur</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="password"], input[type="email"], select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter un utilisateur ou un administrateur</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            if (isset($message)) {
                echo '<p class="message success">' . $message . '</p>';
            } elseif (isset($error_message)) {
                echo '<p class="message error">' . $error_message . '</p>';
            }
            ?>
            <label for="user_login">Nom d'utilisateur:</label>
            <input type="text" id="user_login" name="user_login" required>

            <label for="user_pass">Mot de passe:</label>
            <input type="password" id="user_pass" name="user_pass" required>

            <label for="user_nicename">Prénom:</label>
            <input type="text" id="user_nicename" name="user_nicename" required>
            <label for="display_name">Nom :</label>
            <input type="text" id="display_name" name="display_name" required>


            <label for="user_email">Email:</label>
            <input type="email" id="user_email" name="user_email" required>

            <label for="user_status">Statut:</label>
            <select id="user_status" name="user_status">
                <option value="1">Utilisateur</option>
                <option value="0">Administrateur</option>
            </select>

           
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile">

            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
