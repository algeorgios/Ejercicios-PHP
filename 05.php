<?php

$mensaje = ''; 

$con = new mysqli("localhost", "root", "", "muestrastemperatura");
$con->set_charset("utf-8");

if ($con->connect_error){
    echo "No se ha podido conectar con la base de datos";
} else {
    $mensaje = "Conexion OK";
}

$consulta = "SELECT * FROM muestras ORDER BY temperatura DESC";

$resultado = $con->query($consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 5</title>
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
        }
    </style>
</head>
<body>
    <h1>Ejercicio 5</h1>    
    
    
    <div>
        <?php

            if ($resultado->num_rows > 0){
                while ($row = $resultado->fetch_assoc()){
                    echo "<p><strong>${row['fecha']}</strong> - ${row['hora']} - <strong>${row['temperatura']}ºC</strong></p><hr>";
                };
            }
                
                $con->close();
             ?>
        </p>
    </div>
</body>
</html>
