<?php
    
$con = new mysqli("localhost", "root", "", "muestrastemperatura");
$con->set_charset("utf-8");

if ($con->connect_error){
    echo "No se ha podido conectar con la base de datos";
}

if (isset($_POST['insertar'])){

    if (!empty($_POST['fecha'] && !empty($_POST['hora']) && !empty($_POST['temp']))){

        $stmt = $con->prepare("INSERT INTO muestras(fecha, hora, temperatura) VALUE(?, ?, ?)");
        $stmt->bind_param("ssd", $fecha, $hora, $temp);

        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $temp = $_POST['temp'];
        
        if ($stmt==false){
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

$con->close();
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
        <input type="text" placeholder="yyyy/mm/dd" name="fecha"><br><br>
        <label for="">Hora: </label>
        <input type="text" placeholder="hh:mm" name="hora"><br><br>
        <label for="">Temperatura</label>
        <input type="text" placeholder="ºC" name="temp"><br><br>
        <input class="rojo" type="submit" name="insertar" value="Insertar Registro">
        <button class="verde"><a href="05.php">Ver Registros</a></button>
    </form>    
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
</body>
</html>
