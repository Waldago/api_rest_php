<?php 

require("Models/get.model.php");

class GetController{

    static public function getData($table, $select, $orderBy, $orderMode){
        /*Peticion get sin filtro*/
        $response= GetModel::getData($table, $select, $orderBy, $orderMode);
        $return = new GetController();
        $return->fncResponse($response);
    }

    static public function getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode){
        /* linkTo es la columna y el equalTo es el contenido de esa columna*/
        $response= GetModel::getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode);
        $return = new GetController();
        $return->fncResponse($response);
    }

    public function fncResponse($response){
        if(!empty($response)){
            $json = array (
                'status'=>200,
                'Total'=>count($response),
                'result'=>$response
            );
            
            echo json_encode($json, http_response_code($json["status"]));
        } else {
            $json = array (
                'status'=>404,
                'result'=>'Not Found'
            );
            
            echo json_encode($json, http_response_code($json["status"]));
        }
    }
}
?>