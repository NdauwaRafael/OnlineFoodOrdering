<!--=============INCLUDE CONFIGARATION FILES==================-->
<?php include "config/session.php"; ?>
<?php include "config/user_data.php"; ?>
<!--======================================================-->
<html>
<head>
	<title>E FOOD</title>

  <!--=============INCLUDE CSS FILES==================-->
  <?php include "../inc/css.php"; ?>
  <!--================================================-->
<style>
   #profile {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 3%;
   }

   .profpic {
     border-radius: 25%;
     margin-top: 5%;
   }


</style>
</head>
<body >
  <!--=============INCLUDE NAVIGATION AREA==================-->
  <?php include "inc/navigation.php"; ?>
  <!--======================================================-->

<div >

          <div class="col-md-offset-2 col-md-10 contentarea" id="profile">
            <div class="row">
                <div class="col-xs-6 col-md-4 ">
                            <div class="col-xs-6 col-md-6">
                              <a href="#" class="thumbnail profpic">
                                <img src="../icons/reading.png" alt="...">
                              </a>
                               <div class="caption">
                                  <h4>User Details</h4>

                                  <div class="form-group">
                                    <label for="exampleInputFile">Change profile picture</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Upload the photo here.</p>
                                  </div>
                              </div>
                            </div>

                </div>
                <div class="col-xs-6 col-md-6">
                  <form>
                    <div class="form-group">
                      <label >First Name</label>
                      <input value="<?= $firstName; ?>" type="text" class="form-control"  placeholder="First Name" readonly>
                    </div>
                    <div class="form-group">
                      <label >Last Name</label>
                      <input value="<?= $lastName; ?>" type="text" class="form-control"  placeholder="Last Name" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input value="<?= $email; ?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" readonly>
                    </div>

                    <div class="form-group">
                      <label >Phone Number</label>
                      <input value="<?= $phone; ?>" type="number" class="form-control" placeholder="Phone Number" readonly>
                    </div>

                    <div class="form-group">
                      <label >Residence</label>
                      <input value="<?= $residence; ?>" type="text" class="form-control"  placeholder="Residence" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" readonly>
                    </div>
                    <a href="customer.php" type="button" class="btn btn-info">Continue</a>
                  </form>
                </div>
                <div class="col-xs-6 col-md-2"></div>
              </div>
        </div>
</div>



<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/myjs.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
</body>
</html>
