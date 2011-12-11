<?php
class Betabud_Model_Field_Abstract
{
    protected $_isDirty;

    public function isDirty()
    {
        return $this->_isDirty;
    }
}
