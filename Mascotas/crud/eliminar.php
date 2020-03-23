<?php
    include("../Conexion/conexion.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM mascota WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("Consulta fallida");
        }
        $_SESSION['mensaje'] = 'Mascota agregada';
        header("Location: ../principal.php");
    }
?>