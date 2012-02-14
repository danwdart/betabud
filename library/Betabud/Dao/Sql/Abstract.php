<?php
class Betabud_Dao_Sql_Abstract
{
    private static $_zendDb;

    public static function setAdapter(Zend_Db_Adapter_Abstract $_zendDb)
    {
        self::$_zendDb = $zendDb;
    }

    private static function _getAdapter()
    {
        if(!self::$_zendDb instanceof Zend_Db_Adapter_Abstract) {
            throw new Betabud_Dao_Sql_Exception_NoAdapter();
        }
        return self::$_zendDb;
    }

    // Todo: cache if necessary
    protected function _getConnection()
    {
        self::$_zendDb->getConnection();
    }
}


