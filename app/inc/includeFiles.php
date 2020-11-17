<?php
    spl_autoload_register('autoLoader');    // using this method in php will eliminate the process of writing include or require lines for 
                                            //each and every model class.
    function autoLoader($className)
    {
        $path='../models/';         //to always move into the model folder where all the model classes will be located.
        
        $extesnion='.php';

        $fullPath= $path.$className.$extesnion;

        if(!file_exists($fullPath))             //for checking if the file exists otherwise catch that exception
        {                           
            return false;
        }
        require_once $path.$className.$extesnion;
    }

?>