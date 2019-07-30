<?php

if (isset($_POST['num1'])){

    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);
    $num3 = intval($_POST['num3']);


    function maximo(int $num1 = 0, int $num2 = 0, int $num3 = 0): int {
        $mayor = max($num1, $num2, $num3);
        return $mayor;
        }

    $mensaje = "El número mayor es el <strong>" . maximo($num1, $num2, $num3) . "</strong>";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 1</title>
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
            font-size: 20px;
            margin-top: 20px;
            color: darkgreen;
            padding: 15px;
            border-bottom: 1px solid #CCC;
        }

    </style>
</head>

<body>
    <h1>Ejercicio 1</h1>

    <form action="#" method="post">
        <label for="num1">Numero 1: </label>
        <input id="num1" type="number" name="num1" id=""><br><br>
        <label for="num2">Numero 2: </label>
        <input id="num2" type="number" name="num2" id=""><br><br>
        <label for="num3">Numero 3: </label>
        <input id="num3" type="number" name="num3" id=""><br><br>
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