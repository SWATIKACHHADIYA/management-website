<?php
session_start();
@include 'config.php';
error_reporting(0);


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['userid'] = $row['id'];
         header('location:adminhome.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['userid'] = $row['id'];
         header('location:userhome.php');

      }
     
   }else{
      $message[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register.php</title>
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- custome css link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  
<div class="form-container">

<form action="" method="post">
    <h3>login now</h3>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        };
    };
        
    ?>
    <input type="email" name="email" placeholder="enter your email" required class="box">
    <input type="password" name="password" placeholder="enter your password" required class="box">
    <input type="submit" value="login" class="btn" name="submit">
    <p>don't  have an account? <a href="register.php">register now</a></p>
</form>
</div>



 <!-- custom js link -->
 <script src="js/script.js"></script>
</body>

</html>