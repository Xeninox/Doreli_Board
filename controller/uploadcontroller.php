<?php
/**
 *@author Chris Asante
 *@version 1.0
 */

	//call the class
	require_once("../classes/processupload.php");

	//$_SESSION checks for all sessions to see if it's available
	if (isset($_SESSION)) 
	{
		global $userId;
 		global $instId;

		//get user details
		$userId = $_SESSION['user_id'];
		$instId = $_SESSION['institution_id'];
	}
	
    //check if the submit button is clicked upload data
	if(isset($_POST['submit']))
    {
		 checkValid();
	}
	
	//validate upload fields
	function checkValid()
	{
		global $display;
		global $catType;
		global $subj;
		global $comm;
		global $input;
        global $userId;
        global $instId;

		$ok = true;

    	if (!isset($_POST['catType']) || $_POST['catType'] === '' || $_POST['catType'] == "Please Select A Category") 
    	{
    		echo "Please select a category";
        	$ok = false;
    	}	 

    	else 
    	{
        	$catType = $_POST['catType'];
    	}

    	if (!isset($_POST['subj']) || $_POST['subj'] === '') 
    	{
            echo "Please type the subject";
        	$ok = false;
    	}	 

    	else 
    	{
        	$subj = $_POST['subj'];
    	}

    	if (!isset($_POST['comment'])) 
    	{
            echo "Please type the description";
        	$ok = false;
    	}	 

    	else 
    	{
        	$comm = $_POST['comment'];
    	}   

    	if (!isset($_FILES['filename']))
        {
            echo "Please choose a file from the computer";
            $ok = false;
        } 

        else 
        {
            $input = convImage('filename');

        }           
           
       	if (!isset($_POST['display']) || $_POST['display'] === 0 ) 
    	{
            echo "Please select where to display the ad";
        	$ok = false;
    	}	 

    	else 
    	{
        	$display = $_POST['display'];
    	}       

    	if ($ok) 
    	{
            uploadNotice($catType, $subj, $comm, $input, $display, $userId, $instId);
		}

		else
			echo "Check error";	  	
	}

    /**
    *Function to upload the notice/ad
    *@param input typed by the user
    **/
	function uploadNotice($catType, $subj, $comm, $input, $display, $userId, $instId)
	{
 		global $userId;
 		global $instId;

        //calling an instancee of the upload class
		$insertNotice = new upload;

		$output = $insertNotice->uploadQuery($catType, $subj, $comm, $input, $display, $userId, $instId);

		if ($output)
       	{
       		echo "<center><h3 style='color:green'>Upload Successful </h3></center> <br>
            <h5>You will be redirected to the institution page in 5 seconds<h5>";
            header( "refresh:5; url=../pages/institution-ads.php" );
       	}

       	else
       	{
       		echo "<center><h3 style='color:red'> Upload Failed </h3></center>" ;
       	}
	}


    /**
    *function to display the categories in the categories table
    *@param id of the category currently set in the database
    **/
    function displayCategories()
    {
        $userPosts = new upload;

        $adresult = $userPosts->getCategory();

        if ($adresult)          
            echo '
            <option value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';                
                        
    }

        
	/**
	*function to convert images
    *@param input file inserted
	**/
	function convImage($input)
	{
		$tempname = addslashes($_FILES[$input]['tmp_name']);
		$name = addslashes($_FILES[$input]['name']);
		$getimage = addslashes(file_get_contents($tempname));
		return $getimage;
	}























?>