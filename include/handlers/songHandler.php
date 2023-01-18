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
    $DataDuration = $_POST['DataDuration'];

    for ($i=0; $i < $nbr ; $i++) { 
        $song->addSong(new Musique($DataTitle[$i],$Song[$i],$DataAdd_the[$i], (int) $DataDuration[$i]),1,1);

    }

}if(isset($_POST['getSongs'])){
    $res = $song->getSongs();
    echo json_encode($res);
}


?>