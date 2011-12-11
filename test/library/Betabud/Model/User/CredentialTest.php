<?php
class Betabud_Model_User_CredentialTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function testCreate()
    {
        $strServiceName = 'ServiceName';
        $strServiceURL = 'ServiceURL';
        $strAccessToken = 'AccessToken';
        $strUsername = 'Username';
        $strPassword = 'Password';
        $modelUser = Betabud_Model_User::create($strUsername, $strPassword);
        $credential = Betabud_Model_User_Credential::create($modelUser, $strServiceName, $strServiceURL, $strAccessToken);
        $this->assertEquals($strServiceName, $credential->getServiceName());
        $this->assertEquals($strServiceURL,  $credential->getServiceURL());
        $this->assertEquals($strAccessToken, $credential->getAccessToken());
    }
}
