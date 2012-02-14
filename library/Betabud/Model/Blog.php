class Blog extends BaseBlog
{
    public function isMine()
    {
        return(User::getIdentity() == $this->getUser());
    }

}
