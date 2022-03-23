<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="search" value="" >
    <input type="submit" value="Submit">
    </form>
</body>
</html>
<?php 
if(!empty($_POST)){
    
    InsertValue($_POST['search']);
}
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
    // insert into contactus (id,name) values (?,?);
    $sql = "select * from contactus where firstname like $user_id";    
    $result = $conn->query($sql);
     echo $sql;exit;

    if($result->num_rows > 0){
        $array_result = $result->fetch_all(MYSQLI_ASSOC); 
    include 'include_table.php';
     }
    else{
      // echo 1;
        echo $conn->connect_error;
        }
        $conn->close();
        return $array_result;
}

?>
