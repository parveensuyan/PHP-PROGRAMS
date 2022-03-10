    <?php
    // print_r($_GET);
    $name = $email = $mobile = $message = '';
    if(!empty($_POST)){
        if($_POST['name'] !='' ){
            $name = $_POST['name'];
        }
        if($_POST['email'] !='' ){
            $email = $_POST['email'];
        }
        if($_POST['mobile'] !='' ){
            $mobile = $_POST['mobile'];
        }
        if($_POST['message'] !='' ){
            $message = $_POST['message'];
        }
    // echo "work";
    // print_r($_POST);
    }
    // function formAutofill(){
    // }
    $error_log = array();
    // $error_log['name'] = '';  //global variable
    $error_log = formValidation();
    //requirement was to the get the error message
    function formValidation(){
        $error_log['name'] = $error_log['email'] =$error_log['mobile']= $error_log['message'] =$error_log['sucess'] = '';

        if(isset($_POST) && !empty($_POST)  ){
            
            if(trim($_POST['name']) == ''){

            $error_log['name'] = 'Please enter your Name';   
            //push the string value for the key name and the array name is error_log
            }
            if($_POST['email'] == ''){
            $error_log['email'] = 'Please enter your Email';
            }
            if($_POST['mobile'] == ''){
            $error_log['mobile'] = 'Please enter your Mobile number';
            }
            if($_POST['message'] == ''){
            $error_log['message'] = 'Please enter your Message';
            }
            if($_POST['name']!='' && $_POST['email']!='' && $_POST['mobile'] !='' && $_POST['message']!=''){
            $error_log['sucess'] = '<p class="success">Thank you we will contact you soon</p>';
            $name = '';
            }
    }

    return $error_log;

    }
    if(isset($error_log['sucess']) && !empty($error_log['sucess'])){
        $name = $email = $mobile = $message = '';
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

                <?php echo $error_log['sucess'];?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="name">Name <span class = "error-msg" >*<span></label>
                    <input type="text" class ="input-div-nn" id="name" name = "name"
                    value = "<?php echo $name; ?>">
                    <!-- give the name to the input the field it will work as 
                    a key in a array and value will be entered by the user
                    isset($error_log['name']?($error_log['name'] : '');
                    -->
                        <p class = "error-msg"><?php echo $error_log['name'];?></p>

                    <label for="email">Email<span class = "error-msg" >*</label>
                    <input type="email" class ="input-div-nn" id="email" name="email"
                    value = "<?php echo $email; ?>"                >
                    <p class = "error-msg"><?php echo $error_log['email'];?></p>
                    <label for="mobile">Mobile Number<span class = "error-msg"  >*</label>
                    <input type="text" class ="input-div-nn" id="mobile" name = "mobile"  value = "<?php echo $mobile; ?>">
                    <p class = "error-msg"><?php echo $error_log['mobile'];?></p>
                    <label for="message">Message<span class = "error-msg" >*</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="input-div-nn"><?php echo $message; ?></textarea>
                    <p class = "error-msg"><?php echo $error_log['message'];?></p>

                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>
            <div class="col-6"></div>
            </div>
        </div>
    </body>
    </html>

