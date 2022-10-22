<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='style/style.css'>
    <title>Document</title>
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

        <div class='main_container'>
            <div>
                <h2 class='title' style='font-size:14px; background-color: #000035;'>compañeros disponibles</h2>
            </div>

            <?php

            use  \Mateo\MotosApp\lib\Database;

            $db = new Database();

            $con = $db->connect();

            $sql = "SELECT idESTUDIANTE, NOMBRE FROM `ESTUDIANTE` WHERE `ESTADO` LIKE FALSE";

            $query = $con->prepare($sql);
            $query->execute();



            $result = $query->fetchAll(PDO::FETCH_NUM);



            foreach ($result as $row) {

                echo " <div class='card'>
                    <div class='card_info'>
                        <div style='width: 60%' class='name_student'>
                            <strong>" . $row[1] . "</strong>
                            <br><br>
    
                            <img width='50px' src='img/motorbike.png' alt=''>
    
                        </div>
                        <div>
                            <form action='home/contact' method='post'>
                                <input type='submit' value='enviar'> 
                            </form>
                            <br><br>
                            <span>$ 8.0000</span>
                            <br><br>
                            <strong>3.1 </strong><span style='font-size:10px ;'>Puntuación</span>
                        </div>
                    </div>
                    
                    <div class='card_roads' >
                        <div class='road_title' >
                            <strong class='road_title'>rutas</strong>
                        </div>
                        <span class='rutas' >cerete</span>
                        <span class='rutas' >cerete</span>
                        <span class='rutas' >cerete</span>
    
                    </div>
                </div>";
            }





            ?>

        </div>
    </main>
    <footer>

    </footer>
    <script src="javascript/home/script.js"></script>
</body>

</html>