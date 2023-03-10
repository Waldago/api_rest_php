<?php 
require_once ("connection.php");

class GetModel{
    /*Peticion get sin filtro*/
    static public function getData($table, $select, $orderBy, $orderMode, $startAt, $endAt){
        /*Peticion get sin filtro pero ordenada*/
        if($orderBy != null and $orderMode != null){
            if($startAt == null and $endAt == null){
                /*Peticion get sin filtro ordenada pero sin limite*/
                $sql="SELECT $select FROM $table ORDER BY $orderBy $orderMode";
            }else{
                /*Peticion get sin filtro ordenada con limite*/
                $sql="SELECT $select FROM $table ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
            }
            
        } else{
            if($startAt == null and $endAt == null){
                /*Peticion get sin filtro, sin orden y sin limite*/
                $sql="SELECT $select FROM $table";
            }else{
                /*Peticion get sin filtro con limite*/
                $sql="SELECT $select FROM $table LIMIT $startAt, $endAt";
            }
            
        }
        $stmt = Conection::connect()->prepare($sql);

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    static public function getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt){
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
        /*Peticion get con filtro y ordenada*/
        if($orderBy != null and $orderMode != null){
            /*Peticion get con filtro y ordenada pero sin limite*/
            if($startAt == null and $endAt == null){
                $sql= "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt ORDER BY $orderBy $orderMode";
            }else {
                /*Peticion get con filtro y ordenada con limite*/
                $sql= "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
            }   
        }else{
            /*Peticion get con filtro sin orden*/
            if($startAt == null and $endAt == null){
                /*Peticion get con filtro sin orden y sin limite*/
                $sql="SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt";
            }else{
                /*Peticion get con filtro sin orden pero con limite*/
                $sql="SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToTxt LIMIT $startAt, $endAt";
            }
            
        }
        
        $stmt = Conection::connect()->prepare($sql);
        //Aca enlazo el nombre de la columna con lo que quiero que contenga
        foreach($linkToArray as $key => $value){
            $stmt-> bindParam(":".$linkTo, $equalToArray[$key], PDO::PARAM_STR);
        }

        $stmt-> execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    /*Peticion get con join sin filtro*/
    static public function getRelData($rel, $type, $select, $orderBy, $orderMode, $startAt, $endAt){
        $relArray = explode(",", $rel);
        $typeArray = explode(",", $type);
        $innerJoinTxt= "";
       
        if(count($relArray)>1){
            foreach($relArray as $key => $value){
                if($key>0){
                    $innerJoinTxt .= "INNER JOIN ".$value." ON ".$relArray[$key-1].".".$typeArray[$key-1]." = ".$relArray[$key].".".$typeArray[$key];
                }
            }
        
        /*Peticion get sin filtro pero ordenada*/
        if($orderBy != null and $orderMode != null){
            if($startAt == null and $endAt == null){
                /*Peticion get sin filtro ordenada pero sin limite*/
                $sql="SELECT $select FROM $relArray[0] $innerJoinTxt ORDER BY $orderBy $orderMode";
            }else{
                /*Peticion get sin filtro ordenada con limite*/
                $sql="SELECT $select FROM $relArray[0] $innerJoinTxt ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
            }
            
        } else{
            if($startAt == null and $endAt == null){
                /*Peticion get sin filtro, sin orden y sin limite*/
                $sql="SELECT $select FROM $relArray[0] $innerJoinTxt";
            }else{
                /*Peticion get sin filtro con limite*/
                $sql="SELECT $select FROM $relArray[0] $innerJoinTxt LIMIT $startAt, $endAt";
            }
            
        }
        $stmt = Conection::connect()->prepare($sql);
        
        $stmt-> execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
        else return null;
    }
}

?>