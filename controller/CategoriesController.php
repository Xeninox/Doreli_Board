<?php
include_once('../classes/categories.php');

function getAllCategories(){
    $cat = new categories();
    $cat->getAllCategories();
    return $cat->fetchResultObject();
}

?>