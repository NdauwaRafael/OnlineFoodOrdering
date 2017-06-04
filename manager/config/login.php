<?php
session_start();
 require "connect.php";
   if ($_POST) {
     $email = $_POST['email'];
     $password  =$_POST['password'];

     $check_login = "SELECT * FROM `owner` WHERE `email`='$email' AND `password`='$password'";
     $result_login = mysqli_query($conn, $check_login);

     if (mysqli_num_rows($result_login)) {
       $_SESSION['owner_email'] = $email;
       echo "<script>window.location.href='index.php';</script>";
     }else {
       echo "Login Details Invalid.";
     }
   }
 ?>
