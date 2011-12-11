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

    public function getInstance()
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
}
