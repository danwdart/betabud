<?php
abstract class Betabud_Model_Abstract
{
    // Implement this
    protected static $_arrFields = array();

    // Each model has a collection of fields
    private $_collFields;

    protected function __construct()
    {
        $this->_collFields = new Betabud_Model_Field_Collection($this->_arrFields);
    }

    private function _getFieldObject($strField)
    {
        try {
            return $this->_collFields->seek($strField)
        } catch(OutOfBoundsException $e) {
            throw new Betabud_Model_Exception_FieldDoesNotExist($strField);
        }
    }

    protected function _getField($strField, $mixedDefault)
    {
        return $this->_getFieldObject($strField)->getValue($mixedDefault);
    }

    protected function _setField($strField, $mixedDefault)
    {
        return $this->_getFieldObject($strField)->setValue($mixedDefault);
    }

    abstract public function save();
}
