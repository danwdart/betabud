<?php
class Betabud_Dao_Mongo_Site extends Betabud_Dao_Mongo_Abstract
{
    const COLLECTION = 'OStatus_Site';

    protected function _getCollectionName()
    {
        return self::COLLECTION;
    }

    public function getAllByUser(Betabud_Model_User $modelUser)
    {
        $arrQuery = array(
            Betabud_Model_OStatus_Site::FIELD_USERNAME => $modelUser->getUsername() 
        );

        $cursor = $this->_getCollection()->find($arrQuery);
        return new Betabud_Iterator_Dao_Mongo_Cursor($cursor, $this);
    }

    public function convertToModel($arrSite)
    {
        return Betabud_Model_OStatus_Site::createFromDao($this, $arrSite);
    }

    public function delete(Betabud_Model_OStatus_Site $modelSite)
    {
        $this->_delete($modelSite);
    }

    public function save(Betabud_Model_OStatus_Site $modelSite)
    {
        $this->_save($modelSite);
    }
}
