class Blog extends BaseBlog
{
    public function isMine()
    {
        return(Betabud_Auth::getInstance()->getIdentity()->getUser() == $this->getUser());
    }

}
