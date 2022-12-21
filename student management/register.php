<?php
error_reporting(0);
 include 'config.php';

 if(isset($_POST['submit'])){
    $name  = mysqli_real_escape_string($conn,$_POST['name']);
    $email  = mysqli_real_escape_string($conn,$_POST['email']);
    $pass  = md5($_POST['password']);
    $cpass  = md5($_POST['cpassword']);
    $phone = $_POST['phone'];
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn,$select);
    if(mysqli_num_rows($result) > 0){
        $message[] = 'user already exist!';
    }else{
        if($pass != $cpass){
            $message[] = 'password not matched';
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type,phone) VALUES ('$name','$email','$pass','$user_type','$phone')";
            mysqli_query($conn,$insert);
           header('location:login.php');
        }
    }
 }
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
    <h3>register now</h3>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        };
    };
        
    ?>
    <input type="text" name="name" placeholder="enter your name" required class="box">
    <input type="email" name="email" placeholder="enter your email" required class="box">
    <input type="password" name="password" placeholder="enter your password" required class="box">
    <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
    <input type="number" name="phone" placeholder="enter your phone no." required class="box">
    <select name="user_type" class="box">
        <option value="admin">admin</option>
        <option value="user">user</option>
    </select>
    <input type="submit" value="register" class="btn" name="submit">
    <p>already have an account? <a href="login.php">login now</a></p>
</form>
</div>



 <!-- custom js link -->
 <script src="js/script.js"></script>
</body>

</html>