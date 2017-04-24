<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/TestClasses/AdminFunctionClass.php");
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 23/04/2017
 * Time: 10:03 AM
 */
class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testacceptUserReturnsTrue()
    {
        $accept = new AdminFunctionClass();
        $this->assertTrue($accept->acceptUser(1));
    }

    public function testrejectUserReturnsTrue()
    {
        $accept = new AdminFunctionClass();
        $this->assertTrue($accept->rejectUser(1));
    }




}