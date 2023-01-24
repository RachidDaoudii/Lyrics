<?php

// require_once ('../Models/categories.model.php');
// require_once ('../Class/Categories.php');

class categoriesController extends categoriesModel{

    public function Categories(){
        return $this->getCategories();
    }

    public function Add(Categories $category){
        return $this->AddCategories($category);
    }

    public function Edit(Categories $category,$id){
        return $this->editCategories($category,$id);
    }

    public function Delete($id){
        return $this->deleteCategories($id);
    }

}