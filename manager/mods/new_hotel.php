<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
              <h2>
                  Add a New Hotel
              </h2>
          </div>
          <div class="body">
            <div id="status_hotel"></div>
              <form>
                  <label for="email_address">Hotel Name</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" id="hotel_name" class="form-control" placeholder="Enter Hotel Name">
                      </div>
                  </div>
                  <label for="password">Hotel County</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" id="hotel_county" class="form-control" placeholder="Enter County">
                      </div>
                  </div>

                  <label for="password">Street</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" id="hotel_street" class="form-control" placeholder="Enter Street">
                      </div>
                  </div>
                  <br>
                  <button type="button" class="btn btn-primary m-t-15 waves-effect" id="register_hotel">Register Hotel</button>
              </form>
          </div>

<script>
  $("#register_hotel").click(function(data) {
     var hname = $("#hotel_name").val();
     var hcounty = $("#hotel_county").val();
     var hstreet = $("#hotel_street").val();

     if (hname==''||hcounty==''||hstreet=='') {
        $("#status_hotel").html('<div class="alert bg-orange">Fill in empty fields before submitting </div>');
     }else {
       $.post("config/register_hotel.php", {hotel_name:hname, hotel_county:hcounty, hotel_street:hstreet}, function(data) {
           $("#status_hotel").html(data);
       })
     }
  })

</script>

        </div>
    </div>
</div>
