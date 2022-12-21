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
       <h1>All the student</h1>

      <table class="table-data">
        <thead>
            <th>studentname</th>
            <th>email</th>
            <th>phone</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
        
            $select = mysqli_query($conn,"SELECT * FROM `user_form` where user_type = 'user'");
           if(mysqli_num_rows($select) > 0){
                while($row = mysqli_fetch_assoc($select)){

                $id = $row['id'];
           
           ?>
              <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo "<a href='delete.php? id= $id; onclick='return confirm('Are you sure you want delete data?');'><i class='fas fa-trash' style = 'color:red'></i></a>";  ?></td>
            <td><?php echo "<a href='update.php? id= $id;'><i class='fas fa-edit' style = 'color:green'></i></a>";  ?></td>
           
            
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