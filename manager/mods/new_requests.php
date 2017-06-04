<?php
@require "../config/connect.php";
@require "../config/query_hotel.php";
?>

<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
<div class="body">

     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Food</th>
                 <th>Quantity</th>
                 <th>Customer</th>
                 <th>Address</th>
                 <th>Amount</th>
                 <th>Status</th>
                 <th>Request Date</th>
                 <th>Action</th>
             </tr>
         </thead>

<tbody>
<?php


$query_request = "SELECT * FROM `request` WHERE `hotel`='$hotel_name' AND `status`='requested' ";
$request_result = mysqli_query($conn, $query_request);
$i = 0;
while ($request = mysqli_fetch_array($request_result)) {
  $request_id = $request['id'];
  $request_food = $request['food'];
  $request_quantity = $request['quantity'];
  $request_hotel = $request['hotel'];
  $request_customer = $request['customer'];
  $request_address = $request['address'];
  $request_amount = $request['amount'];
  $request_status = $request['status'];
  $request_date = $request['request_date'];
  $request_comment = $request['comment'];
  $i++;
?>

    <tr>
        <td><?=$i; ?></td>
        <td><?=$request_food; ?></td>
        <td><?=$request_quantity; ?></td>
        <td><?=$request_customer; ?></td>
        <td><?=$request_address; ?></td>
        <td><?=$request_amount; ?></td>
        <td><?=$request_status; ?></td>
        <td><?=$request_date; ?></td>
        <td><button type="button" class="btn bg-light-green waves-effect" id="accept_request<?=$request_id; ?>">Accept Request</button><br>
        <button type="button" class="btn bg-light-brown waves-effect" id="decline_request<?=$request_id; ?>">Decline Request</button>
        </td>
    </tr>


<script>
$("#decline_request<?=$request_id; ?>").click(function(){
    var idd1 = "<?=$request_id; ?>";
    $.post("config/decline_request.php", {idd:idd1},function(data){
        alert(data);
        $("#conceptarea").load('mods/new_requests.php');
    })
})

$("#accept_request<?=$request_id; ?>").click(function(){
  var id1 = "<?=$request_id; ?>";
  if (id1=='') {
    alert("no request selected");
  }else{
    $.post("config/accept_request.php", {id:id1}, function(data) {
      alert(data);
      $("#conceptarea").load('mods/new_requests.php');
    })
  }
})

</script>
<?php


}

 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
