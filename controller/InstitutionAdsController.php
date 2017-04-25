<?php
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */

include_once('../classes/InstitutionAds.php');

/**
 * Check if the session is set
 */
if (isset($_SESSION)){
    $institution_id = $_SESSION['institution_id'];
    $user_id = $_SESSION['user_id'];
}

/**
 * function to get all ads that belong to an institution
 * @return object the result object
 */
function getAllInstutionAds(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getInstitutionAds($institution_id);
    return $inst_ads->fetchResultObject();
}

/**
 * function to get the username of a user
 * @return object the result object
 */
function fetchUsername(){
    global $user_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->fetchUsername($user_id);
    return $inst_ads->fetch();
}


/**
 * function to get the username of a user given the id
 * @param $user_id the id of the user
 * @return object the result object
 */
function getUsernameWithID($user_id){
    $inst_ads = new InstitutionAds();
    $inst_ads->fetchUsername($user_id);
    return $inst_ads->fetch();
}

/**
 * function to get the institution of a user
 * @return object the result object
 */
function getUserInstituion(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getUserInstitution($institution_id);
    return $inst_ads->fetch();
}

/**
 * function to get the number of uploads for an institution
 * @return object the result object
 */
function getNumUploadForInstitution(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getNumUploads($institution_id);
    return $inst_ads->fetch();
}

/**
 * function to get the ads that belong to a particular category for an institution
 * @param $cat_id the category id
 * @return object the result object
 */
function getCatAds($cat_id,$institution_id){
    $cat_ads = new InstitutionAds();
    $cat_ads->getCategoryAds($cat_id, $institution_id);
    return $cat_ads->fetchResultObject();
}

/**
* function to get the ads that belong to a particular category for the public
* @param $cat_id the category id
* @return object the result object
*/
function getCategoryAdsForPublic($cat_id){
    $cat_ads = new InstitutionAds();
    $cat_ads->getCategoryAdsForPublic($cat_id);
    return $cat_ads->fetchResultObject();
}