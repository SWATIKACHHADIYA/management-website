<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}

$id = $_GET['id'];

$select = mysqli_query($conn,"SELECT * FROM `course` WHERE id = $id");
$row = mysqli_fetch_assoc($select);

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $image_loc = "u_image/".$image;
    move_uploaded_file($temp_name,$image_loc);

    $update = mysqli_query($conn,"UPDATE `course` SET `name`='$name',`image`='$image_loc' WHERE id = '$id'");
    if($update){
        $message[] = 'updated sucessfully!';
        header('location:view_course.php');
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
                <span>Course name</span>
                <input type="text" class="box" require name="name" value="<?php echo $row['name']; ?>">
                <span> course image</span>
                <td><img src="<?php echo $row['image']; ?>" height="200" alt="" class="u_img"><input type="file" name="image" class="box" require value="<?php echo $row['image']; ?>"></td></br>
                <input type="submit" value="update" name="submit" class="btn">
            </form>
        </section>


    </div>
    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>

</html>