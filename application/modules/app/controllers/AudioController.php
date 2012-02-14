<?php
class App_AudioController extends Betabud_Controller_Action_App
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
            if(filetype($user_path . $file) == 'file' && strrpos($file, '.ogg') == (strlen($file) - 4))
            {
                $new_file['filename'] = $file;
                $new_file['size'] = filesize($user_path . $file);

                $audio_files[] = $new_file;
            }
        }
        $this->view->assign('audio_files', $audio_files);

    }

    public function indexAction()
    {
        $this->requireLogin();
        $this->setAppTitle('Audio Player');
    }
}
