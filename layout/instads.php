<?php  require_once('../controller/InstitutionAdsController.php');
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
        <div class="col-lg-8">

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
                    $username_array = getUsername();
                    $username = $username_array['username'];
                    $newdate = date('d F Y', strtotime($date));

                    echo "
            <! -- Post 1 -->
            <!-- You can use this code at the php part to display the reults. Provide the subject, picture,
            date posted, username of user who posted and the comment(content) if available.
            I have limited the notice types to text and images only. if it is text, remove the image tag and display just the subject and comment(content)-->
            <p><img class=\"img-responsive\" src=\"data:image;base64, {$encoded_image}\"></p>
            <h3 class=\"ctitle\">$subject</h3>
            <p><csmall>Posted: $newdate</csmall> | <csmall2>By: $username </csmall2></p>
            <p>$comment</p>
            <button type='submit' name='viewad' value = \"$ad_id\" class=\"btn btn-warning btn-block\">View Ad</button> <br>
            <div class=\"hline\"></div>
            <div class=\"spacing\"></div>
        <! --/col-lg-8 -->";
                }
            }

            ?>
        </div>

        <! -- SIDEBAR -->
        <div class="col-lg-4">
            <h4 style="color: black;">Search</h4>
            <p>
                <br/>
                <input type="text" class="form-control" placeholder="Search something">
            </p>

            <div class="spacing"></div>

            <h4 style="color: black;">Categories</h4>
            <div class="hline"></div>
            <p><a href="#"><i class="fa fa-angle-right"></i> Entertainment</a> </p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Business</a></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Politics</a> </p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Sports</a> </p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Social Issues</a> </p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Technology</a> </p>

            <div class="spacing"></div>

            <!-- The tags are based on the subject and comment common -->
            <h4>Popular Tags</h4>
        </div>

    </div><! --/row -->
</div><! --/container -->