<?php
    require_once '../inc/includeFiles.php';         //including the autoload file which will import the class file

    class Controller{
        public function helpCalculate()             //method helping the controller object to create an instance of Calculator object 
                                                    //and allowing to use all its functions 
        {
            if(isset($_POST)){
        
            extract($_POST);
    
            $calc=new Calculator($inputVal);
            
            $result=$calc->calculate();

            return $result;

            }
        }
    }

    $controllerObj=new Controller();                //instance of controller object 

    $result=$controllerObj->helpCalculate();        //calling the helper method

    if($result!=null && $result!="none")
    {
        echo "The result is:".$result;              //Showing the output if it is not null and "none" 
    }
    else{
        if($result!="none")
        {
            echo "Error in Input!";                 //if there was error in the input and the Calculator class returns null
        }
    }

?>