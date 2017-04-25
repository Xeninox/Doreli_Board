<!DOCTYPE html>
<?php
/**
 *@author Chris Asante
 *@version 1.0
 */
?>

<head>

    <title>my post</title>

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
verifyUserLogin();
require_once("../layout/adminheader.php");
require_once('../controller/postcontroller.php');
?>

<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
        <div class="row">
            <h3>My Post</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->

<!-- *****************************************************************************************************************
 PAGE CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <?php uploadstatus(); ?>
        <div class="col-lg-8" id="con">
            <!-- Form Elements -->
            <?php
            $numUpload = getNumUploadForUser();
            $actualNumUpload = $numUpload["COUNT(*)"];

            if ($actualNumUpload == 0)
            {
                echo "<h4 style='color: black;'>Sorry, You haven't posted any ad</h4>";
                echo "<img src=\"../image/sad.png\" style='height: 250px;'>";
            }

            else
            {
                $array = allPosts();

                foreach ($array as $item)
                {
                    $ad_id = $item['id'];
                    $category = $item['cat_id'];
                    $subject = $item['subject'];
                    $comment = $item['comment'];
                    $poster = $item['ad_file'];
                    $display = $item['display'];
                    $encoded_image = base64_encode($poster);
                    $date = $item['date_added'];
                    $user_id = $item['user_id'];
                    $username_array = GetUsername($user_id);
                    $username = $username_array['username'];
                    $newdate = date('d F Y', strtotime($date));

                    echo "<div class=\"col-md-6\">
        <a href=\"#\" class=\"thumbnail\">
             <p><img class=\"img-responsive\" src=\"data:image;base64, {$encoded_image}\" id='image' style='height: 200px;'></p>
            <h3 class=\"ctitle\" id='sub'>$subject</h3>
            <p><csmall>Posted: $newdate</csmall> | <csmall2>By: $username </csmall2></p>
                                <p>$comment</p>
                                <form action = \"\" method = \"post\" style = \"background: none\">
                                <button type='submit' name='edit' value = \"$ad_id\" class=\"btn btn-primary btn-sm\">Edit Ad</button>

                                <button type='submit' name='delete' value = \"$ad_id\" class=\"btn btn-danger btn-sm \">Delete Ad</button>
                               </form>
                                <br>
        </a>
    </div>";
                }
            }
            ?>
            <!-- end page-wrapper -->
            <!-- </div> -->
            <!-- end wrapper -->
        </div><! --/col-lg-8 -->
        <div class="col-lg-4 col-md-4">
            <?php
            if (isset($_POST['edit'])) {
                $item = getAd($_POST['edit']);
                if($item != null)
                {
                    $ad_id = $item['id'];
                    $category = $item['cat_id'];
                    $subject = $item['subject'];
                    $comment = $item['comment'];
                    $poster = $item['ad_file'];
                    $display = $item['display'];

                    echo '
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                        <h3 class="panel-title">Update Ad Details</h3>
                    </div>
                    
                    <div class="panel-body">
                            <div class="myForm">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" id="catType" name="catType" required>
                                        ';
                    displayCategories($GLOBALS['category']);
                    echo '
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input class="form-control" id="topic" name="subj" value = "'.$subject.'" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="3" id="comm" name="comment" required>'.$comment.'</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Maintain file or upload new </label>
                                        <input type="file" id="subFile" name="filename">
                                    </div>

                                    <div class="form-group">
                                        <label>Send Notice to</label>
                                        <select class="form-control" id="dispAd" name="display" required>
                                            ';
                    echo'
                                            <option value= "PUBLIC"';
                    if ($display == "PUBLIC") { echo "selected";}
                    echo'>PUBLIC</option>';
                    echo' 
                                            <option value= "INSTITUTION"';
                    if ($display == "INSTITUTION") { echo "selected";}
                    echo ';
                                            >INSTITUTION</option>';
                    echo'     
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-lg btn-block" id="subButton" name="update" value = "'.$ad_id.'">Save Changes</button>
                                </form>
                            </div>
                        </div>
                     </div>   
                  ';
                }
            }
            ?>
        </div>



    </div><! --/row -->
</div><! --/container -->

<?php
//require_once("../layout/footer.php");
?>


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
<script type="text/javascript" src="../js/uploadscript.js"></script>
<!-- end page-wrapper -->
<!-- </div> -->
<!-- end wrapper -->

</body>
</html>
