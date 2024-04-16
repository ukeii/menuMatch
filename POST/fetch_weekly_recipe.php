<?php

function fetchWeeklyRecipes() {
    session_start();
    include 'bdd.php';
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $userID = $_SESSION['userID'];
    $stmt = $conn->prepare("SELECT * FROM weeklyrecipes WHERE userID = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    $weeklyRecipes = [];
    if ($row = $result->fetch_assoc()) {
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        foreach ($days as $day) {
            $recipeID = $row[$day];
            if ($recipeID) {
                $stmtRecipe = $conn->prepare("SELECT * FROM recipe WHERE recipeID = ?");
                $stmtRecipe->bind_param("i", $recipeID);
                $stmtRecipe->execute();
                $resultRecipe = $stmtRecipe->get_result();
                if ($recipeDetails = $resultRecipe->fetch_assoc()) {
                    $weeklyRecipes[$day] = $recipeDetails;
                } else {
                    $weeklyRecipes[$day] = "Recette non trouvée pour $day";
                }
                $stmtRecipe->close();
            } else {
                $weeklyRecipes[$day] = "Aucune recette assignée pour $day";
            }
        }
    } else {
        echo "Aucune recette trouvée pour l'utilisateur.";
    }

    $stmt->close();
    $conn->close();
    return $weeklyRecipes;
}
