<?php
// session_start();
include('security.php');
$connection = mysqli_connect("localhost",'root','','adminpanel');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login'";
    $query_run = mysqli_query($connection,$query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location : index.php');
    }
    else if($usertypes['usertype'] == "user")
    {
        $_SESSION['username'] = $email_login;
        header('Location : ../index.php');
    }
    else
    {
        $_SESSION['status'] = "Email / password is Invalid";
        header('Location : login.php');
    }
}
?>