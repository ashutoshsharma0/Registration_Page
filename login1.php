<?php  
/* require('mywaysconnection.php');

if (isset($_POST['user_name']) and isset($_POST['pass_word'])){
	
// Assigning POST values to variables.
$username = $_POST['user_name'];
$password = $_POST['pass_word'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM registration WHERE numberoremail='$username' and newpassword='$password'";
 
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}*/
?>
<html>
<head><title></title>
    <style>
        
        #namebox
        {
        height: 50px; border-radius: 9px; font-size: 20px; margin-top: 15px; text-indent: 10px; margin-right: 15px;
        }
        #no{
            height: 50px; border-radius: 9px; font-size: 20px; margin-top: 10px; width: 530px; text-indent: 10px;
        }
        #date{
            height: 50px; border-radius: 9px; font-size: 20px; margin-top: 10px; text-indent: 10px;
        }
        #gn{
            margin-top: 30px;
        }
        #button{
            height: 50px; border-radius: 9px; font-size: 20px; margin-top:10px; background-color: green; text-align: center; width:200px; color: aliceblue;
        }
        
    </style>
    
</head>
<body>
<div style="background-color: #E0FFFF; color: white; text-transform:uppercase; line-height: 90px;font-size: 40px; height: 90px;font-family: ariel;font-weight:bold;" >
<span style="font-size:80px; color:black; font-weight:italic;">MY WAYS</span>
</div>
    
<div style="background-color: #FFFFE0; height: 700px; width: 100%;">
    <center>
        <?php
        if(isset($_POST['SEND_OTP'])){
            
        
require('textlocal.class.php');
require('credential.php');
$textlocal = new Textlocal(false, false, API_KEY);
$numbers = array(MOBILE);
$sender = 'TXTLCL';
$otp = mt_rand(10000, 99999);
$message = "hello ". $_POST['user_name'] . "this is your otp: " . $otp;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    setcookie('otp' , $otp);
    echo "otp succcessfully send";
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
        }
?>
<div style="background-color: #FFFFE0; height:700px; width:50%; margin-top: 30px;text-align:left;">
    <span style="font-size:45px; margin-top: 30px; font-weight:bold; margin-bottom:5px; letter-spacing:3px;" >login</span>  <br>
     <div style="height:300px;">
    <form method="post" action="">

        
        <input type="text" placeholder="Enter your number or email address" id="no" name="user_name"> 
         <input type="password" placeholder="password" id="no" name="pass_word">
    <br>
        <a href="login1.php">forgot your password</a><br>
        <input type="submit" name="SEND_OTP" value="SEND_OTP" id="button" ><br>
    <input type="text" id="no" placeholder="enter otp"><br>
        <input type="submit" name="register" value="login" id="button"><br>
    </form>
         </center></div></center></div></body></html>