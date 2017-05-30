<!--=============INCLUDE CONFIGARATION FILES==================-->
<?php include "config/session.php"; ?>
<?php include "config/user_data.php"; ?>
<!--======================================================-->
<html>
<head>
	<title>E FOOD</title>

  <!--=============INCLUDE CSS FILES==================-->
  <?php include "../inc/css.php"; ?>
  <!--================================================-->
<style>
   #profile {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 3%;
   }

   .profpic {
     border-radius: 25%;
     margin-top: 5%;
   }


</style>
</head>
<body >
  <!--=============INCLUDE NAVIGATION AREA==================-->
  <?php include "inc/navigation.php"; ?>
  <!--======================================================-->

<div >

          <div class="col-md-offset-1 col-md-11 contentarea" id="profile">
            <div class="row">

             </div>
</div>



<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/myjs.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script>
$("#restaurant").click(function(){
  alert('hallo');
  $("#profile").load('mods/hotels.php');

});
</script>
</body>
</html>
