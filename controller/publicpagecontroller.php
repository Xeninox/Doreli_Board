<?php


/**
*@author Dorcas Elikem Doe 
*@version 1.0
*/

require_once('../class/publicpageclass.php');

/**
*Register controller
*/

function ctrDisplay(){
//object of the ManageAd class 
$myobj = new ManageAds;

//get all data from database
$verify = $myobj->displayAd();

//check if succesful
if($verify)
{
	while($results = $myobj->fetch()){
		echo '<div class="row">
      <div class="col-md-3">
        <div class="well">
          <h4 class="text-success"><span class="label label-danger pull-right">'.$results['category'].'</span>' .$results['subject']. '</h4>
        </div>
      </div>';
		//echo '<p>'.$results['subject'].'</p>';


		//echo '<img src="../images/uploads/"'.$results['ad_file'].'>';
	}
	echo "</div>";
}
else
{
	echo "no data..!";
}
}

?>
