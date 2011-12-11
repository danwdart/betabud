<?php
class Betabud_Model_Field_FieldId extends Betabud_Model_Field_Abstract
{
    private $_mixedValue = null;

    public function isDefault()
    {
        return is_null($this->_mixedValue);
    }

    public function setValue($mixedValue)
    {
        if(!$this->isDefault) {
            throw new _Betabud_Model_Abstract_Exception_CannotResetId();
        } 
        $this->_mixedValue = $mixedValue;
    }

    public function getValue($mixedValue)
    {
        return $this->_mixedValue;
    }
}

