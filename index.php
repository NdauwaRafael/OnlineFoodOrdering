<?php
include "config/session.php";
if (loggedin()) {
	header("location: user/customer.php");
}
if (owner_loggin()) {
	header("location: manager/index.php");
}

if (admin_loggin()) {
	header("location: admin/index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>E FOOD</title>

	<!--=============INCLUDE CSS FILE==================-->
	<?php include "inc/css.php"; ?>
	<!--=============INCLUDE NAVIGATION AREA==================-->

</head>
<body >

<!--=============INCLUDE NAVIGATION AREA==================-->
<?php include "inc/navigation.php"; ?>
<!--=============INCLUDE NAVIGATION AREA==================-->



				<div id="homearea"></div>
   </div>

   </div>

</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/myjs.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
</body>
</html>
