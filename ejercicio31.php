<?php

$txtNombre="";

$rdgLenguaje="";

$chkPhp="";

$chkHtml="";

$chkCss="";

$lsAnime="";

$txtComentario="";


    if($_POST){

        //isset es un if ternario
        //si hay algo se lo asigna a txtNombre sino lo deja vacio
        $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

        $rdgLenguaje=(isset($_POST['lenguaje']))?$_POST['lenguaje']:"";


        $chkPhp=(isset($_POST['chkPhp'])=="si")?"checked":"";

        $chkHtml=(isset($_POST['chkHtml'])=="si")?"checked":"";

        $chkCss=(isset($_POST['chkCss'])=="si")?"checked":"";

        $lsAnime=(isset($_POST['lsAnime']))?$_POST['lsAnime']:"";

        $txtComentario=(isset($_POST['txtComentario']))?$_POST['txtComentario']:"";
        //print_r($_POST);




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

        <br><strong>Tu lenguaje favorito es </strong>: <?php echo $rdgLenguaje;?>

        <br><strong>Estas aprendiendo </strong>: 

        <?php echo ($chkPhp=="checked")?"PHP":""; ?>

        <?php echo ($chkHtml=="checked")?"HTML":""; ?>

        <?php echo ($chkCss=="checked")?"CSS":""; ?>

        <br><strong>Anime que te gusta </strong>: <?php echo $lsAnime ;?>

        <br><strong>Comentario</strong>: <?php echo $txtComentario ;?>
    <?php } ?>

    
    <form action="ejercicio31.php" method="post">

        <br>Nombre: <br>
        <input value="<?php echo $txtNombre;?>" type="text" name="txtNombre" id="">

        <br>

        <br>¿Te gusta?: <br>

        <br> php: <input type="radio" <?php echo ($rdgLenguaje=="php")?"checked":""; ?> name="lenguaje" value="php" id=""> <br>

        <br> html: <input type="radio" <?php echo ($rdgLenguaje=="http")?"checked":""; ?> name="lenguaje" value="http" id=""> <br>

        <br> css: <input type="radio" <?php echo ($rdgLenguaje=="css")?"checked":""; ?> name="lenguaje" value="css" id=""> <br>

        <br>Estas aprendiendo....<br>

        <br>php: <input type="checkbox" <?php echo $chkPhp; ?> value="si" name="chkPhp" id="">
        
        <br>html: <input type="checkbox" <?php echo $chkHtml; ?> value="si" name="chkHtml" id="">

        <br>css: <input type="checkbox" <?php echo $chkCss ?> value="si" name="chkCss" id="">

        <br>¿Que anime te gusta?...<br>

        <br><select name="lsAnime" id="">

            <option value="">[Ninguna]</option>
            
            <option value="poke" <?php echo ($lsAnime == "poke")?"selected":""; ?> >[Pokemon]</option>
            
            <option value="dragon" <?php echo ($lsAnime == "dragon")?"selected":""; ?> >[Dragon Ball]</option>
            
            <option value="digi" <?php echo ($lsAnime == "digi")?"selected":""; ?> >[Digimon]</option>

        </select>

        <br>¿Tienes alguna duda?...<br>

        <textarea name="txtComentario" id="" cols="30" rows="10"></textarea>

        <br><input type="submit" value="Enviar informacion">

    </form>

    
</body>
</html>