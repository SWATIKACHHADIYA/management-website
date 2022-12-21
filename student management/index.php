<?php

include 'config.php';
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $Addmessage = mysqli_real_escape_string($conn, $_POST['message']);

    $insert = mysqli_query($conn, "INSERT INTO `admission`( `name`, `email`, `phone`, `message`) VALUES ('$name','$email','$phone','$Addmessage')");

    if ($insert) {
        $message[] = 'Apply successfully!';
    } else {
        $message[] = 'Apply failed!';
    }
}

    $select = mysqli_query($conn,"SELECT * FROM `teacher`");
    $select1 = mysqli_query($conn,"SELECT * FROM `course`");


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
    <link rel="stylesheet" href="css/style.css">

    <title>student management system</title>
</head>

<body>
    <!-- header section start -->
    <section class="header">
        <a href="home.php" class="logo">W-SCHOOL</a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="">Admission</a>
            <a href="register.php" class="btn">register</a>
            <a href="login.php" class="btn">login</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

    <!-- header section end -->

    <!-- image section start -->
    <section class="image" style="background:url(image/class.jpg) no-repeat">
        <h1>We Teach student with care</h1>
    </section>
    <!-- image section start -->

    <!-- about section start -->

    <section class="about">
        <div class="image">
            <img src="image/playground.jpg" alt="">
        </div>
        <div class="content">
            <h1>welcome to w-school</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur provident deleniti nisi nihil commodi dolorum optio, eius dolore. Pariatur perferendis excepturi distinctio eum consequatur exercitationem odit quo temporibus ea itaque earum, molestiae nihil eligendi commodi voluptatibus enim illum laboriosam asperiores tenetur. Esse, nostrum nulla! Nemo temporibus quibusdam at necessitatibus vero ut repellendus sunt fuga, perspiciatis reprehenderit beatae impedit corrupti, deserunt officiis dolor maxime cum autem aut modi. Nihil deserunt exercitationem dolorum incidunt odio magnam aliquam a harum illo ducimus minima iure, repellendus rerum molestias asperiores quo ea delectus fuga.</p>
        </div>
    </section>

    <!-- about section end -->

    <!-- teachers section start -->
    <section class="teachers">
        <h1 class="heading">our teacher</h1>
        <div class="box-container">
            <?php
             while($row = mysqli_fetch_assoc($select)){

             
            ?>
            <div class="box">
                <div class="image">
                    <img src="<?php echo $row['image']; ?>" alt="">
                </div>
                <p><?php echo $row['desc']; ?></p>
            </div>
            <?php
            }
            ?>
           
        </div>
    </section>


    <!-- teachers section end -->

    <!-- courses section start -->
    <section class="courses">
        <h1 class="heading">our courses</h1>
        <div class="box-container">
            <?php
          while($result = mysqli_fetch_assoc($select1)){

         
            ?>
            <div class="box">
                <div class="image">
                    <img src="<?php echo $result['image'];  ?>" alt="">
                </div>
                <p> <?php echo $result['name'];
                 ?></p>
            </div>
           <?php
            }
            ?>

        </div>
    </section>
    <!-- courses section end -->

    <section class="form">
        <h1 class="heading" id="Admission">admission form</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">'. $message .'</span>';
            };
        };

        ?>
        <form action="" method="post">
            <span>name</span>
            <input type="text" class="box" require name="name">
            <span>email</span>
            <input type="email" class="box" require name="email">
            <span>phone</span>
            <input type="number" class="box" require name="phone">
            <span>message</span>
            <textarea name="message" cols="30" rows="10" class="box"></textarea>
            <input type="submit" value="apply" name="submit" class="btn">
        </form>
    </section>

    <footer>
        <h2>All @copyright reserved by <span> swati kachhadiya </span></h2>
    </footer>


    <!-- custom js link -->
    <script src="js/script.js"></script>
</body>



</html>