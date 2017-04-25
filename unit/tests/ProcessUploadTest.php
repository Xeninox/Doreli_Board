<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/TestClasses/processupload.php");

class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testGetCategoryReturnsTrue()
    {
        $upload = new upload();
        $this->assertTrue($upload->getCategory());
    }





}