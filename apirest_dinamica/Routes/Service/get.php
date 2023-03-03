<?php 
require("Controllers/get.controller.php");

$table=$routesArray[1];

$response=new GetController();
$response->getData($table);
/*
$json = array (
    'status'=>200,
    'result'=>'Solicitud GET'
);

echo json_encode($json, http_response_code($json["status"]));
*/
?>