<?php 

    class Persona{

        public $nombre; //propiedades o atributos

        private $edad;

        public function asignarNombre($nuevoNombre){ //acciones o meteodos

            $this->nombre=$nuevoNombre;

        }

        public function imprimirNombre(){

            echo "Alumno ".$this->nombre;

        }

        public function getEdad(){

            $this->edad=20;

            return $this->edad;

        }

    }

    $objAlumno = new Persona(); //instancia o creacion de obj

    $objAlumno->asignarNombre("Walter Gomez"); //llamado del metodo

    echo "Alumno ".$objAlumno->nombre."<br>";

    $objAlumno->imprimirNombre();

    echo $objAlumno->getEdad();




?>