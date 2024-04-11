<?php
// Démarrage de la session
session_start();

// Connexion à la base de données
include 'bdd.php'; // Assurez-vous que ce fichier définit les variables $servername, $dbUsername, $dbPassword, et $dbname

// Création de la connexion
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération du username depuis le formulaire
$user_username = $_POST['username'];

// Préparation de la requête SQL pour obtenir le hash du mot de passe et le userID
$sql = $conn->prepare("SELECT userID, password FROM users WHERE username = ?");
$sql->bind_param("s", $user_username);

// Exécution de la requête
$sql->execute();
$result = $sql->get_result();

if ($row = $result->fetch_assoc()) {
    // Vérification du mot de passe
    if (password_verify($_POST['password'], $row['password'])) {
        // Le mot de passe est correct, on stocke le username et le userID en session
        $_SESSION['username'] = $user_username;
        $_SESSION['userID'] = $row['userID']; // Rajouter l'userID en session

        header("Location: ../vues/home.php"); // Redirection vers la page d'accueil
    } else {
        // Le mot de passe est incorrect
        header("Location: ../vues/login.php?erreur=1"); // Redirection avec un code d'erreur pour mot de passe incorrect
    }
} else {
    // Le username n'existe pas
    header("Location: ../vues/login.php?erreur=2"); // Redirection avec un code d'erreur pour username non trouvé
}

// Fermeture de la déclaration et de la connexion
$sql->close();
$conn->close();

