<?php

$txtNombre="";

$rdgLenguaje="";

    if($_POST){

        //isset es un if ternario
        //si hay algo se lo asigna a txtNombre sino lo deja vacio
        $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

        $rdgLenguaje=(isset($_POST['lenguaje']))?$_POST['lenguaje']:"";

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

    <!-- codigo embebido -->

    <?php if ($_POST){?>
        <strong>Hola </strong>: <?php echo $txtNombre;?>
        <strong></strong>: <?php echo $rdgLenguaje;?>
    <?php } ?>

    
    <form action="ejercicio31.php" method="post">

        Nombre: <br>
        <input value="<?php echo $txtNombre;?>" type="text" name="txtNombre" id="">

        <br>

        ¿Te gusta?: <br>

        <br> php: <input type="radio" <?php echo ($rdgLenguaje=="php")?"checked":""; ?> name="lenguaje" value="php" id=""> <br>

        <br> html: <input type="radio" <?php echo ($rdgLenguaje=="http")?"checked":""; ?> name="lenguaje" value="http" id=""> <br>

        <br> css: <input type="radio" <?php echo ($rdgLenguaje=="css")?"checked":""; ?> name="lenguaje" value="css" id=""> <br>

        <input type="submit" value="Enviar informacion">

    </form>

    
</body>
</html>