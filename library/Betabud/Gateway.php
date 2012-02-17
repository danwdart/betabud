<?php
class Betabud_Gateway
{
    private static $_instance;
    
    private function __clone()
    {
    }

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function inject(Betabud_Gateway $gateway)
    {
        self::$_instance = $gateway;
    }

    public function getUser()
    {
        return new Betabud_Gateway_User(new Betabud_Dao_Mongo_User());
    }
    
    public function getBlog()
    {
        return new Betabud_Gateway_Blog(new Betabud_Dao_Mongo_Blog());
    }

    public function getOStatus_Site()
    {
        return new Betabud_Gateway_OStatus_Site(new Betabud_Dao_Mongo_OStatus_Site());
    }

    public function getOStatus_User()
    {
        return new Betabud_Gateway_OStatus_User(new Betabud_Dao_Mongo_OStatus_Usser());
    }
}
