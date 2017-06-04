<?php
 require "connect.php";

 if($_POST){
     $id = $_POST['id'];

     $delete_menu = "DELETE FROM `food` WHERE `id`='$id'";
     if(mysqli_query($conn, $delete_menu)){
         echo "Menu deleted successfully";

     }else
     {
         echo "Error trying to delete menu";
     }
 }

?>