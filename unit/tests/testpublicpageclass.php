<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/TestClasses/publicpageclass.php");
/**
 * Created by PhpStorm.
 * User: Dorcas Doe
 * Date: 23/04/2017
 */
class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testdisplayAd()
    {
        $display = new ManageAds();
        $this->assertTrue($display->displayAd());
    }

    public function testgetNumUploadsforPublic()
    {
        $accept = new ManageAd();
        $this->assertTrue($accept->getNumUploadsforPublic());
    }


}