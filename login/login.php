<?php
/**
**@author Selassie Golloh
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>login for Doreli</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="../js/modernizr.js"></script>
</head>

<body>
<?php require_once("../controller/logincontroller.php"); ?>

<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../">Doreli Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="../">HOME</a></li>
            <li><a href="../pages/about.php">ABOUT</a></li>
            <li><a href="../pages/contact.php">CONTACT</a></li>
             <li><a href="../register/signup.php">SIGNUP</a></li>       
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
        

<!-- *****************************************************************************************************************
 HEADERWRAP
 ***************************************************************************************************************** -->
<div id="headerwrap">

    <div class="container" style="margin-top:0px">
    <h3 style="font-weight: 25%">Login to See What Others are Doing</h3> <br>
            <?php loginstatus(); ?>

        <div class="row" style="height: 75vh;">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 col">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Log In Here</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action= "">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" value= "<?php if(isset($_POST["username"]) && !empty($_POST["username"])) echo $_POST["username"];?>" autofocus>
                                    <span style="color: red"> <?php if(isset($GLOBALS['usernameError'])){ echo $GLOBALS['usernameError']; }?></span><br>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value= "<?php if(isset($_POST["password"]) && !empty($_POST["password"])) echo $_POST["password"];?>" autofocus>
                                    <span style="color: red"> <?php if(isset($GLOBALS['pwdError'])){ echo $GLOBALS['pwdError']; }?></span> <br>
                                </div>
                                
                                
                                <input type= "submit" class="btn btn-lg btn-primary btn-block btn-theme" name="login" value = "Login">
                            </fieldset>
                        </form>
                        <h4>Don't have a doreli account? <a href="../register/signup.php">Sign up</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('../layout/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/retina-1.1.0.js"></script>
<script src="../js/jquery.hoverdir.js"></script>
<script src="../js/jquery.hoverex.min.js"></script>
<script src="../js/jquery.prettyPhoto.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>
