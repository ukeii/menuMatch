<?php
include 'bdd.php';
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connexion échouée: ' . $conn->connect_error]);
    exit;
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $operations = [
        "DELETE FROM likedPost WHERE recipeID = ?",
        "DELETE FROM dislikedPost WHERE recipeID = ?",
        "DELETE FROM seenPost WHERE recipeID = ?"
    ];
    $errors = [];

    foreach ($operations as $query) {
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if (!$stmt->execute()) {
                $errors[] = 'Erreur d\'exécution: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = 'Erreur de préparation: ' . $conn->error;
        }
    }

    if (count($errors) == 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $errors]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée ou données manquantes']);
}

$conn->close();
?>
