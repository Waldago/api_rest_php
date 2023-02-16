<?php

require_once("layouts/header.php");

?>

<a href="index.php?m=nuevo" class="btn">NUEVO</a>
<br>
<br>
<table>
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>ACCION</td>
    </tr>

    <body>
        <?php if (!empty($dato)) {
            foreach ($dato as $key => $value)
                foreach ($value as $v) { ?>
                    <tr>
                        <td><?php echo $v['id'] ?></td>
                        <td><?php echo $v['nombre'] ?></td>
                        <td>
                            <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">editar</a>
                            <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
        <?php } else { ?> 
                    <tr>
                        <td>VACIO</td>
                        <td>VACIO</td>
                        <td>VACIO</td>
                    </tr>   
            <?php } ?>
    </body>
</table>
<?php

require_once("layouts/footer.php");

?>