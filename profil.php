<?php 
ob_start(); // Démarre la mise en mémoire tampon de sortie
require "includes/header.php";

if (!isset($_SESSION['ID'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['ID'];

// Récupérer les informations actuelles de l'utilisateur
$stmt = $bdd->prepare("SELECT * FROM wp_users WHERE ID = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sauvegarder'])) {
    $user_login = $_POST['user_login'];
    $user_email = $_POST['user_email'];
    $user_nicename = $_POST['user_nicename'];
    $display_name = $_POST['display_name'];
    //user_pass = !empty($_POST['user_pass']) ? sha1($_POST['user_pass'], PASSWORD_DEFAULT) : null;

    // Requête préparée pour mettre à jour les informations de l'utilisateur
    if ($user_email) {
        
        $stmt = $bdd->prepare("UPDATE wp_users SET user_login = ?, user_email = ?, user_nicename = ?, display_name = ? WHERE ID = ?");
        $stmt->execute([$user_login, $user_email, $user_nicename, $display_name, $user_id]);
    }

    // Redirection après la mise à jour
    header("Location: profil.php?success=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - BTS Mastery</title>
    <!-- Styles CSS personnalisés -->
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            box-shadow: none;
        }
        .user-profile {
            padding: 157px;
            background-color: #ff7f00;
            color: #fff;
            border-radius: 8px 0 0 8px;
        }
        .user-profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 10px;
            margin-left: -30px

        }
        .user-profile h6 {
            font-size: 15px;
            margin-bottom: 0px;
        }
        .user-profile p {
            margin-bottom: 0;
        }
        .card-block {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-save {
            background-color: #ff7f00;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-save:hover {
            background-color: #ff5f00;
        }
        .success-message {
            color: #28a745;
            font-weight: 600;
            margin-top: 10px;
        }
        .social-link {
            list-style: none;
            padding: 0;
            margin: 20px 0 0;
            text-align: center;
        }
        .social-link li {
            display: inline-block;
            margin-right: 10px;
        }
        .social-link a {
            color: #007bff;
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card user-card-full">
                <div class="user-profile">
                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" alt="User-Profile-Image">
                    <div>
                        <h6><?php echo htmlspecialchars($user['user_login']); ?></h6>
                        <p>Student</p>
                        <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post">
                    <div class="card-block">
                        <h6 class="mb-3 pb-3 border-bottom">Informations</h6>
                        <div class="form-group">
                            <label for="user_login">Login</label>
                            <input id="user_login" name="user_login" class="form-control" type="text" value="<?php echo htmlspecialchars($user['user_login']); ?>" placeholder="Votre login" required>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input id="user_email" name="user_email" class="form-control" type="email" value="<?php echo htmlspecialchars($user['user_email']); ?>" placeholder="xyz@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="user_nicename">Prénom</label>
                            <input id="user_nicename" name="user_nicename" class="form-control" type="text" value="<?php echo htmlspecialchars($user['user_nicename']); ?>" placeholder="Votre Prénom">
                        </div>
                        <div class="form-group">
                            <label for="display_name">Nom</label>
                            <input id="display_name" name="display_name" class="form-control" type="text" value="<?php echo htmlspecialchars($user['display_name']); ?>" placeholder="Votre Nom">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn-save" name="sauvegarder" type="submit">Sauvegarder</button>
                        </div>
                        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                            <p class="success-message">Informations mises à jour avec succès.</p>
                        <?php endif; ?>
                    </div>
                </form>
                <ul class="social-link">
                    <li><a href="#!" data-toggle="tooltip" title="Facebook"><i class="mdi mdi-facebook feather icon-facebook"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" title="Twitter"><i class="mdi mdi-twitter feather icon-twitter"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" title="Instagram"><i class="mdi mdi-instagram feather icon-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
