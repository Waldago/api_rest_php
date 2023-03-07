<?php 
require_once ("connection.php");

class GetModel{

    static public function getData($table, $select, $orderBy, $orderMode){
        /*Peticion get sin filtro*/
        if($orderBy != null and $orderMode != null){
            $sql="SELECT $select FROM $table ORDER BY $orderBy $orderMode";
        } else{
            $sql="SELECT $select FROM $table";
        }
        $stmt = Conection::connect()->prepare($sql);

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode){
        /*Peticion get con filtro*/
        $linkToArray = explode(",", $linkTo);
        $equalToArray = explode("_", $equalTo);
        $linkToTxt = "";
        //Esto va a concatenar con un and los filtros que recibamos a partir de tener mas de 1
        if(count($linkToArray)>1){
            foreach($linkToArray as $key => $value){
                if($key>0){
                    $linkToTxt .= "AND ".$value." = :".$value." ";
                }
            }
        }

        $sql="SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt";
        
        if($orderBy != null and $orderMode != null){
            $sql= "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt ORDER BY $orderBy $orderMode"; 
        }

        $stmt = Conection::connect()->prepare($sql);
        //Aca enlazo el nombre de la columna con lo que quiero que contenga
        foreach($linkToArray as $key => $value){
            $stmt-> bindParam(":".$linkTo, $equalToArray[$key], PDO::PARAM_STR);
        }

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

?>