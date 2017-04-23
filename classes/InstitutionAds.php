<?php
require_once('../database/dbconnectclass.php');
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
class InstitutionAds extends DatabaseConnection
{
    function getInstitutionAds($inst_id){
        $get_inst_ads = "SELECT * FROM ads WHERE institution_id = '$inst_id' ORDER BY id DESC";
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

    function getNumUploads($inst_id){
        $num_upload = "SELECT COUNT(*) FROM ads WHERE institution_id = '$inst_id'";
        return $this->query($num_upload);
    }


}