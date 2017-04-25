<!DOCTYPE html>
<?php
/**
 *@author Chris Asante
 *@version 1.0
 */
?>

<head>

    <title>Upload Notice</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">

    <script src="../assets/js/modernizr.js"></script>
</head>

<body>
<?php
require_once("../settings/core_ini.php");
include_once('../layout/adminheader.php');
verifyUserLogin();
require_once("../controller/uploadcontroller.php");

?>

<div id="blue">
    <div class="container">
        <div class=\"row\">
            <h3>Upload Ad</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->";



<!-- *****************************************************************************************************************
 PAGE CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb" style="margin-top: 20px">
    <div class="row">

        <div class="col-lg-8">
            <!-- Form Elements -->

            <!-- <div class="panel panel-default"> -->
            <!-- creating a form to accept user details-->
            <div class="panel-body">
                <div class="row">
                    <div class="myForm">
                        <form method="POST" action="" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" id="catType" name="catType">
                                    <?php displayCategories() ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" placeholder="Enter text" id="topic" name="subj">
                            </div>

                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" rows="3" id="comm" name="comment"></textarea>
                            </div>

                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" id="subFile" name="filename">
                            </div>

                            <div class="form-group">
                                <label>Send ad/post to</label>
                                <select class="form-control" id="notType" name="display">
                                    <option value="0">Please Select One</option>
                                    <option>PUBLIC</option>
                                    <option>INSTITUTION</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="subButton" onclick="validateForm()" name="submit" >Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <?php uploadstatus(); ?>
        </div>
        <!-- end page-wrapper -->
        <!-- </div> -->
        <!-- end wrapper -->
    </div><! --/col-lg-8 -->


</div><! --/row -->
</div><! --/container -->



<?php include_once('../layout/inst-footer.php'); ?>
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
<script src="../js/ajax.js"></script>
<script src="../js/uploadscript.js"></script>
<!-- end page-wrapper -->
<!-- </div> -->
<!-- end wrapper -->

</body>
</html>
