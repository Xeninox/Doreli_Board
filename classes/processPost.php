<?php
/**
*@author Chris Asante
*@version 1.0
**/
	
	//include the database class
	require_once("../database/dbconnectclass.php");

	class postUser extends DatabaseConnection 
	{
		//properties
		/**
		*@param 
		*@param 
		**/

		//methods

		//function for uploading
		function getUserAds($userId)
		{
			//Query
		    $myQuery = "SELECT * FROM ads WHERE user_id = '$userId'"; 
			
	    	//execution of query 
	      	return  $this->query($myQuery);
	           	
		}

		function getAd($adId)
		{
			//Query
		    $myQuery = "SELECT * FROM ads WHERE id = '$adId' LIMIT 1"; 
			
	    	//execution of query 
	      	return  $this->query($myQuery);
	           	
		}

		function getUsername($userId)
		{
	        $myQuery = "SELECT username FROM users WHERE user_id = '$userId'";

	        //execution of query
	        return $this->query($myQuery);
    	}

    	function getCategory()
		{
	        $myQuery = "SELECT * FROM categories";

	        //execution of query
	        return $this->query($myQuery);
    	}

		function editAd($adId, $subj, $comm, $catType, $input, $display, $instId)
		{

			if ($display == "PUBLIC")
		    {
		    	// query to insert data into the database
		    	$myQuery = "UPDATE ads SET subject = '$subj', comment = '$comm', cat_id = '$catType',  ad_file = '$input', display = '$display', institution_id = 1  WHERE id = '$adId'"; 
		    }

		    else
		    {
		    	// query to update data in the database
		    	$myQuery = "UPDATE ads SET subject = '$subj', comment = '$comm', cat_id = '$catType',  ad_file = '$input', display = '$display', institution_id = '$instId'  WHERE id = '$adId'"; 
		    }

			
	    	//execution of query to insert the query
	      	return $this->query($myQuery);
	           	
		}

		function deletePost($adId)
		{
			//write sql query
			$sqlQuery = "DELETE FROM ads WHERE id = '$adId";


			//execute the querry
			return $this->query($sqlQuery);

		}

		
	}
/*
$test = new postUser;
var_dump($test->getCategory());
var_dump($test->fetch());

*/

?>