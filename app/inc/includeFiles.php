<?php
    spl_autoload_register('autoLoader');

    function autoLoader($className)
    {
        $path='../models/';
        
        $extesnion='.php';

        require_once $path.$className.$extesnion;
    }

?>