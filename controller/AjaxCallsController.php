<?php
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 10/04/2017
 * Time: 08:20 PM
 */
require_once("AdminFunctionController.php");

$msg = $_REQUEST['msg'];

switch ($msg){
    case 0:
        $user_id = $_REQUEST['userid'];
        $result = makeUserActive($user_id);
        $success = array();
        if ($result){
            $success[] = array(
                'status' => 'success'
            );
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;

    case 1:
        $user_id = $_REQUEST['userid'];
        $result = rejectUser($user_id);
        $success = array();
        if ($result){
            $success[] = array(
                'status' => 'success'
            );
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;
}