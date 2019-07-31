<?php

$conexion = new mysqli("localhost", "root", "", "academia");
$conexion->set_charset("utf-8");

if ($conexion->connect_error){
    die("Error en la conexion");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 7</title>
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
            color: darkred;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 7. Registro de Usuarios</h1>    
    
    <form action="#" method="post">
        <label for="">Usuario: </label>
        <input type="text" name="usuario"><br><br>
        <label for="">Contraseña: </label>
        <input type="password" name="password"><br><br>
        <input type="hidden" name="fecha_alta" value="<?=date("Y-m-d");?>">
        <input type="hidden" name="activo" value=1>
        <button name="submit">Registrar</button>
    </form>

    <?php
        $mensaje = '';
        if (isset($_POST['usuario'])){
            if (!empty($_POST['usuario']) && !empty($_POST['password'])){

                $usuario = $_POST['usuario'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $fecha_alta =  $_POST['fecha_alta'];
                $activo = $_POST['activo'];

                $consultaUsuario = "SELECT usuario FROM usuarios WHERE usuario = ?";
                $stmtU = $conexion->prepare($consultaUsuario);
                $stmtU->bind_param('s', $usuario);

                if ($stmtU == false){
                    $conexion->close();
                    echo "error en la consulta";
                }

                $stmtU->bind_result($usuarioDB);
                $stmtU->execute();
                
                if ($stmtU->fetch() == null){

                    $stmtU->close();

                    $consulta = "INSERT INTO usuarios(usuario, password, fecha_alta, activo) VALUES(?,?,?,?) ";

                    $stmt = $conexion->prepare($consulta);
                    
                    if ($stmt == false){
                        $conexion->close();
                        echo "error en la consulta";
                    }

                    $stmt->bind_param("sssi", $usuario, $password, $fecha_alta, $activo);

                    $stmt->execute();
                    $mensaje = "Usuario registrado correctamente";

                    $stmt->close();
                
                } else {
                    $mensaje = "Usuario ya existe";
                }

            } else {
                $mensaje = "Falta algun campo de rellenar.";
            }


        }


    ?>
    
    <div>
        <p>
        <?php
            echo $mensaje;
            $conexion->close();

        ?>

        </p>       
    </div>
</body>
</html>
