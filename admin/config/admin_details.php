<?php

 require "connect.php";
   $select_admin = "SELECT * FROM `admin` WHERE `email`='{$_SESSION['admin_email']}'";

  $result_admin = mysqli_query($conn, $select_admin);

  while ($details = mysqli_fetch_array($result_admin)) {

    $admin_name = $details['name'];
    $admin_email = $details['email'];
  }
 ?>
