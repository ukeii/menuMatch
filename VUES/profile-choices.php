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
            <?php session_start() ?>
            <div class="profile-banner">
                <div class="left-container">
                    <div class="profile-picture"></div>
                </div>
                <div class="right-container">
                    <div class="header-container">
                        <span>ugo_mrl</span>
                    </div>
                    <div class="statistic-container">
                        <ul>
                            <li><span>2</span> publications</li>
                            <li><span>800</span> likes</li>
                            <li><span>300</span> followers</li>
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
            <div class="choiceContainer">
                <?php include '../POST/fetch_choice.php'; ?>
                <?php
                $choices = fetchLikedAndDislikedRecipes();
                foreach ($choices as $choice) {
                    echo '<div class="choiceRow" data-id="' . htmlspecialchars($choice["recipeID"]) . '">';
                    echo '<div class="leftContainer" style="background-image: url(\'' . htmlspecialchars($choice["posterPath"]) . '\');"></div>';
                    echo '<div class="rightContainer">' . htmlspecialchars($choice["name"]) . '<div class="deleteChoice"><i class="bx bx-trash" onclick="deleteFavorite(' . htmlspecialchars($choice["recipeID"]) . ')"></i></div></div>';
                    echo '</div>';
                }
                ?>
            </div>

    </div>
    </main>

    </div>

    <script src="../js/navBar.js"></script>
    <script src="../js/profile.js"></script>
</body>

</html>