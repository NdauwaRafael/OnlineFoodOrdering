<?php
function owner_active()
{
	$user_email = $_SESSION['owner_email'];
    $db = mysqli_connect('localhost', 'root', '', 'food') OR die('could not connect to database because'. mysqli_connect_error());
	$check_user_active ="SELECT * FROM `owner` WHERE `admin_control`='Active' AND `email`='$user_email'";
	$check_user_result = mysqli_query($db, $check_user_active);

	if (mysqli_num_rows($check_user_result)==1) {
		return true;
	}else{
		return false;
	}
}


 ?>
