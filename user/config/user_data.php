<?php
include "connect.php";


$select_user = "SELECT * FROM `customer` WHERE `email` = '{$_SESSION['user_email']}' ";
$result_user = mysqli_query($conn, $select_user);

while($customer = mysqli_fetch_array($result_user)){
  $firstName =$customer['firstname'];
  $lastName =$customer['lastname'];
  $email =$customer['email'];
  $phone =$customer['phone'];
  $customer_county =$customer['county'];
  $customer_street =$customer['street'];
}

 ?>
