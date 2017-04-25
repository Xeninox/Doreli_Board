<?php   
/**
**@author Selassie Golloh
*/
require_once("../classes/getuserdetails.php");

if (isset($_SESSION)){
	$user_id = $_SESSION['user_id'];
}

if(isset($_POST['delete'])){
	deleteacct();

}

if (isset($_POST['Update'])){
    $ppic;
    global $sessionpword;
    $user_id = $_SESSION['user_id'];
	$username = $_POST['username'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

	if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name']))
    {
        $ppic = convImage('image');
    }
    else{
    	$ppic ="none";
    }
	updateacct($user_id,$username, $fname, $lname, $email, $pwd, $ppic);
}

function getUserDetails(){
	global $user_id;
	$getUser = new GetUser;
	$getUser->getUserDetails($user_id);
	return $getUser->fetchResultObject();
}

function deleteacct(){
	global $user_id;
	global $status;
	$delUser = new GetUser;
	$result = $delUser->deleteacct($user_id);

	if($result){
		$status = 1;
	}
	else{
		$status = 2;
	}
	
}

function updateacct($user_id,$username, $fname, $lname, $email, $pwd, $ppic){
	global $user_id;
	global $status;
	$updateUser = new GetUser;
	$result = $updateUser->updateacct($user_id,$username, $fname, $lname, $email, $pwd, $ppic);
	if($result){
		$status = 3;
	}
	else{
		$status = 4;
	}
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

 /**a function to display error or success message upon operation
 */
function profilestatus()
{
    if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 1) {
        echo "<h3 style='color:green'> Account Successfully Deactivated</h3>
        <h3 style='color:green'>You will be redirected to login pages in a few seconds<h3> <br>";
        header( "refresh:2; url=../login/login.php" );

    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 2) {
        echo "<h3 style='color:red'> Error Trying to Delete Account </h3>" ;
    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 3) {
        echo "<h3 style='color:green'> Profile Updated Successfully </h3>" ;
    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 4) {
        echo "<h3 style='color:red'> Error Trying to Update Profile </h3>" ;
    }

}
?>