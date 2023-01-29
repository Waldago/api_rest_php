<?php

    class UnaClase {

        //Creacion de metodo estatico
        public static function unMetodo(){

            echo "Hola soy un metodo estatico";

        }

    }

    $obj=new UnaClase();
    $obj->unMetodo();

    //Utilizacion de metodo estatico
    
    UnaClase::unMetodo();

?>