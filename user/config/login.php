<?php
require 'connect.php';
session_start();
 if ($_POST) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $check_login = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$password'";
   $result_login = mysqli_query($conn, $check_login);

   if (mysqli_num_rows($result_login)) {
     $_SESSION['user_email'] = $email;
     echo "logged successfully";
     echo '<script>window.location.href="user/customer.php";</script>';
   }else {
     echo '<div class="alert alert-danger" role="alert">Invalid Login Details</div>';
   }
 }


 ?>
