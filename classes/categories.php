<?php
require_once('../database/dbconnectclass.php');
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 20/04/2017
 * Time: 02:24 PM
 */
class categories extends DatabaseConnection
{

    function getAllCategories(){
        $select_categories = "SELECT * FROM categories";
        return $this->query($select_categories);
    }

}