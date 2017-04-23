<?php
include_once('../classes/categories.php');

/**
 * Function to get all the categories from the database
 * @return object the result object
 */
function getAllCategories(){
    $cat = new categories();
    $cat->getAllCategories();
    return $cat->fetchResultObject();
}

?>