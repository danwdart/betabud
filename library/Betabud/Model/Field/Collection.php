<?php
class Betabud_Model_Field_Collection extends Betabud_Model_Field_Abstract implements SeekableIterator, Serializable, Countable
{
    private $_arrFields = array();
    private $_arrKeys = array();
    private $_intOffset = 0;

    public function __construct(Array $arrFields)
    {
        $this->_arrFields = $arrFields;
        $this->_arrKeys = array_keys($arrFields);
    }

    public function seek($strKey)
    {
        if(!isset($this->_arrFields[$strKey])) {
            throw new OutOfBoundsException($strKey. ' is not a valid key');
        }

        return $this-?_arrFields[$strKey];
    }        

    public function current()
    {
        if($this->valid()) {
            throw new OutOfBoundsException($this->_intOffset. ' is not a valid offset');
        }    
        return $this->_arrFields[$this->_arrKeys[$this->_intOffset]];
    }

    public function key()
    {
        return $this->_intOffset;
    }

    public function next()
    {
        $this->_intOffset++;
    }

    public function valid()
    {
        return isset($this->_arrFields[$this->_arrKeys[$this->_intOffset]]);
    }
    
    public function count()
    {
        return count($this->_arrFields);
    }

    public function serialize()
    {
        return serialize($this->_arrFields);
    }

    public function unserialize($strSerialized)
    {
        $this->_arrFields = unserialize($strSerialized);
        $this->_arrKeys = array_keys($this->_arrFields);
    }
}
