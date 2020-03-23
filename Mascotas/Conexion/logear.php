<?php
    require 'conexion.php';
    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $query = "SELECT COUNT(*) as contar from usuario where usuario = '$usuario' and clave = '$clave'";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        $_SESSION['username'] = $usuario; 
        header("location: ../principal.php");
    }
    else{
        header("location: ../login.php");
    }
   //$_SESSION('<script> alert("Error, datos erroneos");</script>');
?>