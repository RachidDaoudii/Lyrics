<?php

include_once ('../../Models/categories.model.php');
include_once ('../../Class/Categories.php');

$Categories = new categoriesModel();


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

if(isset($_POST['category'])){
    $name = $_POST['category'];

    for ($i=0; $i <count($name) ; $i++) { 
        $Categories->AddCategories(new Categories(Validation($name[$i])));
    }
    
}if(isset($_POST['getCategories'])){

    $res = $Categories->getCategories();
    echo json_encode($res);

}if(isset($_POST['deleteCategory'])){

    $id = $_POST['deleteCategory'];
    $Categories->deleteCategories($id);

}if(isset($_POST['id_category'])){
    
    $name = Validation($_POST['name']);
    $id = $_POST['id_category'];
    $Categories->editCategories(new Categories($name), $id);
}