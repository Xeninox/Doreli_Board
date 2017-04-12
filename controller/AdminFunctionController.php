<?php
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 05/04/2017
 * Time: 12:13 PM
 */

include_once('../classes/AdminFunctionClass.php');

if (isset($_SESSION)){

}


function getAllInactiveUsers($admin_inst_id){
    $admin = new AdminFunctionClass();
    $admin->getAllNewUsers($admin_inst_id);
    return $admin->fetchResultObject();
}

function makeUserActive($user_id){
    $admin = new AdminFunctionClass();
    $admin->acceptUser($user_id);
    return $admin->fetchResultObject();
}

function rejectUser($user_id){
    $admin = new AdminFunctionClass();
    $admin->rejectUser($user_id);
    return $admin->fetchResultObject();
}

function getNumAcceptedUsers(){
    $admin = new AdminFunctionClass();
    $admin->getNumAccepted();
    return $admin->fetch();
}

function getNumRejectedUsers(){
    $admin = new AdminFunctionClass();
    $admin->getNumRejected();
    return $admin->fetch();
}

function getNumInactiveUsers(){
    $admin = new AdminFunctionClass();
    $admin->getNumInactive();
    return $admin->fetch();
}

