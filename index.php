<?php

$error_log = [];
$error_log['name'] = '';  //global variable
formValidation();
// at the first time array is going to  empty 
//once click the submit button 

function formValidation(){
    // $i<2 ? true:false;
    // print_r($_POST);
    // echo !empty($_POST)?1:0;exit;
    if(isset($_POST) && !empty($_POST)  ){
        // if(!$_POST['name']){
        //     $error_log['name'] = '';
        // }
        if(trim($_POST['name']) != ''){
          
           echo $error_log['name'];
        }
        else{
           $error_log['name'] = 'Please enter your Name';   
        //    echo $error_log['name'];
        }
        $_POST['error_log'] = $error_log;
        // print_r( $_POST); exit;
// ret
}

}
echo '2'. $error_log['name'];

//  print_r($error_log); exit;?>
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
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="name">Name <span class = "error-msg" >*<span></label>
                <input type="text" class ="input-div-nn" id="name" name = "name">
                    <p class = "error-msg"><?php echo $error_log['name']?'yes':'';?></p>
            
                <label for="email">Email<span class = "error-msg" >*</label>
                <input type="email" class ="input-div-nn" id="email" name="email">
                <p class = "error-msg">Please enter your Email</p>
                <label for="mobile">Mobile Number<span class = "error-msg" >*</label>
                <input type="text" class ="input-div-nn" id="mobile" name = "mobile">
                <p class = "error-msg">Please enter your Mobile Number</p>
                <label for="message">Message<span class = "error-msg" >*</label>
                <textarea name="message" id="message" cols="30" rows="10" class="input-div-nn"></textarea>
                <p class = "error-msg">Please enter your Message</p>

                <input type="submit" class="submit" value="Send Message">
            </form>
        </div>
        <div class="col-6"></div>
        </div>
    </div>
</body>
</html>

