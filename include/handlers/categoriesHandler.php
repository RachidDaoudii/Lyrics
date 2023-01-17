<?php

include_once ('../../Models/categories.model.php');
// include_once ('../../Controller/Controller.Categories.php');
// $controller = new categoriesController();
include_once ('../../Class/Categories.php');




$Categories = new categoriesModel();
if(isset($_POST['category'])){
    $name = $_POST['category'];

    for ($i=0; $i <count($name) ; $i++) { 
        $Categories->AddCategories(new Categories($name[$i]));
    }
    
}if(isset($_POST['getCategories'])){

    $res = $Categories->getCategories();
    echo json_encode($res);

}if(isset($_POST['deleteCategory'])){

    $id = $_POST['deleteCategory'];
    $Categories->deleteCategories($id);

}if(isset($_POST['id_category'])){
    
    $name = $_POST['name'];
    $id = $_POST['id_category'];
    $Categories->editCategories(new Categories($name), $id);
}