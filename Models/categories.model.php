<?php
include_once ('../../DB/db.php');

class categoriesModel {

    public function AddCategories($name){
        $sql="INSERT INTO categories (`name`) values (?)";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($name));
    }
    public function getCategories(){
        $sql = "SELECT * from Categories";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
        // echo json_encode($res);
    }
}