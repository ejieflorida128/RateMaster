<?php

    include('../connection.php');


    if(isset($_POST['displayUserInIrate']) && $_POST['displayUserInIrate'] == true){

        echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table" >';
        $table = '<table class="table table-bordered table-hover">
                <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
                <tr> 
                    <th scope="col" class="text-center align-middle">Account No.</th>
                    <th scope="col" class="text-center align-middle">Username</th>
                    <th scope="col" class="text-center align-middle">Password Hash</th>
                    <th scope="col" class="text-center align-middle">Action</th>
                </tr>
                </thead>
                <tbody>';

                
                $sql = "SELECT * FROM users WHERE option = 'irate'";

                $result = mysqli_query($conn,$sql);
                $number = 1;

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {

                      $id = $row['user_id'];
                      $username = $row['username'];
                      $password = $row['password_hash'];
                     
                     
                      
                      
                     
                    
              
                      $table .= '<tr>
                          <td scope="row" class="text-center align-middle">' . $number . '</td>
                          <td scope="row" class="text-center align-middle">' . $username . '</td>
                          <td scope="row" class="text-center align-middle">' . $password . '</td>
                          <td class="text-center align-middle">
                             
                              <button class = "btn btn-outline-danger"  style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick = "DeleteUser('.$id.')">Delete</button>
                         
                              </td
                          
                      </tr>';
              
                      $number++;
              
              
                  }
              } else {
                  // If no data, display a row with "No Data Information"
                  $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
              }
              
                  $table .= '</tbody></table>';
                  echo $table;
                  echo '</div>';
    }

    

    if(isset($_POST['toDeleteUserInIrate']) && $_POST['toDeleteUserInIrate'] == true){

        $toDelte = $_POST['id'];

        $delete = "DELETE FROM users WHERE user_id = $toDelte";
        mysqli_query($conn,$delete);
}



if(isset($_POST['displayUserInBrate']) && $_POST['displayUserInBrate'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Account No.</th>
                <th scope="col" class="text-center align-middle">Username</th>
                <th scope="col" class="text-center align-middle">Password Hash</th>
                <th scope="col" class="text-center align-middle">Action</th>
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM users WHERE option = 'buildrate'";

            $result = mysqli_query($conn,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                  $id = $row['user_id'];
                  $username = $row['username'];
                  $password = $row['password_hash'];
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $username . '</td>
                      <td scope="row" class="text-center align-middle">' . $password . '</td>
                      <td class="text-center align-middle">
                         
                          <button class = "btn btn-outline-danger"  style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick = "DeleteUser('.$id.')">Delete</button>
                     
                          </td
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}



if(isset($_POST['toDeleteUserInBrate']) && $_POST['toDeleteUserInBrate'] == true){

    $toDelte = $_POST['id'];

    $delete = "DELETE FROM users WHERE user_id = $toDelte";
    mysqli_query($conn,$delete);
}


if(isset($_POST['displayUserInHrate']) && $_POST['displayUserInHrate'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Account No.</th>
                <th scope="col" class="text-center align-middle">Username</th>
                <th scope="col" class="text-center align-middle">Password Hash</th>
                <th scope="col" class="text-center align-middle">Action</th>
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM users WHERE option = 'hypebeast'";

            $result = mysqli_query($conn,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                  $id = $row['user_id'];
                  $username = $row['username'];
                  $password = $row['password_hash'];
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $username . '</td>
                      <td scope="row" class="text-center align-middle">' . $password . '</td>
                      <td class="text-center align-middle">
                         
                          <button class = "btn btn-outline-danger"  style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);" onclick = "DeleteUser('.$id.')">Delete</button>
                     
                          </td
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}



if(isset($_POST['toDeleteUserInHrate']) && $_POST['toDeleteUserInHrate'] == true){

    $toDelte = $_POST['id'];

    $delete = "DELETE FROM users WHERE user_id = $toDelte";
    mysqli_query($conn,$delete);
}





// rate management

if(isset($_POST['displayTableForManageInIrate']) && $_POST['displayTableForManageInIrate'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Item No.</th>
                <th scope="col" class="text-center align-middle">Item Name</th>
                <th scope="col" class="text-center align-middle">Item Price</th>
                <th scope="col" class="text-center align-middle">Item Source</th>
                <th scope="col" class="text-center align-middle">Seller Information</th>
                <th scope="col" class="text-center align-middle">Rate</th>
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM items";

            $result = mysqli_query($connForEjie,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                  $id = $row['id'];
                  $item_name = $row['item_name'];
                  $item_price = $row['item_price'];
                  $item_source = $row['item_source'];
                  $seller = $row['seller'];
                  $rate = $row['rate'];
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $item_name . '</td>
                      <td scope="row" class="text-center align-middle">' . $item_price . '</td>
                      <td scope="row" class="text-center align-middle">' . $item_source . '</td>
                      <td scope="row" class="text-center align-middle">' . $seller . '</td>
                      <td scope="row" class="text-center align-middle">' . $rate . ' 
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" fill="green" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                      </td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}





if(isset($_POST['displayTableForManageInBuild']) && $_POST['displayTableForManageInBuild'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Item No.</th>
                <th scope="col" class="text-center align-middle">Building Name</th>
                <th scope="col" class="text-center align-middle">price</th>
                <th scope="col" class="text-center align-middle">state</th>
                <th scope="col" class="text-center align-middle">Location</th>
                <th scope="col" class="text-center align-middle">City</th>
                <th scope="col" class="text-center align-middle">Rate</th>
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM propertylist";

            $result = mysqli_query($connForEjie,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                  $id = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $state = $row['state'];
                  $location = $row['location'];
                  $city = $row['city'];
                  $rate = $row['rate'];
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $title . '</td>
                      <td scope="row" class="text-center align-middle">' . $price . '</td>
                      <td scope="row" class="text-center align-middle">' . $state . '</td>
                      <td scope="row" class="text-center align-middle">' . $location . '</td>
                      <td scope="row" class="text-center align-middle">' . $city . '</td>
                      <td scope="row" class="text-center align-middle">' . $rate . ' 
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" fill="green" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                      </td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}


if(isset($_POST['displayTableForManageInHype']) && $_POST['displayTableForManageInHype'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Item No.</th>
                <th scope="col" class="text-center align-middle">Building Name</th>
                <th scope="col" class="text-center align-middle">price</th>
                <th scope="col" class="text-center align-middle">state</th>
                <th scope="col" class="text-center align-middle">Location</th>
                <th scope="col" class="text-center align-middle">City</th>
                <th scope="col" class="text-center align-middle">Rate</th>
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM product";

            $result = mysqli_query($connForEjie,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                  $id = $row['id'];
                  $item_name = $row['item_name'];
                  $price = $row['price'];
                  $brand = $row['brand'];
                  $item_type = $row['item_type'];
                  $seller_type = $row['seller_type'];
                  $rate = $row['rate'];
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $item_name . '</td>
                      <td scope="row" class="text-center align-middle">' . $price . '</td>
                      <td scope="row" class="text-center align-middle">' . $brand . '</td>
                      <td scope="row" class="text-center align-middle">' . $item_type . '</td>
                      <td scope="row" class="text-center align-middle">' . $seller_type . '</td>
                      <td scope="row" class="text-center align-middle">' . $rate . ' 
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" fill="green" class="bi bi-star-fill" viewBox="0 0 16 16" >
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                      </td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}



// activity logs


if(isset($_POST['displayTableForActivityLogIrate']) && $_POST['displayTableForActivityLogIrate'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Log No.</th>
                <th scope="col" class="text-center align-middle">Message</th>
              
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM `log` WHERE type = 'irate'";

            $result = mysqli_query($conn,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                
                  $message = $row['message'];
                 
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $message . '</td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}




if(isset($_POST['displayTableForActivityLogHype']) && $_POST['displayTableForActivityLogHype'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Log No.</th>
                <th scope="col" class="text-center align-middle">Message</th>
              
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM `log` WHERE type = 'hype'";

            $result = mysqli_query($conn,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                
                  $message = $row['message'];
                 
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $message . '</td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}



if(isset($_POST['displayTableForActivityLogBuild']) && $_POST['displayTableForActivityLogBuild'] == true){

    echo '<div style="max-height: 300px; max-width: 1000px; font-size: 11px; position: relative; left: 0px; top: 40px; overflow-y: auto; border-radius: 20px;" class="table">';
    $table = '<table class="table table-bordered table-hover">
            <thead class="table-dark" id="table-header" style="position: sticky; top: 0; background-color: #343a40; color: white;">
            <tr> 
                <th scope="col" class="text-center align-middle">Log No.</th>
                <th scope="col" class="text-center align-middle">Message</th>
              
               
            </tr>
            </thead>
            <tbody>';

            
            $sql = "SELECT * FROM `log` WHERE type = 'build'";

            $result = mysqli_query($conn,$sql);
            $number = 1;

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                
                  $message = $row['message'];
                 
                 
                 
                  
                  
                 
                
          
                  $table .= '<tr>
                      <td scope="row" class="text-center align-middle">' . $number . '</td>
                      <td scope="row" class="text-center align-middle">' . $message . '</td>
                     
                      
                  </tr>';
          
                  $number++;
          
          
              }
          } else {
              // If no data, display a row with "No Data Information"
              $table .= '<tr><td colspan="8" class="text-center" style = "font-size: 20px; letter-spacing: 4px; background-color: #d95f57;">No Data Information</td></tr>';
          }
          
              $table .= '</tbody></table>';
              echo $table;
              echo '</div>';
}




?>