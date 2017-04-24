<?php 
/**
 *@author Isaac Coffie
 *@version Version 1.0
 */

//include database connection class 

require_once("../database/dbconnectclass.php");

// a class to allow users to view a particular ad

class ViewAdDetails extends DatabaseConnection
{
    /**
     *a function to get the details of an ad
     *@param $ad_id the id of an ad (poster)
     *@return returns true it successfully returns an ad and false if not successful
     */ 
	function getAdDetails($ad_id){
		$sql = "SELECT * FROM ads WHERE id = '$ad_id' LIMIT 1";
        $sqlresult = $this->query($sql);
        if($sqlresult){
        	return true;
        }else{
        	return false;
        }
	}

    /**
     *a function to get the user who posted the ad
     *@param $ad_id the id of an ad (poster)
     *@return returns true if successful and false if not successful
     */ 
	function getUsername($ad_id){
        $get_username = "SELECT username FROM users WHERE user_id IN (SELECT user_id from ads WHERE id ='$ad_id')";
        return $this->query($get_username);
    }

    /**
     *a function to get the category name of an ad
     *@param $cat_id the category id of an ad (poster)
     *@return returns true if successful and false if not successful
     */ 
   function getCategoryNameById($cat_id){
   	 $sql = "SELECT cat_name FROM categories WHERE cat_id = '$cat_id'";
        return $this->query($sql);

   }


}

 ?>