<?php  require_once('../controller/InstitutionAdsController.php');
$user_inst_array = getUserInstituion();
$user_inst = $user_inst_array['name'];
echo "<div id=\"blue\">
        <div class=\"container\">
            <div class=\"row\">
                <h3>Manage $user_inst Ads</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->";
?>



<!-- *****************************************************************************************************************
 BLOG CONTENT
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <?php include_once('../controller/postcontroller.php'); ?>

        <! --POSTS LIST -->
        <div class="col-lg-8" id="con">

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


        </div>


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
