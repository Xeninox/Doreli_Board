<?php 

        /**
        *@author Isaac Coffie 
        *@version Version 1.0
        */

        //include registration class 

        require_once("../classes/registratoinclass.php");

        //declare variables to store data from form elements
        $name; $pword; $image; $fname; $lname; $institution; $email; $status;

         /*
          if register button is clicked, call the signup function to register user
          */
         if (isset($_POST['register'])) 
         {
            signup();
         }

         /*
          if register institution button is clicked, call the register institution function
          */
         else if (isset($_POST['registerInstitution']))
          {
            echo "admin registering";
            validateregisterinstitution();
          }


        /**
        *a function to Signup user
        *it returns success or error message after trying to register user
        */

        function signup()
        {
          global $status;  //error or success status

        	$user = new Registration;  // create instance of Registration class

          // check if validation was successful
        	if(validregister()){

            	// check if username is okay to use
        		if($user->usernameexist($GLOBALS['name']) == false) {

              //set permission priviledges and finally register user
              $role = 2; 
              $userstatus = "INACTIVE";

                      // call addnewuser function from Registration class 
                      // set status to 1 if adding was successful and 2 if there was an error
                   if($user->addNewUser($GLOBALS['name'], $GLOBALS['fname'], $GLOBALS['lname'], $GLOBALS['email'], $GLOBALS['pword'], $GLOBALS['institution'], $GLOBALS['image'], $role, $userstatus))
                    {
                   	 $status = 1;  
                   	 clearFormElements(); // clear content from form
                    } else {
                      $status = 2;
                    }
               }
                
                //if username is already taken
            else{
                	$GLOBALS['nameTaken'] = "username already exist";    
                }

        	}
        } 


          /**
          *a function to prefill dropdown with institutions from database
          *@return institution name(s) from database or null
          */
        function populateInstitution()
        {
          $user = new Registration;
          $user->loadInstitution();
        }
 

         /**
          *a function to display error or success message upon registration
          */
         function signupstatus()
         {
            if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 1) {
            	echo "<center><h2 style='color:green'>Registration Successful </h2></center> <br>
            	<h4 style='color:green'>You will be redirected to login pages in a few seconds<h4>";
                header("Refresh:2; URL=../login/login.php");
            }
            else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 2) {
                echo "<center><h2 style='color:red'> Registration Unsuccessful </h2></center>" ;
            }
            else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 3) {
                echo "<center><h2 style='color:red'> Validation Unsuccessful. Kindly provide valid data </h3></center>" ;
            }
         }

      /**
      *a function to clear input fields
      */
        function clearFormElements()
        {
              $_POST["uname"] = "";
              $_POST["fname"] = "";
              $_POST["lname"] = "";
              $_POST["email"] = "";
              $_POST["password"] = "";
              $_POST["institution"] = "";
              $_POST["image"] = ""; 
        }

    /**
    *a function to upload user picture
    *@param $filename filename of the input field
    *@return $image upon successfull upload otherwise null  
    */
        function uploadProfilePicture($filename){
          $image = null;
          $tempImage = addslashes($_FILES[$filename]['tmp_name']);
          $imageName = addslashes($_FILES[$filename]['name']);
          $getimage = addslashes(file_get_contents($tempImage));
          //$image = base64_encode($tempImage);
          return $getimage;
        }



         /**
          *a function to validate user inputs
          *@return true if form was validated and false otherwise
          */
         function validregister() {
         	global $name; global $fname; global $lname; global $email; global $pword; global $institution; global $image;
               
                $ok = true;
             
                //validate username
                if (isset($_POST['uname']) && !empty($_POST["uname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['uname'])){
                      $GLOBALS['nameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $name = $_POST['uname'];                   
                    
                     }
                } 
                else{
                   $ok = false; 
                }

               //validate password
                if (isset($_POST['password']) && !empty($_POST["password"])) {
                    if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z]).{6,16}$/", $_POST['password'])){
                     $GLOBALS['pwordError'] = "Weak password: must contain at least a letter, number and more than 6 characters";
                     $ok = false;
                    }
                    else {
                    $pword = $_POST['password'];
                     }
                } 
                else{
                   $ok = false; 
                }

                //validate first name
                if (isset($_POST['fname']) && !empty($_POST["fname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['fname'])){
                      $GLOBALS['fnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $fname = $_POST['fname'];
                     }
                } 
                else{
                   $ok = false; 
                }

                //validate last name
                if (isset($_POST['lname']) && !empty($_POST["lname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['lname'])){
                      $GLOBALS['lnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $lname = $_POST['lname'];
                     }
                } 
                else{
                   $ok = false; 
                }
                   

                //validate email
                if (isset($_POST['email']) && !empty($_POST["email"])) {
                    if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['email'])){
                     $GLOBALS['emailError'] = "invalid email";
                     $ok = false;
                    }
                    else {
                    $email = $_POST['email'];
                     }
                } 
                else{
                   $ok = false; 
                }

                //validate institution
                if (isset($_POST['institution']) && !empty($_POST["institution"])) {
                    if($_POST["institution"] == "none"){
                      $GLOBALS['institutionError'] = "Kindly select institution";
                     $ok = false;
                    }
                    else {
                    $institution = $_POST['institution'];
                     }
                } 
                else{
                   $ok = false; 
                }

                //validate image
                if(isset($_FILES['image']) && !empty($_FILES["image"]['tmp_name'])) {
                  
                    $image = uploadProfilePicture('image');
                    if($image == null){
                     $ok = false;
                    }
                } 
                else{
                   $ok = false; 
                   $GLOBALS['imageError'] = "Kindly select your image";
                }
                
              return $ok;
        }

    
          /*
          a function to validate user inputs
          */
        function validateregisterinstitution() {
               
               //institution details
                 $instname; $description; $address; $contact; $logo;
                 //admin details
                 $adminname; $adminfname; $adminlname; $adminpassword; $adminemail; $adminprofile;
                $ok = true;
                 global $status;  //error or success status

                //////////////////
                //validate institution name
                if (isset($_POST['instname']) && !empty($_POST['instname'])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['instname'])){
                      $GLOBALS['instnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $instname = htmlspecialchars($_POST['instname']);
                     }
                } 
                else{
                   $ok = false; 
                }                 
                //validate description
                if (isset($_POST['description']) && !empty($_POST['description']))
                {
                    $description = htmlspecialchars($_POST['description']) ;
                } else{
                   $ok = false; 
                }                    
                    
                // validate contact address
                if (isset($_POST['address']) && !empty($_POST['address']))
                {
                    $address = htmlspecialchars($_POST['address']) ;
                } else{
                   $ok = false; 
                }                  
                 
                //validate email
                if (isset($_POST['contact']) && !empty($_POST['contact'])) {
                    if (preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['contact']))
                    {  
                        $contact = htmlspecialchars($_POST['contact']);
                    }
                    else {
                      $ok = false;
                       $GLOBALS['contactError'] = "invalid institution email";
                     }
                }
                    
                
                //validate institution logo
                if(isset($_FILES['logo']) && !empty($_FILES["logo"]['tmp_name'])) {
                  
                    $logo = uploadProfilePicture('logo');
                    if($logo == null){
                     $ok = false;
                    }
                } 

                else{
                      $ok = false;
                     $GLOBALS['logoError'] = "Kindly upload logo";
                    }
                  
                //////////////////////////////////////////////////////////////////////////////////////
                //VALIDATE REGISTRATION OF ADMIN

                 //validate admin name
                if (isset($_POST['adminname']) && !empty($_POST["adminname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['adminname'])){
                      $GLOBALS['adminnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $adminname = htmlspecialchars($_POST['adminname']);                   
                     }
                } 
                else{
                   $ok = false; 
                }
                     
               //validate password
                if (isset($_POST['adminpassword']) && !empty($_POST["adminpassword"])) {
                    if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z]).{6,16}$/", $_POST['adminpassword'])){
                     $GLOBALS['adminpwordError'] = "Weak password: must contain at least an upper and lower case letter, number and more than 6 characters";
                     $ok = false;
                    }
                    else {
                    $adminpassword = $_POST['adminpassword'];
                     }
                } 
                else{
                   $ok = false; 
                }
                   
                //validate first name
                if (isset($_POST['fname']) && !empty($_POST["fname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['fname'])){
                      $GLOBALS['adminfnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $adminfname = htmlspecialchars($_POST['fname']);
                     }
                } 
                else{
                   $ok = false; 
                }
                  
                //validate last name
                if (isset($_POST['lname']) && !empty($_POST["lname"])) {
                    if(0 === preg_match('/^[a-zA-Z0-9 _-]*$/', $_POST['lname'])){
                      $GLOBALS['adminlnameError'] = "name must contain numbers, letters, space, hyphen or underscore";
                     $ok = false;
                    }
                    else {
                    $adminlname = htmlspecialchars($_POST['lname']);
                     }
                } 
                else{
                   $ok = false; 
                }
                   

                //validate email
                if (isset($_POST['email']) && !empty($_POST["email"])) {
                    if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['email'])){
                     $GLOBALS['adminemailError'] = "invalid email";
                     $ok = false;
                    }
                    else {
                    $adminemail = $_POST['email'];
                     }
                } 
                else{
                   $ok = false; 
                }

                
                //validate image
                if(isset($_FILES['adminpic']) && !empty($_FILES["adminpic"]['tmp_name'])) {
                  
                    $adminprofile = uploadProfilePicture('adminpic');
                    if($adminprofile == null){
                     $ok = false;
                    }
                } 
                else{
                   $ok = false; 
                   $GLOBALS['adminimageError'] = "Kindly select image";
                }

                
            ////////////////////////////////////////////////////////////////////////////////////////

                //if all validations has been checked
                if ($ok) {
                    
                    //create an instance of Registration class
                    $admin = new Registration;

                    // check if username and institution name exists in database
                    if($admin->institutionnameexist($instname) == false){
                      if($admin->usernameexist($adminname) == false) {

                        //finally register institution and admin
                        //check if insertion was successful
                        if($admin->addNewInstitution($instname, $description, $address, $contact, $logo, $adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $adminprofile))
                        {
                           $status = 1;  
                           clearFormElements(); // clear content from form
                        } else{
                           $status = 2;
                        }

                      }else{
                      $GLOBALS['adminnameTaken'] = "admin name already exist";
                     } 


                     }else{
                      $GLOBALS['instnameTaken'] = "institution name already exist";
                     }
                 }  
                 // if validation fails
                 else{
                  $status = 3;
                 } 
        }

        

        
 ?>