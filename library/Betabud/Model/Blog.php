<?php
class Betabud_Model_Blog extends Betabud_Model_Abstract_Base
{
    const FIELD_BLOGID = Betabud_Dao_Mongo_Abstract::FIELD_Id;
    const FIELD_TITLE = 'Title';
    const FIELD_BODY = 'Body';
    const FIELD_TIMECREATED = 'TimeCreated';
    const FIELD_TIMEMODIFIED = 'TimeModified';
    const FIELD_USERID = 'UserId';

    protected static $_arrFields = array(
        self::FIELD_BLOGID => 'Betabud_Model_Field_FieldId',
        self::FIELD_TITLE => 'Betabud_Model_Field_Field',
        self::FIELD_BODY => 'Betabud_Model_Field_Field',
        self::FIELD_TIMECREATED => 'Betabud_Model_Field_Field',
        self::FIELD_TIMEMODIFIED => 'Betabud_Model_Field_Field',
        self::FIELD_USERID => 'Betabud_Model_Field_Field'
    );

    public static function create($strTitle, $strBody, Betabud_Model_User $modelUser)
    {
        $modelBlog = new self();
        $modelBlog->_setField(self::FIELD_BLOGID, md5(uniqid(true)));
        $modelBlog->_setField(self::FIELD_TITLE, $strTitle);
        $modelBlog->_setField(self::FIELD_BODY, $strBody);
        $modelBlog->_setField(self::FIELD_TIMECREATED, time());
        $modelBlog->_setField(self::FIELD_TIMEMODIFIED, time());
        $modelBlog->_setField(self::FIELD_USERID, $modelUser->getUserId());
        return $modelUser;
    }

    public function isMine()
    {
        return (Betabud_Auth::getInstance()->getIdentity()->getUser() == $this->getUser());
    }
    
    public function getBlogId()
    {
        return $this->_getField(self::FIELD_BLOGID, null);
    }

    public function getTitle()
    {
        return $this->_getField(self::FIELD_TITLE, null);
    }

    public function getBody()
    {
        return $this->_getField(self::FIELD_BODY, null);
    }

    public function setTitle($strTitle)
    {
        $this->_setField(self::FIELD_TITLE, $strTitle);
        $this->_setField(self::FIELD_TIMEMODIFIED, time());
    }

    public function setBody($strBody)
    {
        $this->_setField(self::FIELD_BODY, $strBody);
        $this->_setField(self::FIELD_TIMEMODIFIED, $strBody);
    }

    public function getDateModified()
    {
        return date('d/m/Y H:i:s', $this->_getField(self::FIELD_TIMEMODIFIED, null));
    }

    public function save()
    {
        return Betabud_Gateway::getInstance()->getBlog()->save($this);
    }
}
