<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Signup for Doreli</title>

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
    
    <script src="assets/js/modernizr.js"></script>
  </head>

  <body>
  <?php require_once("../controller/registrationcontroller.php"); ?>
  <?php //require_once("../unsecure/processunsecure.php"); ?>
    <?php //require('../settings/initialization.php');?>

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
          <a class="navbar-brand" href="index.html">Doreli.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div id="headerwrap">
	    <div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<h3 style="color: #000">Online Notice Board</h3>
	              	<p style="color: #fff; font-size: 150%; padding: 3% 0%">Doreli Board is an online advertising board that is used by any institution to transmit information to its members. Doreli Board has made it easier to transmit information in the company by alerting members of the company whenever a message is sent. 
	              	</p>
	              	<div>
	              		<!-- display signup error or success message -->
                         <?php signupstatus();?>
                         
	              	</div>				
				</div>
				<div class="col-md-4 col-sm-6">
                <div class="login-panel panel panel-default" style="background-color: transparent">                  
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color: #fff">Please Sign Up</h3>
                    </div>
                    <div class="panel-body"> 


                        <form method="POST" action="">
                            <fieldset>

                                <div class="form-group">                       
                                    <input class="form-control" placeholder=" Pick a username" name="uname" type="text" id="name" value= "<?php if(isset($_POST["uname"]) && !empty($_POST["uname"])) echo $_POST["uname"];?>" required autofocus>
                                    <span style="color: red"> <?php if(isset($GLOBALS['nameError'])){ echo $GLOBALS['nameError']; }?></span>
				                    <span style="color: red"> <?php if(isset($GLOBALS['nameTaken'])){ echo $GLOBALS['nameTaken']; }?></span>
                                </div>


                                <div class="form-group">            
                                    <input class="form-control" placeholder=" first name" name="fname" type="text" id="fname" value= "<?php if(isset($_POST["fname"]) && !empty($_POST["fname"])) echo $_POST["fname"];?>" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['fnameError'])){ echo $GLOBALS['fnameError']; }?></span>
                                </div>


                                <div class="form-group">                            
                                    <input class="form-control" placeholder=" last name" name="lname" type="text" id="lname" value= "<?php if(isset($_POST["lname"]) && !empty($_POST["lname"])) echo $_POST["lname"];?>" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['lnameError'])){ echo $GLOBALS['lnameError']; }?></span>
                                </div>


                                <div class="form-group">                          
                                   <input class="form-control" placeholder="Email" name="email" type="email" id="mail" value= "<?php if(isset($_POST["email"]) && !empty($_POST["email"])) echo $_POST["email"];?>" required>
				                    <span style="color: red"> <?php if(isset($GLOBALS['emailError'])){ echo $GLOBALS['emailError']; }?></span>
                                </div>


                                <div class="form-group">                      
                                    <input class="form-control" placeholder="Password" name="password" type="password" id="pswd" value="" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['pwordError'])){ echo $GLOBALS['pwordError']; }?></span>	
                                </div>


                                <div class="form-group">                       
                                <select id="drop" class="form-control" name="institution">
                                <option value="0">Select Institution</option>
                               <!-- Load from database -->
                                <?php populateInstitution();?>
                                </select>
                                <span style="color: red"> <?php if(isset($GLOBALS['institutionError'])){ echo $GLOBALS['institutionError']; }?></span>
                                </div>


                                <div class="form-group">
                                	 <label for="#imageName">Browse profile picture </label>
        							 <input type="file" name="image" id="imageName">
        							 <span style="color: red"> <?php if(isset($GLOBALS['imageError'])){ echo $GLOBALS['imageError']; }?></span>
                                </div>      

                                <button name="register" type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button><br>
                                <a href="../login.php" style="color: #fff; text-align: center; font-size: 100%">Already a Member? Sign in</a>

                            </fieldset>
                        </form>
                    </div>
                </div>
                </div>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->

	
	

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Some Ave, 987,<br/>
		 				23890, New York,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><!--/row -->
	 	</div><!--/container -->
	 </div><!--/footerwrap -->
	 
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


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
  </body>
</html>