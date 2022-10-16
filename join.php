<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="stylesheet" href="./style/join.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <main class="main">
        <div class="join-box">
            <h2 class="title-SignUp">Join</h2>
            <form class="join-form" action="php/j2oin.php" method="post">
                
                <div class="join-input">
                    <input type="number" id="IDP" name="" required="">
                    <label for="IDP">ID PowerCampus</label>
                </div>

                <div class="join-input">
                    <input type="text" id="nombre" name="" required="">
                    <label for="nombre">Name</label>
                </div>

                
                <div class="join-input">
                    <input type="number" id="DNI" name="" required="">
                    <label for="DNI">identification number</label>
                </div>

                <div class="join-input">
                    <input type="text" id="usuario" name="" required="">
                    <label for="usuario">Enter a username</label>
                </div>

                <div class="join-input">
                    <input type="password" id="password" name="" required="">
                    <label for="password">Create a password</label>
                </div>

                <div class="button-join">
                    <input id="join" href="#">
                </div>

                <div class="SignIn-content">
                    <span id="SignIn">do you already have an account?</span>
                    <a href="./login.php">Sing in</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>