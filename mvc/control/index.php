<?php 

    require_once("modelo/index.php");

    class ModeloController{
        private $model;
        public function __construct()
        {
            $this->model=new Modelo();
        }

        static function index(){
            $productos= new Modelo();
            $dato = $productos->view("productos",1);
            require_once("vista/index.php");
        }
    }
?>