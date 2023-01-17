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
}if(isset($_POST['deleteArtistes'])){

    $id = $_POST['deleteArtistes'];
    $artistes->deleteArtistes($id);

}if(isset($_POST['id_Artist'])){
    
    $name = $_POST['name'];
    $id = $_POST['id_Artist'];
    $artistes->editArtistes(new Artistes($name), $id);
}