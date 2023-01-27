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

    class Trabajador extends Persona{

        public $puesto;

        public function presentarse(){

            echo "Hola soy ".$this->nombre." y soy un ".$this->puesto;
        }

    }

    $objTrabajador= new Trabajador();

    $objTrabajador->asignarNombre("tito");

    $objTrabajador->puesto="Profesor";

    $objTrabajador->presentarse();


?>