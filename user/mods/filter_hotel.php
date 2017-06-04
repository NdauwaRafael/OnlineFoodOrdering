<?php
session_start();
@include "../config/connect.php";
@include "../config/user_data.php";
if ($_POST) {
$county = $_POST['county'];
$street = $_POST['street'];

if ($county=='' && $street=='') {
  $query_hotel = "SELECT * FROM `hotels`";
}else{
        if ($county!='') {
          $cSearch = " `county` LIKE '$county' ";
        }else{
           $cSearch = "`county` != 'null' ";
        }

        if ($street!='') {
          $sSearch = " `street` LIKE '$street' ";

        }else{
           $sSearch = "`street`!='null'";
        }

      $query_hotel = "SELECT * FROM `hotels` WHERE $cSearch AND $sSearch ";
}


  $result_hotel = mysqli_query($conn, $query_hotel);

  if (mysqli_num_rows($result_hotel)==0) {
    echo "No Hotels in this location";
  }else{
    ?>
    <h3>Hotels in, <?=$street;?> <?=$county;?>  <?php if ($county=='' && $street=='') {
      ?>All Places<?php
    } ?></h3>
    <?php

      while ($hotels = mysqli_fetch_array($result_hotel)) {
        $id = $hotels['id'];
        $hotelname =$hotels['hotelname'];
        $county =$hotels['county'];
        $street =$hotels['street'];

      ?>

      <div class="panel panel-default">
        <div class="panel-body">
           <div class="col-xs-2"><img src="../icons/meal-48.png"></div>
           <div class="col-xs-8"><h4 class="tag"><?=$hotelname; ?><h4>
            <p style="color:#000000 !important;"><span class="glyphicon glyphicon-map-marker"></span> <?=$county; ?></p>
            <p style="color:#000000 !important;"><span class="glyphicon glyphicon-map-marker"></span> <?=$street; ?></p>
           </div>
           <div class="col-xs-2"><br><button id="menu<?= $id;?>" class="btn btn-default" type="submit">View Menu</button></div>
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
  }

}else{

  ?>
  <h3>Hotels Near You</h3>
  <?php

  $select_hotels = "SELECT * FROM `hotels` WHERE `county` ='$customer_county' ";

  $result_hotels = mysqli_query($conn, $select_hotels);

  while ($hotels = mysqli_fetch_array($result_hotels)) {
    $id = $hotels['id'];
    $hotelname =$hotels['hotelname'];
    $county =$hotels['county'];
    $street =$hotels['street'];

  ?>

  <div class="panel panel-default">
    <div class="panel-body">
       <div class="col-xs-2"><img src="../icons/meal-48.png"></div>
       <div class="col-xs-8"><h4 class="tag"><?=$hotelname; ?><h4>
        <p style="color:#000000 !important;"><span class="glyphicon glyphicon-map-marker"></span> <?=$county; ?></p>
        <p style="color:#000000 !important;"><span class="glyphicon glyphicon-map-marker"></span> <?=$street; ?></p>
       </div>
       <div class="col-xs-2"><br><button id="menu<?= $id;?>" class="btn btn-default" type="submit">View Menu</button></div>
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
}

 ?>
<style>
   .tag {
     color: #00c853 !important;
   }
</style>
