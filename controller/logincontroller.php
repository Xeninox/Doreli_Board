<?php

/**
 *@author Selassie Golloh
 */

//include login class

include("../classes/loginclass.php");


if (isset($_POST['login'])){
    validlogin();
}

function validlogin(){
    $success = false;
    $username = "";
    $password = "";

    if(isset($_POST['username']) && !empty($_POST['username'])){
        $username = $_POST['username'];
        $success= true;
    } else{
        global $usernameError;
        $usernameError = "Please enter your username";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        $success= true;
    }else{
        global $pwdError;
        $pwdError = "Please enter your password";
    }

    if($success){
        userlogin($username, $password);
    }


}

/*
*function to verify user login 
*/

function userlogin($username, $password){

    $login = new Login;
    $dbquery = $login->verifylogin($username, $password);

    if($dbquery){
        if ($_SESSION['role'] == 1){
            header("Location:../pages/accept-users.php");
        } else if ($_SESSION['role'] == 2){
            header("Location:../pages/institution-ads.php");
        }
    }
    else{
        echo "wrong details";

    }
}




?>