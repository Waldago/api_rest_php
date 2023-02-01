<?php include "cabecera.php"; ?>
<?php include "conexion.php"; ?>
<?php 
$sql="select * from `proyecto`";
$objConexion=new Conexion();
$resultado=$objConexion->consultar($sql);

    if($_POST){

        //print_r($_POST);    
        $nombre=$_POST['nombre'];
        //$imagen=$_POST['archivo'];
        $descripcion=$_POST['desc'];

        $objConexion=new Conexion();
        $sql="INSERT INTO `proyecto` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', 'imagen.jpg', '$descripcion');";
        $objConexion->ejecutar($sql);

    }

    if($_GET){
        $id=$_GET['borrar'];
        $objConexion=new Conexion();
        $sql="delete from `proyecto` where `proyecto`.`id`=".$id;
        $objConexion->ejecutar($sql);
    }

?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">

                        Nombre del proyecto:
                        <input class="form-control" type="text" name="nombre" id="">
                        <br>
                        Imagen del proyecto:
                        <input class="form-control" type="file" name="archivo" id="">
                        <br>
                        Descripcion del proyecto:
                        <input class="form-control" type="text" name="desc" id="">
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar">

                    </form>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultado as $proyecto){ ?>
                        <tr class="">
                            <td scope="row"><?php echo $proyecto["id"]; ?></td>
                            <td><?php echo $proyecto["nombre"]; ?></td>
                            <td><?php echo $proyecto["imagen"]; ?></td>
                            <td><?php echo $proyecto["descripcion"]; ?></td>
                            <td><a name="" id="" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" role="button">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>






<?php include "pie.php" ?>