<?php
     include('file_sidebar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irate User</title>
    <link rel="stylesheet" href="user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="wrapper">
        <main>

            <h1>USER MANAGEMENT</h1>

            <div class="tableForUser" id = "tableForUser" >
                <!-- generate table for user management -->
            </div>

        </main>
</div>



       <!-- modal -->
       <div class="modal" tabindex="-1" id = "SuccessfullDelete" style = "margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Notice!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Successfully Deleted from File Rate User Information!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick = "refreshIfClose()">Close</button>
        
      </div>
    </div>
  </div>
</div>



<script>
    $(document).ready(function () {
                  displayTableForUser();  
                              
            });

            function refreshIfClose(){
                    $(document).ready(function () {
                     location.reload();
                     displayTableForUser();              
            });
            }


            function displayTableForUser(){
                $.ajax({
                        url: "ajax.php",
                        type: 'post',
                        data: {
                                displayUserInFrate:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console
                            $('#tableForUser').html(data);                       
                        }
                    });
            }

            function DeleteUser(id){

                var id = id;
                $.ajax({
                        url: "ajax.php",
                        type: 'post',
                        data: {
                                id:id,
                                toDeleteUserInFrate:true
                        },
                        success:function (data, status) {
                            console.log(data); // Check the data in the console

                            $('#SuccessfullDelete').show('modal');                       
                        }
                    });
            }
</script>

        
    
</body>
</html>