<?php 
require("Controllers/get.controller.php");

$table= explode("?",$routesArray[1])[0];
$select= $_GET["select"]??"*";

echo $select;

$response=new GetController();
$response->getData($table,$select);
/*
$json = array (
    'status'=>200,
    'result'=>'Solicitud GET'
);

echo json_encode($json, http_response_code($json["status"]));
*/
?>