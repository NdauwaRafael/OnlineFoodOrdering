<?php
require 'connect.php';
if ($_POST) {
  $id = $_POST['id'];

  $update_request = "UPDATE `request` SET `status`='Derivered',`comment`='Food derivered, customer is satisfied' WHERE `id`='$id'";
  if (mysqli_query($conn, $update_request)) {
    echo "Request have been derivered Successfully";
  }else{
    echo "Failed to accept request";
  }
}

 ?>
