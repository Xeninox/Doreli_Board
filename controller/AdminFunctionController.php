<?php

include_once('../classes/AdminFunctionClass.php');
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */


/**
 * Check if the session is set
 */
if (isset($_SESSION)){
    $institution_id = $_SESSION['institution_id'];
}


/**
 * Function to get all inactive users
 * @return object the result object
 */
function getAllInactiveUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getAllNewUsers($institution_id);
    return $admin->fetchResultObject();
}


function makeUserInactive($user_id){
    $admin = new AdminFunctionClass();
    $admin->makeUserInactive($user_id);
    return $admin->fetchResultObject();
}

function getAllUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getAllUsers($institution_id);
    return $admin->fetchResultObject();
}

/**
 * Function to make a user active
 * @param $user_id the id of the user
 * @return object the result object
 */
function makeUserActive($user_id){
    $admin = new AdminFunctionClass();
    $admin->acceptUser($user_id);
    return $admin->fetchResultObject();
}

/**
 * Function to reject a user
 * @param $user_id the id of the user to be rejected
 * @return object the result object
 */
function rejectUser($user_id){
    $admin = new AdminFunctionClass();
    $admin->rejectUser($user_id);
    return $admin->fetchResultObject();
}

/**
 * Function to get the number of accepted users
 * @return object the result object
 */
function getNumAcceptedUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumAccepted($institution_id);
    return $admin->fetch();
}

/**
 * Function to get the number of rejected users
 * @return object the result object
 */
function getNumRejectedUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumRejected($institution_id);
    return $admin->fetch();
}

/**
 * Function to get the number of inactive users
 * @return object the result object
 */
function getNumInactiveUsers(){
    global $institution_id;
    $admin = new AdminFunctionClass();
    $admin->getNumInactive($institution_id);
    return $admin->fetch();
}

