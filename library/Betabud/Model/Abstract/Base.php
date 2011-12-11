<?php
abstract class Betabud_Model_Abstract_Base extends Betabud_Model_Abstract
{
    const FIELD_Id ='_id';

    public static function createFromDao(Betabud_Dao_Mongo_Abstract $dao, Array $arrMongo)
    {
        $model = new static();

        foreach($arrMongo as $strKey => $value) {
            if(is_array($value)) {
                // TODO implement child class
            }
            $model->_setField($strKey, $value);
        }

        return $model;
    }

    public function getId()
    {
        return $this->_getField(self::FIELD_Id, null);
    }

    public function preUpdateFromDao(Betabud_Dao_Mongo_Abstract $dao)
    {
        return $this->_getCollFields();
    }
}
