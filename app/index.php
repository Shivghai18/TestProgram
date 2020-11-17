<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/styles.css">  <!-- linking the css file -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   
  <script type="text/javascript">               
        $(document).ready(function(){           //after the document loads successfully and completely
           
            $("#btn1").click(function()         //button click event after entering the values in the textfield
            {
                 var inputValue = $('#inputValue').val();   

                 $.ajax({
                    url:'../app/Controller/Controller.php',         //using ajax, including the Controller file
                    type: "POST",                                   //Using safe Post method for secure flow of data
                    data:{'inputVal':inputValue},                   //sending the data we took from the textbox
                    success: function(answer){
                        $("#showBlock").html(answer);               //showing data in the div tag

                    }
                 }).error(function(){ $("#showBlock").html("Error in the program");});      //if any error occors while using Ajax

            });    
  
            $(document).ready(function(){
            $("#btn2").click(function(){                //using toggle functionality of jquery for showing and hiding the hint.
                $("p").toggle();
            });
            });
  
        });
  
    </script> 
</head>
<body>
    <div id='div1'>
        <label>Enter the arguments</label>
        <br>
         <input id="inputValue" name="txtArgs">                 <!-- Creating the textfield and buttons required -->
   <button id='btn2'>?</button> 
        <br>
        <button id='btn1'>Calculate</button> 
        
        <br>
   <div id="showBlock" style="margin-top:10px;padding-left: 50px;"></div>        
   </div>
   <p hidden>Help for parametersto be inserted in the textfield.<br>1)add 1 2 3 <br>2)subtract 2 3 4 <br>3)asc 4 3 5 6 <br>4)repo</p>

</body>

</html>


