<?php
/**
 *@author Chris Asante
 *@version 1.0
 **/

//include the database class
require_once("../database/dbconnectclass.php");

class upload extends DatabaseConnection
{
    //properties

    //methods

    //function for uploading


    /**
     *function to upload the ad details into the database
     *@param ad details
     *@return success or failure of upload
     **/
    function uploadQuery($catType, $subj, $comm, $input, $display, $userId, $instId)
    {


        if ($display == "PUBLIC")
        {
            // query to insert data into the database
            $myQuery = "INSERT INTO ads(cat_id, subject, comment, ad_file, user_id, institution_id, display) VALUES('$catType', '$subj', '$comm', '$input', '$userId', 1, '$display')";
        }

        else
        {
            // query to insert data into the database
            $myQuery = "INSERT INTO ads(cat_id, subject, comment, ad_file, user_id, institution_id, display) VALUES('$catType', '$subj', '$comm', '$input', '$userId', '$instId', '$display')";
        }


        // execution of query to insert the query
        return $this->query($myQuery);

    }

    /**
     *function to display the categories in the categories table
     *@return categories in the database
     **/
    function getCategory()
    {
        $myQuery = "SELECT * FROM categories";

        //execution of query
        return $this->query($myQuery);
    }


}




?>