<?php
function fetchLikedAndDislikedRecipes() {
    session_start();
    
    include 'bdd.php';
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $userID = $_SESSION['userID'];

    // Récupérer les ID des recettes likées
    $likedQuery = "SELECT recipeID FROM likedpost WHERE userID = ?";
    $stmt = $conn->prepare($likedQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $likedRecipeIds = [];
    while ($row = $result->fetch_assoc()) {
        $likedRecipeIds[] = $row['recipeID'];
    }
    $stmt->close();

    // Récupérer les ID des recettes dislikées
    $dislikedQuery = "SELECT recipeID FROM dislikedPost WHERE userID = ?";
    $stmt = $conn->prepare($dislikedQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $dislikedRecipeIds = [];
    while ($row = $result->fetch_assoc()) {
        $dislikedRecipeIds[] = $row['recipeID'];
    }
    $stmt->close();

    // Récupérer les informations des recettes likées et dislikées
    $recipesInfo = [];
    $recipeIds = array_merge($likedRecipeIds, $dislikedRecipeIds);
    if (!empty($recipeIds)) {
        $idsPlaceholders = str_repeat('?,', count($recipeIds) - 1) . '?';
        $recipeQuery = "SELECT * FROM recipe WHERE recipeID IN ($idsPlaceholders)";
        $stmt = $conn->prepare($recipeQuery);
        $stmt->bind_param(str_repeat('i', count($recipeIds)), ...$recipeIds);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $recipesInfo[] = $row;
        }
        $stmt->close();
    }

    $conn->close();

    return $recipesInfo;
}


