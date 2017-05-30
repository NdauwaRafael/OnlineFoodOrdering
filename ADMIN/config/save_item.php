<?php
 require "connect.php";


if ($_POST) {
  $name = $_POST['itemname'];
  $category = $_POST['itemcategory'];
  $price = $_POST['itemprice'];
  $hotel = $_POST['itemhotel'];

   $insert_menu = "INSERT INTO `food`(`id`, `name`, `category`, `price`, `hotel`) VALUES (NULL,'$name','$category','$price','$hotel')";

     if (mysqli_query($conn, $insert_menu)) {
       echo "Menu item inserted successfully";
     }else{
       echo "Failed to insert menu item";
     }
}


 ?>
