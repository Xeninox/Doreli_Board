<?php
require_once('../database/dbconnectclass.php');

/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 05/04/2017
 * Time: 12:08 PM
 */
class AdminFunctionClass extends DatabaseConnection
{


    function acceptUser($user_id){
        $make_user_active_query = "UPDATE users SET status = 'ACTIVE' WHERE user_id = '$user_id'";
        return $this->query($make_user_active_query);
    }


    function rejectUser($user_id){
        $reject_user_query = "UPDATE users SET status = 'REJECTED' WHERE user_id = '$user_id'";
        return $this->query($reject_user_query);
    }


    function getNumUploads(){

    }

    function getNumAccepted(){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'ACTIVE'";
        return $this->query($num_accepted_query);
    }

    function getNumInactive(){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'INACTIVE'";
        return $this->query($num_accepted_query);
    }

    function getNumRejected(){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'REJECTED'";
        return $this->query($num_accepted_query);
    }

    function getAllNewUsers($admin_inst_id){
        $get_users_query = "SELECT * FROM users WHERE status = 'INACTIVE' AND institution_id = '$admin_inst_id'";
        return $this->query($get_users_query);
    }

}

?>