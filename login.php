<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="./style/styleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <main class="main">
        <div class="login-box">
            <h2 class="login-tittle">Sign in</h2>

            <form class="Login-form" action="./includes/login.inc.php" method="post">
                <div class="user-box">
                    <?php

                    $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (isset($_GET['username'])) {
                        $username = $_GET['username'];
                        echo "<input type='text' id='user' name='username' required='' value=$username >";
                    } else {
                        echo "<input type='text' id='user' name='username' required=''>";
                    }

                    ?>
                    <label for="user">Username o email address</label>
                </div>
                <div class="user-box">
                    <input type="password" id="password" name="password" required="">
                    <label for="password">Password</label>
                </div>
                <div>
                    <span id="register" >
                        <input type="checkbox">
                        Remember user
                    </span>
                </div>
                <?php
                if (strpos($url, "login=incorrect_credentials")) {
                    echo "<p class='error'>¡username or password wrong!</p>";
                }
                ?>
                <div class="button-form">
                    <div class="submit-button">
                        <input name="login-btn" type="submit" id="submit" value="Login"></input>
                    </div>
                    <div id="register-content">
                        <span id="register">Don't have account</span>
                        <a href="join.php">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>