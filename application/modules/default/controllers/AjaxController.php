<?php
class AjaxController extends Betabud_Controller_Action_Ajax
{
    public function indexAction()
    {
        $this->_redirect('/');
    }

    public function headerAction()
    {
        $this->view->layout()->setLayout('_header');
    }
}
