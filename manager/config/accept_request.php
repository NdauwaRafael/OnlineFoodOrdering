<?php
require 'connect.php';
if ($_POST) {
  $id = $_POST['id'];

  $update_request = "UPDATE `request` SET `status`='Accepted',`comment`='Request Accepted waiting for derivery' WHERE `id`='$id'";
  if (mysqli_query($conn, $update_request)) {
    echo "Request Accepted";
  }else{
    echo "Failed to accept request";
  }
}

 ?>
