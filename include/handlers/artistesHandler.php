<?php
include_once ('../../Models/artistes.model.php');
include_once ('../../Class/Artists.php');



$artistes = new artistesModel();


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

if(isset($_POST['artistes'])){
    
    $name = $_POST['artistes'];

    for ($i=0; $i <count($name) ; $i++) { 
        if(empty($name[$i])){

        }else{
            $artistes->addArtistes(new Artistes(Validation($name[$i])));
        }
    }
    
}if(isset($_POST['getArtistes'])){

    $res = $artistes->getArtistes();
    echo json_encode($res);
}if(isset($_POST['deleteArtistes'])){

    $id = $_POST['deleteArtistes'];
    $artistes->deleteArtistes($id);

}if(isset($_POST['id_Artist'])){
    
    $id = $_POST['id_Artist'];
    $name = Validation($_POST['name']);

    if(empty($name)){

    }else{
        $artistes->editArtistes(new Artistes($name), $id);
    }
}