<?php
require "../config/connect.php";
require "../config/query_hotel.php";
global $hotel_name;

 ?>
<div class="body">
  <h2><?=$hotel_name;  ?></h2>
<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">Add Item</button>
  <table class="table table-bordered table-striped table-hover dataTable js-exportable">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Category</th>
          <th>Hotel</th>
          <th>Price</th>
      </tr>
      </thead>

  <?php

  $select_menu = "SELECT * FROM `food` ";
  if($menu_result = mysqli_query($conn, $select_menu)){

  while ($menu=mysqli_fetch_array($menu_result)) {
    $item_name = $menu['name'];
    $item_category = $menu['category'];
    $item_hotel = $menu['hotel'];
    $item_price = $menu['price'];

  ?>
  <tr role="row" class="odd">
  <td></td>
  <td><?=$item_name; ?></td>
  <td><?=$item_category; ?></td>
  <td><?=$item_hotel; ?></td>
  <td><?=$item_price; ?></td>
  </tr>

  <?php

  }

  }else{
    echo "error loading menus".mysqli_error($conn);
  }

   ?>

  </table>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: green !important; color:#f1f1f1 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Menu Item</h4>
      </div>
      <div class="modal-body">
            <form class="item">
              <div class="form-group">
                <label>Item Name</label>
                <input type="text" class="form-control" id="item_name" placeholder="Item Name">
              </div>
              <div class="form-group">
                <label>Item Category</label>
                <select class="form-control" id="item_category">
                  <option vlaue="">----[SELECT CATEGORY]----</option>
                  <option value="Snack">Snack</option>
                  <option value="Heavy">Heavy</option>
                  <option value="Drink">Drink</option>
                </select>
              </div>

              <div class="form-group">
                <label>Item Price</label>
                <input type="text" class="form-control" id="item_Price" placeholder="Item Price">
              </div>

              <button id="add_item" type="button" class="btn btn-default">Submit</button>
            </form>
            <div id="item_status"></div>
      </div>
    </div>
  </div>
</div>
<script>
   $("#add_item").click(function(){
      var itemName = $("#item_name").val();
      var itemCategory = $("#item_category").val();
      var itemPrice = $("#item_Price").val();
      var itemHotel = "<?=$hotel_id; ?>";

      if (itemName==''|| itemCategory==''||itemPrice=='') {
            $("#item_status").html("Fill in empty fields");
      }else{
          $.post("config/save_item.php",{itemname:itemName, itemcategory:itemCategory, itemprice:itemPrice, itemhotel:itemHotel}, function(data){
               $("#item_status").html(data);
               //$("#conceptarea").load('mods/menus.php');
          })
      }
   })
</script>
<style>
.item input {
   border: 1px solid #ccc !important;
   padding: 5px !important;
   border-radius: 3px !important;
}

.item select {
   border: 1px solid #ccc !important;
   padding: 5px !important;
   border-radius: 3px !important;
}

</style>
