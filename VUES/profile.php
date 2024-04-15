<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Profile</title>
</head>

<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <?php include 'sidebarMobile.php'; ?>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <?php include 'navbar.php'; ?>
        <!-- End of Navbar -->

        <main>
            <div class="profile-banner">
                <div class="left-container">
                    <div class="profile-picture"></div>
                </div>
                <div class="right-container">
                    <div class="header-container">
                        <span>
                            <?php
                            session_start();
                            echo $_SESSION['username'];
                            ?>
                        </span>
                        <button>+ New Post</button>
                    </div>
                    <div class="statistic-container">
                        <ul>
                            <li>
                                <span>
                                    <?php
                                    session_start();
                                    include '../POST/bdd.php';
                                    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
                                    if ($conn->connect_error) {
                                        die("La connexion a échoué : " . $conn->connect_error);
                                    }
                                    $stmt = $conn->prepare("SELECT COUNT(*) as numPublications FROM recipe WHERE creatorID = ?");
                                    $stmt->bind_param("i", $_SESSION['userID']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $row = $result->fetch_array(MYSQLI_ASSOC);
                                    $count = $row['numPublications'];
                                    echo $count;
                                    $stmt->close();
                                    $conn->close();
                                    ?>
                                </span> publications
                            </li>
                            <li>
                                <span>
                                    <?php
                                    session_start();
                                    include '../POST/bdd.php';

                                    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
                                    if ($conn->connect_error) {
                                        die("La connexion a échoué : " . $conn->connect_error);
                                    }

                                    $stmt = $conn->prepare("SELECT SUM(likes) as numLikes FROM recipe WHERE creatorID = ?");
                                    $stmt->bind_param("i", $_SESSION['userID']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $row = $result->fetch_array(MYSQLI_ASSOC);
                                    $totalLikes = $row['numLikes'] ? $row['numLikes'] : 0;
                                    echo $totalLikes;
                                    $stmt->close();
                                    $conn->close();
                                    ?>

                                </span> likes
                            </li>
                            <li>
                                <span>
                                    300
                                </span> followers
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul>
                    <li <?php if (strpos($_SERVER['PHP_SELF'], 'profile.php') !== false)
                        echo 'class="active"'; ?>>
                        <a href="profile.php"><i class='bx bx-grid'></i>Mes publications</a>
                    </li>
                    <li <?php if (strpos($_SERVER['PHP_SELF'], 'profile-favorites.php') !== false)
                        echo 'class="active"'; ?>>
                        <a href="profile-favorites.php"><i class='bx bx-star'></i>Mes favoris</a>
                    </li>
                    <li <?php if (strpos($_SERVER['PHP_SELF'], 'profile-choices.php') !== false)
                        echo 'class="active"'; ?>>
                        <a href="profile-choices.php"><i class='bx bx-heart'></i>Mes choix</a>
                    </li>
                </ul>
            </div>
            <!-- Profile Post-->
            <div class="user-post">
                <?php include '../POST/fetch_user_post.php'; ?>

                <?php
                $userPosts = fetchUserPosts();
                foreach ($userPosts as $post) {
                    echo '<div class="post" style="background-image: url(\'' . htmlspecialchars($post["posterPath"]) . '\');">';
                    echo '<div class="postStatistic"><i class="bx bx-heart"></i>' . htmlspecialchars($post["likes"]) ;
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

        </main>

    </div>

    <script src="../js/navBar.js"></script>
</body>

</html>