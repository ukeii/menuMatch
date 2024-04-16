<?php 
function fetchIngredients() {
    session_start();
    include 'bdd.php';
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $userID = $_SESSION['userID'];
    $ingredientsDetails = [];

    // Première requête pour obtenir les recipeIDs de tous les jours de la semaine
    $stmt1 = $conn->prepare("SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM weeklyrecipes WHERE userID = ?");
    $stmt1->bind_param("i", $userID);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $recipeIDs = [];

    while ($row = $result1->fetch_assoc()) {
        foreach ($row as $dayRecipeID) {
            $recipeIDs[] = $dayRecipeID;
        }
    }
    $stmt1->close();

    // Deuxième requête pour obtenir les chaînes d'ingredientIDs à partir des recipeIDs obtenus
    $stmt2 = $conn->prepare("SELECT ingredientID FROM recipe WHERE recipeID = ?");
    $allIngredientIDs = [];

    foreach ($recipeIDs as $recipeID) {
        $stmt2->bind_param("i", $recipeID);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        while ($row = $result2->fetch_assoc()) {
            $ingredientIDs = explode(',', $row['ingredientID']);
            $allIngredientIDs = array_merge($allIngredientIDs, $ingredientIDs);
        }
    }
    $stmt2->close();

    // Troisième requête pour obtenir tous les détails des ingrédients
    if (count($allIngredientIDs) > 0) {
        $inQuery = implode(',', array_fill(0, count($allIngredientIDs), '?'));
        $stmt3 = $conn->prepare("SELECT * FROM ingredients WHERE ingredientID IN ($inQuery)");
        $stmt3->bind_param(str_repeat('i', count($allIngredientIDs)), ...$allIngredientIDs);
        $stmt3->execute();
        $result3 = $stmt3->get_result();

        while ($row = $result3->fetch_assoc()) {
            $ingredientsDetails[] = $row;
        }
        $stmt3->close();
    }

    $conn->close();
    return $ingredientsDetails;
}


