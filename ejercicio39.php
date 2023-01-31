<?php 

    $nombreArchivo="archivo.txt";

    $contenidoArchivo="Hola manola";

    $archivoCrear=fopen($nombreArchivo,"w");

    fwrite($archivoCrear,$contenidoArchivo);

    fclose($archivoCrear);
    
?>