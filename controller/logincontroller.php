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
    global $status;

    $login = new Login;
    $dbquery = $login->verifylogin($username, $password);
    // if successful
    if($dbquery ==3){
        if ($_SESSION['role'] == 1){
            header("Location:../pages/accept-users.php");
        } else if ($_SESSION['role'] == 2){
            header("Location:../pages/institution-ads.php");
        }
    }

    //if password doesnt match
     if($dbquery ==2) {
         $status = 2;
    }

    //if user account isnt active
     else{
        $status = 1;

    }
}

/**a function to display error or success message upon login
 */
function loginstatus()
{
    if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 1) {
        echo "<h4 style='color:red'>User Doesn't Exist or Signup Request is Awaiting Acceptance from Admin</h4><br>";

    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 2) {
        echo "<h4 style='color:red'> Wrong Login Credentials</h4><br>" ;
    }
    

}



?>