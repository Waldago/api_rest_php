<?php 
require_once ("connection.php");

class GetModel{

    static public function getData($table,$select){
        /*Peticion get sin filtro*/
        $sql="SELECT $select FROM $table";

        $stmt = Conection::connect()->prepare($sql);

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataFilter($table,$select,$linkTo,$equalTo){
        /*Peticion get con filtro*/
        $linkToArray = explode(",", $linkTo);
        $equalToArray = explode("_", $equalTo);
        $linkToTxt = "";

        if(count($linkToArray)>1){
            foreach($linkToArray as $key => $value){
                if($key>0){
                    $linkToTxt .= "AND ".$value." = :".$value." ";
                }
            }
        }

        $sql="SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt";
        
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