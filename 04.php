<?php
    
$con = new mysqli("localhost", "root", "", "muestrastemperatura");
$con->set_charset("utf-8");

if ($con->connect_error){
    die("No se ha podido conectar con la base de datos");
}

if (isset($_POST['insertar'])){

    if (!empty($_POST['fecha'] && !empty($_POST['hora']) && !empty($_POST['temp']))){

        $stmt = $con->prepare("INSERT INTO muestras(fecha, hora, temperatura) VALUE(?, ?, ?)");
        $stmt->bind_param("ssd", $fecha, $hora, $temp);

        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $temp = $_POST['temp'];
        
        if ($stmt == false){
            $con->close();
            die("Error en la consulta");
        }        
        
        $stmt->execute();
        $mensaje = "<span style='color:green'>Actualizacion de la base de datos correcta!</span>";
        $stmt->close();
        
    } else {
        $mensaje = "Falta algun campo de rellenar";
    }    

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 4</title>
    <style>
        h1 {
            text-align: center;
        }
        form {
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        input {
            text-align: center;
            padding: 6px;
        }
        input::placeholder{
            text-align: center;
            font-size: 14px;
        }
        p {
            text-align: center;
            color: red;
        }
        a {
            text-decoration: none;
            color: black;
        }
        button, input[type='submit']{
            border: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            color: white;
        }
        .verde {
            background-color: greenyellow;
            
        }
        .rojo {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 4</h1>
    
    
    <form action="#" method="post">
        <label for="">Fecha: </label>
        <input type="date" name="fecha"><br><br>
        <label for="">Hora: </label>
        <input type="time" name="hora"><br><br>
        <label for="">Temperatura</label>
        <input type="text" placeholder="ºC" name="temp"><br><br>
        <input class="rojo" type="submit" name="insertar" value="Insertar Registro">
        <button class="verde"><a href="05.php">Ver Registros</a></button>
    </form>    
    <div>
        <p>
            <?php

             if (isset($mensaje)){
                 echo $mensaje;
             }
             ?>
        </p>
    </div>

    <hr>
    <form action="#" method="post">
        <legend>Filtrar por fechas</legend><br>
        Desde: <input type="date" name="fecha1"><br><br>
        Hasta: <input type="date" name="fecha2"><br><br>
        <button style='background:blue; color:white' type="submit" name="filtro">Filtrar</button>
    </form>
    <div>
        <?php
            if (isset($_POST['filtro'])){
                if (!empty($_POST['fecha1']) && !empty($_POST['fecha1'])){
                    

                    $consulta = "SELECT fecha, hora, temperatura FROM muestras WHERE fecha > ? AND fecha < ?";
                    $stmt = $con->prepare($consulta);
                    $stmt->bind_param('ss', $fecha1, $fecha2);

                    $fecha1 = $_POST['fecha1'];
                    $fecha2 = $_POST['fecha2'];

                    if ($stmt == false){
                        $con->close();
                        die("Error en la consulta");
                    }

                    $stmt->execute();
                    $stmt->bind_result($fecha, $hora, $temp);
                 
                    while($stmt->fetch()){
                        echo "<p style='color:green'><strong>$fecha</strong> - $hora - <strong>$temp ºC</strong></p>";
                    }
                    $stmt->close();

                } else {
                    echo "<p>Falta alguna fecha</p>";
                }    

            }
                       
            $con->close();

        ?>
    </div>
</body>
</html>
