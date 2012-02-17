<?php
abstract class Betabud_Model_Abstract_Base extends Betabud_Model_Abstract
{
    const FIELD_Id ='_id';

    public static function createFromDao(Betabud_Dao_Interface $dao, Array $arrDao)
    {
        $model = new static();

        foreach($arrDao as $strKey => $value) {
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

    abstract public function delete();

    public function preUpdateFromDao(Betabud_Dao_Interface $dao)
    {
        return $this->_getCollFields();
    }
}
