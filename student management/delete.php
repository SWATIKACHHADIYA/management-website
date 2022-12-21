<?php

include 'config.php';

 if($_GET['id'])
 {
    $user_id = $_GET['id'];
    $sql = mysqli_query($conn,"DELETE FROM `user_form` WHERE id = '$user_id'");
    if($sql){
        header('location:view_student.php');
    }
 }

?>