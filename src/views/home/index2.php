<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style/style.css'>
    <title>Home</title>
    <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">
</head>

<body>
    <header id='header'>

        <h1 class='title'>Compañero de Ruta</h1>
        <form action="/motos-app/logout" method="POST">
            <input type="submit" value="salir">
        </form>
        <button id="btn" class="btn">
            menu
        </button>

    </header>

    <nav id="nav" class="nav">
        <div class="img_container">
            <img src="public/img/avatar.png" alt="avatar">
        </div>
        <div class="info_container">
            <p>Carlos Mateo Martinez Guerra</p>
            <p>carlosmateo484@gmail.com</p>
            <p>(301) 248 - 8842</p>
            <button>Vehiculo</button>
            <p>12/10/2022</p>
        </div>
    </nav>

    <main class='main'>
        <div class='welcome_message'>
            <?php

            echo '<span>Bienvenido, Carlos Mateo</span>'

            ?>

        </div>

        <div class="vehiculo_container">
            <form action="saveVehicle" method="post">
                <h2>ingrese la info de su vehiculo</h2>
                <label for="placa">placa</label>
                <input type="text" name="placa" id="placa">
                <label for="marca">marca</label>
                <input type="text" name="marca" id="marca">
                <label for="color">color</label>
                <input type="text" name="color" id="color">
                <label for="tipo">tipo</label>
                <select name="tipo" id="tipo">
                    <option value="moto">moto</option>
                    <option value="carro">carro</option>
                </select>
                <label><input type="checkbox" name="servicio" id="">servicio</label>
                <input type="submit" value="enviar">
            </form>
        </div>

        <div id="main-container" class='main_container'>

        </div>

        <div class="request-service">
            <h2>solicitud de servicio</h2>
            <div class="request-service_options">
                <button id="accept-service-request-btn">
                    aceptar
                </button>
                <button id="declien-service-request-btn" style="background-color: red ;">
                    rechazar
                </button>
            </div>
        </div>




    </main>
    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="javascript/home/script.js"></script>
</body>

</html>