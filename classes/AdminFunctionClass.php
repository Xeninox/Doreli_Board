<?php
require_once('../database/dbconnectclass.php');

/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
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



    function getNumAccepted($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'ACTIVE' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    function getNumInactive($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'INACTIVE' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    function getNumRejected($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'REJECTED' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    function getAllNewUsers($admin_inst_id){
        $get_users_query = "SELECT * FROM users WHERE status = 'INACTIVE' AND institution_id = '$admin_inst_id'";
        return $this->query($get_users_query);
    }

}

?>