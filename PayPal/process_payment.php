<?php

// Inclure le fichier header.php pour obtenir l'ID utilisateur
include 'includes/header.php';

// Supposons que l'ID utilisateur est stocké dans une variable $user_id dans header.php
$userID = $user_id;

// Crée une connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vbts_express";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupère les données JSON postées
$data = json_decode(file_get_contents('php://input'), true);

$orderID = $data['orderID'];
$payerID = $data['payerID'];
$amount = $data['amount'];
$payerName = $data['payerName'];

// Vérifiez le paiement avec PayPal
$

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v2/checkout/orders/$orderID");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode("$clientID:$clientSecret")
));

$response = curl_exec($ch);
curl_close($ch);

$paypalData = json_decode($response, true);

if ($paypalData['status'] == 'COMPLETED' && $paypalData['purchase_units'][0]['amount']['value'] == $amount) {
    // Le paiement a été vérifié et correspond au montant attendu
    $type = 'monthly'; // Par exemple, mettez à jour le type en 'monthly'
    $startDate = date('Y-m-d'); // Date de début de l'abonnement
    $endDate = date('Y-m-d', strtotime('+1 month')); // Date de fin de l'abonnement (ajoutez un mois)

    // Mettez à jour l'abonnement de l'utilisateur dans la table subscriptions
    $stmt = $conn->prepare("UPDATE subscriptions SET type=?, start_date=?, end_date=? WHERE user_id=?");
    $stmt->bind_param("sssi", $type, $startDate, $endDate, $userID);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Payment verification failed."]);
}

$conn->close();
?>
