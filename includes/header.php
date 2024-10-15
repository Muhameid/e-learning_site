<?php
session_start();

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bts_express', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des catégories
$categories_sql = "SELECT * FROM categories";
$categories_result = $bdd->query($categories_sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .hfe-nav-menu__layout-horizontal {
            display: flex;
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: black;
            justify-content: space-between;
        }
        .hfe-nav-menu__layout-horizontal > li {
            position: relative;
            margin-top: 15px;
        }
        .hfe-menu-item {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }
        .hfe-menu-item:hover {
            background-color: #e9ecef;
        }
        .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            list-style: none;
            padding: 0;
            margin: 0;
            z-index: 1000;
        }
        .sub-menu .sub-menu {
            left: 100%;
            top: 0;
        }
        .hfe-has-submenu:hover > .sub-menu {
            display: block;
        }
        .hfe-sub-menu-item {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #343a40;
        }
        .hfe-sub-menu-item:hover {
            background-color: #e9ecef;
        }
        .mylog{
            height: 60px;
            width: 60px;
            border-radius: 20px;

        }
    </style>
</head>
<body>
    <nav>
        <ul class="hfe-nav-menu__layout-horizontal">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.webp" class= "mylog" >
            </a>
            <li class="menu-item hfe-has-submenu">
                <a href="#" class="hfe-menu-item">Les Formations
                    <span class='hfe-menu-toggle sub-arrow'><i class='fa-solid fa-caret-down'></i></span>
                </a>
                
                <ul class="sub-menu ko">
                    <li class="menu-item">
                        <a href="presentation-diplome.php" class="hfe-sub-menu-item">Présentation du BTS</a>
                    </li>
                    <?php
                    // Affiche les catégories et leurs sous-catégories
                    if ($categories_result->rowCount() > 0) {
                        while($category = $categories_result->fetch(PDO::FETCH_ASSOC)) {
                            $cat_id = $category['id'];
                            echo '<li class="menu-item hfe-has-submenu">';
                            echo '<a href="#" class="hfe-sub-menu-item">' . $category['category'] . '<span class="hfe-menu-toggle sub-arrow"><i class="fa-solid fa-caret-right"></i></span></a>';
                            
                            // Sous-menu pour chaque catégorie
                            echo '<ul class="sub-menu ko">';
                            
                            // Sous-menu "Présentation du BTS"
                            echo '<li class="menu-item">';
                            echo '<a href="cours.php" class="hfe-sub-menu-item">Présentation du ' . $category['category'] . '</a>';
                            echo '</li>';
                            
                            // Sous-menu "Les Cours"
                            echo '<li class="menu-item">';
                            // Lien vers read.php avec l'id de la catégorie
                            echo '<a href="read.php?id=' . $cat_id . '" class="hfe-sub-menu-item">Les Cours</a>';
                            echo '</li>';
                            
                            // Sous-menu "Les Matières" (chargement dynamique)
                            echo '<li class="menu-item hfe-has-submenu">';
                            echo '<a href="matiere.php?id=' .$cat_id . '" class="hfe-sub-menu-item">Les Matières<span class="hfe-menu-toggle sub-arrow"><i class="fa-solid fa-caret-right"></i></span></a>';
                            echo '<ul class="sub-menu ko">';
                            
                            // Récupérer les matières associées à cette catégorie
                            $subcategories_sql = "SELECT * FROM subcategories WHERE cat_id = :cat_id";
                            $stmt = $bdd->prepare($subcategories_sql);
                            $stmt->bindParam(':cat_id', $cat_id);
                            $stmt->execute();
                            while ($subcategory = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<li class="menu-item">';
                                echo '<a href="#" class="hfe-sub-menu-item">' . $subcategory['subcat'] . '</a>';
                                echo '</li>';
                            }
                            
                            echo '</ul>';
                            echo '</li>';
                            
                            // Autres sous-menus
                            echo '<li class="menu-item">';
                            echo '<a href="epreuves.php?id=' .$cat_id . '" class="hfe-sub-menu-item">Les Épreuves</a>';
                            echo '</li>';
                            echo '<li class="menu-item">';
                            echo '<a href="stage.php?id=' .$cat_id . '" class="hfe-sub-menu-item">Le Stage</a>';
                            echo '</li>';
                            
                            echo '</ul>';
                            echo '</li>';
                        }
                    }
                    ?>
                    <li class="menu-item">
                        <a href="abonnement.php" class="hfe-sub-menu-item">Les forfaits illimités</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item hfe-has-submenu">
                <a href="contact.php" class="hfe-menu-item">Contact
                    <span class='hfe-menu-toggle sub-arrow'></span>
                </a>
            </li>
            <?php
            // Vérifie si l'utilisateur est connecté
            if (isset($_SESSION['ID'])) {
                // L'utilisateur est connecté, affiche le lien de mon compte avec ses sous-menus
                echo '
                <li class="menu-item hfe-has-submenu">
                    <a href="#" class="hfe-menu-item">Mon compte
                        <span class="hfe-menu-toggle sub-arrow">
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                    </a>
                    <ul class="sub-menu ko">
                        <li class="menu-item">
                            <a href="profil.php" class="hfe-sub-menu-item">Modifier mon profil</a>
                        </li>
                        <li class="menu-item">
                            <a href="logout.php" class="hfe-sub-menu-item">Déconnexion</a>
                        </li>
                    </ul>
                </li>';
            } else {
                // L'utilisateur n'est pas connecté, affiche les liens d'inscription et de connexion
                echo '<li class="menu-item"> 
                    <a href="register.php" class="hfe-menu-item">Inscription</a>
                </li>
                <li class="menu-item"> 
                    <a href="login.php" class="hfe-menu-item">Connexion</a>
                </li>';
            }
            ?>
        </ul>
    </nav>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var menuItems = document.querySelectorAll('.hfe-has-submenu');

            menuItems.forEach(function (menuItem) {
                menuItem.addEventListener('mouseenter', function (event) {
                    this.classList.add('open');
                });
                menuItem.addEventListener('mouseleave', function (event) {
                    this.classList.remove('open');
                });
            });
        });
    </script>
</body>
</html>
