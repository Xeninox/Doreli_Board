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
          
          
 ?>
