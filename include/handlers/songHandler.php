<?php

include_once ('../../Models/songs.model.php');
include_once ('../../Class/Musique.php');


$song = new songModel();

if(isset($_POST["DataTitle"]))
{
    $DataTitle = $_POST["DataTitle"];
    $nbr = (int) $_POST['nbr'];
    $Song = $_POST['Song'];
    $DataAdd_the = $_POST['DataAdd_the'];
    $DataArtistes = $_POST['DataArtistes'];
    $Datacategory = $_POST['Datacategory'];

    for ($i=0; $i < $nbr ; $i++) { 
        $song->addSong(new Musique($DataTitle[$i],$Song[$i],$DataAdd_the[$i],),$DataArtistes[$i],$Datacategory[$i]);

    }

}if(isset($_POST['getSongs'])){
    $res = $song->getSongs();
    echo json_encode($res);
}if(isset($_POST['deleteSong'])){
    $id = $_POST['deleteSong'];
    $song->deleteSong($id);
}
if(isset($_POST['editSong'])){
    $id = $_POST['editSong'];
    $title = $_POST['title'];
    $songs = $_POST['song'];
    $date = $_POST['date'];
    $artist = $_POST['artist'];
    $category = $_POST['category'];

    $song->editSong(new Musique($title,$songs,$date),$artist,$category,$id);
}


?>