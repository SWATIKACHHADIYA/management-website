<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    $user_type = "user";
    $check = "SELECT * FROM `user_form` WHERE password = '$password' && email = '$email' ";

    $check_user = mysqli_query($conn, $check);

    if (mysqli_num_rows($check_user) == 1) {
        $message[] = 'user already exist! try another one';
    } else {


        $insert = mysqli_query($conn, "INSERT INTO user_form(name, email, password, user_type,phone) VALUES ('$name','$email','$password','$user_type','$phone')");
        if ($insert) {
            $message[] = 'Data uploaded sucessfully';
        } else {
            $message[] = 'upload faild';
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
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- custome css link -->
    <link rel="stylesheet" href="css/admin.css">

    <title>student page</title>
</head>

<body>

    <?php
    include 'sidebar.php';
    ?>
    </table>

    <div class="content">
        <h1>Add student</h1>
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
                <input type="text" class="box" require name="name">
                <span>email</span>
                <input type="email" class="box" require name="email">
                <span>password</span>
                <input type="text" name="password" class="box" require>
                <span>phone</span>
                <input type="number" name="phone" required class="box">
                <input type="submit" value="Add student" name="submit" class="btn">
            </form>
        </section>


    </div>
    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>

</html>