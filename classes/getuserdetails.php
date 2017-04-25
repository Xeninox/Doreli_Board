<?php
/**
**@author Selassie Golloh
*/
require_once("../database/dbconnectclass.php");
/**
* 
*/
class GetUser extends DatabaseConnection
{
	function getUserDetails($user_id){
		$sql ="SELECT * FROM users WHERE user_id = '$user_id'";
		return $this->query($sql);
	}

	function deleteacct($user_id){
		
		$mysql="UPDATE users
		 SET status = 'INACTIVE' 
		 WHERE user_id = '$user_id'";
		return $this->query($mysql);
	}
	

	function updateacct($user_id, $username, $fname, $lname, $email, $pwd, $ppic){
		$misql;
		if ($ppic == "none")
        {
        $misql= "UPDATE users
		 SET username = '$username', 
		 firstname = '$fname', 
		 lastname = '$lname', 
		 email = '$email', 
		 password = '$pwd'
		WHERE user_id = '$user_id'";
        }

       else {

      	$misql= "UPDATE users
		 SET username = '$username', 
		 firstname = '$fname', 
		 lastname = '$lname', 
		 email = '$email', 
		 password = '$pwd', 
		 profile_picture = '$ppic'
		WHERE user_id = '$user_id'";

      }
		

          return $this->query($misql);
             
	}
}

?>