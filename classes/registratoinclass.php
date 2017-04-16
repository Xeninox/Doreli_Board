<?php

/**
*@author Isaac Coffie 
*@version Version 1.0
*/

//include database connection class 

require_once("../database/dbconnectclass.php");

class Registration extends DatabaseConnection
{

         //register a normal user
  
	    /*
          a function to add new user into user account table
         */
        function addNewUser($name, $fname, $lname, $email, $pword, $inst, $image, $role, $status){
             
             //create an instance of DB connection        
            //$useraccount = new DatabaseConnection;
            //hash password for security purpose
          $name = $this->sqlinjection($name);
          $fname = $this->sqlinjection($fname);
          $lname = $this->sqlinjection($lname);
          $email = $this->sqlinjection($email);
          $pword = $this->sqlinjection($pword);
          $inst = $this->sqlinjection($inst);
          $role = $this->sqlinjection($role);
          $status = $this->sqlinjection($status);
            $hashedpword = password_hash($pword, PASSWORD_DEFAULT);
            //write query statement
            $queryStatement = "INSERT INTO users (username, firstname, lastname, email, password, institution_id, profile_picture, role, status) VALUES ('$name', '$fname', '$lname', '$email', '$hashedpword', '$inst', '$image','$role','$status')";
            // execute query
            $useraccount = $this->query($queryStatement);
             
             //if query was successful
            if($useraccount){
            	return true;
               // echo "<center><h3 style='color:green'>Insertion Successful "."</h3></center>" ;
                //header("location:../login/");
            }
            // if query wasnt successful
            else {
            	return false;
                 //echo "<center><h3 style='color:red'> Insertion Unsuccessful ". "</h3></center>" ;
            }
       }

// register an institution

         /*
          a function to add new institution
         */
        function addNewInstitution($name, $description, $address, $contact, $logo, $adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $adminprofile){

        	$successful = false;
             
             //create an instance of DB connection        
            //$dbinstitution = new DatabaseConnection;
            //write query statement
            $queryStatement = "INSERT INTO institution (name, description, address, contact, logo) VALUES ('$name', '$description', '$address', '$contact', '$logo')";

            // execute query
            $queryresult = $this->query($queryStatement);
             
             //if adding institution was successful
            if($queryresult){
            	$successful = true;
                //echo "<center><h3 style='color:green'> Institution Insertion Successful "."</h3></center>" ;

                //proceed to register the admin
                $sql = "SELECT * FROM institution WHERE name = '$name' LIMIT 1";
                $sqlresult = $this->query($sql);

                if($sqlresult){
                    $resultobject = $this->fetch();
                    $instId = $resultobject["institution_id"];
                    $role = 1;
                    $status = "ACTIVE";

                    //add admin
                    $addingresult = $this->addNewUser($adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $instId, $adminprofile, $role, $status);

                    if($addingresult == true) {
                    	$successful = true;
                    }
                    
                 //echo "<center><h3 style='color:green'> Admin Insertion Successful "."</h3></center>" ;
                    }


                }
                //header("location:../login/");
           
            /* if query wasnt successful
            else {
                 echo "<center><h3 style='color:red'> Insertion Unsuccessful ". "</h3></center>" ;
            }*/
            return $successful;
       }   

//check if username is valid or already exists
       /*
          a function to validate username
          it checks if username exists in database
          it returns true if yes and false otherwise
         */
       function usernameexist($name){
            $success = false;  
            //$userdb = new DatabaseConnection; 
            $queryStatement = "SELECT * FROM users"; 
            $alluseraccount = $this->query($queryStatement);

            if($alluseraccount){
                    while ($value = $this->fetch()) {
                        if($value['username'] == $name){
                           $success = true;                      
                          //$GLOBALS['nameTaken'] = "username already exist";     
                        }                            
                    }
            }            
             return $success;
       }

//check if insitution name is valid or already exists
       function institutionnameexist($instname){
            $success = false;  
           // $institutiondb = new DatabaseConnection; 
            $queryStatement = "SELECT * FROM institution"; 
            $queryresult = $this->query($queryStatement);

            if($queryresult){
                    while ($value = $this->fetch()) {
                        if($value['name'] == $instname){
                           $success = true;                      
                          //$GLOBALS['nameTaken'] = "institution name already exist";     
                        }                            
                    }
            }            
             return $success;
       }

       //sql injection 

       function sqlinjection($string){
       
       $data = mysqli_real_escape_string($this->getconnection(), $string);
       return $data;
       }

       /*
          a function to load all majors from database
          */
        function loadInstitution() {
            //$loadmajor = new DatabaseConnection;
            $statement = "SELECT * FROM institution ORDER BY name ASC";
            $allinstitution = $this->query($statement);

            if($allinstitution){

                while ($value = $this->fetch()) {
                    echo '<option value ='.$value['institution_id'].'>'. $value['name']. '</option>';
                }
            }

        }

}
/*$user = new Registration;
 var_dump($user->addNewUser("pampa1", "loli", "NAME", "bolit", "password’ OR 1=1", 5, "image2wbmp", 2, "INACTIVE")); 
*/
?>