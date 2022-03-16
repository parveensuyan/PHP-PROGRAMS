<?php
 session_start();
$user_id =  $_SESSION['user_id'];
// unset($_SESSION);
$array_result = InsertValue($user_id);
// print_r($array_result);
// exit;
    function InsertValue($user_id){
            $array_result = array();

            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "myDB";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
            }
            // echo $encryption;exit;
            $sql = "select * from contactus";    
           
            $result = $conn->query($sql);
            if($result->num_rows >0){
                // $_POST['username'] = 
                $array_result = $result->fetch_all(MYSQLI_ASSOC); 

             }
            else{
                echo "error".$conn->connect_error;
                }
                $conn->close();
                return $array_result;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <p>HI ADMIN</p>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Message</th>
    <th>Action</th>
  </tr>
 <?php 
// print_r($array_result);
 
 foreach($array_result as $value){?>
  <tr>
    <td><?php echo $value['firstname'];?></td>
    <td><?php echo $value['email'];?></td>
    <td><?php echo $value['mobile'];?></td>
    <td><?php echo $value['message'];?></td>
    <td><a href="edit.php/<?php echo $value['id'];?>">Edit</a> | <a href="delete.php/<?php echo $value['id'];?>">Delete</a></td>
  </tr>
 <?php } ?>
 
</table>

</body>
</html>


