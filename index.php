<?php
/**
 *@author Isaac Coffie
 *@version 1.0
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

    <title>Welcome to Doreli</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    <script src="js/modernizr.js"></script>
  </head>

  <body>

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
          <a class="navbar-brand" href="">Doreli Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">HOME</a></li>
            <li ><a href="pages/about.php">ABOUT</a></li>
            <li><a href="pages/contact.php">CONTACT</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="register/signup.php">SIGNUP</a></li>
                <li><a href="login/login.php">LOGIN</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div id="headerwrap" style="height: 100vh">
	    <div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-offset-2">
				<br><br>
					
					<h1>...Taking Notice Board Digital</h1>
					<h3>Doreli Board is an online advertising board that institutions use to transmit information to its members.</h3>
					<h5>Welcome to our awesome platform</h5>				
				</div>
				<div class="col-md-4 col-lg-offset-2">
				<br><br><br>
				</div>
				</div> <!-- /row -->

                <div class="row">
                <div class="col-md-2"></div>
 				<div class="col-md-4">
 					<p><br/><a href="register/signup.php" class="btn btn-theme btn-block">Signup Now</a></p>
 				</div>
 				<div class="col-md-4">
 					<p><br/><a href="login/login.php" class="btn btn-theme btn-block">Or Login</a></p>
 				</div>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->

	<div class="container" style="height: 100vh">
	<div class="row">
        <div class="col-lg-10 col-lg-offset-2 himg">
			<img src="image/browser.png" class="img-responsive">
		</div>
	</div>
	</div>

	<!-- *****************************************************************************************************************
	 OUR CLIENTS
	 ***************************************************************************************************************** -->
	 <div id="headerwrap" style="height: 100vh; background: #00b3fe ">
		 <div class="container">
		 	<div class="row centered">
			 	<h1>OUR CLIENTS</h1>
			 	<h3>Meet our amazing clients and experience more...</h3>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="image/clients/accessbank.jpg" class="img-responsive">
			 		<h3>Access Bank Ghana</h3>
				
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="image/clients/ecobank.jpg" class="img-responsive">
			 		<h3>The Pan African Bank</h3>
				
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="image/clients/ASAS.jpeg" class="img-responsive">
			 		<h3>Ashesi University College</h3>
				
			 	</div>
			 	<div class="col-lg-3 col-md-3 col-sm-3">
			 		<img src="image/clients/MTN.jpg" class="img-responsive">
			 		<h3> MTN: The Teleco Gaint</h3>
				
			 	</div>
		 	</div><! --/row -->
		 </div><! --/container -->
	 </div><! --/cwrap -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About Doreli</h4>
                <div class="hline-w"></div>
                <p>Doreli Board is an online advertising board that is used by any institution to transmit information to its members. Doreli Board has made it easier to transmit information in the company by alerting members of the company whenever a message is sent.</p>
            </div>
            <div class="col-lg-4">
                <h4>Social Links</h4>
                <div class="hline-w"></div>
                <p>
                    <a href=""><i class="fa fa-dribbble"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-tumblr"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Our Address</h4>
                <div class="hline-w"></div>
                <p>
                    Ashesi University College<br/>
                    1 University Avenue,<br/>
                    Berekuso Ghana.<br/>
                </p>
            </div>

        </div><! --/row -->
    </div><! --/container -->
	 </div><!--/footerwrap -->
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/retina-1.1.0.js"></script>
	<script src="js/jquery.hoverdir.js"></script>
	<script src="js/jquery.hoverex.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
  	<script src="js/jquery.isotope.min.js"></script>
  	<script src="js/custom.js"></script>
  
  </body>
</html>
