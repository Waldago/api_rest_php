<?php 

    // Array asociativo, cambio de indices

    $frutas=array("f"=>"fresa", "b"=>"banana", "k"=>"kiwi");

    print_r($frutas);

    echo $frutas["f"]."<br>";

    foreach($frutas as $indice=>&$valor){

        echo $valor." Tiene el indice ".$indice."<br>";
        
    }

?>