<?php
session_start();
require 'connect.php';
if ($_POST) {
  $hotel_name = mysqli_real_escape_string($conn,$_POST['hotel_name']);
  $hotel_county =mysqli_real_escape_string($conn, $_POST['hotel_county']);
  $hotel_street = mysqli_real_escape_string($conn,$_POST['hotel_street']);
  $hotel_owner = $_SESSION['owner_email'];

$check_hotel = "SELECT * FROM `hotels` WHERE `owner`='$hotel_owner'";
$check_result = mysqli_query($conn, $check_hotel);

if (mysqli_num_rows($check_result)==1) {
  echo '<div class="alert alert-warning"><strong>Error!</strong> It seems you already registered another hotel.</div>';
}else{
      $register_hotel = "INSERT INTO `hotels`(`id`, `hotelname`, `county`, `street`, `owner`) VALUES (NULL,'$hotel_name','$hotel_county','$hotel_street','$hotel_owner')";
      if (mysqli_query($conn, $register_hotel)) {
        echo '<div class="alert alert-success"><strong>Well done!</strong> You successfully Registered a hotel.</div>';
      }else {
        echo '<div class="alert alert-danger"><strong>Oops!</strong> Failed something went wrong registering Hotel.</div>';
      }
}



}


 ?>
