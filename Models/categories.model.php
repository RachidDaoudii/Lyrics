<?php
include_once ('../../DB/db.php');

class categoriesModel {

    public function AddCategories(Categories $category){
        $sql="INSERT INTO categories (`name`) values (?)";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($category->getName()));
    }

    public function getCategories(){
        $sql = "SELECT * from Categories";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function deleteCategories($id){
        $sql="DELETE FROM categoeirs where id = ?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($id));
    }
}