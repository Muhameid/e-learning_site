<?php
// Inclusion de l'en-tête
require "includes/header.php";

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bts_express', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vérifier si l'id de la catégorie est passé en paramètre
if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    // Requête pour récupérer les matières associées à cette catégorie
    $subcategories_sql = "SELECT * FROM subcategories WHERE cat_id = :cat_id";
    $stmt = $bdd->prepare($subcategories_sql);
    $stmt->bindParam(':cat_id', $cat_id);
    $stmt->execute();
    $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Cours</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .course-title {
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            font-weight: bold;
        }
        .card-body {
            padding: 1.5rem;
        }
        .section-list {
            list-style-type: none;
            padding: 0;
        }
        .section-item {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            padding: 1rem;
        }
        .section-name {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .section-description {
            margin-top: 0.5rem;
        }
        .btn-savoir-plus {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="course-title">Les Cours</h1>
        <?php
        // Parcourir les matières
        foreach ($subcategories as $subcategory) {
            echo '<div class="card">';
            echo '<div class="card-header">' . $subcategory['subcat'] . '</div>';
            echo '<div class="card-body">';

            // Requête pour récupérer les sections associées à cette matière
            $sections_sql = "SELECT * FROM sections WHERE subcat_id = :subject_id";
            $stmt_sections = $bdd->prepare($sections_sql);
            $stmt_sections->bindParam(':subject_id', $subcategory['id']);
            $stmt_sections->execute();
            $sections = $stmt_sections->fetchAll(PDO::FETCH_ASSOC);

            if (count($sections) > 0) {
                echo '<ul class="section-list">';
                foreach ($sections as $section) {
                    echo '<li class="section-item">';
                    echo '<div class="section-name">' . $section['section_name'] . '</div>';
                    echo '<div class="section-description">' . $section['section_description'] . '</div>';
                    echo '<a href="partie_cours.php?id=' . $section['id'] . '" class="btn btn-primary btn-savoir-plus">Savoir plus</a>';
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>Aucune section disponible pour cette matière.</p>';
            }

            echo '</div>';
            echo '</div>';
        }
        ?>
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
