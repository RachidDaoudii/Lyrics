<?php
include_once ('../../Models/artistes.model.php');
include_once ('../../Class/Artists.php');
$artistes = new artistesModel();
if(isset($_POST['artistes'])){
    
    $name = $_POST['artistes'];

    for ($i=0; $i <count($name) ; $i++) { 
        $artistes->addArtistes(new Artistes($name[$i]));
    }
    
}if(isset($_POST['getArtistes'])){
    $res = $artistes->getArtistes();
    echo json_encode($res);
}