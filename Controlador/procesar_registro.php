<?php

    include_once '../Conecta/conexion.php';
    $conexion = Conexion::obtenerConexion();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["usuario"];
        $pwd = $_POST["pwd"];

        $sql = "INSERT INTO usuarios(usuario,pwd) VALUES (:usuario, :pwd)";
        $sentencia = $conexion->prepare($sql);
        $result=$sentencia -> execute([
            "usuario"=>$usuario,
            "pwd"=> password_hash($pwd,PASSWORD_DEFAULT)
        ]);
        if($result){
            echo ("Registro realizado correctamente");
        }else{
            echo ("No se ha podido realizar el registro");
        }
    }

?>