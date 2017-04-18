<?php
require_once('../database/dbconnectclass.php');
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 16/04/2017
 * Time: 10:22 AM
 */
class InstitutionAds extends DatabaseConnection
{
    function getInstitutionAds($inst_id){
        $get_inst_ads = "SELECT * FROM ads WHERE institution_id = '$inst_id'";
        return $this->query($get_inst_ads);
    }

    function getUsername($user_id){
        $get_username = "SELECT username FROM users WHERE user_id = '$user_id'";
        return $this->query($get_username);
    }

    function getUserInstitution($inst_id){
        $get_user_inst = "SELECT name FROM institution WHERE institution_id = '$inst_id'";
        return $this->query($get_user_inst);
    }


}