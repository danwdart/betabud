<?php
/**
 * Let's try - a Child "has-a" Collection - as in a Model.
**/
class Betabud_Model_Abstract_Child
{
    private $_modelParent;

    protected function __construct(Betabud_Model_Abstract_Base $modelBase)
    {
        parent::__construct();
        $this->_modelParent = $modelParent;
    }

    protected static getParentCollectionName()
    {
        throw new Exception('Implement This');
    }

    public function updateParent()
    {
        $this->_modelParent->doSomethingToGetItsCorrectCollectionUpdated();
    }
}

