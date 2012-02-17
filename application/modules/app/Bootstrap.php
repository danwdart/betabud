<?php
class App_Bootstrap extends Zend_Application_Module_Bootstrap
{
    // Load the local models and forms
    protected function _initModuleAutoloader()
    {    
        $this->_resourceLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'App',
            'basePath'  => APPLICATION_PATH . '/modules/app',
        ));  
    }    
    protected function _initAcl()
    {    
        //$acl = $this->getApplication()->getResource('acl');     
        $acl = Zend_Registry::get('acl');
        {    
            $acl->add(new Zend_Acl_Resource('app/blog'));
                 
            $acl->allow(Betabud_Model_User_Helper_UserType::TYPE_GUEST, 'app/blog', 'index');
            $acl->allow(Betabud_Model_User_Helper_UserType::TYPE_USER, 'app/blog', array(
                'write',
                'delete'
            ));
        }
    }
}
