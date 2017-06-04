<?php
 require "connect.php";


 if($_POST){
     $item_name = $_POST['item_name'];
     $item_category = $_POST['item_category'];
     $item_price = $_POST['item_price'];
     $item_id = $_POST['item_id'];
     $update_menu = "UPDATE `food` SET `name`='$item_name',`category`='$item_category',`price`='$item_price' WHERE `id`='$item_id'";

     if(mysqli_query($conn, $update_menu)){
         echo "Item Update Successfully";
     }else{
         echo "Error in updating Item";
     }
 }
?>