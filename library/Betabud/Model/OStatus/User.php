<?php
class Betabud_Model_OStatus_User extends Betabud_Model_Abstract_Base
{
    const FIELD_STATUSUSERID = self::FIELD_Id;
    const FIELD_USERNAME = 'Username';
    const FIELD_SITEID = 'SiteId';
    const FIELD_REQUEST_TOKEN = 'RequestToken';
    const FIELD_ACCESS_TOKEN = 'AccessToken';

    protected $_arrFields = array(
        self::FIELD_STATUSUSERID => 'Betabud_Model_Field_FieldId',
        self::FIELD_USERNAME => 'Betabud_Model_Field_Field',
        self::FIELD_SITEID => 'Betabud_Model_Field_Field',
        self::FIELD_REQUEST_TOKEN => 'Betabud_Model_Field_Field',
        self::FIELD_ACCESS_TOKEN => 'Betabud_Model_Field_Field'
    );

    public static function create(Betabud_Model_User $modelUser,
                                  Betabud_Model_OStatus_Site $modelSite,
                                 )
    {
        $user = new self();
        $user->_setField(self::FIELD_STATUSUSERID, md5(uniqid()));
        $user->_setField(self::FIELD_USERNAME, $modelUser->getUsername());
        $user->_setField(self::FIELD_SITEID, $modelSite->getSiteId());
        return $user;
    }

    public function getUsername()
    {
        return $this->_getField(self::FIELD_USERNAME, null);
    }

    public function getUser()
    {
        return Betabud_Gateway::getInstance()->getUser()->getByUsername($this->getUsername());
    }

    public function getSiteId()
    {
        return $this->_getField(self::FIELD_SITEID, null);
    }

    public function getSite()
    {
        return Betabud_Gateway::getInstance()->getOStatus_Site()->getBySiteId($this->getSiteId());
    }

    public function getRequestToken()
    {
        return $this->_getField(self::FIELD_REQUEST_TOKEN, null);
    }

    public function getAccessToken()
    {
        return $this->_getField(self::FIELD_ACCESS_TOKEN, null);
    }

    public function getAccessTokenObject()
    {
        return unserialize($this->getAccessToken());
    }

    public function getScreenName()
    {
        $screen_name = $this->getAccessTokenObject()->getParam('screen_name');
        if(is_null($screen_name))
        {
            return 'Unknown user';
        }
        return $screen_name;
    }
    public static function retrieveMine()
    {
        //find all by user
    }
} // OStatus_User
