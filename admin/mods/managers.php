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
                 <th>Idno</th>
                 <th>Configure</th>
             </tr>
         </thead>

<tbody>
<?php


$query_owner = "SELECT * FROM `owner` ";
$owner_result = mysqli_query($conn, $query_owner);
$i = 0;
while ($owner= mysqli_fetch_array($owner_result)) {
  $owner_id = $owner['id'];
  $owner_firstname = $owner['firstname'];
  $owner_lastname= $owner['lastname'];
  $owner_email = $owner['email'];
  $owner_idno = $owner['idno'];
  $owner_status= $owner['admin_control'];


  $i++;
?>

    <tr>
        <td><?=$i; ?></td>
        <td><?=$owner_firstname; ?></td>
        <td><?=$owner_lastname ?></td>
        <td><?=$owner_email; ?></td>
        <td><?=$owner_idno; ?></td>
        <td>
<button class="btn btn-danger" id="action<?=$owner_id; ?>">
  <?php
       if ($owner_status=='Active') {
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
$("#action<?=$owner_id; ?>").click(function(){
  var id1 ="<?=$owner_id; ?>";
  var status1 = "<?=$owner_status;?>";
  if (id1==''||status1=='') {
      alert("No User Selected");
  }else{
     $.post("config/owner_control.php",{id:id1, status:status1}, function(data){
      alert(data);
       $("#conceptarea").load('mods/managers.php');
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
