<?php
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 22/04/2017
 * Time: 11:47 AM
 */
include_once('settings/core_ini.php');
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

} else {
    // redirect to login if the user is not valid
    header('Location:login/login.php');
}
?>