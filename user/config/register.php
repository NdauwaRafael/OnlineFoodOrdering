<?php
require "connect.php";
session_start();
if ($_POST) {
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $residence = $_POST['residence'];
  $password = $_POST['password'];
  $cpass = $_POST['cpass'];

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($residence) && !empty($password) && !empty($cpass)) {

  $query = "INSERT INTO `customer`(`id`, `firstname`, `lastname`, `email`, `phone`, `residence`, `password`) VALUES (NULL,'$fname','$lname','$email','$phone','$residence','$password')";
  if (mysqli_query($conn, $query)) {
    echo "added";
    $_SESSION['user_email'] = $email;
    header("location: ../profile.php");
  }else {
    echo "error occurred";

  }

}else{
  echo "fill in all fields";
?>
<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script>
alert('empty');
  window.location.href('../../index.php');
 </script>

<?php
}


}
 ?>
