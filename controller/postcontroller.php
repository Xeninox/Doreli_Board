
<?php
/**
*@author Chris Asante
*@version 1.0
**/

	//call the class
	require_once("../classes/processPost.php");

	//checking if the session is set
	if (isset($_SESSION)) 
	{
		global $userId;
 		global $instId;

		//get user details
		$userId = $_SESSION['user_id'];
		$instId = $_SESSION['institution_id'];
	}

	//calling the function to delete ad when the delete in the user post page is set
	if(isset($_POST["delete"]))
	{
		$deleteId = $_POST["delete"];
		executeDelete($deleteId);
	}

	//calling the function to edit ad when the edit in the user post page is set
	if(isset($_POST["edit"]))
	{
		$editId = $_POST["edit"];
		executeDisplay($editId);
	}

	//calling the function to update ad when the update in the user post page is set
	if(isset($_POST["update"]))
	{
		$updateAd = $_POST["update"];
		executeEditAd($updateAd);
	}

	/**
	*function to display the ads posted by a user
	*@param id of the user
	*@return object of the result (ads details)
	**/
	function allPosts($userId)
	{
		//creating an instance of the post class
	    $userPosts = new postUser;

	    $userPosts->getUserAds($userId);

	    return $userPosts->fetchResultObject();
	}

	/**
	*function to display the username of the user
	*@param id of the user
	*@return username of the user
	**/
	function getUsername($uId)
	{
		//creating an instance of the post class
	    $userPosts = new postUser;

	    $userPosts->getUsername($uId);
	    
	    return $userPosts->fetch();
	}

	/**
	*function to delete an ad posted by the user
	*@param id of the ad
	**/
	function executeDelete($adId)
	{
		//creating an instance of the post class
		$userPosts = new postUser;

		$result = $userPosts->deletePost($adId);

		//check if any record was affected
		if ($result)
			echo "<center><h3 style='color:green'>Delete Successful </h3></center> <br>";

		else
			echo "<center><h3 style='color:red'>Delete Failed </h3></center> <br>";
		
	}

	/**
	*function to update an ad posted by the user
	*@param id of the ad
	**/
	function executeEditAd($adId)
	{
		global $subject;
		global $comment;
		global $catType;
		global $adFile;
		global $display;

		//storing the data set in the update form 
		$subject = $_POST['subj'];
		$comment = $_POST['comment'];
		$catType = $_POST['catId'];
		$adFile = $_POST['updatedAdFile'];
		$display = $_POST['display'];

		//creating an instance of the post class
		$userPosts = new postUser;

		$output = $userPosts->editAd($adId, $subject, $comment, $catType, $adFile, $display, $instId);

		//check if any record was affected
		if ($output)
		{
			echo "<center><h3 style='color:green'>Update Successful </h3></center> <br>
			<h5>You will be redirected to the institution page in 5 seconds<h5>";
			header( "refresh:5; url=../pages/institution-ads.php" );
		}

		else
			echo "<center><h3 style='color:red'> Update Failed </h3></center>" ;
	}

	/**
	*function to display the ad details
	*@return ad/post details
	**/
	function executeDisplay()
	{
		if(isset($_POST["edit"]))
		{
			$editId = $_POST["edit"];

	       $userPosts = new postUser;

			$adresult = $userPosts->getAd($editId);

			if ($adresult)		
				return $userPosts->fetch();
			
			else
				return null;
			
		}		
	}

	/**
	*function to display the categories in the categories table
	*@param id of the category currently set in the database
	**/
	function displayCategories($cat_id)
	{
		$userPosts = new postUser;

		$adresult = $userPosts->getCategory();

		if ($adresult)

		{
			while($row = $userPosts->fetch())
			{
				if ($cat_id == $row['cat_id'])				
					echo '
					<option selected value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';
				
				else				
					echo '
					<option value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';				
			}
		}			
	}

	/**
	*function to display the display options
	*@param display option currently selected in the database
	**/
	function display($disp)
	{
        if ($disp == "INSTITUTION")
       		echo '
       		<option selected value = "INSTITUTION">INSTITUTION</option>
       		<option value = "PUBLIC">PUBLIC</option>';

       if ($disp == "PUBLIC")
       		echo '
       		<option value = "INSTITUTION">INSTITUTION</option>
       		<option selected value = "PUBLIC">PUBLIC</option>';
       
	}		
?>