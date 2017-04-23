<?php 

        /**
        *@author Isaac Coffie 
        *@version Version 1.0
        */

        //include ViewAdDetails class 

        require_once("../classes/viewaddetailsclass.php");

         /*
          if view ad button is clicked, call the viewParticularAd function to display ad details
          */
         if (isset($_POST['viewad'])) 
         {
            $ad_id = $_POST['viewad'];
            getParticularAd();
         }

         /**
         *a function to fetch ad details from database based on the ad's id
         *@return returns ad array object if successful and null is not successful
         */

         function getParticularAd(){
            global $ad_id;

            $ad_details = new ViewAdDetails;
            $ad_result = $ad_details->getAdDetails($ad_id);
            if($ad_result){
                return $ad_details->fetch();
            }
            else {
                return null;
            }

         }

         /**
         *a function to return the name of the user who uploaded that particular ad
         *@return returns an ad array object if successful and null is not successful
         */

         function postedBy()
         {
            global $ad_id;
            $ad_posted = new ViewAdDetails;
            $ad_posted->getUsername($ad_id);
            return $ad_posted->fetch();
        }

        /**
         *a function to return the name of a poster category based on its id
         *@param $category_id the category id
         *@return returns an array of category objects if successful and null is not successful
         */    
        function getCategoryName($category_id)
        {
            $category = new ViewAdDetails;
            $category->getCategoryNameById($category_id);
            return $category->fetch();

        }
    
?>         