<?php
/**
 * Let's try - a Child "has-a" Collection - as in a Model.
**/
abstract class Betabud_Model_Abstract_Child extends Betabud_Model_Abstract
{
    private $_modelParent;

    protected function _getModelParent()
    {
        return $this->_modelParent;
    }

    protected function __construct(Betabud_Model_Abstract_Base $modelParent)
    {
        parent::__construct();
        $this->_modelParent = $modelParent;
    }

    protected static function getParentCollectionName()
    {
        throw new Exception('Implement This');
    }

    public function updateParent()
    {
        $this->_modelParent->doSomethingToGetItsCorrectCollectionUpdated();
    }

    public function save()
    {
        $this->updateParent();
        $this->_getModelParent()->save();
    }
}

