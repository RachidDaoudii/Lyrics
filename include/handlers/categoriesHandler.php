<?php

include_once ('../../Models/categories.model.php');
$Categories = new categoriesModel();
if(isset($_POST['category'])){
    $name = $_POST['category'];
    $Categories->AddCategories($name);
}if(isset($_POST['getCategories'])){
    $res = $Categories->getCategories();
    echo json_encode($res);
}