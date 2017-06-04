<?php
@require "../config/connect.php";
@require "../config/query_hotel.php";
?>

<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
<div class="body">

  <div class="page-header">
    <h4>Filter Report Monthly</h4>
<div id="report_status"></div>
  <form>
                      <div class="row clearfix">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                        	    <label class="sr-only" for="exampleInputEmail2">Select a month</label>
                        		<select id="month" class="form-control" placeholder="Select a month" name="month">
                        		 <option value="">----- Select another month (viewing only) ------</option>
                                 <option name="month" value="1">January</option>
                                 <option name="month" value="2">February</option>
                                 <option name="month" value="3">March</option>
                                 <option name="month" value="4">April</option>
                                 <option name="month" value="5">May</option>
                                 <option name="month" value="6">June</option>
                                 <option name="month" value="7">July</option>
                                 <option name="month" value="8">August</option>
                                 <option name="month" value="9">September</option>
                                 <option name="month" value="10">Octomber</option>
                                 <option name="month" value="11">November</option>
                                 <option name="month" value="12">December</option>
                        				</select>
                        	  </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <button type="button" id="filer_report" class="btn btn-primary btn-lg m-l-15 waves-effect">Filter</button>
                          </div>
                      </div>
                  </form>

<div id="Report">
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

<tbody>
<?php


$query_request = "SELECT * FROM `request` WHERE `hotel`='$hotel_name' AND `status`='Derivered' ";
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

    $sum = "SELECT SUM(amount) FROM `request` WHERE `hotel`='$hotel_name' AND `status`='Derivered' ";

    	 $result_sum = mysqli_query($conn, $sum);
    	    while ($summ = mysqli_fetch_array($result_sum)){
    		$total = $summ['SUM(amount)'];
    	?>
    <tr class="success">
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
    ?>
    </table>

</div>

<script type="text/javascript">
	$("#filer_report").click(function(){
      var month1 = $("#month").val();
      if (month1=='') {
         $("#report_status").html("Select A month");
      }else{
         $.post("config/sales_report.php",{month:month1},function(data){
         	$("#Report").html(data);
         })
      }
	})
</script>
</div>
</div>
</div>
</div>
