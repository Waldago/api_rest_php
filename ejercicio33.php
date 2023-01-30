<?php 

    $json='[
        {"Nombre":"Walter", "Apellido":"Gomez"},
        {"Nombre":"Martin", "Apellido":"Flores"}
    ]';

    $resultado=json_decode($json);

    //print_r($resultado);

    foreach($resultado as $persona){
        //print_r($persona->Nombre);
        echo ($persona->Nombre)." ".($persona->Apellido)."<br>";
    }
?>