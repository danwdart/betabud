<?php
class Betabud_Gateway_User
{
    private $_daoUser;

    public function __construct(Betabud_Dao_Mongo_User $daoUser)
    {
        $this->_daoUser = $daoUser;
    }

    public function getByUsernameAndPassword($strUsername, $strPassword)
    {
        return $this->_daoUser->getByUsernameAndPassword($strUsername, $strPassword);
    }
    
    public function save(Betabud_Model_User $modelUser)
    {
        $this->_daoUser->save($modelUser);
    }
}
