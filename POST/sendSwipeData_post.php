<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'bdd.php';

    $cardId = $_POST['cardId'];
    $action = $_POST['action'];
    $userId = $_SESSION['userID'];

    // Connexion à la base de données
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Insérer dans seenPost indépendamment de l'action
    $stmt = $conn->prepare("INSERT INTO seenPost (recipeID, userID) VALUES (?, ?)");
    $stmt->bind_param("ii", $cardId, $userId);
    $stmt->execute();

    // Insérer dans likedPost si l'action est un "like"
    if ($action == 'like') {
        $updateStmt = $conn->prepare("UPDATE recipe SET likes = likes + 1 WHERE recipeID = ?");
        $updateStmt->bind_param("i", $cardId);
        $updateStmt->execute();
        $updateStmt->close();

        // Insertion dans la table likedPost
        $insertStmt = $conn->prepare("INSERT INTO likedPost (recipeID, userID) VALUES (?, ?)");
        $insertStmt->bind_param("ii", $cardId, $userId);
        $insertStmt->execute();
        $insertStmt->close();
    } else if ($action == 'dislike') {
        $stmt = $conn->prepare("INSERT INTO dislikedPost (recipeID, userID) VALUES (?, ?)");
        $stmt->bind_param("ii", $cardId, $userId);
        $stmt->execute();
    } else if ($action == 'favorite') {
        // Mise à jour du nombre de likes pour la recette spécifiée
        $updateStmt = $conn->prepare("UPDATE recipe SET likes = likes + 1 WHERE recipeID = ?");
        $updateStmt->bind_param("i", $cardId);
        $updateStmt->execute();
        $updateStmt->close();

        // Insertion dans la table likedPost
        $insertStmt = $conn->prepare("INSERT INTO likedPost (recipeID, userID) VALUES (?, ?)");
        $insertStmt->bind_param("ii", $cardId, $userId);
        $insertStmt->execute();
        $insertStmt->close();

        // Insertion dans la table likedPost
        $insertStmt = $conn->prepare("INSERT INTO favoritesPost (recipeID, userID) VALUES (?, ?)");
        $insertStmt->bind_param("ii", $cardId, $userId);
        $insertStmt->execute();
        $insertStmt->close();
    }

    $stmt->close();
    $conn->close();

    echo "Succès";
} else {
    header('HTTP/1.1 403 Forbidden');
    echo "Accès refusé.";
}
