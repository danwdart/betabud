<?php
class Betabud_Gateway_Blog
{
    private $_daoBlog;

    public function __construct(Betabud_Dao_Mongo_Blog $daoBlog)
    {
        $this->_daoBlog = $daoBlog;
    }

    public function getByBlogId($strBlogId)
    {
        return $this->_daoBlog->getByBlogId($strBlogId);
    }

    public function getAllBlogs()
    {
        return $this->_daoBlog->getAllBlogs();
    }
    
    public function delete(Betabud_Model_Blog $modelBlog)
    {
        $this->_daoBlog->delete($modelBlog);
    }

    public function save(Betabud_Model_Blog $modelBlog)
    {
        $this->_daoBlog->save($modelBlog);
    }
}
