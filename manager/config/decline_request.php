<?php
require 'connect.php';
if ($_POST) {
  $id = $_POST['idd'];

  $update_request = "UPDATE `request` SET `status`='Declined',`comment`='Request was declined due to unavoidable reasons' WHERE `id`='$id'";
  if (mysqli_query($conn, $update_request)) {
    echo "Request Declined successfully";
  }else{
    echo "Failed to cancel request";
  }
}

 ?>