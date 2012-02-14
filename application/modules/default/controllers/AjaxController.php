<?php
class AjaxController extends Betabud_Controller_Action_Ajax
{
    public function headerAction()
    {
        $this->view->layout()->setLayout('_header');
    }
}
