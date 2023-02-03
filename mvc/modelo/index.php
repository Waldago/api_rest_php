<?php 

    class Modelo{

        private $modelo;
        private $db;

        public function __construct(){
            $this->modelo=array();
            $this->db=new PDO('mysql:host=localhost;dbname=curso',"root","");

        }
        
        public function insert($data){
            $consulta="INSERT INTO 'producto'() VALUES (null,".$data.")";
            $resultado=$this->db->query($consulta);
            if($resultado){
                return true;

            }else return false;
        }

        public function view(){

            $consulta="SELECT * FROM 'producto'";
            $resultado=$this->db->query($consulta);
            
        }
    }
?>