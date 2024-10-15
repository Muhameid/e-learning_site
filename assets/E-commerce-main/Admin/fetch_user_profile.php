<?php
require('require/top.php'); // Assurez-vous que cette ligne pointe vers votre fichier de connexion à la base de données

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $bdd->prepare("SELECT * FROM wp_users WHERE ID = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
?>
        <div class="card user-card-full">
            <div class="card-block text-center text-white">
                <div class="m-b-25">
                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                </div>
                <h6 class="f-w-600"><?php echo htmlspecialchars($user['user_login']); ?></h6>
                <p>Student</p>
                <!-- Affichez ici d'autres informations du profil -->
            </div>
        </div>
<?php
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID d'utilisateur non spécifié.";
}
?>
