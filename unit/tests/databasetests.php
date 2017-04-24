<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/database/dbconnectclass.php");
/**
 *@Author Isaac Coffie
 * Date: 25/04/2017
 */

class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testConnectReturnsTrue()
    {

        $connect = new DatabaseConnection;

        $this->assertTrue($connect->connect());
    }

    public function testrunQueryReturnsTrue()
    {
        $connect = new DatabaseConnection;
        $this->assertTrue($connect->query("select * from users"));
    }


}