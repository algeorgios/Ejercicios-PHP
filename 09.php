<?php

session_start();

if (isset($_POST['borrar'])){
    $valor = $_POST['borrar'];
    unset($_SESSION['lista'][$valor]);
    $_SESSION['lista'] = array_values($_SESSION['lista']);   
}

if (!isset($_SESSION['lista'])){
    $_SESSION['lista']=array();
}

if (isset($_POST['nombre']) && !empty($_POST['nombre'])){
    $nombre = $_POST['nombre'];    
    array_push($_SESSION['lista'], $nombre);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 9</title>
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
    <h1>Ejercicio 9</h1>

    <form action="#" method="post">
        <label for="nombre">Introduce un nombre: </label>
        <input id="nombre" type="text" name="nombre" id=""><br><br>
        <input type="submit" name="submit">
    </form>

    <div>
        <p>
            <form action="#" method="post">
            <?php
            foreach ($_SESSION['lista'] as $key => $nombre) {
                array_values($_SESSION['lista']);

                echo $nombre . "<button type='submit' style='margin-left:6px; margin-top:6px' name='borrar' value='$key'>Eliminar</button><br>";
            }
            ?>
            </form>
        </p>
    </div>
    
    <form action="#" method="post">
        <button name="azar">Mostrar Al Azar</button>
    </form>
    <div><p>
        <?php
        
        if (isset($_POST['azar'])){
            $lista = $_SESSION['lista'];
            
            if (!empty($lista)){
                $i = array_rand($lista);
            } else {
                echo "La lista está vacía.";
            }
        }
        ?>
        </p>
    </div>

    
    

</body>
</html>

<?php
print_r($_SESSION['lista']);