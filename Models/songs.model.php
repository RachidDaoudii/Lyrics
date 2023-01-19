<?php
include_once ('../../DB/db.php');

class songModel {

    public function getSongs(){
        $sql="SELECT musique.id as id, musique.title as title ,musique.song as song ,musique.Add_the as date ,categories.name as category, categories.id as id_category,artists.name as artist,artists.id as id_artist FROM musique 
        INNER JOIN categories ON musique.cetegory = categories.id
        INNER JOIN artists ON musique.name_Artist = artists.id";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function addSong(Musique $song,$Artist,$Category){
        $sql="INSERT INTO `musique`(`title`, `song`, `Add_the`, `name_Artist`, `cetegory`) VALUES (?,?,?,?,?)";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($song->getTitle(),$song->getSong(),$song->getDate(),$Artist,$Category));
    }


    public function deleteSong($id){
        $sql="DELETE FROM `musique` WHERE id = ?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($id));
    }

    public function editSong(Musique $song,$artist,$category,$id){
        
        $sql="UPDATE `musique` SET `title`= ?,`song`= ?,`Add_the`= ?,`name_Artist`= ?,`cetegory`= ? WHERE `id`= ?";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($song->getTitle(),$song->getSong(),$song->getDate(),$artist,$category,$id));
    }

}