<?php
  session_start();
  $usuario = $_SESSION['username'];
  if(!isset($usuario)){
    header("location: login.php");
  }
  include("Conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include("./Librerias/librerias.php");
    ?>
    <title>Principal</title>
    <link rel="shortcut icon" type="image/png" href="./images/pet-care.png"/>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1"> Bienvenido <?php echo $usuario?></span>
  <a href="Conexion/salir.php"><input type="submit" value="Cerrar sesion" class="btn btn-danger"> </a>
</nav>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
    <?php 
      if(isset($_SESSION['mensaje'])) {?>
      <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        })
        Toast.fire({
          type: 'success',
          title: 'Guardado'
        })
      </script>
      <?php session_unset();} ?>
      <div class="card card-body">
        <form action="./crud/guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre de la mascota" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion"></textarea>
          </div>
          <input type="submit" value="Guardar" class="btn btn-success btn-block" name="enviar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = "SELECT * FROM mascota";
              $resul = mysqli_query($conexion,$query);
              while($row = mysqli_fetch_array($resul)){ ?>
                <tr>
                  <td><?php echo $row['nombre']?></td>
                  <td><?php echo $row['descripcion']?></td>
                  <td><?php echo $row['fecha']?></td>
                  <td>
                    <a href="./crud/editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                    <a href="./crud/eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class=" far fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
    </col-md-8>
  </div>
</div>
</body>
</html>