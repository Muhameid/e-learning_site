<?php
// Inclure le fichier de connexion à la base de données

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'require/top.php'; // Assurez-vous que ce fichier contient la connexion à votre base de données

// Traitement du formulaire d'ajout d'informations
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-info'])) {
    $categorie_id = mysqli_real_escape_string($con, $_POST['categorie_id']);
    $presentation_formation = mysqli_real_escape_string($con, $_POST['presentation_formation']);
    $condition_admission = mysqli_real_escape_string($con, $_POST['condition_admission']);
    $programmes = mysqli_real_escape_string($con, $_POST['programmes']);
    $methode_pedagogique = mysqli_real_escape_string($con, $_POST['methode_pedagogique']);
    $débouché = mysqli_real_escape_string($con, $_POST['débouché']);
    $témoignage_étudiant = mysqli_real_escape_string($con, $_POST['témoignage_étudiant']);
    $modalités_évaluation = mysqli_real_escape_string($con, $_POST['modalités_évaluation']);
    $info_pratique = mysqli_real_escape_string($con, $_POST['info_pratique']);
    $object_stage = mysqli_real_escape_string($con, $_POST['object_stage']);
    $durée = mysqli_real_escape_string($con, $_POST['durée']);
    $recherche = mysqli_real_escape_string($con, $_POST['recherche']);
    $convention = mysqli_real_escape_string($con, $_POST['convention']);
    $mission = mysqli_real_escape_string($con, $_POST['mission']);
    $suivi = mysqli_real_escape_string($con, $_POST['suivi']);
    $importance = mysqli_real_escape_string($con, $_POST['importance']);

    // Insertion des données dans la base de données
    $query = "INSERT INTO information (categorie_id, presentation_formation, condition_admission, programmes, methode_pedagogique, débouché, témoignage_étudiant, modalités_évaluation, info_pratique, object_stage, durée, recherche, convention, mission, suivi, importance) 
              VALUES ('$categorie_id', '$presentation_formation', '$condition_admission', '$programmes', '$methode_pedagogique', '$débouché', '$témoignage_étudiant', '$modalités_évaluation', '$info_pratique', '$object_stage', '$durée', '$recherche', '$convention', '$mission', '$suivi', '$importance')";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Informations ajoutées avec succès !');</script>";
        echo "<script>window.location.href = 'ajouter_information.php';</script>"; // Redirection après succès
        exit(); // Arrête l'exécution du script pour éviter toute sortie inattendue
    } else {
        echo "<script>alert('Erreur lors de l\'ajout des informations');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des informations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 600px;
            margin: auto;
        }
        label {
            margin-top: 10px;
        }
        textarea, select, input {
            padding: 10px;
            margin-top: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div id="addInfoForm">
    <h3>Ajouter des informations sur les épreuves et le stage</h3>
    <form method="POST">
        <label for="categorie_id">Formation :</label>
        <select id="categorie_id" name="categorie_id" required>
            <?php
            $query = "SELECT * FROM categories";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
            <?php
            }
            ?>
        </select>

        <label for="presentation_formation">Présentation de la formation :</label>
        <textarea id="presentation_formation" name="presentation_formation" required></textarea>

        <label for="condition_admission">Condition d'admission :</label>
        <textarea id="condition_admission" name="condition_admission" required></textarea>

        <label for="programmes">Programme et matières enseignées :</label>
        <textarea id="programmes" name="programmes" required></textarea>

        <label for="methode_pedagogique">Méthode pédagogique :</label>
        <textarea id="methode_pedagogique" name="methode_pedagogique" required></textarea>

        <label for="débouché">
        Débouchés professionnels :</label>
        <textarea id="débouché" name="débouché" required></textarea>

        <label for="témoignage_étudiant">Témoignages d'anciens étudiantst :</label>
        <textarea id="témoignage_étudiant" name="témoignage_étudiant" required></textarea>

        <label for="modalités_évaluation">Modalités d'évaluation :</label>
        <textarea id="modalités_évaluation" name="modalités_évaluation" required></textarea>

        <label for="info_pratique">Information pratique :</label>
        <textarea id="info_pratique" name="info_pratique" required></textarea>

        <label for="object_stage">Objectif du stage :</label>
        <textarea id="object_stage" name="object_stage" required></textarea>

        <label for="durée">
        Durée et Périodicité :</label>
        <input type="text" id="durée" name="durée" required>

        <label for="recherche">Recherche de stage:</label>
        <textarea id="recherche" name="recherche" required></textarea>

        <label for="convention">Convention de stage :</label>
        <textarea id="convention" name="convention" required></textarea>

        <label for="mission">Mission du stage:</label>
        <textarea id="mission" name="mission" required></textarea>

        <label for="suivi">Suivi et évaluation:</label>
        <textarea id="suivi" name="suivi" required></textarea>

        <label for="importance">Importance du Stage pour l’Insertion Professionnelle :</label>
        <textarea id="importance" name="importance" required></textarea>

        <input type="submit" name="add-info" value="Ajouter">
    </form>
</div>

</body>
</html>
