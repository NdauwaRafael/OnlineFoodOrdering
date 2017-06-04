<?php
require "connect.php";

if ($_POST) {
	$id = $_POST['id'];
	$status = $_POST['status'];

if ($status=="Active") {
	$update = "UPDATE `customer` SET `admin_control`='Deactivated' WHERE `id`='$id'";
}else{
 $update = "UPDATE `customer` SET `admin_control`='Active' WHERE `id`='$id' ";
}

if (mysqli_query($conn, $update)) {
	echo "User Modified Successfully";

}else{
	echo "Unable to modify user";
}

}
?>
