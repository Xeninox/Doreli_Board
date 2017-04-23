<?php
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
include_once('../classes/AdminFunctionClass.php');

if (isset($_SESSION)){
    $institution_id = $_SESSION['institution_id'];
}


function getAllInactiveUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getAllNewUsers($institution_id);
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
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumAccepted($institution_id);
    return $admin->fetch();
}

function getNumRejectedUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumRejected($institution_id);
    return $admin->fetch();
}

function getNumInactiveUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumInactive($institution_id);
    return $admin->fetch();
}

