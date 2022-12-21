<?php
session_start();
include 'config.php';

if(!isset( $_SESSION['admin_name'])){
    header('location:login.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- custome css link -->
    <link rel="stylesheet" href="css/admin.css">

    <title>admin page</title>
</head>
<body>
    <?php
     include 'sidebar.php';
     ?>
     <div class="container">
    <div class="content">
      <h3>hi,<span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin pade</p>
      <a href="login.php" class="button">login</a>
      <a href="register.php" class="button">register</a>
      <a href="logout.php" class="button">logout</a>
    </div>

    </div>
     
    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>
</html>