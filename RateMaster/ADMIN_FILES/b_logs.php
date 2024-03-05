<?php
     include('build_sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build Rate</title>
    <link rel="stylesheet" href="logs.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
<div class="wrapper">
        <main>

            <h1>ACTIVITY LOG</h1>

            <div class="tableForLogs" id = "tableForLogs" >
                <!-- generate table for user management -->
            </div>

        </main>
</div>


<script>
      $(document).ready(function () {
                  displayTableForActivityLog();  
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                     displayTableForActivityLog();              
            });
            }


            function displayTableForActivityLog(){
                $.ajax({
                        url: "ajax.php",
                        type: 'post',
                        data: {
                            displayTableForActivityLogBuild:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForLogs').html(data);                       
                        }
                    });
            }
</script>
</body>
</html>