<?php
/**
 * This is a collection of any type of field.
**/
abstract class Betabud_Model_Field_Collection_Abstract extends Betabud_Model_Field_Abstract implements SeekableIterator, Serializable, Countable
{
    private $_arrFields = array();

    public function key()
    {
        return $this->_intOffset;
    }

    public function next()
    {
        $this->_intOffset++;
    }

    public function rewind()
    {
        $this->_intOffset = 0;
    }
    
    public function count()
    {
        return count($this->_arrFields);
    }
}
