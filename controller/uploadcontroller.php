<?php
/**
 *@author Chris Asante
 *@version 1.0
 */

//call the class
require_once("../classes/processupload.php");

//$_SESSION checks for all sessions to see if it's available
if (isset($_SESSION))
{
    global $userId;
    global $instId;

    //get user details
    $userId = $_SESSION['user_id'];
    $instId = $_SESSION['institution_id'];
}

//check if the submit button is clicked upload data
if(isset($_POST['submit']))
{
    checkValid();
}

//validate upload fields
function checkValid()
{
    global $display;
    global $catType;
    global $subj;
    global $comm;
    global $input;
    global $userId;
    global $instId;

    $ok = true;

    if (!isset($_POST['catType']) || $_POST['catType'] === '' || $_POST['catType'] == "Please Select A Category")
    {
        echo "Please select a category";
        $ok = false;
    }

    else
    {
        $catType = $_POST['catType'];
    }

    if (!isset($_POST['subj']) || $_POST['subj'] === '')
    {
        echo "Please type the subject";
        $ok = false;
    }

    else
    {
        $subj = $_POST['subj'];
    }

    if (!isset($_POST['comment']))
    {
        echo "Please type the description";
        $ok = false;
    }

    else
    {
        $comm = $_POST['comment'];
    }

    if (!isset($_FILES['filename']))
    {
        echo "Please choose a file from the computer";
        $ok = false;
    }

    else
    {
        $input = convImage('filename');

    }

    if (!isset($_POST['display']) || $_POST['display'] === 0 )
    {
        echo "Please select where to display the ad";
        $ok = false;
    }

    else
    {
        $display = $_POST['display'];
    }

    if ($ok)
    {
        uploadNotice($catType, $subj, $comm, $input, $display, $userId, $instId);
    }

    else
        echo "Check error";
}

/**
 *Function to upload the notice/ad
 *@param input typed by the user
 **/
function uploadNotice($catType, $subj, $comm, $input, $display, $userId, $instId)
{
    global $userId;
    global $instId;
    global $status;

    //calling an instancee of the upload class
    $insertNotice = new upload;

    $output = $insertNotice->uploadQuery($catType, $subj, $comm, $input, $display, $userId, $instId);

    if ($output)
    {
        if ($output)
        {
            $status = 1;

        }

        else
        {
            $status = 2;
        }




    }

    else
    {
        echo "<center><h3 style='color:red'> Upload Failed </h3></center>" ;
    }
}


/**
 *function to display the categories in the categories table
 *@param id of the category currently set in the database
 **/
function displayCategories()
{
    $userPosts = new upload;

    $adresult = $userPosts->getCategory();

    if ($adresult)
    {
        echo'
            <option value="0">Please select</option>';
        while($row = $userPosts->fetch())
        {
            echo '
            <option value= "'.$row['cat_id'].'"> '.$row['cat_name'].'</option>';
        }
    }


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
 *a function to display error or success message upon upload
 */
function uploadstatus()
{
    if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 1) {
        echo "<center><h2 style='color:green'>Upload Ad Successful </h2></center> <br>
                <h3 style='color:green'>You will be redirected to the page in a few seconds<h3>";
        if ($GLOBALS['display'] == "PUBLIC")
            header( "refresh:2; url=newpublicpage.php" );
        else if ($GLOBALS['display'] == "INSTITUTION")
            header( "refresh:2; url=institution-ads.php" );
    }
    else if (!empty($GLOBALS['status']) && $GLOBALS['status'] == 2) {
        echo "<center><h2 style='color:red'> Upload Unsuccessful. Please try again!!! </h2></center>" ;
    }

}
























?>