<?php
class Betabud_Dao_Mongo_Blog extends Betabud_Dao_Mongo_Abstract
{
    const COLLECTION = 'Blog';

    protected function _getCollectionName()
    {
        return self::COLLECTION;
    }

    public function getByBlogId($strBlogId)
    {
        $arrQuery = array(
            Betabud_Model_Blog::FIELD_BLOGID => $strBlogId
        );

        $arrBlog = $this->_getCollection()->findOne($arrQuery);
        if(is_null($arrBlog)) {
            throw new Betabud_Dao_Exception_Blog_NotFound();
        }
        return $this->_convertToModel($arrBlog);
    }

    public function getAllBlogs()
    {
        $arrQuery = array();
        $cursorBlogs = $this->_getCollection()->find($arrQuery);
        return new Betabud_Iterator_Dao_Mongo_Cursor($cursorBlogs, $this);
    }

    protected function _convertToModel($arrBlog)
    {
        return Betabud_Model_Blog::createFromDao($this, $arrBlog);
    }

    public function save(Betabud_Model_Blog $modelBlog)
    {
        $this->_save($modelBlog);
    }
}
