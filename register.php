<?php
ob_start(); // Commence la mise en mémoire tampon du flux de sortie
require "includes/header.php";
 
// Connexion à la base de données
 
 
// Inscription
if (isset($_POST['user_login'])) {
 
    $user_login = $_POST['user_login'];
    $user_nicename = $user_login;
    $display_name = $user_login;
    $user_email = $_POST['user_email'];
    $user_pass = sha1($_POST['user_pass']);
   
    // Requête préparée pour vérifier si l'utilisateur existe déjà
    $stmt = $bdd->prepare("SELECT * FROM wp_users WHERE user_email = ?");
    $stmt->execute([$user_email]);
    $existing_user = $stmt->fetch();
 
    // Vérification si l'utilisateur existe déjà
    if ($existing_user) {
        echo "Cet utilisateur existe déjà.";
    } else {
        // Vérification des mots de passe correspondants
        $password = $_POST['user_pass'];
        $confirm_password = $_POST['confirm_password'];
 
        if ($password !== $confirm_password) {
            echo "Les mots de passe ne correspondent pas.";
        } else {
            // Requête préparée pour l'insertion
            $requete = $bdd->prepare("INSERT INTO wp_users (user_login, user_nicename, display_name, user_pass, user_email) VALUES (:user_login, :user_nicename, :display_name, :user_pass, :user_email)");
           
            // Exécution de la requête avec les valeurs
            $requete->execute([
                ':user_login' => $user_login,
                ':user_nicename' => $user_nicename,
                ':display_name' => $display_name,
                ':user_pass' => $user_pass,
                ':user_email' => $user_email
            ]);
 
            // Redirection après inscription réussie
            header("Location: index.php");
            exit();
        }
    }
}
?>
 <head>
        <title>Inscription - BTS Mastery</title>
    </head>
<body style="background-color: #ddd;">
<div class="callback-form contact-us" style="background-color: #ddd; margin-top:5px">
    <div class="container" >
        <div class="row" >
            <div class="col-md-12">
                <div class="section-heading" >
                    <h2>Inscription</h2>
                    <span>Veuillez remplir le formulaire pour créer un compte</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="register" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                    <input
                                        name="user_login"
                                        type="text"
                                        class="form-control"
                                        id="username"
                                        placeholder="Nom d'utilisateur"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                    <input
                                        name="user_email"
                                        type="email"
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
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                    <input
                                        name="confirm_password"
                                        type="password"
                                        class="form-control"
                                        id="confirm_password"
                                        placeholder="Confirmez le mot de passe"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input
                                        name="terms"
                                        type="checkbox"
                                        id="terms"
                                        required>
                                    <label for="terms">J'accepte les <a href="#">termes et conditions</a></label>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">S'inscrire</button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <a href="login.php" class="login">Déjà un compte ? Connexion</a>
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