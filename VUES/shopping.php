<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/shopping.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Shopping</title>
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
            <div class="shoppingBox">
                <h1>Liste des courses de cette semaine:</h1>
                <?php include '../POST/fetch_ingredients.php'; ?>

                <?php
                $ingredients = fetchIngredients();
                foreach ($ingredients as $ingredient) {
                    echo '<div class="ingredientBox">';
                    echo '<div class="leftContainer" style="background-image: url(\'' . htmlspecialchars($ingredient["posterPath"]) . '\');"></div>';
                    echo '<div class="rightContainer">'. htmlspecialchars($ingredient["name"]) . htmlspecialchars($ingredient["ingredientID"]) . '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            </div>
        </main>

    </div>

    <script src="../js/navBar.js"></script>
</body>

</html>