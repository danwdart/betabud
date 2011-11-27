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
        $this->_mixedValue = $mixedValue;
    }

    public function getValue($mixedValue)
    {
        return($this->isDefault()?$mixedValue:$this=>_mixedValue);
    }
}
