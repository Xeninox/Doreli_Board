<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/TestClasses/viewaddetailsclass.php");
/**
 *@Author Isaac Coffie
 * Date: 25/04/2017
 */
class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testgetAdDetailsReturnsTrue()
    {
        $ad = new ViewAdDetails();
        $this->assertTrue($ad->getAdDetails(9));
    }

    public function testgetUsernameReturnsTrue()
    {
        $ad = new ViewAdDetails();
        $this->assertTrue($ad->getUsername(5));
    }

    public function testgetCategoryNameReturnsTrue()
    {
        $ad = new ViewAdDetails();
        $this->assertTrue($ad->getCategoryNameById(1));
    }




}