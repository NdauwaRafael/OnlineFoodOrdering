<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Request Date</th>
            <th>Food</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Address</th>
            <th>Status</th>
            <th>Amount</th>
        </tr>
    </thead>
<?php
@require "../config/connect.php";
@require "../config/query_hotel.php";



if (isset($_POST['month']) && !empty($_POST['month']) ){
	$month = $_POST['month'];
$a = 0;
$query_request = "SELECT * FROM `request` WHERE `hotel`='$hotel_name' AND `status`='Derivered' AND MONTH(request_date) = '$month' ";
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
        <td><?=$request_date; ?></td>
        <td><?=$request_food; ?></td>
        <td><?=$request_quantity; ?></td>
        <td><?=$request_customer; ?></td>
        <td><?=$request_address; ?></td>
        <td><?=$request_status; ?></td>
        <td><?=$request_amount; ?></td>
    </tr>

<?php
}

$sum = "SELECT SUM(amount) FROM `request` WHERE `hotel`='$hotel_name' AND `status`='Derivered' AND MONTH(request_date) = '$month'";

	 $result_sum = mysqli_query($conn, $sum);
	    while ($summ = mysqli_fetch_array($result_sum)){
		$total = $summ['SUM(amount)'];
	?>
<tr class="danger">
	<td></td>
	<td><h4>Total Sales Costs</h4></td>
	<td></td>
	<td></td>
	<td></td>
  <td></td>
	<td></td>
	<td><strong>Ksh. <?php
     if ($total>0) {
       echo $total;
     }else{
       echo "0.00";
     }
   ?></strong></td>

</tr>
<?php
}
}
?>
</table>
