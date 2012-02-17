<?php
class App_Form_BlogCreate extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        $this->setAction('');

        $title = new Zend_Form_Element_Text('Title');
        $title->setLabel('Title');

        $text = new Zend_Form_Element_Textarea('Body');
        $text->setOptions(array('style' => 'height: 150px; width: 300px;'));
        $text->setLabel('Text');

        $submit = new Zend_Form_Element_Submit('Submit');

        $id = new Zend_Form_Element_Hidden('id');

        $this->addElements(array($title, $text, $id, $submit));
    }

    public function setValuesFromBlog(Betabud_Model_Blog $modelBlog)
    {
        $this->Title->setValue($modelBlog->getTitle());
        $this->Body->setValue($modelBlog->getBody());
        $this->id->setValue($modelBlog->getBlogId());
    }    
}
