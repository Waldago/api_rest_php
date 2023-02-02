<?php include "cabecera.php"; ?>
<?php include "conexion.php"; ?>
<?php 
$sql="select * from `proyecto`";
$objConexion=new Conexion();
$resultado=$objConexion->consultar($sql);

    if($_POST){

        //print_r($_POST);    
        $fecha=new DateTime();
        $nombre=$_POST['nombre'];
        $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
        $descripcion=$_POST['desc'];
        

        $imagenTemp=$_FILES['archivo']['tmp_name'];
        move_uploaded_file($imagenTemp,"imagenes/".$imagen);

        $objConexion=new Conexion();
        $sql="INSERT INTO `proyecto` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
        $objConexion->ejecutar($sql);
        header("location: portafolio.php");

    }

    if($_GET){
        $id=$_GET['borrar'];
        $objConexion=new Conexion();

        $imagen=$objConexion->consultar("SELECT imagen FROM `proyecto` WHERE id=".$id);
        unlink("imagenes/".$imagen[0]['imagen']);

        $sql="delete from `proyecto` where `proyecto`.`id`=".$id;
        $objConexion->ejecutar($sql);
        header("location: portafolio.php");      
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
                        <input required class="form-control" type="text" name="nombre" id="">
                        <br>
                        Imagen del proyecto:
                        <input required class="form-control" type="file" name="archivo" id="">
                        <br>
                        Descripcion del proyecto:
                        <textarea class="form-control" name="desc" id="" rows="3"></textarea>                        
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
                            <td><img width="100" height="100" src="imagenes/<?php echo $proyecto["imagen"]; ?>" alt=""></td>
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