<?php
/**
 * Created by PhpStorm.
 * @author: Constant Likudie
 * @version 1.0
 */
require_once("AdminFunctionController.php");
require_once("CategoriesController.php");
require_once("InstitutionAdsController.php");

/**
 * Check the message number that was sent with the request
 */
$msg = $_REQUEST['msg'];


/**
 * Switch statemnents based on the message number that was sent by the request
 */
switch ($msg){
    case 0:
        $user_id = $_REQUEST['userid'];
        $result = makeUserActive($user_id);
        $success = array();
        if ($result){
            $success[] = array(
                'status' => 'success'
            );
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;

    case 1:
        $user_id = $_REQUEST['userid'];
        $result = rejectUser($user_id);
        $success = array();
        if ($result){
            $success[] = array(
                'status' => 'success'
            );
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;
    case 2:
        $cat_id = $_REQUEST['cat_id'];
        $inst_id = $_REQUEST['inst_id'];
        $result = getCatAds($cat_id, $inst_id);
        $success = array();
        if ($result){
            foreach ($result as $res){
                $username_array = getUsernameWithID($res['user_id']);
                $username = $username_array['username'];
                $success[] = array(
                    'id' => $res['id'],
                    'cat_id' => $res['cat_id'],
                    'subject' => $res['subject'],
                    'comment' => $res['comment'],
                    'ad_file' => base64_encode($res['ad_file']),
                    'date_added' => date('d F Y', strtotime($res['date_added'])),
                    'user_id' => $res['user_id'],
                    'username' => $username,
                    'institution_id' => $res['institution_id'],
                    'display' => $res['display']
                );
            }
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;
    case 3:
        $cat_id = $_REQUEST['cat_id'];
        $result = getCategoryAdsForPublic($cat_id);
        $success = array();
        if ($result){
            foreach ($result as $res){
                $username_array = getUsernameWithID($res['user_id']);
                $username = $username_array['username'];
                $success[] = array(
                    'id' => $res['id'],
                    'cat_id' => $res['cat_id'],
                    'subject' => $res['subject'],
                    'comment' => $res['comment'],
                    'ad_file' => base64_encode($res['ad_file']),
                    'date_added' => date('d F Y', strtotime($res['date_added'])),
                    'user_id' => $res['user_id'],
                    'username' => $username,
                    'institution_id' => $res['institution_id'],
                    'display' => $res['display']
                );
            }
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;
    case 4:
        $user_id = $_REQUEST['userid'];
        $result = makeUserInactive($user_id);
        $success = array();
        if ($result){
            $success[] = array(
                'status' => 'success'
            );
            echo json_encode($success);
        } else {
            $success[] = array(
                'status' => 'failed'
            );
            echo json_encode($success);
        }
        break;

}