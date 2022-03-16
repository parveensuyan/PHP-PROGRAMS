<?php
 session_start();
$user_id =  $_SESSION['user_id'];
$array_result = InsertValue($user_id);

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
            if($result->num_rows > 0){
                // $_POST['username'] = 
                $array_result = $result->fetch_all(MYSQLI_ASSOC); 
            // include 'include_table.php';
              // print_r($test);
             }
            else{
              // echo 1;
                echo $conn->connect_error;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <p>HI ADMIN</p>
<table id="customers">
 <?php include 'include_table.php' ; ?>
 
</table>
</body>
</html>
<!-- dashboard where view all of the record
index_admin.js jquery
delete.php delte the entity and generate a new html

-->

