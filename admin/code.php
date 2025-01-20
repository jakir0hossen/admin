<!-- <?php
include('security.php');

$connection = mysqli_connect("localhost", "root", "", "adminpanel");




if(isset($_POST['about_delete_btn']))
{
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];


    $query =  "UPDATE abouts SET title ='$title',subtitle='$subtitle',description='$description',links='$links' WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Update";
        header('Location : aboutus.php');
    }
    else
    {
        $_SESSION['status'] = "Your Date is NOT Updated";
        header('Location : aboutus.php');
    }
}



if(isset($_POST['delete_btn']))

{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM abouts WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        $_SESSION['success'] = "Your Data is DELETED";
        header('Location : aboutus.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location : aboutus.php');
    }
}











if(isset($_POST['about_save']))
{
    // Get data from POST request
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $subtitle = mysqli_real_escape_string($connection, $_POST['subtitle']);
    $description = mysqli_real_escape_string($connection, $_POST['description']); 
    $links = mysqli_real_escape_string($connection, $_POST['links']);

    // Ensure no fields are empty
    if (empty($title) || empty($subtitle) || empty($description) || empty($links)) {
        $_SESSION['status'] = "All fields are required!";
        header('Location: aboutus.php');
        exit();
    }

    // Prepare and execute the SQL query
    $query = "INSERT INTO abouts (title, subtitle, description, links) VALUES ('$title', '$subtitle', '$description', '$links')";
    $query_run = mysqli_query($connection, $query);

    // Check if query executed successfully
    if ($query_run) {
        $_SESSION['success'] = "About Us Added Successfully!";
        header('Location: aboutus.php');
    } else {
        $_SESSION['status'] = "Failed to Add About Us!";
        header('Location: aboutus.php');
    }
}
?> -->




<?php
// session_start();

// // Database connection
// $connection = mysqli_connect("localhost", "root", "", "adminpanel");
// $connection2 = mysqli_connect("localhost", "root", "", "adminpanel");




// // Check if the register button is clicked
// if (isset($_POST['registerbtn'])) {

//     // Get form data
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $cpassword = $_POST['confirmpassword'];

//     // Form validation
//     if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
//         $_SESSION['status'] = "All fields are required!";
//         header('location: register.php');
//         exit();
//     }

//     // Check if password and confirm password match
//     if ($password === $cpassword) {

//         // Hash the password for security
//         $password = password_hash($password, PASSWORD_DEFAULT);

//         // Prepare the INSERT query using prepared statements
//         $stmt = $connection->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
//         $stmt->bind_param("sss", $username, $email, $password);

//         // Execute the query
//         if ($stmt->execute()) {
//             $_SESSION['success'] = "Admin Profile Added";
//             header('location: register.php');
//         } else {
//             $_SESSION['status'] = "Admin Profile NOT Added";
//             header('location: register.php');
//         }

//         // Close the statement
//         $stmt->close();

//     } else {
//         $_SESSION['status'] = "Password and confirm password do not match";
//         header('location: register.php');
//     }

// }
















 include('security.php');
 
  $connection = mysqli_connect("localhost","root","","adminpanel");














  if(isset($_POST['registerbtn']))
  {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['confirmpassword'];
      $usertype = $_POST['usertype'];


      if($password === $cpassword)
      {
        $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $_SESSION['success']= "Admin Profile Added";
            header('Location : register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('Location : register.php');
        }
      }

      else
      {
        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
        header('Location : register.php');
      }
  }

?>



<?php

  if(isset($_POST['updatebtn']))
  {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertypeupdate' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Date is Update";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Date is NOT Update";
        header('Location: register.php');
    }

  }

 if(isset($_POST['delete_btn']))
 {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
      $_SESSION['success'] = "Your Data is DELETED";
      header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";
        header('Location: register.php');
    }
 }









?>



<!-- <?php
    $conx = mysqli_connect("localhost","root","","users");
    if(!$conx){
        echo 'Connection Failed';
    } 
    
    ?>
    
    <?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');    
    define('DB_NAME', 'users');
    
    
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

    
    
    if ($con->connect_error) {
     
        error_log("Connection failed: " . $con->connect_error, 3, '/var/log/php_errors.log'); // Adjust path as needed
        die("ERROR: Could not connect. Please check the error log for details.");
    }
    ?> -->
    



    <?php

include('security.php');


if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='password_login'";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_fetch_array($query_run))
    {
           $_SESSION['username'] = $email_login;
           header('Location:index.php');
    }
    else
    {
        $_SESSION['status'] = 'Email id/ password is invalid';
        header('Location:login.php');
    }
}





 


    ?>
