<?php
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 16/04/2017
 * Time: 10:25 AM
 */

include_once('../classes/InstitutionAds.php');

if (isset($_SESSION)){

}

function getAllInstutionAds($inst_id){
    $inst_ads = new InstitutionAds();
    $inst_ads->getInstitutionAds($inst_id);
    return $inst_ads->fetchResultObject();
}

function getUsername($user_id){
    $inst_ads = new InstitutionAds();
    $inst_ads->getUsername($user_id);
    return $inst_ads->fetch();
}

function getUserInstituion($inst_id){
    $inst_ads = new InstitutionAds();
    $inst_ads->getUserInstitution($inst_id);
    return $inst_ads->fetch();
}