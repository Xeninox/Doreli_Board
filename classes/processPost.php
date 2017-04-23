
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

		//methods

		/**
		*function to display the ads posted by a user
		*@param id of the user
		*@return object of the result (ads details)
		**/
		function getUserAds($userId)
		{
			//Query
		    $myQuery = "SELECT * FROM ads WHERE user_id = '$userId'"; 
			
	    	//execution of query 
	      	return  $this->query($myQuery);
	           	
		}

		/**
		*function to display the ad details
		*@return ad/post details
		**/
		function getAd($adId)
		{
			//Query
		    $myQuery = "SELECT * FROM ads WHERE id = '$adId' LIMIT 1"; 
			
	    	//execution of query 
	      	return  $this->query($myQuery);
	           	
		}

		/**
		*function to display the username of the user
		*@param id of the user
		*@return username of the user
		**/
		function getUsername($userId)
		{
	        $myQuery = "SELECT username FROM users WHERE user_id = '$userId'";

	        //execution of query
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

    	/**
		*function to update an ad posted by the user
		*@param input to be inserted into the database
		*@return whether insertion was successful or not
		**/
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

		/**
		*function to delete an ad posted by the user
		*@param id of the ad
		*@return whether deletion was successful or not
		**/
		function deletePost($adId)
		{
			//write sql query
			$sqlQuery = "DELETE FROM ads WHERE id = '$adId";


			//execute the querry
			return $this->query($sqlQuery);

		}
			
	}

