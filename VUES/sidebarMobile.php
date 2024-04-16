<div class="sidebarMobile">
    <ul class="side-menu-mobile">
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'home.php') !== false) echo 'class="active"'; ?>>
            <a href="home.php"><i class='bx bxs-dashboard'></i>Home</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'calendar.php') !== false) echo 'class="active"'; ?>>
            <a href="calendar.php"><i class='bx bx-calendar'></i>Calendar</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'shopping.php') !== false) echo 'class="active"'; ?>>
            <a href="shopping.php"><i class='bx bx-shopping-bag'></i>Shopping</a>
        </li>
        <li <?php if (strpos($_SERVER['PHP_SELF'], 'profile.php') !== false) echo 'class="active"'; ?>>
            <a href="profile.php"><i class='bx bx-user'></i>Profile</a>
        </li>
        
        </li>
    </ul>
</div>
