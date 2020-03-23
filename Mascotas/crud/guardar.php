<?php
session_start();
    include("../Conexion/conexion.php");
    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "INSERT INTO mascota(nombre, descripcion) VALUES ('$nombre', '$descripcion')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("consulta fallida");
        }
        $_SESSION['mensaje'] = 'Mascota agregada';
        header("location: ../principal.php");
    }
?>