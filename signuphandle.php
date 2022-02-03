<?php
$showResult=false;
if( $_SERVER["REQUEST_METHOD"]=="POST" ) 
{
    include('database.php');
    $email=$_POST['email'];
    $pass=$_POST['Password'];
    $cpass=$_POST['cPassword'];

    $sql="SELECT *  FROM `user` where email='$email'";
    $result= mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num==0)
    {  
        if($pass==$cpass)
        {
            $hash=password_hash($pass,PASSWORD_DEFAULT);

            $sql="INSERT INTO `user` (`email`, `pass`,`date_time`) VALUES ('$email', '$hash' ,current_timestamp())";
            $result= mysqli_query($conn,$sql);
            if($result)
            {   
                session_start();
                $_SESSION['signedin']="true";
                // $_SESSION['email']=$email;
                $showResult=true;
                header("Location: home.php?signupsuccess=true");
                exit;
            }
            
        }
        else
        {
            $showResult="password do not match";
        }

    }
    else
    {
        $showResult="Email Already Exists";
    }
    header("Location: home.php?signupsuccess=false&error=$showResult");
}
?>