<?php
ob_start(); // Commence la mise en mémoire tampon du flux de sortie
require "includes/header.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Démarre la session si elle n'est pas déjà démarrée
}

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bts_express', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Connexion
if (isset($_POST['user_email'], $_POST['user_pass'])) {
    $user_email = $_POST['user_email'];
    $user_pass = sha1($_POST['user_pass']); // Assurez-vous de sécuriser correctement le mot de passe

    // Requête préparée pour vérifier les informations de connexion
    $stmt = $bdd->prepare("SELECT * FROM wp_users WHERE user_email = ? AND user_pass = ?");
    $stmt->execute([$user_email, $user_pass]);
    $user = $stmt->fetch();

    // Vérifie si l'utilisateur existe et si les informations de connexion sont correctes
    if ($user) {
        if ($user['user_status'] == 0) {
            // Redirection vers la page d'administration pour les utilisateurs avec user_status = 0
            header("Location: assets/E-commerce-main/Admin/index.php");
            exit();
        }

        // L'utilisateur est connecté, vous pouvez maintenant démarrer la session, rediriger ou effectuer d'autres actions
        $_SESSION['ID'] = $user['ID']; // Vous pouvez stocker d'autres informations de l'utilisateur dans la session si nécessaire
        $_SESSION['user_email'] = $user['user_email'];

        // Redirection vers une page de succès ou d'accueil
        header("Location: index.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        // Les informations de connexion sont incorrectes
        echo "Adresse e-mail ou mot de passe incorrect.";
    }
}
?>
<head>
    <title>Connexion - BTS Mastery</title>
</head>
<body style="background-color: #ddd;">
<div class="callback-form contact-us" style="background-color: #ddd; margin-top:5px">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Connectez-vous</h2>
                <span>Veuillez entrer vos identifiants pour vous connecter</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="contact-form">
                <form id="login" action="" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <fieldset>
                                <input
                                    name="user_email"
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="Adresse E-Mail"
                                    required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <fieldset>
                                <input
                                    name="user_pass"
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Mot de passe"
                                    required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input
                                    name="remember"
                                    type="checkbox"
                                    id="remember"
                                >
                                <label for="remember">Se souvenir de moi</label>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="filled-button">Connexion</button>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <a href="password_reset.php" class="forgot-password">Mot de passe oublié ?</a>
                                <span> | </span>
                                <a href="register.php" class="register">S'inscrire</a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php require "includes/footer.php"; ?>
</body>
</html>
