<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="header">
        <img src="../img/logo.png" alt="logo" class="logo">
        <div class="slogan">
            <span>Menu Match</span>
        </div>
    </div>

    <div class="container">
        <div class="login-card" id="signInCard">
            <div class="login-card-header">
                <h1>Sign In</h1>
                <div>Sign In to access to Menu Match</div>
            </div>
            <form class="login-card-form" action="login_post.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Person</span>
                    <input type="text" placeholder="Username" id="username" name="username" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheckbox" checked>
                        <label for="rememberMeCheckbox">Remember me</label>
                    </div>
                    <a href="#">forgot password ?</a>
                </div>
                <button type="submit">Sign In</button>

                <?php
                if (isset ($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

            </form>
            <div class="login-card-footer">
                No account yet? <a onclick="gotoSignUp()">Create one here.</a>
            </div>
        </div>
        <div class="login-card" id="signUpCard" style="display:none;">
            <div class="login-card-header">
                <h1>Sign Up</h1>
                <div>Sign In to access to Menu Match</div>
            </div>
            <form class="login-card-form" action="login_post.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">Person</span>
                    <input type="text" placeholder="Username" name="username" autofocus required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="form-item-other">
                    <div class="checkbox">
                        <input type="checkbox" checked>
                        <label for="rememberMeCheckbox">Remember me</label>
                    </div>
                    <a href="#">forgot password ?</a>
                </div>
                <button type="submit">Sign In</button>

                <?php
                if (isset ($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

            </form>
            <div class="login-card-footer">
                Already have an account? <a onclick="gotoSignIn()">Sign in here.</a>
            </div>
        </div>
    </div>

    <script src="../js/login.js"></script>

</body>

</html>