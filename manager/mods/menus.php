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
          <th>Modify</th>
          <th>Control</th>
      </tr>
      </thead>

  <?php

  $select_menu = "SELECT * FROM `food` WHERE `hotel`='$hotel_id' ";
  if($menu_result = mysqli_query($conn, $select_menu)){

  while ($menu=mysqli_fetch_array($menu_result)) {
    $item_id = $menu['id'];
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
  <td><button class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$item_id; ?>">Edit</button></td>
  <td><button class="btn btn-danger" id="delete<?=$item_id; ?>">Delete</button></td>
  </tr>


  <!-- Modal -->
  <div class="modal fade" data-backdrop=""  tabindex="-1" role="dialog" id="edit<?=$item_id; ?>" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <form class="item">
            <div class="form-group">
              <label>Item Name</label>
              <input type="text" value="<?=$item_name; ?>" class="form-control" id="item_name<?=$item_id; ?>" placeholder="Item Name">
            </div>
            <div class="form-group">
              <label>Item Category</label>
              <select class="form-control" id="item_category<?=$item_id; ?>">
                <option value="">----[SELECT CATEGORY]----</option>
                <option value="Snack">Snack</option>
                <option value="Heavy">Heavy</option>
                <option value="Drink">Drink</option>
              </select>
            </div>

            <div class="form-group">
              <label>Item Price</label>
              <input type="text" value="<?=$item_price; ?>" class="form-control" id="item_Price<?=$item_id; ?>" placeholder="Item Price">
            </div>

            <button id="edit_item<?=$item_id; ?>" type="button" class="btn btn-default">Submit</button>
          </form>
          <div id="edit_status<?=$item_id; ?>"></div>
        </div>

      </div>
    </div>
  </div>



<script>
$("#edit_item<?=$item_id; ?>").click(function(){
  var item_name1 = $("#item_name<?=$item_id; ?>").val();
  var item_category1 = $("#item_category<?=$item_id; ?>").val();
  var item_price1 = $("#item_Price<?=$item_id; ?>").val();
  var item_id1 = "<?=$item_id; ?>";

  if(item_name1==''||item_category1==''|| item_price1==''){
     $("#edit_status<?=$item_id; ?>").html("Fill in empty fields");
  }else{
       $.post("config/edit_menu.php",{item_name:item_name1, item_category:item_category1, item_price:item_price1, item_id:item_id1}, function(data){
         $("#edit_status<?=$item_id; ?>").html(data);
         $("#conceptarea").load('mods/menus.php');
       })
  }

})


  $("#delete<?=$item_id; ?>").click(function(){
    var id1 = "<?=$item_id; ?>";
    $.post("config/delete_menu.php",{id:id1}, function(data){
     alert(data);
     $("#conceptarea").load('mods/menus.php');
    });
  })
</script>
  <?php

  }

  }else{
    echo "error loading menus".mysqli_error($conn);
  }

   ?>

  </table>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" data-backdrop="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
               $("#conceptarea").load('mods/menus.php');
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
