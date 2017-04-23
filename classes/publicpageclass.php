<?php


/**
 *@author Dorcas Elikem Doe
 *@version 1.0
 */

require_once('../database/dbconnectclass.php');

/**
 *Register class which extends the database class
 */
//this class is the model
class ManageAds extends DatabaseConnection
{

    function displayAd()
    {
        //db object
        //$mydb = new dbconnection;

        //sql statement
        $mysql = "select * from ads WHERE institution_id = 1 ORDER BY id DESC";

        //execute the query
        return $this->query($mysql);
    }

    function getNumUploadsforPublic(){
        $num_upload = "SELECT COUNT(*) FROM ads WHERE institution_id = 1";
        return $this->query($num_upload);
    }
}

?>