<?php
class Betabud_Model_User_Helper_Exception_UnknownType extends Exception
{
    const MESSAGE = 'Unknown UserType: (%s)';

    public function __construct($intType)
    {
        parent::__construct(sprintf(self::MESSAGE, $intType));
    }
}
