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
    
}