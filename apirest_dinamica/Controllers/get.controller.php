<?php 

require("Models/get.model.php");

class GetController{

    static public function getData($table,$select){
        $response= GetModel::getData($table,$select);
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