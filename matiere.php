<?php
require "includes/header.php";

// Vérifier si un ID de catégorie est passé en paramètre
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $cat_id = $_GET['id'];

    // Connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bts_express', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Récupérer le nom de la catégorie
    $category_sql = "SELECT category FROM categories WHERE id = :cat_id";
    $stmt = $bdd->prepare($category_sql);
    $stmt->bindParam(':cat_id', $cat_id);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer les sous-catégories (matières) associées à cette catégorie
    $subcategories_sql = "SELECT * FROM subcategories WHERE cat_id = :cat_id";
    $stmt = $bdd->prepare($subcategories_sql);
    $stmt->bindParam(':cat_id', $cat_id);
    $stmt->execute();
    $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Séparer les matières générales et techniques
    $matieres_generales = array_filter($subcategories, function ($subcat) {
        return $subcat['type_matiere'] == 'Générale';
    });

    $matieres_techniques = array_filter($subcategories, function ($subcat) {
        return $subcat['type_matiere'] == 'Technique';
    });
} else {
    // Rediriger si l'ID de catégorie n'est pas spécifié
    header("Location: index.php");
    exit();
}
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
        .down-content {
            transition: transform 0.3s ease;
        }

        .down-content:hover {
            transform: translateY(-20px);
        }

        .image-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            min-height: 300px;
        }

        .image-content img {
            max-width: 100%;
            height: auto;
            margin-top: 15%;
            margin-left: 25%;
        }

        .button-container {
            text-align: right;
            margin-left: 10%;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding-top: 80px;
            padding-bottom: 80px;
        }

        @media (max-width: 768px) {
            .content-container {
                padding-top: 60px;
                padding-bottom: 60px;
            }
        }

        .hi {
            background-color: #fafafa;
            text-align: center;
        }

        .hi h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #110545;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 30px;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            max-width: 80px;
            margin-bottom: 20px;
        }

        .card h5 {
            font-size: 1.8rem;
            color: #110545;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.2rem;
            color: #555;
        }

        .details {
            background-color: #fefefe;
            color: black;
            padding: 80px 0;
        }

        .details h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: #110545 !important;
        }

        .details h3 {
            font-size: 1.8rem;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .details p {
            font-size: 1.4rem;
            margin-bottom: 20px;
        }

        .filled-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #110545;
            color: black;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .filled-button:hover {
            background-color: #0a023c;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            header p {
                font-size: 1.2rem;
            }

            .hi {
                padding: 60px 0;
            }

            .hi h2 {
                font-size: 2rem;
            }

            .card {
                padding: 20px;
            }

            .details h2 {
                font-size: 2rem;
            }

            .details h3 {
                font-size: 1.5rem;
            }

            .details p {
                font-size: 1.2rem;
            }
        }

        /* Styles pour aligner les cartes horizontalement */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card-container .card {
            width: 30%; /* Ajustez la largeur des cartes selon vos besoins */
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .card-container .card {
                width: 100%; /* Sur mobile, afficher les cartes sur une seule colonne */
            }
        }
    </style>
</head>

<body>
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>BTS Mastery : Les matières</h1>
                    <span><a href="index.php">BTS Mastery</a> > BTS SAM : Les matières</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content-container hi">
        <div class="container">
            <h2>LES MATIÈRES GÉNÉRALES</h2>
            <div class="card-container">
                <?php foreach ($matieres_generales as $matiere) : ?>
                    <div class="card">
                        <a href="cours.php">
                        <img src="assets/images/cap_student.png" alt="">
                        <h4><?php echo htmlspecialchars($matiere['subcat']); ?></h4>
                        <p>(Coefficient: <?php echo htmlspecialchars($matiere['coefficients']); ?>)</p>
                </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="content-container details">
        <div class="container" style="margin-left:10%; margin-right:10%">
            <h2>PRÉCISIONS SUR LES MATIÈRES DU <?php echo htmlspecialchars($category['category']); ?></h2>
            <div class="inner-text">
                <h3> Les Matières Générales</h3>
                <p style="color:black">
                    Précisions sur chaque matière du <?php echo htmlspecialchars($category['category']); ?>.
                </p>
                <h4>Descriptions des Matières Générales</h4>
                <br>
                <?php foreach ($matieres_generales as $matiere) : ?>
                    <h7><strong><?php echo htmlspecialchars($matiere['subcat']); ?></strong>:<br> <?php echo htmlspecialchars($matiere['description_matiere']); ?></h7><br><br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="content-container hi">
        <div class="container">
            <h2>LES MATIÈRES TECHNIQUES</h2>
            <div class="card-container">
                <?php foreach ($matieres_techniques as $matiere) : ?>
                    <div class="card">
                        <img src="assets/images/cap_student.png" alt="">
                        <h4><?php echo htmlspecialchars($matiere['subcat']); ?></h4>
                        <p>(Coefficient: <?php echo htmlspecialchars($matiere['coefficients']); ?>)</p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="content-container details">
        <div class="container" style="margin-left:10%; margin-right:10%" >
            <h2>PRÉCISIONS SUR LES MATIÈRES DU <?php echo htmlspecialchars($category['category']); ?></h2>
            <div class="inner-text">
                <h3> Les Matières Techniques</h3>
                <p style="color:black">
                    Précisions sur chaque matière du <?php echo htmlspecialchars($category['category']); ?>.
                </p>
                <h4>Descriptions des Matières Techniques</h4>
                <br>
                <?php foreach ($matieres_techniques as $matiere) : ?>
                    <h7><strong><?php echo htmlspecialchars($matiere['subcat']); ?></strong>:<br> <?php echo htmlspecialchars($matiere['description_matiere']); ?></h7><br><br>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menuItems = document.querySelectorAll('.hfe-has-submenu');

            menuItems.forEach(function(menuItem) {
                menuItem.addEventListener('mouseenter', function(event) {
                    this.classList.add('open');
                });
                menuItem.addEventListener('mouseleave', function(event) {
                    this.classList.remove('open');
                });
            });
        });
    </script>
    
<!-- Footer Starts Here -->

<?php require "includes/footer.php"; ?>

<div class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>&copy;© 2023 BTS Mastery. Tous droits réservés.
         <br>
          <a rel="nofollow noopener" href="https://themewagon.com" target="_blank">View on Maps</a>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>

<script language="text/Javascript">
  cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
  function clearField(t) { //declaring the array outside of the
    if (!cleared[t.id]) { // function makes it static and global
      cleared[t.id] = 1; // you could use true and false, but that's more typing
      t.value = ''; // with more chance of typos
      t.style.color = '#fff';
    }
  }
</script>

</body>

</html>
</body>

</html>