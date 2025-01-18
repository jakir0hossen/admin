<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">Edit Admin Profile </h6>
  </div>

  <div class="card-body">

  <?php

$connection = mysqli_connect("localhost","root","","adminpanel");

  if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM register WHERE id= '$id'";
    $query_run = mysqli_query($connection,$query);

    foreach($query_run as $row)
    {
        ?>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $row['username']?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="username" value="<?php echo $row['email']?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="username" value="<?php echo $row['password']?>" class="form-control" placeholder="Enter Username">
            </div>
            <a href="register.php" class="btn btn-danger">CANCEL</a>
            <button class="btn btn-success">Update </button>
           
            <?php
    }
}

?>
        </div>
        </div>
    </div>
    </div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>