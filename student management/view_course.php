<?php
error_reporting(0);
session_start();
include 'config.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}
if($_GET['id']) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `course` WHERE id = '$id'");
    if ($delete) {
        $message[] = 'data deleted sucessfully!';
        header('location:view_course.php');
    } else {
        $message[] = ' not data deleted. ';
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
    <div class="content">
        <h1>All the course</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">' . $message . '</span>';
            };
        };

        ?>
        <table class="table-data">
            <thead>
                <th>course name</th>
                <th>image</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                <?php

                $select = mysqli_query($conn, "SELECT * FROM `course`");
                if (mysqli_num_rows($select) > 0) {
                    while ($row = mysqli_fetch_assoc($select)) {

                        $id = $row['id'];

                ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><img src="<?php echo $row['image'] ?>" alt="" height="100"></td>
                            <td><?php echo "<a href='view_course.php? id= $id;'><i class='fas fa-trash' style = 'color:red'></i></a>";  ?></td>
                            <td><?php echo "<a href='update_course.php? id= $id;'><i class='fas fa-edit' style = 'color:green'></i></a>";  ?></td>


                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>




    <!-- custom js link -->
    <script src="js/admin.js"></script>
</body>

</html>