<?php
session_start();
error_reporting(0);

include 'config.php';

if(!isset( $_SESSION['user_name'])){
    header('location:login.php');
}
$id =  $_SESSION['userid'];
$select = mysqli_query($conn,"SELECT * FROM `user_form` WHERE id = '$id'");

$row = mysqli_fetch_assoc($select);

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

    $update = mysqli_query($conn,"UPDATE `user_form` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id = '$id'");
    if($update){
        $message[] = 'updated data sucessfully!';
        header('location:student_profile.php');
    }else{
        $message[] = 'updated failed!';
    }
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
  include 's_sidebar.php';
  ?>
    <div class="content">
    <h1>update profile</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">' . $message . '</span>';
            };
        };

        ?>
        <section class="form">
            <form action="" method="post">
                <span>username</span>
                <input type="text" class="box" require name="name" value="<?php echo $row['name']; ?>">
                <span>email</span>
                <input type="email" class="box" require name="email" value="<?php echo $row['email']; ?>">
                <span>phone</span>
                <input type="number" name="phone" required class="box" value="<?php echo $row['phone']; ?>">
                <input type="submit" value="update_profile" name="submit" class="btn">
            </form>
        </section>


       
    </div>


     
    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>
</html>