<?php
class App_FilesController extends Betabud_Controller_Action_App
{
    public function preDispatch()
    {
        $files_path = realpath(APPLICATION_PATH . '/../user/');
        $user_path = $files_path . '/' . Betabud_Auth::getInstance()->getIdentity()->getUsername() . '/';

        if(!is_dir($user_path))
        {
            if(!mkdir($user_path))
            {
                echo '<br />Cannot create user directory. Set owner on user directory to web user.';
            }
        }

        $handle = opendir($user_path);
        while(($file = readdir($handle)) !== false)
        {
            if(filetype($user_path . $file) == 'file')
            {
                $new_file['filename'] = $file;
                $new_file['size'] = filesize($user_path . $file);
                $files[] = $new_file;
            }
        }

        $this->view->assign('files', $files);
    }
    public function indexAction()
    {
        $this->view->assign('apptitle', 'My Files');
    }
}
