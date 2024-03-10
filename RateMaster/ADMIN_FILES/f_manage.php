<?php
     include('file_sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Rate</title>
    <link rel="stylesheet" href="manage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="wrapper">
        <main>

            <h1>RATE MANAGEMENT</h1>

            <div class="tableForManage" id = "tableForManage" >
                <!-- generate table for user management -->
            </div>

        </main>
</div>




<script>
      $(document).ready(function () {
                  displayTableForManage();  
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                     displayTableForManage();              
            });
            }


            function displayTableForManage(){
                $.ajax({
                        url: "ajax.php",
                        type: 'post',
                        data: {
                            displayTableForManageInFrate:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForManage').html(data);                       
                        }
                    });
            }
</script>
    
</body>
</html>