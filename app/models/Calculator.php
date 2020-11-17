<?php
    
    declare(strict_types = 1);

    class Calculator
    {

        private $operands=[0];              //array to store all the numbers
        private $operator;                  //string to store the operator
        public $flag=0;                     //created to help us identify if there is any error

        public function __construct(string $value)      //constructor
        {
            $seperateValues=explode(" ",$value);        //splitting the input using ' '

            $this->operator=array_shift($seperateValues);   //using this method, I stored the operator in the operator property of 
                                                            //this class and removed it from the array
            
            
            for ($x = 0; $x < count($seperateValues); $x++) 
            {
                try
                {
                    if(is_numeric($seperateValues[$x])==1)
                    {
                        $this->operands[$x]=(int)$seperateValues[$x];   //retreivng the numbers from the existing array to the operands 
                    }                                                   //property I have created int this class
                    else
                    {
                        $this->flag=1;                  //if the array has something else than a number, the flag becomes 1
                    }
                }
                catch(Exception $e)
                {
                    $this->flag=1;                      //also if there is any exception, the flag becomes 1
                }
            }
        }
        
        public function calculate()
        {
            if($this->flag==0)                      //if flag is not equal to 0, I will not do any process and show an error 
            {
                switch ($this->operator)
                {
                    case 'add':
                        $result = array_sum($this->operands);       //php array method for sum
                        return $result;
                        break;
                    
                        case 'asc':
                        $result = sort($this->operands);            //php array method for sorting
                        echo "The result is:";
                        for($x = 0; $x < count($this->operands); $x++) {
                            echo $this->operands[$x]." ";
                          }
                          return "none";
                        break;    
                    
                        case 'subtract':
                        $subvalue=0;
                        for ($x = 1; $x < count($this->operands); $x++) 
                        {                                                                   //logic for subtraction
                            $subvalue += $this->operands[$x];
                        }
                        
                        $result = $this->operands[0]-$subvalue;

                        return $result;
                        break;

                        case 'repo':
                            $opts = [
                                'http' => [
                                        'method' => 'GET',
                                        'header' => [                   
                                                'User-Agent: PHP'
                                        ]
                                ]
                            ];          //as the github requires a header for the UserAgent to be sent for succesfully retrieving data using the Api. 
                        
                            $context = stream_context_create($opts);
                            $webUrl = 'https://api.github.com/repos/';  //github link for getting to the repo
                            $userName='ShivGhai18/';                    //my username
                            $repoName='TestProgram';                    //Name of my repo in github
                            $gitUrl=$webUrl.$userName.$repoName;        //joing the whole thing to make the complete url.
                        
                            $git_json = file_get_contents($gitUrl, false, $context);   //used to convert the entire data retrived into string     
                        
                            $git_array = json_decode($git_json, true);      //takes the entire JSON encoded string and divides into a php variable(an array)
                        
                            $description = $git_array['description'];       //getting the description as asked in the question
                        
                            echo "Repository Descripton:".$description;     
                            return "none";  
                            
                            break;

                        default:
                        $result="No option matches (add/asc/substract) in input<br>";       //if none of the case matches.
                        
                        echo $result;
                        
                        break;

                        
                }
            }
            else
            {
                $this->flag=0;      //making flag=0 after verifying that there was an error in the input.
            }   
        }
    }
?>