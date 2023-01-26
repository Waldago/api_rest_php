<?php

    if($_POST){

        $valorA=$_POST['valorA'];

        $valorB=$_POST['valorB'];

        $suma=$valorA + $valorB;

        $resta=$valorA - $valorB;

        $multi=$valorA * $valorB;

        $div=$valorA / $valorB;

        echo "Suma: ".$suma."<br>"."Resta: ".$resta."<br>"."Multiplicacion: ".$multi."<br>"."Division: ".$div;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores aritmeticos</title>
</head>
<body>
    
    <form action="ejercicio8.php" method="post">

        valor A:
        <input type="text" name="valorA" id="">
        <br/>

        valor B:
        <input type="text" name="valorB" id="">
        <br/>
        <br>
        <input type="submit" value="Calcular">



    </form>

</body>
</html>