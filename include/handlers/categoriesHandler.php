<?php

include_once ('../../Models/categories.model.php');
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
}if(isset($_POST['editCategory'])){
    $name = $_POST['editCategory'];
}