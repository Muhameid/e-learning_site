<?php
// Inclusion de l'en-tête
require "includes/header.php";

// Connexion à la base de données
// Inclure votre script de connexion ici

// Vérifier si l'id de la catégorie est passé en paramètre
if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    // Requête pour récupérer les informations associées à cette catégorie
    $info_sql = "SELECT id, presentation_formation, condition_admission, programmes, methode_pedagogique, débouché, témoignage_étudiant, modalités_évaluation, info_pratique 
                 FROM information WHERE categorie_id = :cat_id";
    $stmt = $bdd->prepare($info_sql);
    $stmt->bindParam(':cat_id', $cat_id);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les épreuves</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .text-left-and-center {
            padding: 100px;
        }

        .service-item h1 {
            font-weight: bold;
            font-size: 40px;
            color: black;
            text-align: left;
        }

        .service-item h1.white {
            color: white;
        }

        .service-item p {
            font-size: 18px;
            color: black;
        }

        .service-item p.white {
            color: white;
        }

        .service-item span {
            font-size: 18px;
            color: black;
        }

        .service-item span.white {
            color: white;
        }

        .filled-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .filled-button:hover {
            background-color: #0056b3;
            color: white;
        }

        .page-heading.header-text {
            background: url('assets/images/header-bg.jpg') no-repeat;
            background-size: cover;
            padding: 100px 0;
            color: white;
        }

        .page-heading.header-text h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .page-heading.header-text span {
            font-size: 20px;
        }

        .more-info.about-info {
            padding: 50px 0;
        }

        .more-info.about-info img {
            width: 30%;
            margin-left: 70%;
        }
    </style>
</head>

<body>
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Les épreuves</h1>
                    <span><a href="index.php">BTS Mastery</a> &gt; Les épreuves</span>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info about-info">
        <div class="container">
            <?php
            // Parcourir les informations
            foreach ($infos as $info) {
                echo '<div class="service-item">';
                echo '<div class="text-left-and-center">';
                echo '<h1>' . htmlspecialchars($info['presentation_formation']) . '</h1>';
                echo '<p><strong>Condition d\'admission :</strong> ' . htmlspecialchars($info['condition_admission']) . '</p>';
                echo '<p><strong>Programmes :</strong> ' . htmlspecialchars($info['programmes']) . '</p>';
                echo '<p><strong>Méthode pédagogique :</strong> ' . htmlspecialchars($info['methode_pedagogique']) . '</p>';
                echo '<p><strong>Débouché :</strong> ' . htmlspecialchars($info['débouché']) . '</p>';
                echo '<p><strong>Témoignage d\'étudiant :</strong> ' . htmlspecialchars($info['témoignage_étudiant']) . '</p>';
                echo '<p><strong>Modalités d\'évaluation :</strong> ' . htmlspecialchars($info['modalités_évaluation']) . '</p>';
                echo '<p><strong>Information pratique :</strong> ' . htmlspecialchars($info['info_pratique']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
            <span>
                <a href="matiere.php" class="filled-button">Accède au programme complet de la formation</a>
            </span>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
} else {
    echo "Aucun ID de catégorie spécifié.";
}

// Inclusion du pied de page
require "includes/footer.php";
?>
