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

    $user_id = $_SESSION['user_id'];
	$username = $_POST['username'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$ppic = $_POST['image'];
	//print_r($_POST);
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
	$delUser = new GetUser;
	$result = $delUser->deleteacct($user_id);

	if($result){
      header("location: ../login/login.php");
	}
	
}

function updateacct($user_id,$username, $fname, $lname, $email, $pwd, $ppic){
	global $user_id;
	$updateUser = new GetUser;
	$result = $updateUser-> updateacct($user_id,$username, $fname, $lname, $email, $pwd, $ppic);
 }
 // if($result){
 //      header("location: ../pages/userpage.php");
	// }


?>