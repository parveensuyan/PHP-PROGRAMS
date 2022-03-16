<?php
    // print_r($_GET);
    $username = $pwd  = '';

    if(!empty($_POST)){
        if($_POST['username'] !='' ){
            $username = $_POST['username'];
        }
        if($_POST['pwd'] !='' ){
            $pwd = $_POST['pwd'];
        }
    }

    $error_log = array();
    // $error_log['name'] = '';  //global variable
    $error_log = formValidation();
    //requirement was to the get the error message
    function formValidation(){
        $error_log['username'] = $error_log['pwd'] = '';

        if(isset($_POST) && !empty($_POST)  ){
            
            if(trim($_POST['username']) == ''){

            $error_log['username'] = 'Please enter your Name';   
            //push the string value for the key name and the array name is error_log
            }
            if($_POST['pwd'] == ''){
            $error_log['pwd'] = 'Please enter your Password';
            }
            if($_POST['username']!='' && $_POST['pwd']!=''){
            $error_log['sucess'] = '<p class="success">Thank you we will contact you soon</p>';
            $name = '';
            }
    }

    return $error_log;

    }
    if(isset($error_log['sucess']) && !empty($error_log['sucess'])){
       $error_log =  InsertValue();
        $name = $email = $mobile = $message = '';
    }

    function InsertValue(){
            $error_log = array();
            $error_log['username'] = $error_log['pwd']   = '';

            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "myDB";
            $conn = new mysqli($servername, $username, $password, $dbname);
            //connection (create)
            //check  errors
         // print_r($_POST);

        // Store the cipher method
         $ciphering = "AES-128-CTR";
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
      // Non-NULL Initialization Vector for encryption
        // Store the encryption key

        $decryption_iv = '1234567891011121';

        // Store the decryption key
        $decryption_key = "GeeksforGeeks";
        // $decryption=openssl_decrypt ($encryption, $ciphering,
		// $decryption_key, $options, $decryption_iv);


            if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
            }
            // echo $encryption;exit;
            $sql = "select * from user_list where username = '$_POST[username]'";    
           
            $result = $conn->query($sql);
            if($result->num_rows >0){
                // $_POST['username'] = 
                $row = $result->fetch_assoc();
                
                $decryption=openssl_decrypt ($row['pwd'], $ciphering,
                $decryption_key, $options, $decryption_iv);

                if($_POST['pwd'] == $decryption){
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    // echo $_SESSION['user_id'];
// exit;
                    header("Location: dashboard.php");
                    die();
                 }
                 else{
                    // echo $error_log = ' ';
                    $error_log['pwd'] = 'Incorrect password try again!';
                 }
             }
            else{
                echo "error".$conn->connect_error;
                $error_log['username'] = 'Please try again!'; 
            //   print_r($error_log);exit;

                }
                $conn->close();
                return $error_log;
    }
    // echo 1;
    // print_r($_POST);
    ?>
    <!-- FORM 
    1.NUMBER OF INPUT FIELD 
    2.THE URL AFTER SUBMIT THE FORM WHERE THE DATA SHOULD GO
    3. PHP_SELF SEND THE DATA ON THE SAME PAGE WHICH METHOD POST/GET
    4. VALIDATION ERROR MESSAGE
    5. FUNCTION A formValidation
    6. form is not empty
    7. name , email,mobileno,message is not empty
    8. validation error
    9. values should not be reset
    -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact us</title>
    <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="container">
            <div class="maindiv">
            <div class="col-6">

                <?php //echo $error_log['sucess'];?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="username">User Name <span class = "error-msg" >*<span></label>
                    <input type="text" class ="input-div-nn" id="username" name = "username"
                    value = "<?php echo $username; ?>">
             
                        <p class = "error-msg"><?php echo $error_log['username'];?></p>

                    <label for="pwd">Password<span class = "error-msg" >*</label>
                    <input type="password" class ="input-div-nn" id="pwd" name="pwd"
                    value = "<?php echo $pwd; ?>"                >
                    <p class = "error-msg"><?php echo $error_log['pwd'];?></p>
                    <a href="index.php" class="href">create an account</a>

                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>
            <div class="col-6"></div>
            </div>
        </div>
    </body>
    </html>

