<?php

if (isset($_POST['nombre'])){

    $nombre = $_POST['nombre'];
    
    function reverse(String $nombre): String {
        return strrev($nombre);    
    }

    $mensaje = "El nombre al reves es <strong>" . reverse($nombre) . "</strong>";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 3</title>
    <style>
        h1 {
            text-align: center;
            margin: 25px 0;
        }
        form {
            text-align: center;
        }
        p {
            text-align: center;
            color: darkgreen;
            font-size: 20px;
            margin-top: 20px;
            padding: 15px;
            border-bottom: 1px solid #CCC;
        }

    </style>
</head>

<body>
    <h1>Ejercicio 3</h1>

    <form action="#" method="post">
        <label for="nombre">Introduce un nombre: </label>
        <input id="nombre" type="text" name="nombre" id=""><br><br>
        <input type="submit" name="submit">
    </form>
    
    <div>
        <p>
<?php 
    
    if (isset($_POST['submit'])){
        echo $mensaje;
    }
?>
        </p>
    </div>
</body>
</html>