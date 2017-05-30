<?php
require("connect.php");
session_start();
if($_POST){
  $food = $_POST['food'];
  $address = $_POST['address'];
  $packets = $_POST['packets'];
  $hotel = $_POST['hotel'];
  $customer =$_SESSION['user_email'];

$check_request = "SELECT * FROM `request` WHERE `customer`='$customer' AND `status`='requested'";
$result_request = mysqli_query($conn, $check_request);
if (mysqli_num_rows($result_request)) {
  echo '<div class="alert alert-warning" role="alert">Your order to request '.$food.' could not be accepted, You Already Have an active request. Clear the request first and order again.</div>';
}else{

  $insert_order ="INSERT INTO `request`(`id`, `food`, `quantity`, `hotel`, `customer`, `address`, `amount`, `status`) VALUES (NULL,'$food','$packets','$hotel','$customer','$address','','requested')";
if (mysqli_query($conn, $insert_order)) {
echo '<div class="alert alert-success" role="alert">Order Placed Succesfully</div>';
}else{
  echo '<div class="alert alert-danger" role="alert">Error adding order</div>';
}

}


}

 ?>
