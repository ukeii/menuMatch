<?php
function fetchUserRecipes() {
    session_start();
    include 'bdd.php'; 
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $userID = $_SESSION['userID'];
    // Première requête pour récupérer les recipeID des favoris de l'utilisateur.
    $stmt = $conn->prepare("SELECT recipeID FROM favoritesPost WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $recipes = [];
    while ($row = $result->fetch_assoc()) {
        $recipeID = $row['recipeID'];
        $stmt2 = $conn->prepare("SELECT * FROM recipe WHERE recipeID = ?");
        $stmt2->bind_param("i", $recipeID);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        
        if ($recipeDetails = $result2->fetch_assoc()) {
            $recipes[] = $recipeDetails;
        }
        $stmt2->close();
    }

    $stmt->close();
    $conn->close();
    
    return $recipes;
}

