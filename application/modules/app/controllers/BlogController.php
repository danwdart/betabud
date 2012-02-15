<?php
class App_BlogController extends Betabud_Controller_Action_App
{
    public function indexAction()
    {
        $blogs = Betabud_Gateway::getInstance()
                                ->getBlog()
                                ->getAllBlogs()
                                ->sort(array(Betabud_Model_Blog::FIELD_TIMEMODIFIED => Betabud_Iterator_Interface::SORT_ASC));
        $this->view->assign('blogs', $blogs);
    }

    public function writeAction()
    {
        $this->requireLogin();

        $form = new Zend_Form();

        $form->setMethod('post');
        $form->setAction('');

        $title = new Zend_Form_Element_Text('Title');
        $title->setLabel('Title');

        $text = new Zend_Form_Element_Textarea('Text');
        $text->setOptions(array('style' => 'height: 150px; width: 300px;'));
        $text->setLabel('Text');

        $submit = new Zend_Form_Element_Submit('Submit');

        $id = new Zend_Form_Element_Hidden('id');

        $form->addElements(array($title, $text, $id, $submit));

        $id = $this->getRequest()->getPost('id');
        if(!is_numeric($id))
        {
            $id = $this->getRequest()->getQuery('id');
            if(!empty($id) && !is_numeric($id))
            {
                $this->redirect('/app/blog');
            }
        }

        $blog = BlogPeer::retrieveByPK($id);

        if(!$blog instanceof Blog || !$blog->isMine())
        {
            $blog = new Blog();
        }

        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost()))
            {
                $blog->fromArray($form->getValues());
                $blog->setUser(Betabud_Auth::getInstance()->getIdentity()->getUser());
                $blog->save();

                $this->setMessage(array(
                    'text' => 'Blog Saved',
                    'class' => 'info',
                    'redirect' => '/app/blog'
                ));
            }
            else
            {
                $this->setMessage(array(
                    'text' => 'Form is invalid',
                    'class' => 'error'
                ));
            }
        }
        else
        {
            $form->setDefaults($blog->toArray());
        }

        $this->view->assign('form', $form);
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getQuery('id');

        if(!is_numeric($id))
        {
            $this->_redirect('/app/blog');
        }

        $blog = BlogPeer::retrieveByPK($id);
        if(!$blog instanceof Blog || !$blog->isMine())
        {
            $this->_redirect('/app/blog');
        }

        $blog->delete();

        $this->_redirect('/app/blog');
    }        
}
