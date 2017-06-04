<?php
@require "../config/connect.php";
?>

<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
<div class="body">

     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
         <thead>
             <tr>
                 <th>#</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>County</th>
                 <th>Street</th>
                 <th>Configure</th>
             </tr>
         </thead>

<tbody>
<?php


$query_customer = "SELECT * FROM `customer` ";
$customer_result = mysqli_query($conn, $query_customer);
$i = 0;
while ($customer= mysqli_fetch_array($customer_result)) {
  $customer_id = $customer['id'];
  $customer_firstname = $customer['firstname'];
  $customer_lastname= $customer['lastname'];
  $customer_email = $customer['email'];
  $customer_phone = $customer['phone'];
  $customer_county = $customer['county'];
  $customer_street = $customer['street'];
  $customer_status= $customer['admin_control'];


  $i++;
?>

    <tr>
        <td><?=$i; ?></td>
        <td><?=$customer_firstname; ?></td>
        <td><?=$customer_lastname ?></td>
        <td><?=$customer_email; ?></td>
        <td><?=$customer_phone; ?></td>
        <td><?=$customer_county; ?></td>
        <td><?=$customer_street ?></td>
        <td>
<button class="btn btn-danger" id="action<?=$customer_id; ?>">
  <?php
       if ($customer_status=='Active') {
         ?>
         Deactivate
         <?php
       }else {
        ?>
         Activate
        <?php
       }

   ?>

</button>
        </td>

    </tr>
<script>
$("#action<?=$customer_id; ?>").click(function(){
  var id1 ="<?=$customer_id; ?>";
  var status1 = "<?=$customer_status;?>";
  if (id1==''||status1=='') {
      alert("No User Selected");
  }else{
     $.post("config/customer_control.php",{id:id1, status:status1}, function(data){
      alert(data);
       $("#conceptarea").load('mods/customers.php');
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
