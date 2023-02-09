<?php 

    class Modelo{

        private $modelo;
        private $db;
        private $datos;

        public function __construct(){
            $this->modelo=array();
            $this->db=new PDO('mysql:host=localhost;dbname=curso',"root","");

        }
        
        public function insert($tabla,$data){
            $consulta="INSERT INTO $tabla VALUES (null,".$data.")";
            $resultado=$this->db->query($consulta);
            if($resultado){
                return true;

            }else return false;
        }

        public function view($tabla,$condicion){

            $consulta="SELECT * FROM ".$tabla." WHERE ".$condicion.";";
            $resultado=$this->db->query($consulta);
            while($filas = $resultado->fetchAll(PDO::FETCH_ASSOC)){
                $this->$datos[]=$filas;
            }
            return $this->$datos;
        }

        public function actualizar($tabla, $data, $condicion){
            $consulta="UPDATE ".$tabla." SET ".$data." WHERE ".$condicion.";";
            $resultado=$this->db->query($consulta);
            if($resultado){
                return true;

            }else return false;
        }

        public function eliminar($tabla, $condicion){
            $consulta="DELETE FROM ".$tabla." WHERE ".$condicion.";";
            $resultado=$this->db->query($consulta);
            if($resultado){
                return true;

            }else return false;
        }
    }
?>