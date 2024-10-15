<?php
if (!isset($_GET['bts_id'])) {
    die("BTS non spécifié.");
}

$bts_id = intval($_GET['bts_id']);

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "todolist");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des cours pour le BTS sélectionné
$coursResult = $conn->query("SELECT id, nom FROM cours WHERE bts_id = $bts_id");

// Récupération du nom du BTS
$btsResult = $conn->query("SELECT nom FROM bts WHERE id = $bts_id");
$btsName = $btsResult->fetch_assoc()['nom'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours de <?php echo htmlspecialchars($btsName); ?> - BTS Mastery</title>
    <style>
        /* Include your styles here */
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="search-container">
            <form action="/search" method="get">
                <input type="text" class="search-input" name="q" placeholder="Rechercher...">
                <button type="submit" class="search-button">
                    <img src="assets/images/icon-recherche.png" alt="Rechercher">
                </button>
            </form>
        </div>
        <div class="dropdown" onclick="toggleDropdown('cours-dropdown', 'cours-arrow', this)">
            <h5>Cours</h5>
            <span id="cours-arrow">&#9654;</span>
        </div>
        <div id="cours-dropdown" class="dropdown-content">
            <?php while($row = $coursResult->fetch_assoc()): ?>
                <a href="read.php?cours_id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nom']); ?></a>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="content">
        <div class="course-header">
            <h1>Cours de <?php echo htmlspecialchars($btsName); ?></h1>
            <button class="close-button" onclick="returnToHome()" style="background-color: white;"><a href="index.php">&#10006;</a></button>
        </div>
        <div class="main-content">
            <div class="more-info about-info">
                <div class="service-item">
                    <div class="text-left-and-center" style="padding: 100px;">
                        <!-- Course content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown(dropdownId, arrowId, element) {
            var content = document.getElementById(dropdownId);
            var arrow = document.getElementById(arrowId);
            var isActive = content.style.display === 'block';

            // Collapse all dropdowns
            var allDropdowns = document.querySelectorAll('.dropdown-content');
            var allArrows = document.querySelectorAll('.dropdown > span');
            var allDropdownElements = document.querySelectorAll('.dropdown');
            allDropdowns.forEach(function(dropdown) {
                dropdown.style.display = 'none';
            });
            allArrows.forEach(function(arrow) {
                arrow.classList.remove('rotate');
            });
            allDropdownElements.forEach(function(el) {
                el.classList.remove('active');
            });

            // Expand the clicked dropdown if it was not already active
            if (!isActive) {
                content.style.display = 'block';
                arrow.classList.add('rotate');
                element.classList.add('active');
            }
        }
    </script>
</body>
</html>
