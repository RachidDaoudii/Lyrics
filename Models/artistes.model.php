<?php
include_once ('../../DB/db.php');
class artistesModel{

    public function getArtistes(){
        $sql="SELECT * FROM artists";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function addArtistes(Artistes $artists){
        $sql="INSERT INTO artists (`name`) values (?)";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($artists->getName()));
    }

    public function deleteArtistes($id){
        $sql="DELETE FROM `artists` WHERE id = ?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($id));
    }

    public function editArtistes(Artistes $artists,$id){
        $sql="UPDATE `artists` SET `name`=? WHERE `id`=?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($artists->getName(),$id));
    }

    public function countArtistes(){
        $sql="SELECT COUNT(id) FROM `artists`";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchColumn();
        return $res;
    }
    
}