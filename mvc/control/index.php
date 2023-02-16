<?php 

    require_once("modelo/index.php");

    class ModeloController{
        private $model;
        public function __construct(){
            $this->model=new Modelo();
        }

        static function index(){
            $productos= new Modelo();
            $dato = $productos->view("producto",1);
            require_once("vista/index.php");
        }

        static function nuevo(){
            require_once("vista/nuevo.php");
        }

        static function guardar(){
            $nombre= $_REQUEST['nombre'];
            $precio= $_REQUEST['precio'];
            $data="'".$nombre."',".$precio;
            $producto = new Modelo();
            $dato = $producto->insert("producto",$data);
            header("location:".urlsite);
        }

        static function editar(){
            $id= $_REQUEST['id'];
            $producto= new Modelo();
            $dato= $producto->view("producto","id=".$id);
            require_once("vista/editar.php");
        }

        static function actualizar(){
            $nombre= $_REQUEST['nombre'];
            $precio= $_REQUEST['precio'];
            $data="'".$nombre."',".$precio;
            $producto = new Modelo();
            $dato = $producto->insert("producto",$data);
            header("location:".urlsite);
        }

    }
?>