<?php
    
    declare(strict_types = 1);

    class Calculator
    {

        private $operands=[1];
        private $operator;
        public $flag=0;

        public function __construct(string $value)
        {
            $seperateValues=explode(" ",$value);

            $this->operator=array_shift($seperateValues);
            
            for ($x = 0; $x < count($seperateValues); $x++) {
                try
                {
                    if(is_numeric($seperateValues[$x])==1)
                    {
                        $this->operands[$x]=(int)$seperateValues[$x];
                    }
                    else
                    {
                        $this->flag=1;
                    }
                }
                catch(Exception $e)
                    {
                        $this->flag=1;
                    }
                }
            }
        



        public function calculate()
        {
            if($this->flag==0)
            {
                switch ($this->operator)
                {
                    case 'add':
                        $result = array_sum($this->operands);
                        return $result;
                        break;
                    case 'asc':
                        $result = sort($this->operands);
                        for($x = 0; $x < count($this->operands); $x++) {
                            echo $this->operands[$x];
                            echo "<br>";
                          }
                        return 2;
                        break;    
                    case 'subtract':
                        $subvalue=0;
                        for ($x = 1; $x < count($this->operands); $x++) {
                            $subvalue += $this->operands[$x];
                        }
                        $result = $this->operands[0]-$subvalue;
                        return $result;
                        break;
                    default:
                        $result="No option matches (add/asc/substract) in input<br>";
                        echo $result;
                        break;
                }
            }
            else{
                $this->flag=0;
            }   
        }
    }