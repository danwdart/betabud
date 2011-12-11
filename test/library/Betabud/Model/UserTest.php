<?php
class Betabud_Model_UserTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function testGetSetUsername()
    {
        $modelUser = Betabud_Model_User::create();
        $strUsername = 'Dan';
        $modelUser->setUsername($strUsername);
        $this->assertEquals($strUsername, $modelUser->getUsername());
    }
    
    public function testGetSet
}
