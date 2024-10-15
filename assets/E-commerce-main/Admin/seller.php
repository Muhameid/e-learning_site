<?php
require('require/top.php');

// Vérification et gestion de la suppression d'un utilisateur
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $requete = $bdd->prepare("UPDATE wp_users SET user_status = 0 WHERE ID = :id");
    $requete->execute(['id' => $user_id]);
}

// Modification de la requête SQL pour n'afficher que les utilisateurs actifs
$query = "SELECT * FROM wp_users WHERE user_status = 1 ORDER BY ID DESC";
$res = mysqli_query($con, $query);
$i = 1;
?>

<div class="wrwr">
    <div class="path" id="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="seller.php">Utilisateurs</a>
    </div>
    <div class="rowbtn">
        <div class="b">
            <input type="text" placeholder="Rechercher un utilisateur" id="sfield" onkeyup="search('sfield','p_name')" />
            
        </div>
    </div>
    <div class="catbox-row">
        <div class="catbox">
            <div class="heading">
                <div class="slno">ID</div>
                <div class="p_namee">Login</div>
                <div class="p_image">Email</div>
                <div class="p_statuse">Date d'inscription</div>
                <div class="p_action">Action</div>
            </div>
  
            <div class="bspace" id="sellersecroww">
                <?php
                $query = "SELECT ID, user_login FROM wp_users"; // Sélectionnez les utilisateurs depuis votre table d'utilisateurs
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
                   
                    $user_id = $row['ID'];
    $user_login = htmlspecialchars($row['user_login']);
                    $cb = "<button onclick='viewProfile($user_id)'>
                            <i class='fa fa-eye-slash' aria-hidden='true'></i> voir son profil
                          </button>";
                ?>
                    <div class="p_row">
                        <div class="slno"><?php echo $i; ?></div>
                        <div class="p_name"><?php echo htmlspecialchars($row['user_login']); ?></div>
                        <div class="p_image"><?php echo htmlspecialchars($row['user_email']); ?></div>
                        <div class="p_status">
                            <span class="active_span"><?php echo htmlspecialchars($row['user_registered']); ?></span>
                        </div>
                        <div class="p_action">
                            <?php echo $cb; ?>
                            <button class="delete" onclick="catdelete(<?php echo $row['ID']; ?>)">
                            <i class="fa fa-trash" aria-hidden="true"></i>supprimer
                        </button>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
      
    </div>
</div>

<?php
require('require/foot.php');
?>
