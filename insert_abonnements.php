<?php
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

// SQL to insert abonnements
$sql = "INSERT INTO abonnements (nom, prix, duree_jours, description) VALUES 
('PACK DECOUVERTE', 1.90, 30, 'Accès aux 3 premiers chapitres de chaque module U4, U5 et U6 (soit 9 chapitres au total). Accès aux exercices et études de cas de ces chapitres. Pendant ce mois, si tu passes au forfait Premium, le Pack Découverte est offert.'),
('PACK STARTER 1 MOIS', 5.90, 30, 'Accès à l\'ensemble des cours et résumés. Accès à l\'ensemble des exercices + corrections détaillées. Accès à l\'ensemble des études de cas + corrections détaillées. Groupe Discord disponible 24/24h 7/7J avec salons de discussion spécial étudiants du BTS NDRC, par matière et par région. Un professeur privé à ton écoute via MP sur Discord : pose lui toutes tes questions pendant 1 mois. NOUVEAU : Contacte ton professeur via WhatsApp ! A venir: les sujets d\'examens le jour de leur sortie. Pendant ce mois, si tu passes au forfait Premium, le Pack Découverte est offert. '),
('PACK PREMIUM 1 AN', 7.90, 365, 'Accès à l\'ensemble des cours et résumés. Accès à l\'ensemble des exercices + corrections détaillées. Accès à l\'ensemble des études de cas + corrections détaillées. Groupe Discord disponible 24/24h 7/7J avec salons de discussion spécial étudiants du BTS NDRC, par matière et par région. Un professeur privé à ton écoute via MP sur Discord : pose lui toutes tes questions pendant 1 mois. NOUVEAU : Contacte ton professeur via WhatsApp ! A venir: les sujets d\'examens le jour de leur sortie.')";

if ($conn->query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>