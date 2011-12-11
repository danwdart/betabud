<?php
class Betabud_Model_User_Credential extends Betabud_Model_Abstract_Child
{
    const FIELD_ServiceName = 'ServiceName';
    const FIELD_ServiceURL  = 'ServiceURL';
    const FIELD_AccessToken = 'AccessToken';

    protected static $_arrFields = array(
        self::FIELD_ServiceName => 'Betabud_Model_Field_Field',
        self::FIELD_ServiceURL  => 'Betabud_Model_Field_Field',
        self::FIELD_AccessToken => 'Betabud_Model_Field_Field'
    );

    public static function create(Betabud_Model_User $modelUser, $strServiceName, $strServiceURL, $strAccessToken)
    {
        $credential = new self($modelUser);
        $credential->_setField(self::FIELD_ServiceName, $strServiceName);
        $credential->_setField(self::FIELD_ServiceURL,  $strServiceURL);
        $credential->_setField(self::FIELD_AccessToken, $strAccessToken);
        return $credential;
    }

    public function getServiceName()
    {
        return $this->_getField(self::FIELD_ServiceName, null);
    }

    public function getServiceURL()
    {
        return $this->_getField(self::FIELD_ServiceURL, null);
    }

    public function getAccessToken()
    {
        return $this->_getField(self::FIELD_AccessToken, null);
    }
}
