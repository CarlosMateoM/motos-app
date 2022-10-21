<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="./style/join.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main">
        <div class="join-box">
            <h2 class="title-SignUp">Register</h2>
            <form class="join-form" action="createaccount" method="post">

                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error == "emptyfields") {
                        echo "<p style='color: red'> llene todos los campos </p>";
                    }
                    else if($error == "id_power_wrong"){
                        echo "<p style='color: red'> ¡ID Power Campus no valido! </p>";
                    }
                    else if($error == "id_wrong"){
                        echo "<p style='color: red'> ¡Número de identificacion no valido! </p>";
                    }
                    else if($error == "username_wrong"){
                        echo "<p style='color: red'> ¡Username no valido! </p>";
                    }
                    else if($error == "name_wrong"){
                        echo "<p style='color: red'> ¡Nombre no valido! </p>";
                    }
                    else if($error == "email_wrong"){
                        echo "<p style='color: red'> ¡Email no valido! </p>";
                    }
                    else if ($error == "password_wrong"){
                        echo "<p style='color: red'> ¡Password no coincide! </p>";
                    }
                    else if($error == "phone_wrong"){
                        echo "<p style='color: red'> ¡Telefono no valido! </p>";
                    }
                    else if($error == "username_unavailable"){
                        echo "<p style='color: red'> ¡Username no disponible! </p>";
                    }
                }

                ?>

                <div class="join-input">
                    <?php 
                    
                    if(isset($_GET['idpower'])){
                        echo "<input type='number' id='IDP' name='id_power' required='' value=".$_GET['idpower'].">";
                    }else {
                        echo "<input type='number' id='IDP' name='id_power' required=''>";
                    }
                    
                    ?>
                    
                    <label for="IDP">ID PowerCampus</label>
                </div>

                <div class="join-input">
                <?php 
                    
                    if(isset($_GET['id'])){
                        echo "<input type='number' id='DNI' name='id_identificacion' required='' value=".$_GET['id'].">";
                    }else {
                        echo "<input type='number' id='DNI' name='id_identificacion' required='' >";
                    }
                    
                    ?>

                    
                    <label for="DNI">Identification number</label>
                </div>

                <div class="join-input">
                    <?php 
                    
                    if(isset($_GET['username'])){
                        echo "<input type='text' id='usuario' name='username' required='' value=".$_GET['username'].">";
                    }else {
                        echo "<input type='text' id='usuario' name='username' required=''>";
                    }
                    
                    ?>
                    <label for="usuario">Enter a username</label>
                </div>

                <div class="join-input">
                <?php 
                    
                    if(isset($_GET['name'])){
                        echo "<input type='text' id='nombre' name='name' required='' value=".$_GET['name'].">";
                    }else {
                        echo "<input type='text' id='nombre' name='name' required='' >";
                    }
                    
                    ?>
                    <label for="nombre">Name</label>
                </div>

                <div class="join-input">
                    <?php 
                    
                        if(isset($_GET['telefono'])){
                            echo "<input type='tel' id='usuario' name='telefono' required=''value=".$_GET['telefono'].">";
                        }else {
                            echo "<input type='tel' id='usuario' name='telefono' required=''>";
                        }
                    
                    ?>

                    <label for="usuario">Enter a phone</label>
                </div>

                <div class="join-input">
                    <?php 
                    
                        if(isset($_GET['email'])){
                            echo "<input type='email' id='usuario' name='email' required=''value=".$_GET['email'].">";
                        }else {
                            echo "<input type='email' id='usuario' name='email' required=''>";
                        }
                    
                    ?>

                    <label for="usuario">Enter a email</label>
                </div>

                <div class="join-input">
                    <input type="password" id="password" name="password" required="" value="123456">
                    <label for="password">Create a password</label>
                </div>

                <div class="join-input">
                    <input type="password" id="password" name="re-password" required="" value="123456">
                    <label for="password">Repeat password</label>
                </div>

                <div class="button-join">
                    <input type="submit" id="join" name="register-btn" value="Register">
                </div>

                <div class="SignIn-content">
                    <span id="SignIn">do you already have an account?</span>
                    <a href="login">Sing in</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>