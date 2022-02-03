<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>';
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true")
            {
                echo '<a class="btn btn-success mx-1"  href="logout.php" role="button">Logout</a>';
            }
            else
            {
                echo '
                    <button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupmodal">SignUp</button>';
            }
        echo '</div>
    </div>
</nav>';

include 'loginmodal.php';
include 'signupmodal.php';


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SignUp Successful!</strong> You can now Log in.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false")
{
    if($_GET['error']=="Email Already Exists")
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Oops!</strong> Email Already Exists.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }
    else
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> Invalid Credentials.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    
}

if(isset($_GET['error']) && $_GET['error']=="true")
{
    echo '<div class="alert mt-0 mb-0 alert-success alert-dismissible fade show" role="alert">
            <strong>Login Sucessful!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if(isset($_GET['error']) && $_GET['error']=="Invalid Email")
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong>Invalid Email.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

if(isset($_GET['error']) && $_GET['error']=="Incorrect Password")
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Oops!</strong>Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true")
// {
//     echo '<div class="container text-center py-5">
//            <h1> Welcome : '.$_SESSION["email"].', you are now Logged in.</h1>
//           </div>';
// }


?>