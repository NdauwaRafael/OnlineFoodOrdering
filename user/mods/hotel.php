<div class="panel panel-default">
  <div class="panel-body">

    <table class="table table-condensed">
    <thead>
     <th>#</th>
     <th>Food Name:</th>
     <th>Category</th>
     <th>Price</th>
     <th></th>
    </thead>


    <?php
    @include "../config/connect.php";
      if ($_POST) {
        $hotel_id = $_POST['id'];
        $hotel_n = $_POST['hotel'];
?>
<h4 class="tag"><?=$hotel_n; ?> Menu</h4>
<hr>
<?php
        $select_menu = "SELECT * FROM `food` WHERE `hotel`='$hotel_id'";
        $result_menu = mysqli_query($conn, $select_menu);

        while ($menu = mysqli_fetch_array($result_menu)) {
          $food_id = $menu['id'];
          $food_name = $menu['name'];
          $food_category = $menu['category'];
          $food_price = $menu['price'];

    ?>
    <tr>
     <td></td>
     <td><img src="../icons/waiter-48.png"><?=$food_name;?></td>
     <td><?=$food_category; ?></td>
     <td><img src="../icons/banknotes-24.png">Ksh. <?=$food_price;?>.00</td>
     <td><button class="btn btn-default" type="submit" data-toggle="modal" data-target="#order<?=$food_id; ?>">Order</button></td>
    </tr>



    <!-- Large modal -->
    <div class="modal fade" id="order<?=$food_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title tag" id="gridSystemModalLabel"><?=$food_name;?></h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="input-group">
                <span class="input-group-addon">Your Address</span>
                <input type="text" id="address<?=$food_id; ?>" class="form-control input-lg" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-addon "><img src="../icons/geo_fence-24.png" ></span>
              </div>
               <br>
            <div class="input-group">
              <span class="input-group-addon">No of Packets</span>
              <input type="text" id="packets<?=$food_id; ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
              <span class="input-group-addon">.00</span>
            </div>
         <br>
         <button class="btn btn-default" id="request<?=$food_id; ?>" type="button">Order Now</button>
          <br>
           </form>
           <br>
           <div class="tag" id="status_food<?=$food_id; ?>"></div>
          </div>
        </div>
      </div>
    </div>
<script>
   $("#request<?=$food_id; ?>").click(function(){
     var address1 = $("#address<?=$food_id; ?>").val();
     var packets1 = $("#packets<?=$food_id; ?>").val();
     var hotel1 = "<?= $hotel_n; ?>";
     var food1 = "<?= $food_name; ?>";
     if(address1==''||packets1==''){
       alert('empty');
        $("#status_food<?=$food_id; ?>").html('<div class="alert alert-danger" role="alert">Fill in all fields before ordering</div>');
     }else{
       $.post("config/order.php",{address:address1, packets:packets1, hotel:hotel1, food:food1}, function(data){
          $("#status_food<?=$food_id; ?>").html(data);
       })
     }
   })
</script>

    <?php
        }
      }
    ?>

    </table>

    <style>
       .tag {
         color: #00c853 !important;
       }
    </style>

  </div>
</div>
