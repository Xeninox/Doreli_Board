<?php
require_once('../database/dbconnectclass.php');

/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
class AdminFunctionClass extends DatabaseConnection
{


    /**
     * This function allows an admin to accept a user into an institution
     * @param $user_id the id of the user to be accepted
     * @return boolean the result of the query that was ran
     */
    function acceptUser($user_id){
        $make_user_active_query = "UPDATE users SET status = 'ACTIVE' WHERE user_id = '$user_id'";
        return $this->query($make_user_active_query);
    }

    function makeUserInactive($user_id){
        $make_user_inactive_query = "UPDATE users SET status = 'INACTIVE' WHERE user_id = '$user_id'";
        return $this->query($make_user_inactive_query);
    }


    /**
     * This function allows an admin to reject a user
     * @param $user_id the id if the user
     * @return boolean the result of the query
     */
    function rejectUser($user_id){
        $reject_user_query = "UPDATE users SET status = 'REJECTED' WHERE user_id = '$user_id'";
        return $this->query($reject_user_query);
    }

    /**
     * This function returns the number of users accepted into an institution
     * @param $institution_id the id of the institution
     * @return boolean the result of the query
     */
    function getNumAccepted($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'ACTIVE' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    /**
     * This function returns the number of inactive users in an institution
     * @param $institution_id the id of the institution
     * @return boolean the result of the query
     */
    function getNumInactive($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'INACTIVE' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    /**
     * This function returns the number of users who have been rejected from joining an institution
     * @param $institution_id the id of the institution
     * @return boolean the result of the query
     */
    function getNumRejected($institution_id){
        $num_accepted_query = "SELECT COUNT(*) FROM users WHERE status = 'REJECTED' AND institution_id = '$institution_id'";
        return $this->query($num_accepted_query);
    }

    /**
     * This function returns the details of all new users in the system
     * @param $admin_inst_id the id of the institution of the administrator
     * @return boolean the result of the query
     */
    function getAllNewUsers($admin_inst_id){
        $get_users_query = "SELECT * FROM users WHERE status = 'INACTIVE' AND institution_id = '$admin_inst_id'";
        return $this->query($get_users_query);
    }

    function getAllUsers($admin_inst_id){
        $get_all_users_query = "SELECT * FROM users WHERE status = 'ACTIVE' AND institution_id = '$admin_inst_id' AND role != 1";
        return $this->query($get_all_users_query);
    }

}

?>