<!--=============INCLUDE CONFIGARATION FILES==================-->
<?php include "config/session.php"; ?>
<?php include "config/user_data.php"; ?>
<?php include "config/check_active.php"; ?>
<?php
  if (!loggedin()) {
  	header("location: ../index.php");
  }else {
      if (!cusomer_active()) {
        header("location: ../error/error.php");
      }
  }
 ?>
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

<div id="wide">

	<div class="col-xs-3" id="filter_div">

	<p>
				<select class="form-control" id="county" onchange="filter_hotel()">
				  <option value="">--------[SELECT COUNTY]-----------</option>
				  <option value="Mombasa">MOMBASA</option>
				  <option value="Nairobi">NAIROBI</option>
				  <option value="Nyandarua">NYANDARUA</option>
				  <option value="Nyeri">NYERI</option>
				</select>
	</p>

	<p>
				<select class="form-control" id="street">
				  <option value="">--------[SELECT STREET]-----------</option>
				  <option value="">2</option>
				  <option value="">3</option>
				  <option value="">4</option>
				  <option value="">5</option>
				</select>
	</p>

	</div>

	          <div class=" col-xs-9 contentarea" id="profile">
	            <div class="row">

	             </div>
						 </div>
</div>



<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/myjs.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script>
$("#profile").load('mods/filter_hotel.php');

$("#restaurant").click(function(){
  $("#profile").load('mods/hotels.php');
	$("#filter_div").show();
});

$("#requests").click(function(){
  $("#profile").load('mods/requests.php');
	$("#filter_div").hide();
});

function filter_hotel(){
	var county1 = $("#county").val();
	var street1 = $("#street").val();

	$.post("mods/filter_hotel.php", {county:county1, street:street1}, function(data) {
		 $("#profile").html(data);
	})
}
</script>
</body>
</html>
