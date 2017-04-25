<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Doreli - Bootstrap 3 Theme</title>

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
<?php require_once("../controller/registrationcontroller.php"); ?>

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
          <a class="navbar-brand" href="../">Doreli.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="../">HOME</a></li>
            <li><a href="../pages/about.php">ABOUT</a></li>
            <li><a href="../pages/contact.php">CONTACT</a></li>
            <<li><a href="../login/login.php">LOGIN</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">MORE <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="signup.php">JOIN INSTITUTION</a></li>
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
	    <div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<h3 style="color: #000">Online Notice Board</h3>
	              	<p style="color: #fff; font-size: 150%; padding: 3% 0%">Doreli Board is an online advertising board that is used by any institution to transmit information to its members. Doreli Board has made it easier to transmit information in the company by alerting members of the company whenever a message is sent. 
	              	</p>	
	              	<div>
	              		<!-- display signup error or success message -->
                         <?php signupstatus();?>
	              	</div>				
				</div>
				<div class="col-md-6">

                <div class="login-panel panel panel-default" style="background-color: transparent">                  
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color: #000" >Register Your Institution</h3>
                    </div>
                    <div class="panel-body">
                        <form  method="POST" action="" enctype="multipart/form-data">
                            <fieldset>
                            <legend>Institution Details</legend>
                            		<div class="form-group">
                                    <input class="form-control" placeholder=" institution name" name="instname" type="text" value= "<?php if(isset($_POST["instname"]) && !empty($_POST["instname"])) echo $_POST["instname"];?>" required autofocus>
                                    <span style="color: red"> <?php if(isset($GLOBALS['instnameError'])){ echo $GLOBALS['instnameError']; }?></span>
				                    <span style="color: red"> <?php if(isset($GLOBALS['instnameTaken'])){ echo $GLOBALS['instnameTaken']; }?></span>
                                   </div>
                                
                                
                                
                                 <div class="form-group">								
 	                            <textarea class="form-control" rows="5" name="description" placeholder="brief description of your institution" required><?php if(isset($_POST["description"]) && !empty($_POST["description"])) echo $_POST["description"];?></textarea>
                                 </div>

                                 <div class="form-group">				
 	                            <textarea class="form-control" rows="5" name="address" placeholder="institution address" required><?php if(isset($_POST["address"]) && !empty($_POST["address"])) echo $_POST["address"];?></textarea>
                                 </div>

                                 <div class="form-group">
                                    <input class="form-control" placeholder=" institution email" name="contact" type="email" value= "<?php if(isset($_POST["contact"]) && !empty($_POST["contact"])) echo $_POST["contact"];?>" required>
				                    <span style="color: red"> <?php if(isset($GLOBALS['contactError'])){ echo $GLOBALS['contactError']; }?></span>
                                   </div>

                                   <div class="form-group">
                                   <label for="#instlogo">upload institution logo </label>
        							 <input type="file" name="logo" id="instlogo">
        							 <span style="color: red"> <?php if(isset($GLOBALS['logoError'])){ echo $GLOBALS['logoError']; }?></span>
                                    
                                    </div>
                                </fieldset>

                                <!-- Admin Details -->
                                <fieldset>
                                <legend> Admin Details</legend>
                                 <div class="form-group">
                                    <input class="form-control" placeholder=" admin username" name="adminname" type="text" value= "<?php if(isset($_POST["adminname"]) && !empty($_POST["adminname"])) echo $_POST["adminname"];?>" required autofocus>
                                    <span style="color: red"> <?php if(isset($GLOBALS['adminnameError'])){ echo $GLOBALS['adminnameError']; }?></span>
				                    <span style="color: red"> <?php if(isset($GLOBALS['adminnameTaken'])){ echo $GLOBALS['adminnameTaken']; }?></span>
                                </div>
                                
                                <div class="form-group">                        
                                    <input class="form-control" placeholder="admin first name" name="fname" type="text" value= "<?php if(isset($_POST["fname"]) && !empty($_POST["fname"])) echo $_POST["fname"];?>" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['adminfnameError'])){ echo $GLOBALS['adminfnameError']; }?></span>
                                </div>

                                <div class="form-group">                            
                                    <input class="form-control" placeholder=" last name" name="lname" type="text" value= "<?php if(isset($_POST["lname"]) && !empty($_POST["lname"])) echo $_POST["lname"];?>" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['adminlnameError'])){ echo $GLOBALS['adminlnameError']; }?></span>
                                </div>
                                
                                <div class="form-group">                          
                                    <input class="form-control" placeholder=" admin Email" name="email" type="email" value= "<?php if(isset($_POST["email"]) && !empty($_POST["email"])) echo $_POST["email"];?>" required>
				                    <span style="color: red"> <?php if(isset($GLOBALS['adminemailError'])){ echo $GLOBALS['adminemailError']; }?></span>
                                </div>

                                <div class="form-group">                             
                                    <input class="form-control" placeholder="admin Password" name="adminpassword" type="password" required>
                                    <span style="color: red"> <?php if(isset($GLOBALS['adminpwordError'])){ echo $GLOBALS['adminpwordError']; }?></span>
                                </div>

                                <div class="form-group">
                                	 <label for="#imageName">Browse profile picture </label>
        							 <input type="file" name="adminpic" id="imageName">
        							 <span style="color: red"> <?php if(isset($GLOBALS['adminimageError'])){ echo $GLOBALS['adminimageError']; }?></span>
                                </div> 
                                   
                                <button name="registerInstitution" type="submit" class="btn btn-lg btn-primary btn-block">Register</button><br><br>
                                <a href="../login/login.php" style="color: #fff; text-align: center; font-size: 100%">Already Register? Sign in</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->


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
