<?php

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
	
	if(isset($_POST['submit'])){
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
		$ok = true;

    	if (!isset($_POST['catType']) || $_POST['catType'] === '' || $_POST['catType'] == "Please Select A Category") 
    	{
    		echo "car type error";
        	$ok = false;
    	}	 

    	else 
    	{
        	$catType = $_POST['catType'];
    	}

    	if (!isset($_POST['subj']) || $_POST['subj'] === '') 
    	{
    		echo "subj error";
        	$ok = false;
    	}	 

    	else 
    	{
        	$subj = $_POST['subj'];
    	}

    	if (!isset($_POST['comment'])) 
    	{
    		echo "comment error";
        	$ok = false;
    	}	 

    	else 
    	{
        	$comm = $_POST['comment'];
    	}   

    	if (!isset($_FILES['filename']))
        {
        	echo "file type error";
            $ok = false;
        } 

        else 
        {
            $input = convImage('filename');
            
            	//var_dump($input);
        }           
           
       	if (!isset($_POST['display']) || $_POST['display'] === 0 ) 
    	{
    		echo "display error";
        	$ok = false;
    	}	 

    	else 
    	{
        	$display = $_POST['display'];
    	}       

    	if ($ok) 
    	{
            uploadNotice($catType, $subj, $comm, $input, $display, 5, 5);
		}

		else
			echo "Check error";	  	
	}


	function uploadNotice($catType, $subj, $comm, $input, $display, $userId, $instId)
	{
 		//global $userId;
 		//global $instId;

		$insertNotice = new upload;

		$output = $insertNotice->uploadQuery($catType, $subj, $comm, $input, $display, 5, 5);

		if ($output)
       	{
       		echo "Insertion successful";
       	}

       	else
       	{
       		echo "Couldn't upload";
       	}
	}

	//function to convert images
	/**
	*
	**/
	function convImage($input)
	{
		$tempname = addslashes($_FILES[$input]['tmp_name']);
		$name = addslashes($_FILES[$input]['name']);
		$getimage = addslashes(file_get_contents($tempname));
		$image = base64_encode($getimage);
		return $image;
	}























?>