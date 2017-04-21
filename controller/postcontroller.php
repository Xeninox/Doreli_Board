<?php

	//call the class
	require_once("../classes/processPost.php");


	if (isset($_SESSION)) 
	{
		global $userId;
 		global $instId;

		//get user details
		$userId = $_SESSION['user_id'];
		$instId = $_SESSION['institution_id'];
	}

	if(isset($_POST["delete"]))
	{
		$deleteId = $_POST["delete"];
		executeDelete($deleteId);
		echo "user deleting";
	}

	if(isset($_POST["edit"]))
	{
		$editId = $_POST["edit"];
		executeDisplay($editId);
		echo "user editing";
	}

	if(isset($_POST["update"]))
	{
		$updateAd = $_POST["update"];
		executeEditAd($updateAd);
		echo "updating ad";
	}

	function allPosts($userId)
	{
	    $userPosts = new postUser;

	    $userPosts->getUserAds($userId);

	    return $userPosts->fetchResultObject();
	}

	function getUsername($uId)
	{
	    $userPosts = new postUser;

	    $userPosts->getUsername($uId);
	    
	    return $userPosts->fetch();
	}


	function executeDelete($adId)
	{
		$userPosts = new postUser;

		$result = $userPosts->deletePost($adId);

		//check if any record was affected
		if ($result)
		{
			echo 'Delete Successful <br>';
			//header('Location:');

		}
		else{
			echo "delete( unsuccessful)";
		}
	}

	function executeEditAd($adId)
	{
		global $subject;
		global $comment;
		global $catType;
		global $adFile;
		global $display;


		$subject = $_POST['subj'];
		$comment = $_POST['comment'];
		$catType = $_POST['catId'];
		$adFile = $_POST['updatedAdFile'];
		$display = $_POST['display'];

		$userPosts = new postUser;

		$output = $userPosts->editAd($adId, $subject, $comment, $catType, $adFile, $display, $instId);

		if ($output)
		{
			echo "Update Successful";
			
			header( "refresh:5; url=../pages/institution-ads.php" );
		}

		else
			echo "Update failed";

		//return $userPosts->fetch();
	}

	function executeDisplay()
	{
		if(isset($_POST["edit"])){
			$editId = $_POST["edit"];
			//executeDisplay($editId);
			//echo "user editing";
		//}

	       $userPosts = new postUser;

			$adresult = $userPosts->getAd($editId);

			if ($adresult)
			{
				return $userPosts->fetch();
			}

			else{
				return null;
			}
		}		
	}


	function displayCategories($cat_id)
	{
		$userPosts = new postUser;

		$adresult = $userPosts->getCategory();

		if ($adresult)

		{
			while($row = $userPosts->fetch())
			{
				if ($cat_id == $row['cat_id'])
				{
					echo '
					<option selected value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';
				}
				else
				{
					echo '
					<option value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';	
				}
			}
		}			
	}

	function display($disp)
	{
        if ($disp == "INSTITUTION")
       {
       		echo '
       		<option selected value = "INSTITUTION">INSTITUTION</option>
       		<option value = "PUBLIC">PUBLIC</option>';
       }

       if ($disp == "PUBLIC")
       {
       		echo '
       		<option value = "INSTITUTION">INSTITUTION</option>
       		<option selected value = "PUBLIC">PUBLIC</option>';
       }
	}		









?>