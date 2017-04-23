<?php
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */

include_once('../classes/InstitutionAds.php');

if (isset($_SESSION)){
    $institution_id = $_SESSION['institution_id'];
    $user_id = $_SESSION['user_id'];
}

function getAllInstutionAds(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getInstitutionAds($institution_id);
    return $inst_ads->fetchResultObject();
}

function getUsername(){
    global $user_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getUsername($user_id);
    return $inst_ads->fetch();
}

function getUserInstituion(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getUserInstitution($institution_id);
    return $inst_ads->fetch();
}

function getNumUploadForInstitution(){
    global $institution_id;
    $inst_ads = new InstitutionAds();
    $inst_ads->getNumUploads($institution_id);
    return $inst_ads->fetch();
}