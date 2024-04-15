<div class="sidebar">
    <a href="home.php" class="logo">
        <img src="../img/logo.png" alt="logo" class="responsive-logo">
        <div class="logo-name"><span>Menu</span>Match</div>
    </a>
    <ul class="side-menu">
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'home.php') !== false)
            echo 'class="active"'; ?>>
            <a href="home.php"><i class='bx bxs-dashboard'></i>Home</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'calendar.php') !== false)
            echo 'class="active"'; ?>>
            <a href="calendar.php"><i class='bx bx-calendar'></i>Calendar</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'popular.php') !== false)
            echo 'class="active"'; ?>>
            <a href="research.php"><i class='bx bx-search'></i>Research</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'shopping.php') !== false)
            echo 'class="active"'; ?>>
            <a href="shopping.php"><i class='bx bx-shopping-bag'></i>Shopping</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'profile.php') !== false)
            echo 'class="active"'; ?>>
            <a href="profile.php"><i class='bx bx-user'></i>Profile</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'settings.php') !== false)
            echo 'class="active"'; ?>>
            <a href="settings.php"><i class='bx bx-cog'></i>Settings</a>
        </li>
    </ul>

    <ul class="side-menu">
        <li>
            <a href="#" class="logout" id="logoutBtn">
                <i class="bx bx-log-out-circle"></i>
                Logout
            </a>

            <!-- Modal de confirmation de déconnexion -->
            <div class="modal" id="logoutModal">
                <div class="modal-content">
                    <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
                    <button class="btn confirm-btn" id="confirmLogout">Déconnexion</button>
                    <button class="btn cancel-btn" id="cancelLogout">Annuler</button>
                </div>
            </div>

        </li>
    </ul>
</div>