<?php
session_start();
ob_start();
  $current_file = $_SERVER['SCRIPT_NAME'];


     function owner_loggin(){

          if (isset($_SESSION['owner_email']) && !empty($_SESSION['owner_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }
 ?>
