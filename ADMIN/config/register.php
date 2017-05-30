<?php
 require "connect.php";
  session_start();


  if ($_POST) {
    $fname = $_POST['fname1'];
    $lname= $_POST['lname1'];
    $email = $_POST['email1'];
    $idno = $_POST['idno1'];
    $password = $_POST['password1'];


    $insert_owner = "INSERT INTO `owner`(`id`, `firstname`, `lastname`, `email`, `idno`, `password`) VALUES (NULL,'$fname','$lname','$email','$idno','$password')";
    if (mysqli_query($conn, $insert_owner)) {
      $_SESSION['owner_email'] = $email;
      echo "<script>window.location.href='index.php';</script>";
    }else{
      echo "failed to register owner";
    }
  }

 ?>
