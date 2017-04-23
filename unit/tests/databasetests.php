<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/database/dbconnectclass.php");
/**
 * Created by PhpStorm.
 * User: Constant Likudie
 * Date: 18/04/2017
 * Time: 02:23 PM
 */

class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testConnectReturnsTrue()
    {

        $connect = new DatabaseConnection;

        $this->assertTrue($connect->connect());
    }


}