<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Betabud_');
        $autoloader->registerNamespace('Mongo_');
    }

    protected function _initRoutes()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
/*
        $route = new Zend_Controller_Router_Route_Regex('.*-p(\d+).htm',
            array(
                'controller' => 'product',
                'action'     => 'index'
            ),
            array(1 => 'id')
        );
        $router->addRoute('product', $route);
        $route = new Zend_Controller_Router_Route_Static(
            'logout',
            array(
                'controller' => 'login',
                'action' => 'logout'
            )
        );

        $router->addRoute('logout', $route);
        
        $route = new Zend_Controller_Router_Route_Static(
            'userinfo',
            array(
                'controller' => 'login',
                'action' => 'userinfo'
            )
        );

        $router->addRoute('userinfo', $route);
	*/
    }
 
    protected function _initConstants()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/config/zetabud.ini');

        foreach($config->zb->toArray() as $key => $value)
        {
            define(strtoupper($key), $value);
        }
    }

    protected function _initSql()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/config/sql.ini');
        $zendDb = Zend_Db::factory($config->database);

        $zendDb->getConnection();

        Betabud_Dao_Sql_Abstract::setAdapter($zendDb);
    }
}
