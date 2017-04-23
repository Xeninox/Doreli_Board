<?php

/**
*@author Isaac Coffie 
*@version Version 1.0
*/

require_once('../controller/viewAdDetailsController.php');

        /*
          if view ad button is clicked, call the viewParticularAd function to display ad details
          */
         if (isset($_POST['viewad'])) 
         {
            $ad_id = $_POST['viewad'];
            viewOneAd();
         }
         else{
         noAdToView(); 
         }
         //viewOneAd();
 /**
 *a function to return representation of a particular ad
 *@return returns a well formatted details of an ad
 */
function viewOneAd(){
	$posted_by = postedBy();
	$posted_by = $posted_by['username'];
	$ad_array = getParticularAd();
	$subject = $ad_array['subject'];
	$category_id = $ad_array['cat_id']; 
	$category = getCategoryName($category_id); 
	$category_name = $category['cat_name'];
	$comment = $ad_array['comment'];
	$poster = $ad_array['ad_file'];
	$encoded_image = base64_encode($poster);
	$date = $ad_array['date_added'];
	$newdate = date('d F Y', strtotime($date));
  echo "<div id=\"blue\">
    <div class=\"container\">
        <div class=\"row\">
            <h3>$subject Ad</h3>
        </div><!-- /row -->
       </div> <!-- /container -->
  </div>";

  echo "
	<div class=\"container mtb\">

    <div class=\"row\">
    <div class=\"col-md-8\">
    <!--img src=\"../image/post01.jpg\" style=\"height: 350px;\"-->
     <p><img class=\"img-responsive\" src=\"data:image;base64, {$encoded_image}\"></p>
    </div>

    <div class=\"col-md-4\">
    <h3 style = \"color: orange\"> Poster Details</h3>
    <h4 class=\"ctitle\"> Subject: $subject</h4>
    <span style = \"color: orange\"> Category: </span> <span>$category_name</span><br><br>
    <span style = \"color: orange\"> Posted on : </span> <span>$newdate</span> <br><br>
    <span style = \"color: orange\"> Posted by : </span> <span> $posted_by</span> <br><br>
    <span style = \"color: orange\"> Comment : </span><span>$comment</span> <br> <br>
    <a href=\"institution-ads.php\" class = \"btn btn-primary\">Go Back</a>
    </div>
    </div>
    </div>";

}
function noAdToView(){
  echo "<div id=\"blue\">
        <div class=\"container\">
        <div class=\"row\">
        <div class=\"col-md-4\">
        </div>
        <div class=\"col-md-4\">   
            <h3>Sorry No Ads to View</h3>
            <br><br> <br><br><br><br><br><br><br><br><br><br>
            </div>
        </div><!-- /row -->
       </div> <!-- /container -->
      </div> ";
}
?>
