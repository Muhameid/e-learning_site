<?php
require "includes/header.php";

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bts_express";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, prix, duree_jours, description FROM abonnements";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Les Abonnements - BTS Mastery</title>
  <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    .animated-card {
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .animated-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .card h2 {
      font-size: 1.5em;
      margin-bottom: 20px;
    }

    .card p {
      margin-bottom: 15px;
    }

    .card .btn {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Les forfaits illimités</h1>
        <span><a href="index.php">BTS Mastery</a> > Compte d’adhérent > Les forfaits illimités</span>
      </div>
    </div>
  </div>
</div>

<div class="more-info about-info">
  <div class="container">
    <div class="service-item text-center">
      <span>Découvre les forfaits dès 1,90€ !</span>
      <br>
      <h1>Prête / prêt à obtenir ton BTS ?</h1>
      <br>
    </div>
  </div>
</div>

<div class="container my-5">
  <div class="row justify-content-center">
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $color = $row['nom'] == 'PACK DECOUVERTE' ? 'green' : ($row['nom'] == 'PACK STARTER 1 MOIS' ? 'blue' : 'red');
        $link = $row['nom'] == 'PACK DECOUVERTE' ? 'PayPal/checkout.html' : ($row['nom'] == 'PACK STARTER 1 MOIS' ? 'PayPal/checkout2.html' : 'PayPal/checkout3.html');
        echo "
        <div class='col-md-4 mb-4'>
          <div class='card h-100 animated-card'>
            <div class='card-body text-center'>
              <h2 style='color: $color;'>{$row['nom']}</h2>
              <p>{$row['description']}</p>
              <a href='$link' class='btn btn-$color mb-3'>Prix de lancement : {$row['prix']}€ !</a>
              <a href='$link' class='btn btn-outline-$color'>Je me lance !</a>
            </div>
          </div>
        </div>";
      }
    } else {
      echo "<p>No abonnements found</p>";
    }
    $conn->close();
    ?>
  </div>
</div>

<!-- Footer Starts Here -->
<?php require "includes/footer.php"; ?>

<div class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>&copy; 2023 BTS Mastery. Tous droits réservés.
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

<script>
  document.querySelectorAll('.animated-card').forEach(card => {
    card.addEventListener('mouseover', () => {
      card.classList.add('animate__animated', 'animate__pulse');
    });
    card.addEventListener('mouseleave', () => {
      card.classList.remove('animate__animated', 'animate__pulse');
    });
  });
</script>
</body>
</html>
