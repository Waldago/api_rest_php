<?php 
require("Controllers/get.controller.php");

$table= explode("?",$routesArray[1])[0];
$select= $_GET["select"]??"*";

//echo $select;
/*Respuesta del controlador, me fijo que variables vienen y que metodo va a usar */

$response=new GetController();

/*Peticion get con filtro*/
if(isset($_GET["LinkTo"]) && isset($_GET["equalTo"])){
    $response->getDataFilter($table,$select,$_GET["LinkTo"],$_GET["equalTo"]);
}else{

    /*Peticion get sin filtro*/
    $response->getData($table,$select);
}



/*
$json = array (
    'status'=>200,
    'result'=>'Solicitud GET'
);

echo json_encode($json, http_response_code($json["status"]));
*/
?>