<?php
include_once ('../../DB/db.php');

class songModel {

    public function getSongs(){
        $sql="SELECT musique.title as title ,musique.song as song ,musique.Add_the as date , musique.duration as duration ,categories.name as category,artists.name as artist FROM musique 
        INNER JOIN categories ON musique.cetegory = categories.id
        INNER JOIN artists ON musique.name_Artist = artists.id";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function addSong(Musique $song,$Artist,$Category){
        // var_dump($song,$Artist,$Category);
        // die;
        $sql="INSERT INTO `musique`(`title`, `song`, `Add_the`, `duration`, `name_Artist`, `cetegory`) VALUES (?,?,?,?,?,?)";
        $statement = DB::Connect()->prepare($sql);
        $statement->execute(array($song->getTitle(),$song->getSong(),$song->getDate(),$song->getDuration(),$Artist,$Category));
    }

    


}