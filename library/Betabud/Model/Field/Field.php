<?php
class Betabud_Model_Field_Field extends Betabud_Model_Field_Abstract
{
    private $_mixedValue = null;

    public function isDefault()
    {
        return is_null($this->_mixedValue);
    }

    public function setValue($mixedValue)
    {
        $this->_isDirty = true;
        $this->_mixedValue = $mixedValue;
    }

    public function getValue()
    {
        return($this->isDefault()?null:$this->_mixedValue);
    }
}
