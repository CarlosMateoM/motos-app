<?php 


if(!isset($_SESSION['user'])){
    header('location: ./login.php');
}

?>


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
    <header class='header'>
        <nav class='nav'>
            <h1 class='title'>Compañero de Ruta</h1>
        </nav>
    </header>
    <main class='main'>
        <div class='welcome_message'>
            <?php 
            
            echo '<span>Bienvenido, Carlos Mateo,'.$_SESSION['idEstudiante'].'</span>'
            
            ?>
            
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

                

                foreach($result as $row){

                    echo " <div class='card'>
                    <div class='card_info'>
                        <div style='width: 60%' class='name_student'>
                            <strong>".$row[1]."</strong>
                            <br><br>
    
                            <img width='50px' src='img/motorbike.png' alt=''>
    
                        </div>
                        <div>
                            <button>Contactar</button>
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
    <footer></footer>
</body>

</html>