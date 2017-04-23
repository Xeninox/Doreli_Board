
<?php
	
/**
*@author Chris Asante
*@version 1.0
*/
	//include the database connection class
	require_once ('../database/dbconnectclass.php');

	//load all categories
	function loadCategories()
	{	
		//create a new instance of database
		$loadDb = new DatabaseConnection;
		
		//write sql query
		$sqlQuery = "SELECT * FROM categories";
	
		//query
		$output = $loadDb->query($sqlQuery);


		if ($output)
		{
			?><option><?php echo "Please Select A Category" ?></option><?php

			//loop through and display the majors in the database
  			while($row = $loadDb->fetch())
			{
				?><option><?php echo $row['cat_id']. " ". $row['cat_name']; ?></option><?php
			}
		}
	}




	?>