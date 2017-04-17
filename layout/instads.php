<?php  require_once('../controller/InstitutionAdsController.php');
$user_inst_array = getUserInstituion(2);
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
            $array = getAllInstutionAds(1);
            foreach ($array as $item) {
                $category = $item['category'];
                $subject = $item['subject'];
                $comment = $item['comment'];
                $poster = $item['ad_file'];
                $encoded_image = base64_encode($poster);
                $date = $item['date'];
                $user_id = $item['user_id'];
                $username_array = getUsername($user_id);
                $username = $username_array['username'];
                $newdate = date('d F Y', strtotime($date));

                echo "
            <! -- Post 1 -->
            <!-- You can use this code at the php part to display the reults. Provide the subject, picture,
            date posted, username of user who posted and the comment(content) if available.
            I have limited the notice types to text and images only. if it is text, remove the image tag and display just the subject and comment(content)-->
            <p><img class=\"img-responsive\" src=\"data:image/jpeg;base64, {$encoded_image}\"></p>
            <h3 class=\"ctitle\">$subject</h3>
            <p><csmall>Posted: $newdate</csmall> | <csmall2>By: $username </csmall2></p>
            <p>$comment</p>
            <div class=\"hline\"></div>

            <div class=\"spacing\"></div>
        <! --/col-lg-8 -->";
            }
            ?>
        </div>

        <! -- SIDEBAR -->
        <div class="col-lg-4">
            <h4>Search</h4>
            <div class="hline"></div>
            <p>
                <br/>
                <input type="text" class="form-control" placeholder="Search something">
            </p>

            <div class="spacing"></div>

            <h4>Categories</h4>
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
            <div class="hline"></div>
            <p>
                <a class="btn btn-theme" href="#" role="button">Java</a>
                <a class="btn btn-theme" href="#" role="button">Google</a>
                <a class="btn btn-theme" href="#" role="button">Carnival</a>
                <a class="btn btn-theme" href="#" role="button">Ashesi</a>
                <a class="btn btn-theme" href="#" role="button">League</a>
                <a class="btn btn-theme" href="#" role="button">Internship</a>

            </p>
        </div>

    </div><! --/row -->
</div><! --/container -->