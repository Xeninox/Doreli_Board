<?php 
         /*
          name: isaac coffie
          web tech project
          date: april 4, 2017
         */
         // include database connection class
        include("../database/dbconnectclass.php");
      
        /*
          if login button is clicked, call the validlogin function
          */
        if (isset($_POST['login'])) {
           validlogin();     
        }

         /*
          if register button is clicked, call the validregister function
          */
        else if (isset($_POST['register'])) {
            echo "user registering";
            validregister();

        }
        /*
          if register institution button is clicked, call the register institution function
          */
        else if (isset($_POST['registerInstitution'])) {
            echo "admin registering";
            validateregisterinstitution();
        
   
        }


         /*
          a function to load all majors from database
          */
        function loadInstitution() {
            $loadmajor = new DatabaseConnection;
            $statement = "SELECT * FROM institution ORDER BY name ASC";
            $allmajor = $loadmajor->query($statement);

            if($allmajor){

                while ($value = $loadmajor->fetch()) {
                    echo '<option value ='.$value['institution_id'].'>'. $value['name']. '</option>';
                }
            }

        }

        /*
          a function to validate user inputs
          */
         function validlogin(){
            $name; $pword;
            $ok = true;
            if (!isset($_POST['username']) || $_POST['username'] === '') {
                $GLOBALS['loginnameError'] = "username is empty";
                $ok = false; 
            } else {
                $name = $_POST['username'];
            }

            if (!isset($_POST['password']) || $_POST['password'] === '') {
                $GLOBALS['loginpwordError'] = "password is empty";
                $ok = false;
            } else {
                $pword = $_POST['password'];
            }
              // if all is okay
            if($ok){
             verifylogin($name, $pword); 
            }
         }
          
          /*
          a function to verify that login details of a user is okay to login
          */
        function verifylogin($name, $pword){
            $userdb = new Dbconnection;
            $sql = "SELECT * FROM useraccount WHERE username = '$name'";
            $dbexecute =  $userdb->executeQuery($sql);

            if($dbexecute){
                $record = $userdb->getResult();
                if(password_verify($pword, $record['pwd'])){
                    //assign user details to session
                    session_start();
                         $_SESSION['username'] = $record['username'];
                         $_SESSION['userid'] = $record['userid'];
                         $_SESSION['perid'] = $record['per_id'];                                        
                    header("location:../index.php"); 
                }
                else{
                    $GLOBALS['loginError'] = "passowrd or username invalid";
                echo "<center><h3 style='color:red'>Login unsuccessful "."</h3></center>" ;
                }
            }

        }
          
          /*
          a function to validate user inputs
          */
        function validregister() {
               
                 $name; $pword; $image; $fname; $lname; $institution; $email;
                $ok = true;
             
                //validate username
                if (isset($_POST['uname']) && !empty($_POST["uname"])) {
                    if((1 === preg_match('~[0-9]~', $_POST["uname"])) ||
                     (1 === preg_match('~[^A-Za-z0-9]~', $_POST["uname"]))){                        
                     
                       $GLOBALS['nameError'] = "name must not contain numbers or symbols";
                    
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
                    if (!preg_match("/^(?=.*\d)(?=.*\W)(?=.*[A-Z]).{6,16}$/", $_POST['password'])){
                     $GLOBALS['pwordError'] = "Must contain at least one upper case, symbol,number and more than 6 characters";
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
                    if(1 === preg_match('~[0-9]~', $_POST["fname"]) || 
                        1 === preg_match('~[^A-Za-z0-9]~', $_POST["fname"])){
                     
                      $GLOBALS['fnameError'] = "fname must not contain numbers or symbols";
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
                    if(1 === preg_match('~[0-9]~', $_POST["lname"]) || 
                        1 === preg_match('~[^A-Za-z0-9]~', $_POST["lname"])){
                    
                      $GLOBALS['lnameError'] = "name must not contain numbers or symbols";
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
                if (isset($_POST['image']) && !empty($_POST["image"])) {
                    
                    $image = $_POST['image'];
                } 
                else{
                   $ok = false; 
                   $GLOBALS['imageError'] = "Kindly select image";
                }
                
                //if all validations has been checked
                if ($ok) {
                    echo "<br>"."string";
                    // check if username exists in database
                    if(checkusername($name) == false) {
                        //finally add new user
                        $role = 2;
                        $status = "INACTIVE";
                   addNewUser($name, $fname, $lname, $email, $pword, $institution, $image, $role, $status);
                     }
                 }      
        }
         

         /*
          a function to validate user inputs
          */
        function validateregisterinstitution() {
               
               //institution details
                 $name; $description; $address; $contact; $logo;
                 //admin details
                 $adminname; $adminfname; $adminlname; $adminpassword; $adminemail; $adminprofile;
                $ok = false;
        
                //validate institution name
                if (isset($_POST['instname']) && !empty($_POST["instname"])) {
                    if((1 === preg_match('~[A-Za-z]~', $_POST["instname"])))                       
                     {
                        $ok = true;
                        $name = htmlspecialchars($_POST['instname']) ;
                     }                    
                    else {
                          $GLOBALS['nameError'] = "name must not contain numbers or symbols";
                     }
                } 
    
                
                //validate description
                if (isset($_POST['description'])){
                    if(!empty($_POST["description"]))
                     {
                        $ok = true;
                        $description = htmlspecialchars($_POST['description']) ;
                     }                    
                    else {
                          $GLOBALS['descriptionError'] = "description is empty";
                     }
                } 
                // validate contact address
                if (isset($_POST['address'])){
                    if(!empty($_POST["address"])){
                        $ok = true;
                        $address = htmlspecialchars($_POST['address']) ;
                    }                  
                    else {
                          $GLOBALS['addressError'] = "address is empty";
                     }
                } 
                   

                //validate email
                if (isset($_POST['contact']) && !empty($_POST["contact"])) {
                    if (preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $_POST['contact']))
                    {
                        $ok = true;
                        $contact = htmlspecialchars($_POST['contact']);
                     
                    }
                    else {
                       $GLOBALS['contactError'] = "invalid email";
                     }
                }


                //validate logo
                if (isset($_POST['logo'])){
                    if(!empty($_POST["logo"])){
                        $ok = true;   
                      $logo = htmlspecialchars($_POST['logo']);
                    }

                    else{
                     $GLOBALS['logoError'] = "Kindly select logo";
                    }
                }

                //process admin registration

            if (isset($_POST['adminname']) && !empty($_POST["adminname"])) {
                 $adminname = $_POST['adminname'];
             }
             if (isset($_POST['fname']) && !empty($_POST["fname"])) {
                 $adminfname = $_POST['fname'];
             }
             if (isset($_POST['lname']) && !empty($_POST["lname"])) {
                 $adminlname = $_POST['lname'];
             }
             if (isset($_POST['adminpassword']) && !empty($_POST["adminpassword"])) {
                 $adminpassword = $_POST['adminpassword'];
             }
             if (isset($_POST['email']) && !empty($_POST["email"])) {
                 $adminemail = $_POST['email'];
             }
             if (isset($_POST['adminpic']) && !empty($_POST["adminpic"])) {
                 $adminprofile = $_POST['adminpic'];
             }

                //if all validations has been checked
                if ($ok) {
                    echo "<br>"."string";
                    // check if username exists in database
                    if(checkinstitutionname($name) == false) {
                        //finally add new user
                   addNewInstitution($name, $description, $address, $contact, $logo, $adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $adminprofile);
                     }
                 }
           
        }
         /*
          a function to add new user into user account table
         */
        function addNewUser($name, $fname, $lname, $email, $pword, $inst, $image, $role, $status){
             
             //create an instance of DB connection        
            $useraccount = new DatabaseConnection;
            //hash password for security purpose
            $pword = password_hash($pword, PASSWORD_DEFAULT);
            //write query statement
            $queryStatement = "INSERT INTO users (username, firstname, lastname, email, password, institution_id, profile_picture, role, status) VALUES ('$name', '$fname', '$lname', '$email', '$pword', '$inst', '$image','$role','$status')";
            // execute query
            $useraccount = $useraccount->query($queryStatement);
             
             //if query was successful
            if($useraccount){
                echo "<center><h3 style='color:green'>Insertion Successful "."</h3></center>" ;
                //header("location:../login/");
            }
            // if query wasnt successful
            else {
                 echo "<center><h3 style='color:red'> Insertion Unsuccessful ". "</h3></center>" ;
            }
       }


/*
          a function to add new user into user account table
         */
        function addNewInstitution($name, $description, $address, $contact, $logo, $adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $adminprofile){
             
             //create an instance of DB connection        
            $dbinstitution = new DatabaseConnection;
            //write query statement
            $queryStatement = "INSERT INTO institution (name, description, address, contact, logo) VALUES ('$name', '$description', '$address', '$contact', '$logo')";

            // execute query
            $queryresult = $dbinstitution->query($queryStatement);
             
             //if query was successful
            if($queryresult){
                echo "<center><h3 style='color:green'> Institution Insertion Successful "."</h3></center>" ;

                //proceed to register the admin
                $sql = "SELECT * FROM institution WHERE name = '$name' LIMIT 1";
                $sqlresult = $dbinstitution->query($sql);
                if($sqlresult){
                    $resultobject = $dbinstitution->fetch();
                    $instId = $resultobject["institution_id"];
                    $role = 1;
                    $status = "ACTIVE";

                    //add admin
                    addNewUser($adminname, $adminfname, $adminlname, $adminemail, $adminpassword, $instId, $adminprofile, $role, $status);
                    
                 echo "<center><h3 style='color:green'> Admin Insertion Successful "."</h3></center>" ;
                    }


                }
                //header("location:../login/");
           
            // if query wasnt successful
            else {
                 echo "<center><h3 style='color:red'> Insertion Unsuccessful ". "</h3></center>" ;
            }
       }

        /*
          a function to validate username
          it checks if username exists in database
          it returns true if yes and false otherwise
         */
       function checkusername($name){
            $success = false;  
            $userdb = new DatabaseConnection; 
            $queryStatement = "SELECT * FROM users"; 
            $alluseraccount = $userdb->query($queryStatement);

            if($alluseraccount){
                    while ($value = $userdb->fetch()) {
                        if($value['username'] == $name){
                           $success = true;                      
                          $GLOBALS['nameTaken'] = "username already exist";     
                        }                            
                    }
            }            
             return $success;
       }

    function checkinstitutionname($instname){
            $success = false;  
            $institutiondb = new DatabaseConnection; 
            $queryStatement = "SELECT * FROM institution"; 
            $queryresult = $institutiondb->query($queryStatement);

            if($queryresult){
                    while ($value = $institutiondb->fetch()) {
                        if($value['name'] == $instname){
                           $success = true;                      
                          $GLOBALS['nameTaken'] = "institution name already exist";     
                        }                            
                    }
            }            
             return $success;
       }

 ?>
