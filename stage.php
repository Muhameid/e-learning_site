<?php
// Inclure le fichier de configuration pour la connexion à la base de données
require "includes/header.php";

// Requête SQL pour récupérer les données de la table information
$sql = 'SELECT object_stage, durée, recherche, convention, mission, suivi, importance, date_publication, categorie_id FROM information';
$stmt = $bdd->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des stages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1 {
            margin: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 10px;
            overflow: hidden;
        }
        .card-header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            font-size: 1.25em;
            text-align: center;
        }
        .card-body {
            padding: 15px;
        }
        .card-body p {
            margin: 10px 0;
        }
        .card-body p span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Liste des stages</h1>
    <div class="card-container">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="card">
                <div class="card-header"><?php echo htmlspecialchars($row['object_stage']); ?></div>
                <div class="card-body">
                    <p><span>Durée :</span> <?php echo htmlspecialchars($row['durée']); ?></p>
                    <p><span>Recherche :</span> <?php echo htmlspecialchars($row['recherche']); ?></p>
                    <p><span>Convention :</span> <?php echo htmlspecialchars($row['convention']); ?></p>
                    <p><span>Mission :</span> <?php echo htmlspecialchars($row['mission']); ?></p>
                    <p><span>Suivi :</span> <?php echo htmlspecialchars($row['suivi']); ?></p>
                    <p><span>Importance :</span> <?php echo htmlspecialchars($row['importance']); ?></p>
                    
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
