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

     function loggedin(){

          if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }

     function admin_loggin(){

          if (isset($_SESSION['admin_email']) && !empty($_SESSION['admin_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }     
 ?>
