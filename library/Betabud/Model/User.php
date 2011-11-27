<?php
class Betabud_Model_User extends Betabud_Model_Abstract
{
    const FIELD_ID = '_id';
    const FIELD_Username = 'Username';
    const FIELD_Password = 'Password';
    const FIELD_Nick = 'Nick';
    const CHILD_ASSOC_Credentials = 'Credentials';

    protected static $_arrFields = array(
        self::FIELD_ID => 'Betabud_Model_Field_Field',
        self::FIELD_Username => 'Betabud_Model_Field_Field',
        self::FIELD_Password => 'Betabud_Model_Field_Field',
        self::FIELD_Nick => 'Betabud_Model_Field_Field',
        self::CHILD_ASSOC_Credentials => 'Betabud_Model_Field_Collection'
    );

    public static function create()
    {
        return new self();
    }

    public function setUsername($strUsername)
    {
        $this->_setField(self::FIELD_Username, $strUsername);
    }

    public function getUsername($mixedDefault)
    {
        return $this->_getField(self::FIELD_Username, $mixedDefault);
    }

    public function save()
    {
        // Not Implemented
    }
}
