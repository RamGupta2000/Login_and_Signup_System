<?php
$showResult=false;
if( $_SERVER["REQUEST_METHOD"]=="POST" )
{
    include('database.php');
    $email=$_POST['email'];
    $pass=$_POST['Password'];
    
    // $hash=password_hash($pass,PASSWORD_DEFAULT);
    
    $sql="SELECT * FROM `user` where email='$email' ";
    $result= mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $num=mysqli_num_rows($result);

    if($num>0)
    {  
        if(password_verify( $pass,$row['pass']))
        {   
            session_start();
            $_SESSION['loggedin']="true";
            $_SESSION['email']=$email;

            $showResult="true";
            header("Location:home.php?error=$showResult");
            exit;
        }
        else
        {
            $showResult="Incorrect Password";
        }
    }
    else
    {
        $showResult="Invalid Email";
    }
    header("Location:home.php?loginsuccess=false&error=$showResult");
}

?>

