<?php
error_reporting(0);
session_start();
include 'config.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}
 if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $image_loc = "u_image/".$image;
    move_uploaded_file($temp_name,$image_loc);

    $insert = mysqli_query($conn,"INSERT INTO `course`( `name`,  `image`) VALUES ('$name','$image_loc')");
    if($insert){
        $message[] = 'Add data sucessfully!';
       
    }else{
        $message[] = ' data not added.';
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

    <title>course page</title>
</head>

<body>

    <?php
    include 'sidebar.php';
    ?>
    </table>

    <div class="content">
        <h1>Add course</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">' . $message . '</span>';
            };
        };

        ?>
        <section class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <span>course name</span>
                <input type="text" class="box" require name="name">
                <span>image</span>
                <input type="file" name="image" class="box" require>
                <input type="submit" value="Add course" name="submit" class="btn">
            </form>
        </section>


    </div>
    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>

</html>