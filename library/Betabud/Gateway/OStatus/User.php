<?php
class Betabud_Gateway_OStatus_User
{
    private $_daoOStatus_User;

    public function __construct(Betabud_Dao_Mongo_OStatus_User $daoUser)
    {
        $this->_daoOStatus_User = $daoUser;
    }

    public function getAllByUser(Betabud_Model_User $modelUser)
    {
        return $this->_daoOStatus_User->getAllByUser($modelUser);
    }
}
