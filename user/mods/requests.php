<?php
session_start();
@include "../config/connect.php";
@include "../config/user_data.php";
?>
<div id="request_area">
<table class="table table-bordered">
  <thead>
     <th>#</th>
     <th>Date</th>
     <th>Food</th>
     <th>Quantity</th>
     <th>Hotel</th>
     <th>Address</th>
     <th>Amount</th>
     <th>Status</th>
     <th>Control</th>

   </thead>



<?php
$a = 0;
$query_requests = "SELECT * FROM `request` WHERE `customer`='{$_SESSION['user_email']}' ORDER BY `request_date` ASC";
$request_result = mysqli_query($conn, $query_requests);
while ($request = mysqli_fetch_array($request_result)) {
  $food = $request['food'];
  $quantity = $request['quantity'];
  $hotel = $request['hotel'];
  $address = $request['address'];
  $status = $request['status'];
  $date = $request['request_date'];
  $amount = $request['amount'];
  $duration = $request['time'];
  $request_id = $request['id'];
  $a++;
/*update status to expired*/
if ($status=='requested') {


  $time = time();
  $diff = $time-strtotime($date);
  $mins = round(abs($diff) / 60);

  if ($mins > $duration) {
     $expire = "UPDATE `request` SET `status`='Expired',`comment`='Request expired because was not accepted in time' WHERE `id`='$request_id'";
     if (mysqli_query($conn, $expire)) {
       echo "Request Expired";
     }else{
       echo "error in updating request";
     }
  }
}

$time = time();
$diff = $time-strtotime($date);
$mins = round(abs($diff) / 60);

  ?>
<tr>
  <td><?=$a; ?></td>
  <td><?=$date; ?></td>
  <td><?=$food;?></td>
  <td><?=$quantity; ?></td>
  <td><?=$hotel; ?></td>
  <td><?=$address; ?></td>
  <td><?=$amount; ?></td>
  <td><?=$status; ?></td>
  <td>
    <?php
       if ($status=='requested') {
         ?><button class="btn btn-default" type="submit">Cancel Request</button><?php
       }else{
         ?>Cancel Expired<?php
       }
     ?>
  </td>

</tr>

  <?php
}
?>
</table>
</div>
<style>

 #request_area {
   background-color: #efebe9  !important;
   color: #ffebee !important;
 }

 #request_area .table{
   color: #ef5350 !important;
 }

 #request_area .table thead{
   background-color: #00c853 !important;
   color: #fff !important;
 }
</style>
