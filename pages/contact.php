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

    <title>contact us</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <style>
    	#contactwrap {
	background: url(../image/contact.jpg) no-repeat center top;
	margin-top: -60px;
	padding-top:0px;
	text-align:center;
	background-attachment: relative;
	background-position: center center;
	min-height: 400px;
	width: 100%;
	
    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
    </style>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>
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
          <a class="navbar-brand" href="../">Doreli Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="../">HOME</a></li>
            <li ><a href="about.php">ABOUT</a></li>
            <li class="active"><a href="contact.php">CONTACT</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../register/signup.php">SIGNUP</a></li>
                <li><a href="../login/login.php">LOGIN</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Contact Doreli</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 CONTACT WRAP
	 ***************************************************************************************************************** -->

	 <div id="contactwrap"></div>
	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-8">
	 			<h4>Just Get In Touch!</h4>
	 			<div class="hline"></div>
		 			<p>Doreli Board is an online advertising board that is used by any institution to transmit information to its members. </p>
		 			<form role="form">
					  <div class="form-group">
					    <label for="InputName1">Your Name</label>
					    <input type="email" class="form-control" id="exampleInputEmail1">
					  </div>
					  <div class="form-group">
					    <label for="InputEmail1">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail1">
					  </div>
					  <div class="form-group">
					    <label for="InputSubject1">Subject</label>
					    <input type="email" class="form-control" id="exampleInputEmail1">
					  </div>
					  <div class="form-group">
					  	<label for="message1">Message</label>
					  	<textarea class="form-control" id="message1" rows="3"></textarea>
					  </div>
					  <button type="submit" class="btn btn-theme">Submit</button>
					</form>
			</div><! --/col-lg-8 -->
	 		
	 		<div class="col-lg-4">
		 		<h4>Our Address</h4>
		 		<div class="hline"></div>
		 			
                <p>
                    Ashesi University College<br/>
                    1 University Avenue,<br/>
                    Berekuso Ghana.<br/>
                </p>
		 			<p>
		 				Email: hello@Dorelitheme.com<br/>
		 				Tel: +34 8493-4893
		 			</p>
		 			<p>Doreli Board is an online advertising board that is used by any institution to transmit information to its members. </p>
	 		</div>
	 	</div><! --/row -->
	 </div><! --/container -->




    <?php include_once('../layout/footer.php'); ?>
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
