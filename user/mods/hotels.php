<?php
@include "../config/connect.php";

$select_hotels = "SELECT * FROM `hotels`";

$result_hotels = mysqli_query($conn, $select_hotels);

while ($hotels = mysqli_fetch_array($result_hotels)) {
  $id = $hotels['id'];
  $hotelname =$hotels['hotelname'];
  $location =$hotels['location'];

?>

<div class="panel panel-default">
  <div class="panel-body">
     <div class="col-xs-2"><img src="../icons/meal-48.png"></div>
     <div class="col-xs-8"><h4 class="tag"><?=$hotelname; ?><h4></div>
     <div class="col-xs-2"><button id="menu<?= $id;?>" class="btn btn-default" type="submit">View Menu</button></div>
  </div>
</div>

<script>
   $("#menu<?= $id;?>").click(function(){
      var id1 = "<?= $id;?>";
      var hname = "<?=$hotelname; ?>"
      if (id1=='') {
        alert('Restaurant Unavailable');
      }else {
        $.post("mods/hotel.php", {id:id1, hotel:hname}, function(data){
              $("#profile").html(data);
        })
      }
   })
</script>
<?php

}

 ?>
<style>
   .tag {
     color: #00c853 !important;
   }
</style>
