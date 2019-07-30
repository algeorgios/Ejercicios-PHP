<?php
header('Content-Type: text/html; charset=utf-8');

function letrasComunes($string1, $string2){

        $string1 = array_values(array_unique(str_split($string1)));
        $string2 = array_values(array_unique(str_split($string2)));
        
        $caracteres = '';
        $mensaje = '';
        
        for ($i = 0; $i < count($string1) ; $i++) { 
            
            for ($j = 0; $j < count($string2); $j++) {            
                if ($string1[$i] == $string2[$j]){
                    $caracteres .= $string2[$j] . ', ';
                }
            }            
        }

        if (!empty($caracteres)){
            $cadena1 = substr($caracteres, 0, strlen($caracteres) - 3);
            $cadena2 = substr($caracteres, -3, -2);
            $caracteres = $cadena1 . $cadena2 . '.';
            $mensaje = "Los carácteres que coinciden son <strong>$caracteres</strong>";
            return $mensaje;
        } else {
            $mensaje = "No se repite ningún carácter";
            return $mensaje;
        }

 
}      

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 2</title>
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
    <h1>Ejercicio 2</h1>

    <form action="#" method="post">
        <label for="palabra1">Palabra 1: </label>
        <input id="palabra1" type="text" name="palabra1"><br><br>
        <label for="palabra2">Palabra 2: </label>
        <input id="palabra2" type="text" name="palabra2"><br><br>
        <input type="submit" name="submit">
    </form>
    
    <div>
        <p>
            <?php
            if (isset($_POST['submit'])){
                if (!empty($_POST['palabra1'] && !empty($_POST['palabra2']))){
                echo letrasComunes($_POST['palabra1'], $_POST['palabra2']);
                } else {
                    echo "Falta alguna palabra";
                }
            }
            ?>
        </p>
    </div>
</body>
</html>