<?php

/**
 *@author Isaac Coffie
 *@version Version 1.0
 */

//include database connection class 

require_once("../database/dbconnectclass.php");

/**
*a class to handle registration
*/

class Registration extends DatabaseConnection
{


    /**
    *a function to add new user into user account table (registering a user)
    *@param $name user name
    *@param $fname user first name
    *@param $lname user last name
    *@param $email user email
    *@param $pword user password
    *@param $inst institution id
    *@param $image user profile picture
    *@param $role user role
    *@param $status user status
    *@return retruns true if registration was success and false otherwise
    */
    function addNewUser($name, $fname, $lname, $email, $pword, $inst, $image, $role, $status){

        $name = $this->sqlinjection($name);
        $fname = $this->sqlinjection($fname);
        $lname = $this->sqlinjection($lname);
        $email = $this->sqlinjection($email);
        $pword = $this->sqlinjection($pword);
        $inst = $this->sqlinjection($inst);
        $role = $this->sqlinjection($role);
        $status = $this->sqlinjection($status);

        //hash password for security purpose
        $hashedpword = password_hash($pword, PASSWORD_DEFAULT);

        //write query statement
        $queryStatement = "INSERT INTO users (username, firstname, lastname, email, password, institution_id, profile_picture, role, status) VALUES ('$name', '$fname', '$lname', '$email', '$hashedpword', '$inst', '$image','$role','$status')";

        // execute query
        $useraccount = $this->query($queryStatement);

        //if query was successful
        if($useraccount){
            return true;
            
        }
        // if query wasnt successful
        else {
            return false;
        }
    }  // end of function

    /**
    *a function to add new user into user account table (registering a user)
    *@param $name institution name
    *@param $description brief description of institution
    *@param $address institution address
    *@param $contact institution email
    *@param $logo institution logo
    *@param $adminname institution admin username
    *@param $adminprofile admin profile picture
    *@param $adminlname admin  last name
    *@param $adminemail admin email
    *@param $adminpassword admin password
    *@return retruns true if registration was success and false otherwise
    */
    function addNewInstitution($name, $description, $address, $contact, $logo, $adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $adminprofile){

        $successful = false;

        //write query statement
        $queryStatement = "INSERT INTO institution (name, description, address, contact, logo) VALUES ('$name', '$description', '$address', '$contact', '$logo')";

        // execute query
        $queryresult = $this->query($queryStatement);

        //if adding institution was successful
        if($queryresult){
            $successful = true;

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
            }


        }
        return $successful;
    }  // end of function

    /**
    *a function to checks if username exists in database
    *@param $name user name
    *@return returns true if name exists in db and false otherwise
    */
    function usernameexist($name){
        $success = false;
        
        $queryStatement = "SELECT * FROM users";
        $alluseraccount = $this->query($queryStatement);

        if($alluseraccount){
            while ($value = $this->fetch()) {
                if($value['username'] == $name){
                    $success = true;    
                }
            }
        }
        return $success;
    }  // end of function

   /**
    *a function to checks if institution name exists in database
    *@param $instname institution name
    *@return returns true if name exists in db and false otherwise
    */
    function institutionnameexist($instname){
        $success = false;
       
        $queryStatement = "SELECT * FROM institution";
        $queryresult = $this->query($queryStatement);

        if($queryresult){
            while ($value = $this->fetch()) {
                if($value['name'] == $instname){
                    $success = true;
                    
                }
            }
        }
        return $success;
    }  // end of function

    
   /**
    *a function to handle sql injection
    *@param $string string data
    *@return returns escapred data or null if error occurs
    */
    function sqlinjection($string){

        $data = mysqli_real_escape_string($this->getconnection(), $string);
        return $data;
    }  // end of function

      /**
       *a function to load all majors from database
       *@return returns all institution name array in html dropdown
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

    }  // end of function

} // end of class 

?>