<?php
interface Betabud_Dao_Interface_User extends Betabud_Dao_Interface
{
    public function getByUsernameAndPassword($strUsername, $strPassword);
    
    public function getByUsername($strUsername);

    public function save(Betabud_Model_User $modelUser);
}
