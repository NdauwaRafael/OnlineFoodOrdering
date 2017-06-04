<?php

 require "connect.php";
   $select_details = "SELECT * FROM `owner` WHERE `email`='{$_SESSION['owner_email']}'";

  $result_details = mysqli_query($conn, $select_details);

  while ($details = mysqli_fetch_array($result_details)) {

    $owner_firstname = $details['firstname'];
    $owner_lastname = $details['lastname'];
    $owner_email = $details['email'];
    $owner_idno = $details['idno'];
  }
 ?>
