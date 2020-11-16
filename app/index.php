
<!Doctype html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
  <script type="text/javascript">
        $(document).ready(function(){
           
            $("button").click(function()
            {
                 var inputValue = $('#inputValue').val();

                 $.ajax({
                    url:'../app/Controller/Controller.php',
                    type: "POST",
                    data:{'inputVal':inputValue},
                    success: function(answer){
                        $("#showBlock").html(answer);

                    }
                 }).error(function(){ $("#showBlock").html("Error in the program");});

            });    
        });
    </script> 
</head>

<body>
    
    <label>Enter the arguments</label>
    <input id="inputValue" name="txtArgs">
    <button>Calculate</button>         
   
   <div id="showBlock"></div>
</body>

</html>


