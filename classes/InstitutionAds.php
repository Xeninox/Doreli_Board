<?php
require_once('../database/dbconnectclass.php');
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
class InstitutionAds extends DatabaseConnection
{
    /**
     * This function gets the ads for an institution
     * @param $inst_id the institution id
     * @return boolean the result of the query
     */
    function getInstitutionAds($inst_id){
        $get_inst_ads = "SELECT * FROM ads WHERE institution_id = '$inst_id' ORDER BY id DESC";
        return $this->query($get_inst_ads);
    }


    /**
     * This function returns the username of anyone who posted an ad
     * @param $user_id the id of the user
     * @return boolean the result of the query
     */
    function fetchUsername($user_id){
        $get_username = "SELECT username FROM users WHERE user_id = '$user_id'";
        return $this->query($get_username);
    }

    /**
     * This function gets the institution that a user belongs to
     * @param $inst_id the institution id
     * @return boolean the result of the query
     */
    function getUserInstitution($inst_id){
        $get_user_inst = "SELECT name FROM institution WHERE institution_id = '$inst_id'";
        return $this->query($get_user_inst);
    }

    /**
     * This function gets the number of advertisement uploads for an institution
     * @param $inst_id the institution id
     * @return boolean the result of the query
     */
    function getNumUploads($inst_id){
        $num_upload = "SELECT COUNT(*) FROM ads WHERE institution_id = '$inst_id'";
        return $this->query($num_upload);
    }

    /**
     * This function returns all ads that fall in a particular category for an institution
     * @param $cat_id the category id
     * @return boolean the result of the query
     */
    function getCategoryAds($cat_id, $inst_id){
        $cat_ads = "SELECT * FROM ads WHERE cat_id = '$cat_id' AND institution_id = '$inst_id'";
        return $this->query($cat_ads);
    }

    /**
     * This function returns all ads that fall in a particular category for the public
     * @param $cat_id the category id
     * @return boolean the result of the query
     */
    function getCategoryAdsForPublic($cat_id){
        $cat_ads = "SELECT * FROM ads WHERE cat_id = '$cat_id' AND institution_id = 1";
        return $this->query($cat_ads);
    }


}