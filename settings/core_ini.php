<?php
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
session_start();
ob_start();

function verifyUserLogin(){
    // check for login and permission
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

    } else {
        // redirect to login if the user is not valid
        header('Location:../login/login.php');
    }
}
?>