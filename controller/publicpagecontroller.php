<?php


/**
*@author Dorcas Elikem Doe 
*@version 1.0
*/

require_once('../classes/publicpageclass.php');

/**
*Register controller
*/

function getAllPublicAds(){
    $publicads = new ManageAds();
    $publicads ->displayAd();
    return $publicads->fetchResultObject();
}
function getNumUploadForPublic(){
    $public_ads = new ManageAds();
    $public_ads->getNumUploadsforPublic();
    return $public_ads->fetch();
}

?>
