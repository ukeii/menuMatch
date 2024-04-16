<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/calendar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Calendar</title>
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
            <div class="calendarBox" id="calendarBox">

                <?php include '../POST/fetch_weekly_recipe.php'; ?>

                <?php
                $weeklyRecipes = fetchWeeklyRecipes();
                // Définir l'ordre d'affichage des jours
                $days = ['monday', 'thursday', 'tuesday', 'wednesday', 'friday', 'saturday', 'sunday'];

                foreach ($days as $day) {
                    // Vérifier si des données existent pour le jour spécifique
                    if (isset($weeklyRecipes[$day])) {
                        $recipe = $weeklyRecipes[$day];
                        echo '<div class="dayContainer">';
                        echo '<div class="day" id="' . htmlspecialchars($recipe['recipeID']) . '">';
                        echo '<h3>' . htmlspecialchars($day) . '</h3>'; // Affiche le nom du jour
                        if (is_array($recipe)) {
                            // Afficher le nom de la recette si les détails de la recette sont disponibles
                            echo '<h4>' . htmlspecialchars($recipe['name']) . '</h4>';
                            echo '<button onclick="viewMore(this)"';
                            echo ' data-name="' . htmlspecialchars($recipe['name']) . '"';
                            echo ' data-description="' . htmlspecialchars($recipe['description']) . '"';
                            echo ' data-origine="' . htmlspecialchars($recipe['origine']) . '"';
                            echo ' data-other="' . htmlspecialchars($recipe['otherDetail']) . '">View More</button>'; // Ajoutez autant de détails que nécessaire
                
                        } else {
                            // Afficher un message si aucune recette n'est disponible pour ce jour
                            echo '<p>' . htmlspecialchars($recipe) . '</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <div class="infoBox" id="infoBox"></div>


        </main>

    </div>

    <script src="../js/navBar.js"></script>
    <script src="../js/calendar.js"></script>
</body>

</html>