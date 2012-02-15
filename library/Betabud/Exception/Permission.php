<?php
class Betabud_Exception_Permission
{
    const MESSAGE = 'Sorry - you don\'t have permission to do that.';

    public function __construct()
    {
        parent::__construct(sprintf(self::MESSAGE));
    }
}
