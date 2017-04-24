<?php
include_once("C:/xampp/htdocs/Doreli_Board/unit/TestClasses/registratoinclass.php");
/**
 *@Author Isaac Coffie
 * Date: 25/04/2017
 */
class UnitTests extends \PHPUnit_Framework_TestCase{

    public function testaddUserReturnsTrue()
    {
        $user = new Registration();
        $this->assertTrue($user->addNewUser("PagesCoffie", "Isaac", "Coffie", "isaaccoffie@gmail.com", "Password88", 5,"image", 2, "INACTIVE"));
    }

    public function testcheckUsernameReturnsFalse()
    {
        $user = new Registration();
        $this->assertFalse($user->usernameexist("coffie99"));
    }

   public function testcheckInstiutionnameReturnsTrue()
    {
        $user = new Registration();
        $this->assertTrue($user->institutionnameexist("Unilever Ghana"));
    }

}