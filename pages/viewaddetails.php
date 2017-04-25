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

    <title>Doreli Board - Accept Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

</head>

<body>

    <?php

     /** 
     * @author: Isaac Coffie
     * @version 1.0
     */

    include_once('../settings/core_ini.php');
        verifyUserLogin();
    include_once('../layout/adminheader.php');
    include_once('../layout/viewad.php'); 

    ?>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/retina-1.1.0.js"></script>
<script src="../js/jquery.hoverdir.js"></script>
<script src="../js/jquery.hoverex.min.js"></script>
<script src="../js/jquery.prettyPhoto.js"></script>
<script src="../js/jquery.isotope.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/ajax.js"></script>

</body>
</html>
