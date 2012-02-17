<?php
class Betabud_Model_OStatus_Site extends Betabud_Model_Abstract_Base
{
    const FIELD_SITEID = self::FIELD_Id; 
    const FIELD_FULLNAME = 'FullName';
    const FIELD_SHORTNAME = 'ShortName';
    const FIELD_CONSUMER_KEY = 'ConsumerKey';
    const FIELD_CONSUMER_SECRET = 'ConsumerSecret';
    const FIELD_SITEURL = 'SiteURL';
    const FIELD_REQUEST_TOKEN_URL = 'RequestTokenURL';
    const FIELD_ACCESS_TOKEN_URL = 'AccessTokenURL';
    const FIELD_AUTHORIZE_URL = 'AuthorizeURL';
    const FIELD_UPDATE_URL = 'UpdateURL';
    const FIELD_UPDATE_PARAM = 'UpdateParam';

    protected static $_arrFields = array(
        self::FIELD_SITEID => 'Betabud_Model_Field_FieldId',
        self::FIELD_FULLNAME => 'Betabud_Model_Field_Field',
        self::FIELD_SHORTNAME => 'Betabud_Model_Field_Field', 
        self::FIELD_CONSUMER_KEY => 'Betabud_Model_Field_Field',
        self::FIELD_CONSUMER_SECRET => 'Betabud_Model_Field_Field',
        self::FIELD_SITEURL => 'Betabud_Model_Field_Field',
        self::FIELD_REQUEST_TOKEN_URL => 'Betabud_Model_Field_Field',
        self::FIELD_ACCESS_TOKEN_URL => 'Betabud_Model_Field_Field',
        self::FIELD_AUTHORIZE_URL => 'Betabud_Model_Field_Field',
        self::FIELD_UPDATE_URL => 'Betabud_Model_Field_Field',
        self::FIELD_UPDATE_PARAM => 'Betabud_Model_Field_Field'
    );

    public static function create()
    {
        // Nothing yet...
    }

    public function getSiteId()
    {
        return $this->_getField(self::FIELD_SITEID, null);
    }

    public function getFullName()
    {
        return $this->_getField(self::FIELD_FULLNAME, null);
    }

    public function getShortName()
    {
        return $this->_getField(self::FIELD_SHORTNAME, null);
    }

    public function getConsumerKey()
    {
        return $this->_getField(self::FIELD_CONSUMER_KEY, null);
    }

    public function getConsumerSecret()
    {
        return $this->_getField(self::FIELD_CONSUMER_SECRET, null);
    }

    public function getSiteURL()
    {
        return $this->_getField(self::FIELD_SITE_URL, null);
    }

    public function getRequestTokenURL()
    {
        return $this->_getField(self::FIELD_REQUEST_TOKEN_URL, null);
    }

    public function getAccessTokenURL()
    {
        return $this->_getField(self::FIELD_ACCESS_TOKEN_URL, null);
    }

    public function getAuthorizeURL()
    {
        return $this->_getField(self::FIELD_AUTHORIZE_URL, null);
    }

    public function getUpdateURL()
    {
        return $this->_getField(self::FIELD_UPDATE_URL, null);
    }

    public function getUpdateParam()
    {
        return $this->_getField(self::FIELD_UPDATE_PARAM, null);
    }
    
    public function getConfig()
    {
        $config = array(
            'callbackUrl' => $this->getCallbackURL(),
            'siteUrl' => $this->getSiteURL(),
            'consumerKey' => $this->getConsumerKey(),
            'consumerSecret' => $this->getConsumerSecret()
        );

        return $config;
    }

    public function getCallbackURL()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/app/status/callback';
    }
}
