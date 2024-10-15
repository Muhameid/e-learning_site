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

// Vérifier si l'id de la section est passé en paramètre
if (isset($_GET['id'])) {
    $section_id = $_GET['id'];

    // Requête pour récupérer les informations de la section
    $section_sql = "SELECT * FROM sections WHERE id = :section_id";
    $stmt = $bdd->prepare($section_sql);
    $stmt->bindParam(':section_id', $section_id);
    $stmt->execute();
    $section = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($section) {
        // Requête pour récupérer les cours associés à cette section
        $cours_sql = "SELECT * FROM cours WHERE section_id = :section_id";
        $stmt_cours = $bdd->prepare($cours_sql);
        $stmt_cours->bindParam(':section_id', $section_id);
        $stmt_cours->execute();
        $cours = $stmt_cours->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Partie Cours</title>
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/custom.css">
            <style>
                .section-title {
                    color: #343a40;
                    margin-bottom: 20px;
                    text-align: center;
                }
                .course-list {
                    list-style-type: none;
                    padding: 0;
                }
                .course-item {
                    background-color: #fff;
                    border: 1px solid #dee2e6;
                    border-radius: 0.25rem;
                    margin-bottom: 0.5rem;
                    padding: 1rem;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                .course-title {
                    font-size: 1.25rem;
                    font-weight: bold;
                    display: flex;
                    align-items: center;
                }
                .course-title i {
                    margin-left: 10px;
                    color: red;
                }
                .course-button {
                    background-color: #007bff;
                    color: #fff;
                    padding: 0.5rem 1rem;
                    border-radius: 0.25rem;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                }
                .course-button:hover {
                    background-color: #0056b3;
                }
                .course-button.disabled {
                    background-color: grey;
                    cursor: not-allowed;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1 class="section-title"><?php echo htmlspecialchars($section['section_name']); ?></h1>
                <?php
                if (count($cours) > 0) {
                    echo '<ul class="course-list">';
                    foreach ($cours as $key => $cour) {
                        echo '<li class="course-item">';
                        echo '<div class="course-title">' . htmlspecialchars($cour['name']);
                        
                        // Vérifier si l'utilisateur est connecté
                        if (!isset($_SESSION['user_email'])) {
                            echo ' <i class="fa fa-lock"></i>';
                            echo ' <span>Connectez-vous pour accéder</span>';
                        } else {
                            // Utilisateur connecté, vérifier l'accès au cours
                            $user_id = $_SESSION['ID'];

                            // Requête pour vérifier si l'utilisateur a un abonnement valide
                            $subscription_sql = "SELECT niveau, end_date FROM subscriptions WHERE user_id = :user_id";
                            $stmt_sub = $bdd->prepare($subscription_sql);
                            $stmt_sub->bindParam(':user_id', $user_id);
                            $stmt_sub->execute();
                            $subscription = $stmt_sub->fetch(PDO::FETCH_ASSOC);

                            if (!$subscription || is_null($subscription['niveau'])) {
                                // Cas 2-a: Utilisateur non abonné ou niveau non défini
                                echo ' <i class="fa fa-lock"></i>';
                                echo ' <span>Veuillez souscrire à un forfait</span>';
                            } else if ($subscription['niveau'] == 1) {
                                // Cas 2-c: Niveau 1 (accès limité au premier cours)
                                if ($key > 0) {
                                    echo ' <i class="fa fa-lock"></i>  ';
                                    echo ' <span>  Accès au premier cours uniquement</span>';
                                } else {
                                    // Lien vers inside-cours.php si c'est le premier cours et abonnement actif
                                    if ($subscription['end_date'] && strtotime($subscription['end_date']) >= strtotime(date('Y-m-d'))) {
                                        echo '</div>';
                                        echo '<a href="inside-cours.php?id=' . $cour['id'] . '" class="course-button">Lire le cours</a>';
                                    }
                                }
                            } else if ($subscription['niveau'] == 2 || $subscription['niveau'] == 3) {
                                // Cas 2-b: Niveau 2 ou 3 (vérifier la date de fin)
                                if ($subscription['end_date'] && strtotime($subscription['end_date']) >= strtotime(date('Y-m-d'))) {
                                    // Accès autorisé
                                   
                                    echo '</div>';
                                    echo '<a href="inside-cours.php?id=' . $cour['id'] . '" class="course-button">Lire le cours</a>';
                                } else {
                                    // Abonnement expiré
                                    echo ' <i class="fa fa-lock"></i>';
                                    echo ' <span>Abonnement expiré. Veuillez renouveler.</span>';
                                }
                            }
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Aucun cours disponible pour cette section.</p>';
                }
                ?>
            </div>
            <script src="assets/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Section non trouvée.";
    }
} else {
    echo "Aucun ID de section spécifié.";
}

// Inclusion du pied de page
require "includes/footer.php";
?>
