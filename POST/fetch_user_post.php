<?php


function fetchUserPosts() {
    session_start();
    include 'bdd.php';
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $userID = $_SESSION['userID'];
    $stmt = $conn->prepare("SELECT * FROM recipe WHERE creatorID = ?"); 
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $posts = [];

    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    $stmt->close();
    $conn->close();
    return $posts;
}
