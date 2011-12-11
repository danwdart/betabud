<?php
class Betabud_Model_UserTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function testGetSetUsername()
    {
        $strUsername = 'Username';
        $strPassword = 'Password';
        $modelUser = Betabud_Model_User::create($strUsername, $strPassword);
        $this->assertEquals(strtolower($strUsername), $modelUser->getUsername());
    }
    
    public function testGetSetNick()
    {
        $strUsername = 'Username';
        $strPassword = 'Password';
        $modelUser = Betabud_Model_User::create($strUsername, $strPassword);
        $strNick = 'Dan';
        $this->assertNull($modelUser->getNick());
        $modelUser->setNick($strNick);
        $this->assertEquals($strNick, $modelUser->getNick());
    }
}
