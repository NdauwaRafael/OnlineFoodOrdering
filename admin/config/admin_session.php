<?php
session_start();
ob_start();
  $current_file = $_SERVER['SCRIPT_NAME'];


     function admin_loggin(){

          if (isset($_SESSION['admin_email']) && !empty($_SESSION['admin_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }
 ?>
