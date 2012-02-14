<?php
class App_FooController extends Betabud_Controller_Action_App
{
   public function indexAction()
   {
        $this->view->assign('foo', 'Some Data');
   }
} 
