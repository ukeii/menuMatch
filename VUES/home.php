<?php ob_start(); ?>
<?php $recipes = include ('../POST/getRecipes.php'); ?>
<?php ob_end_clean(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <title>Home</title>
</head>

<body>

    <?php include 'sidebar.php'; ?>
    <?php include 'sidebarMobile.php'; ?>

    <!-- Main Content -->
    <div class="content">
        <?php include 'navbar.php'; ?>

        <main>
            <?php foreach ($recipes as $index => $recipe): ?>
                <div class="card" id="card-<?php echo $recipe['recipeID']; ?>">
                    <div class="card-header" style="background-image: url('<?php echo $recipe['posterPath'] ?>')">
                        <div class="options"><i class='bx bx-dots-vertical-rounded' id="options"></i></div>
                        <div class="report" id="report"><i class='bx bx-error-alt'></i>Report</div>
                    </div>
                    <div class="card-body">
                        <h3><?php echo $recipe['name']; ?></h3>
                        <div class="rating"><i class='bx bx-heart'></i><?php echo $recipe['likes'] ?></div>
                        <span><?php echo $recipe['promotingDescription']; ?></span>
                    </div>
                    <div class="card-footer">
                        <button class="button-18" role="button">View More</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="button-swipe">
                <div class="button dislike"><i class='bx bx-x'></i></div>
                <div class="button favorite"><i class='bx bxs-star'></i></div>
                <div class="button like"><i class='bx bxs-heart'></i></div>
            </div>
        </main>

    </div>

    <script src="../js/navBar.js"></script>
    <script src="../js/home.js"></script>
</body>

</html>