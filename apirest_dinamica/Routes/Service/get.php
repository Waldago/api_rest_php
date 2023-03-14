<?php 
require("Controllers/get.controller.php");
//La funcion explode(): Devuelve un array de string, siendo cada uno un substring del parámetro string 
//formado por la división realizada por los delimitadores indicados en el parámetro string separator.
$table= explode("?", $routesArray[1])[0];
//?? funciona como un "sino hace tal cosa". En este caso si el atributo del select esta vacio, va a poner un *
$select= $_GET["select"] ?? "*";

$orderBy = $_GET["orderBy"] ?? null;

$orderMode = $_GET["orderMode"] ?? null;

$startAt = $_GET["startAt"] ?? null;

$endAt = $_GET["endAt"] ?? null;

$rel = $_GET["rel"] ?? null;

$type = $_GET["type"] ?? null;

//echo $select;
/*Respuesta del controlador, me fijo que variables vienen y que metodo va a usar */

$response=new GetController();


if($rel == null && $type == null && $table != "relations" &&isset($_GET["linkTo"]) && isset($_GET["equalTo"])){
    /*Peticion get con filtro*/
    $response->getDataFilter($table, $select, $_GET["linkTo"], $_GET["equalTo"], $orderBy, $orderMode, $startAt, $endAt);
}
else if($rel != null && $type != null && $table == "relations" && !isset($_GET["linkTo"]) && !isset($_GET["equalTo"])){
    /*Peticion get sin filtro con join*/
    $response-> getRelData($rel, $type, $select, $orderBy, $orderMode, $startAt, $endAt);
}
else if($rel != null && $type != null && $table == "relations" && isset($_GET["linkTo"]) && isset($_GET["equalTo"])){
    /*Peticion get con filtro con join*/
    $response-> getRelDataFilter($rel, $type, $select, $_GET["linkTo"], $_GET["equalTo"],$orderBy, $orderMode, $startAt, $endAt);
    
}
else{
    /*Peticion get sin filtro*/
    $response->getData($table, $select, $orderBy, $orderMode, $startAt, $endAt);
}



/*
$json = array (
    'status'=>200,
    'result'=>'Solicitud GET'
);

echo json_encode($json, http_response_code($json["status"]));
*/
?>