    <?php
    // print_r($_GET);
    $name = $email = $mobile = $message = '';
    if(!empty($_POST)){
        if($_POST['username'] !='' ){
            $name = $_POST['username'];
        }
        if($_POST['pwd'] !='' ){
            $email = $_POST['pwd'];
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
            $error_log['pwd'] = 'Please enter your Email';
            }
            if($_POST['username']!='' && $_POST['pwd']!=''){
            $error_log['sucess'] = '<p class="success">Thank you we will contact you soon</p>';
            $name = '';
            }
    }

    return $error_log;

    }
    if(isset($error_log['sucess']) && !empty($error_log['sucess'])){
        InsertValue();
        $name = $email = $mobile = $message = '';
    }

    function InsertValue(){
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
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "GeeksforGeeks";

$encryption = openssl_encrypt($_POST['pwd'], $ciphering,
			$encryption_key, $options, $encryption_iv);
            if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
            }
            // echo $encryption;exit;
            $sql = "insert into user_list (username,pwd) values('$_POST[username]', 
            '$encryption')";    
            if($conn->query($sql)=== true){
                echo "done";
                }
                else{
                echo "error".$conn->connect_error;
                

                }
                $conn->close();
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
                    value = "<?php echo $name; ?>">
             
                        <p class = "error-msg"><?php echo $error_log['username'];?></p>

                    <label for="pwd">Password<span class = "error-msg" >*</label>
                    <input type="password" class ="input-div-nn" id="pwd" name="pwd"
                    value = "<?php echo $email; ?>"                >
                    <p class = "error-msg"><?php echo $error_log['pwd'];?></p>
                    <a href="login.php" class="href">Sign In</a>
                    
                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>
            <div class="col-6"></div>
            </div>
        </div>
    </body>
    </html>

