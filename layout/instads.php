<?php  require_once('../controller/InstitutionAdsController.php');
require_once('../controller/CategoriesController.php');
$user_inst_array = getUserInstituion();
$user_inst = $user_inst_array['name'];
echo "<div id=\"blue\">
    <div class=\"container\">
        <div class=\"row\">
            <h3>$user_inst Ads</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->";
?>



<!-- *****************************************************************************************************************
 BLOG CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">

        <! --POSTS LIST -->
        <div class="col-md-8 col-lg-8" id="con">

            <?php ;
            $num_upload = getNumUploadForInstitution();
            $actual_num_upload = $num_upload["COUNT(*)"];
            if ($actual_num_upload == 0){
                echo "<h4 style='color: black;'>Sorry, We have No Ads At This Time</h4>";
                echo "<img src=\"../image/sad.png\" style='height: 250px;'>";
            } else {
                $array = getAllInstutionAds();
                foreach ($array as $item) {
                    $ad_id = $item['id'];
                    $category = $item['cat_id'];
                    $subject = $item['subject'];
                    $comment = $item['comment'];
                    $poster = $item['ad_file'];
                    $encoded_image = base64_encode($poster);
                    $date = $item['date_added'];
                    $user_id = $item['user_id'];
                    $username_array = fetchUsername();
                    $username = $username_array['username'];
                    $newdate = date('d F Y', strtotime($date));

                    echo "
            <! -- Post 1 -->
            <!-- You can use this code at the php part to display the reults. Provide the subject, picture,
            date posted, username of user who posted and the comment(content) if available.
            I have limited the notice types to text and images only. if it is text, remove the image tag and display just the subject and comment(content)-->
            <div class=\"col-md-6\">
        <a href=\"#\" class=\"thumbnail\">
             <p><img class=\"img-responsive\" src=\"data:image;base64, {$encoded_image}\" id='image' style='height: 200px;'></p>
            <h3 class=\"ctitle\" id='sub'>$subject</h3>
            <form action = \"viewaddetails.php\" method = \"post\" style =\"background: none\"> 
            <button type='submit' name='viewad' value = \"$ad_id\" class=\"btn btn-warning btn-block\">View Ad</button> 
            </form><br>
        </a>
    </div>
        <! --/col-lg-8 -->";
                }
            }

            ?>
        </div>

        <! -- SIDEBAR -->
        <div class="col-md-8 col-lg-3">

            <h4 style="color: black;">Categories</h4>
            <div class="hline"></div>
            <?php
            $inst_id = $_SESSION['institution_id'];
            $cat_array = getAllCategories();
            foreach ($cat_array as $cat){
                $cat_id = $cat['cat_id'];
                $cat_name = $cat['cat_name'];
                echo "<p onclick= \"getAllCatAds($cat_id, $inst_id)\"><a href=\"#\"><i class=\"fa fa-angle-right\"></i> $cat_name</a> </p>";
            }

            ?>

        </div>

    </div><! --/row -->
</div><! --/container -->
