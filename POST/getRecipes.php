<?php
session_start();

include 'bdd.php';
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$userID = $_SESSION['userID'];
$sql = "SELECT * FROM recipe WHERE recipeID NOT IN (
    SELECT recipeID FROM seenPost WHERE userID=?
)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);

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

