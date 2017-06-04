<?php
session_start();
require "connect.php";
$owner_email = $_SESSION['owner_email'];
  $select_hotel = "SELECT `id`, `hotelname`, `county`, `street`, `owner` FROM `hotels` WHERE `owner` LIKE '$owner_email'";
$result_hotel = mysqli_query($conn, $select_hotel);

  while ($hotel_details = mysqli_fetch_array($result_hotel)) {
    $hotel_id = $hotel_details['id'];
    $hotel_name = $hotel_details['hotelname'];
    $hotel_location = $hotel_details['county'];
    $hotel_county = $hotel_details['county'];
    $hotel_street = $hotel_details['street'];

  }
  ?>
