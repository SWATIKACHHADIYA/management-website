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

    <title>Admission page</title>
</head>
<body>
    <?php
     include 'sidebar.php';
     ?>
    <div class="content">
       <h1>Aplied for Admission</h1>
      <table class="table-data">
        <thead>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>massage</th>
        </thead>
        <tbody>
           <tr>
            <?php
            $admission_data  = mysqli_query($conn,"SELECT * FROM admission");
             if(mysqli_num_rows($admission_data) > 0){
            while($row = mysqli_fetch_assoc($admission_data)){
       
            ?>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['message']; ?></td>
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