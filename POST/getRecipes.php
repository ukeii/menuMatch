<?php
session_start();

// Connexion à la base de données
include 'bdd.php';
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Préparation de la requête SQL pour récupérer les recettes non vues
$userID = $_SESSION['userID'];
$sql = "SELECT * FROM recipe WHERE recipeID NOT IN (
    SELECT recipeID FROM seenPost WHERE userID=?
)";

// Préparation de la requête SQL pour éviter les injections SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);

// Exécution de la requête
$stmt->execute();
$result = $stmt->get_result();

$recipes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
} else {
    echo "0 résultats";
}

$conn->close();

return $recipes;

