<?php
abstract class Betabud_Dao_Sql_Abstract implements Betabud_Dao_Interface
{
    private static $_zendDb;

    public static function setAdapter(Zend_Db_Adapter_Abstract $_zendDb)
    {
        self::$_zendDb = $zendDb;
    }

    protected function _getAdapter()
    {
        if(!self::$_zendDb instanceof Zend_Db_Adapter_Abstract) {
            throw new Betabud_Dao_Sql_Exception_NoAdapter();
        }
        return self::$_zendDb;
    }

    abstract protected function _getTable();

    protected function _save(Betabud_Model_Abstract_Base $modelBase)
    {
        $strTable = $this->_getTable();

        $arrUpdate = array();
        $this->_saveCollection($modelBase->preUpdateFromDao($this), $arrUpdate);
        $this->_getAdapter()->insert($strTable, $arrUpdate);
    }

    private function _saveCollection(Betabud_Model_Field_Collection_Abstract $collection, &$arrUpdate)
    {
        if(!$collection->isEmpty()) {
            foreach($collection as $strFieldName => $objField) {
                if($objField->isDirty()) {
                    $location = $strFieldName;
                    $strClass = get_class($objField);
                    switch($strClass) {
                        case 'Betabud_Model_Field_Field':
                        case 'Betabud_Model_Field_FieldId':
                            $arrUpdate[$location] = $objField->getValue();
                            break;
                        default:
                            throw new Exception('Not Implemented class '.$strClass);
                    }
                }
            }
        }
    }
}


