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
        $sql="DELETE FROM `categories` WHERE id = ?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($id));
    }

    public function editCategories(Categories $category,$id){
        $sql="UPDATE `categories` SET `name`=? WHERE `id`=?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($category->getName(),$id));
    }

    public function countCategories(){
        $sql="SELECT COUNT(id) FROM `categories`";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchColumn();
        return $res;
    }


}