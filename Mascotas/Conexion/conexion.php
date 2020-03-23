<?php
/*     $host = "localhost";
    $usuario = "root";
    $contraseña = "";
    $baseDeDatos = "mascotas";

    $conexion  = mysqli_connect($host, $usuario, $contraseña, $baseDeDatos);

     if($conexion){
        echo "La conexion se realizo correctamente";
    }
    else{
        echo "nel carnal, no funciono la conexion a la base de datos";
    }  */
//session_start();
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="mascota";

$conexion = new mysqli($host, $user, $password, $dbname, $port, $socket);
/* if($conexion){
    echo "La conexion se realizo correctamente";
}
else{
    echo "nel carnal, no funciono la conexion a la base de datos";
}  */

//$con->close();

?>