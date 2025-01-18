<?php
session_start();

// Database connection
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

// Check if the register button is clicked
if (isset($_POST['registerbtn'])) {

    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    // Form validation
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        $_SESSION['status'] = "All fields are required!";
        header('location: register.php');
        exit();
    }

    // Check if password and confirm password match
    if ($password === $cpassword) {

        // Hash the password for security
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the INSERT query using prepared statements
        $stmt = $connection->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['success'] = "Admin Profile Added";
            header('location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('location: register.php');
        }

        // Close the statement
        $stmt->close();

    } else {
        $_SESSION['status'] = "Password and confirm password do not match";
        header('location: register.php');
    }

}







if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM register WHERE id= '$id'";
    $query_run = mysqli_query($connection,$query);
}





?>
