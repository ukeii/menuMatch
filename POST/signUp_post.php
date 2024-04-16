<?php
// Connexion à la base de données
include 'bdd.php';

// Créer une connexion
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Hashage du mot de passe
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Préparation de la requête d'insertion pour éviter les injections SQL
$stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $username, $passwordHash);

// Exécution de la requête
if ($stmt->execute()) {
    echo "Inscription réussie";
    header("Location: ../vues/login.php?erreur=3");
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
