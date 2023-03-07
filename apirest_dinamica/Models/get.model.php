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
        $sql="SELECT $select FROM $table WHERE $linkTo = :$linkTo";

        $stmt = Conection::connect()->prepare($sql);

        $stmt-> bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

?>