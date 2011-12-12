<?php
class Betabud_Auth_Identity
{
    private $_modelUser;

    public function __construct(Betabud_Model_User $modelUser)
    {
        $this->_modelUser = $modelUser;
    }

    public function getUser()
    {
        return $this->_modelUser;
    }
}
