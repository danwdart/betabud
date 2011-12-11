<?php
class Betabud_Dao_Mongo_User extends Betabud_Dao_Mongo_Abstract
{
    public function getByUsernameAndPassword($strUsername, $strPassword)
    {
        $arrQuery = array(
            Betabud_Model_User::FIELD_Username => Betabud_Model_User::encodeUsername($strUsername),
            Betabud_Model_User::FIELD_Password => Betabud_Model_User::encodePassword($strPassword)
        );

        $arrUser = $this->_getCollection()->findOne($arrQuery);
        if(is_null($arrUser)) {
            throw new Betabud_Dao_Exception_User_NotFound();
        }
        return $this->_convertToModel($arrUser);
    }

    protected function _convertToModel($arrUser)
    {
        return Betabud_Model_User::createFromDao($this, $arrUser);
    }

    public function save(Betabud_Model_User $modelUser)
    {
        $this->_save($modelUser);
    }
}
