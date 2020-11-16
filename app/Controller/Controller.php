<?php
    require_once '../inc/includeFiles.php';

    class Controller{
        public function helpCalculate()
        {
            if(isset($_POST)){
        
            extract($_POST);
    
            $calc=new Calculator($inputVal);
            
            $result=$calc->calculate();

            return $result;
            }
        }
    }

    $controllerObj=new Controller();

    $result=$controllerObj->helpCalculate();

    if($result!=null && $result!=2)
    {
        echo "The result is:".$result;
    }
    else{
        if($result!=2)
        {
            echo "Error in Input!";
        }
    }

?>