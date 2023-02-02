<?php include "cabecera.php"; ?>
<?php include "conexion.php"; ?>
<?php

$sql = "select * from `proyecto`";
$objConexion = new Conexion();
$resultado = $objConexion->consultar($sql);

?>
<br> Hola waldagorn soy tu portafolio
<div class="p-5 mb-4 bg-light rounded-3">
  <div class="container-fluid py-5">
    <h1 class="display-5 fw-bold">Bienvenid@s</h1>
    <p class="col-md-8 fs-4">Este es mi portafolio privado</p>
    <hr class="my-2">
    <p>Mas informacion</p>
  </div>
</div>


<div class="row row-cols-1 row-cols-md-2 g-4">
  <?php foreach ($resultado as $proyecto) { ?>
    <div class="col">
      <div class="card">
        <img src="imagenes/<?php echo $proyecto["imagen"]; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $proyecto["nombre"]; ?></h5>
          <p class="card-text"><?php echo $proyecto["descripcion"] ?></p>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php include "pie.php" ?>