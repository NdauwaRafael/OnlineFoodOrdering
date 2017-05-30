<?php
session_start();
ob_start();
  $current_file = $_SERVER['SCRIPT_NAME'];


     function loggedin(){

          if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }
 ?>
