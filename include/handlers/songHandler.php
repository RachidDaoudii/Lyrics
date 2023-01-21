<?php

include_once ('../../Models/songs.model.php');
include_once ('../../Class/Musique.php');


$song = new songModel();

//function validation input 
function Validation($input){
    //Supprime les espaces debut et fin 
    $input = trim($input);
    //Supprimer quote string (\n \t \)
    $input = stripcslashes($input);
    //Convertit les balise html en string
    $input = htmlspecialchars($input);
    //Supprime les espaces center
    $input = preg_replace('/\s+/',' ', $input);
    return $input;
}

if(isset($_POST["DataTitle"]))
{
    $DataTitle = $_POST["DataTitle"];
    $nbr = (int) $_POST['nbr'];
    $Song = $_POST['Song'];
    $DataAdd_the = $_POST['DataAdd_the'];
    $DataArtistes = $_POST['DataArtistes'];
    $Datacategory = $_POST['Datacategory'];

    for ($i=0; $i < $nbr ; $i++) { 
        $song->addSong(new Musique(Validation($DataTitle[$i]),Validation($Song[$i]),Validation($DataAdd_the[$i])),Validation($DataArtistes[$i]),Validation($Datacategory[$i]));

    }

}if(isset($_POST['getSongs'])){
    $res = $song->getSongs();
    echo json_encode($res);
}if(isset($_POST['deleteSong'])){
    $id = $_POST['deleteSong'];
    $song->deleteSong($id);
}
if(isset($_POST['editSong'])){
    $id = Validation($_POST['editSong']);
    $title = Validation($_POST['title']);
    $songs = Validation($_POST['song']);
    $date = Validation($_POST['date']);
    $artist = Validation($_POST['artist']);
    $category = Validation($_POST['category']);

    $song->editSong(new Musique($title,$songs,$date),$artist,$category,$id);
}


?>