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

        $form = new App_Form_BlogCreate();

        $id = $this->getRequest()->getQuery('id', null);
        
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost()))
            {
                $strTitle = $form->Title->getValue();
                $strBody = $form->Body->getValue();

                $id = $this->getRequest()->getPost('id');
                try {
                    $blog = Betabud_Gateway::getInstance()->getBlog()->getByBlogId($id);
                    if(!$blog->isMine()) {
                        return $this->setMessage(array(
                            'text' => 'Blog not yours to edit!',
                            'class' => 'error',
                            'redirect' => '/app/blog'
                        ));
                    }
                    $blog->setTitle($strTitle);
                    $blog->setBody($strBody);
                } catch(Betabud_Dao_Exception_Blog_NotFound $e) {
                    $modelUser = Betabud_Auth::getInstance()->getIdentity()->getUser();
                    $blog = Betabud_Model_Blog::create($strTitle, $strBody, $modelUser);
                }

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
            if(!is_null($id)) {
                $blog = Betabud_Gateway::getInstance()->getBlog()->getByBlogId($id);
                $form->setValuesFromBlog($blog);
            }
        }

        $this->view->assign('form', $form);
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getQuery('id');

        $blog = Betabud_Gateway::getInstance()->getBlog()->getByBlogId($id);
        if (!$blog instanceof Betabud_Model_Blog ||
            !$blog->isMine() ||
            !Betabud_Auth::getInstance()->getIdentity()->getUser()->isGod())
        {
            $this->_redirect('/app/blog');
        }

        $blog->delete();

        $this->_redirect('/app/blog');
    }        
}
