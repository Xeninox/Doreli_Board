
<?php
/**
 *@author Chris Asante
 *@version 1.0
 **/

//call the class
require_once("../classes/processPostClass.php");

//checking if the session is set
if (isset($_SESSION))
{
    global $userId;
    global $instId;

    //get user details
    $userId = $_SESSION['user_id'];
    $instId = $_SESSION['institution_id'];
}

//calling the function to delete ad when the delete in the user post page is set
if(isset($_POST["delete"]))
{
    $deleteId = $_POST["delete"];
    executeDelete($deleteId);
}

//calling the function to update ad when the update in the user post page is set
if(isset($_POST["update"]))
{
    $editId = $_POST["update"];
    $input;

    //storing the data set in the update form
    $subject = htmlspecialchars($_POST['subj']);
    $comment = htmlspecialchars($_POST['comment']);
    $catType = htmlspecialchars($_POST['catType']);
    $display = htmlspecialchars($_POST['display']);
    if (isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name']))
    {
        $input = convImage('filename');
    }
    else
    {
        $input = "none";
    }

    executeEditAd($editId, $subject, $comment, $catType, $input, $display);
}


/**
 *function to display the ads posted by a user
 *@return object of the result (ads details)
 **/
function allPosts()
{
    global $userId;
    //creating an instance of the post class
    $userPosts = new postUser;

    $userPosts->getUserAds($userId);

    return $userPosts->fetchResultObject();
}

function getNumUploadForUser()
{
    global $userId;

    $userAds = new postUser();

    $userAds->getNumUploads($userId);

    return $userAds->fetch();
}

/**
 *function to display the username of the user
 *@param id of the user
 *@return username of the user
 **/
function GetUsername($uId)
{
    //creating an instance of the post class
    $userPosts = new postUser;

    $userPosts->getUsername($uId);

    return $userPosts->fetch();
}

/**
 *function to delete an ad posted by the user
 *@param id of the ad
 **/
function executeDelete($adId)
{
    //creating an instance of the post class
    $userPosts = new postUser;
    global $status;

    $result = $userPosts->deletePost($adId);

    //check if any record was affected
    if ($result) {
        $status = 1;
    }

    else{
        $status = 2;
    }

}

/**
 *function to update an ad posted by the user
 *@param id of the ad
 **/
function executeEditAd($adId, $subject, $comment, $catType, $adFile, $display)
{
    global $status;

    //creating an instance of the post class
    $userPosts = new postUser;

    $output = $userPosts->editAd($adId, $subject, $comment, $catType, $adFile, $display);

    //check if any record was affected
    if ($output)
    {
        $status = 3;
    }

    else
        $status = 4;
}

/**
 *function to display the ad details
 *@return ad/post details
 **/
function executeDisplay()
{
    if(isset($_POST["edit"]))
    {
        $editId = $_POST["edit"];

        $userPosts = new postUser;

        $adresult = $userPosts->getAd($editId);

        if ($adresult)
            return $userPosts->fetch();

        else
            return null;

    }
}

function getAd($id)
{
    $userPosts = new postUser;

    $adresult = $userPosts->getAd($id);

    if ($adresult)
        return $userPosts->fetch();

    else
        return null;

}

/**
 *function to convert images
 *@param input file inserted
 **/
function convImage($input)
{
    $tempname = addslashes($_FILES[$input]['tmp_name']);
    $name = addslashes($_FILES[$input]['name']);
    $getimage = addslashes(file_get_contents($tempname));
    return $getimage;
}


/**
 *function to display the categories in the categories table
 *@param id of the category currently set in the database
 **/
function displayCategories($cat_id)
{
    $userPosts = new postUser;

    $adresult = $userPosts->getCategory();

    if ($adresult)

    {
        while($row = $userPosts->fetch())
        {
            if ($cat_id == $row['cat_id'])
                echo '
					<option selected value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';

            else
                echo '
					<option value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';
        }
    }
}

/**
 *function to display the display options
 *@param display option currently selected in the database
 **/
function display($disp)
{
    if ($disp == "INSTITUTION")
        echo '
       		<option selected value = "INSTITUTION">INSTITUTION</option>
       		<option value = "PUBLIC">PUBLIC</option>';

    if ($disp == "PUBLIC")
        echo '
       		<option value = "INSTITUTION">INSTITUTION</option>
       		<option selected value = "PUBLIC">PUBLIC</option>';

}

/**a function to display error or success message upon upload
 */
function uploadstatus()
{
    if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 1) {
        echo "<h3 style='color:green'>Delete Ad Successful </h3><br>";

    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 2) {
        echo "<h3 style='color:red'> Error Trying to Delete Ad </h3>" ;
    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 3) {
        echo "<h3 style='color:green'> Update Successful </h3>" ;
    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 4) {
        echo "<h3 style='color:red'> Error Trying to Update Ad </h3>" ;
    }

}
?>