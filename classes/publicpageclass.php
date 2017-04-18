<?php


/**
*@author Dorcas Elikem Doe 
*@version 1.0
*/

require_once('../database/dbconnect.php');

/**
*Register class which extends the database class
*/
//this class is the model
class ManageAds extends dbconnection
{
	
	function displayAd()
	{
		//db object
		//$mydb = new dbconnection;

		//sql statement
		$mysql = "select * from ads";

		//execute the query
		return $this->query($mysql); 
	}
}

?>