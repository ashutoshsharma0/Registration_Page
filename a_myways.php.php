<?php
include("mywaysconnection.php");
if(isset($_POST['register']))
{
    //print_r($_POST);
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $numberoremail=$_POST['numberoremail'];
    $newpassword=$_POST['newpassword'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    //echo $gender;
    
   
    if(!empty($firstname))
    {
        if(!empty($lastname))
        {
            if(!empty($numberoremail))
            {
                     if(!empty($newpassword))
                     {
                          if(!empty($birthday))
                               {
                                 if(!empty($gender))
                                 {
                                     
                                   $query="insert into registration values('','$firstname','$lastname','$numberoremail','$newpassword','$birthday','$gender')";
                                     //echo $query;
                                      $ins=mysqli_query($con,$query);
                                      if($ins)
                                       { 
                                         $msg= "<span class='success'> data successfully inserted</span>";
                                       }
                                      else
                                      {
                                          echo mysqli_error($con);
                                        echo "oops some error occurs!";
                                      }
                                 }
                              else
                              {
                                  $msg="please enter user gender";
                              }
                          }
                         else
                         {
                             $msg="please enter user birthday"; 
                         }
                     }
                    else
                    {
                         $msg="please enter user password";
                    }
            }
            else
            {
                 $msg="please enter user number or email address";
            }
        }
        else
        {
             $msg="please enter user last name";
        }
    }
    else
    {
         $msg="please enter user first name";
    }
   
    
}




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
<div style="background-color: #FFFFE0; height:700px; width:50%; margin-top: 30px;text-align:left;">
    <span style="font-size:45px; margin-top: 30px; font-weight:bold; margin-bottom:5px; letter-spacing:3px;" >Student registration form</span>  <br>
     <div style="height:300px;">
    <form method="post" action="">
      <input type="text" placeholder="First name" name="firstname" id="namebox" required value="<?php echo @$_POST['firstname']?>" > 
        <input type="text" placeholder="last name" id="namebox" name="lastname" value="<?php echo @$_POST['lastname']?>">
        <input type="text" placeholder="Enter your number or email address" id="no" name="numberoremail" value="<?php echo @$_POST['numberoremail']?>"> 
         <input type="password" placeholder="New password" id="no" name="newpassword" value="<?php echo @$_POST['newpassword']?>">
    <br>
    <span style="font-size:25px; margin-top: 20px;">Birthday</span>  <br>  <input type="date" id="date" name="birthday" value="<?php echo @$_POST['birthday']?>"><br> 
       <input type="radio" name="gender" checked id="gn" value="male"><span style="font-size:25px;">Male</span><input type="radio" name="gender" id="gn" value="female"> <span style="font-size:25px;"> Female</span><br>
       <br>
        <input type="submit" name="register" value="register" id="button"><br>
        <span style="font-size:30px;">already a member <a href="login.php">login</a></span>
    
         
    
          <?php 
    if(isset($msg)) 
    {
        echo $msg;
    }
        ?></cemter>
         </form>
         </div>
</div>
    </div>
    </body>
</html>
