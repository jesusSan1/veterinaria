<?php
    include("../Conexion/conexion.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM mascota WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado)==1){
            $fila = mysqli_fetch_array($resultado);
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];
        }
    }
    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $query = "UPDATE mascota set nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
        mysqli_query($conexion, $query);
        $_SESSION['mensaje'] = 'Mascota agregada';
        header("Location: ../Principal.php");
    }
?>
<?php
include("../Librerias/librerias.php")
?>
<link rel="shortcut icon" type="image/png" href="../images/pet-care.png"/>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control" placeholder="Actualizar nombre">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualizar descripcion"><?php echo $descripcion;?></textarea>
                    </div>
                    <button class="btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>