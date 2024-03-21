<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Home</title>
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
            <div class="card"></div>
            <div class="button-swipe">
                <div class="button dislike"><i class='bx bx-x'></i></div>
                <div class="button favorite"><i class='bx bxs-star'></i></div>
                <div class="button like"><i class='bx bxs-heart'></i></div>
            </div>
        </main>

    </div>

    <script src="../js/navBar.js"></script>
</body>

</html>