<?php

    include_once '../Conecta/conexion.php';
    $conexion = Conexion::obtenerConexion();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["usuario"];
        $pwd = $_POST["pwd"];

        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute([$usuario]);
        //estas lineas serían igual que las anteriores
        //$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        //$sentencia = $conexion->prepare($sql);
        //$sentencia->execute([ "usuario"=>$usuario]);

        $usuarioBD = $sentencia->fetch(); //fila de la bbdd leida

        if($usuarioBD && password_verify($pwd,$usuarioBD['pwd'])){
            echo "Sesión iniciada correctamente";
        }else{
            echo "Fallo al iniciar sesión";
        }



    }

?>