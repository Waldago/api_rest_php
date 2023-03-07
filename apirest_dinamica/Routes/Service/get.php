<?php 
require("Controllers/get.controller.php");
//La funcion explode(): Devuelve un array de string, siendo cada uno un substring del parámetro string 
//formado por la división realizada por los delimitadores indicados en el parámetro string separator.
$table= explode("?", $routesArray[1])[0];
//?? funciona como un "sino hace tal cosa". En este caso si el atributo del select esta vacio, va a poner un *
$select= $_GET["select"] ?? "*";

$orderBy = $_GET["orderBy"] ?? null;

$orderMode = $_GET["orderMode"] ?? null;

//echo $select;
/*Respuesta del controlador, me fijo que variables vienen y que metodo va a usar */

$response=new GetController();

/*Peticion get con filtro*/
if(isset($_GET["LinkTo"]) && isset($_GET["equalTo"])){
    $response->getDataFilter($table, $select, $_GET["LinkTo"], $_GET["equalTo"], $orderBy, $orderMode);
}else{

    /*Peticion get sin filtro*/
    $response->getData($table, $select, $orderBy, $orderMode);
}



/*
$json = array (
    'status'=>200,
    'result'=>'Solicitud GET'
);

echo json_encode($json, http_response_code($json["status"]));
*/
?>