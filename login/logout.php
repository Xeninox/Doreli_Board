<?php
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 19/04/2017
 * Time: 10:51 AM
 */
session_start();

session_destroy();

header('Location:login.php');

?>