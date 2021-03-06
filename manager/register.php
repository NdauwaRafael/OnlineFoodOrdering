
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Form Examples | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="images/tfood.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">ADMIN  - Online Food Ordering Register</a>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>

                </ul>
            </div>
            <!-- #Menu -->

        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">


            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Login
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form>
                                <label for="email_address">First Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="first_name" class="form-control" placeholder="Enter your First Name">
                                    </div>
                                </div>

                                <label for="email_address">Last Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="last_name" class="form-control" placeholder="Enter your Last Name">
                                    </div>
                                </div>

                                <label for="email_address">Email Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>

                                <label for="email_address">Id Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="idno" class="form-control" placeholder="Enter your id Number">
                                    </div>
                                </div>

                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                    </div>
                                </div>

                                <label for="password">Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" id="cpassword" class="form-control" placeholder="Enter your confirmation password">
                                    </div>
                                </div>

                                <input type="checkbox" id="remember_me" class="filled-in">
                                <label for="remember_me">Remember Me</label>
                                <br>
                                <button id="register" type="button" class="btn btn-primary m-t-15 waves-effect">Register</button>
                            </form>

                            <div id="regStatus"></div>
                        </div>
                    </div>
                </div>
            </div>
  <script src="plugins/jquery/jquery.min.js"></script>            <!-- #END# Vertical Layout -->
<script>
   $("#register").click(function(){
       var fname = $("#first_name").val();
       var lname = $("#last_name").val();
       var email = $("#email_address").val();
       var idno = $("#idno").val();
       var password = $("#password").val();
       var cpass = $("#cpassword").val();

       if (fname==''||lname==''||email==''||idno==''||password==''||cpass=='') {
           $("#regStatus").html("fill in empty fields");
       }else{
             if (password==cpass) {
                 $.post("config/register.php",{fname1:fname, lname1:lname, email1:email, idno1:idno, password1:password},function(data){
                  $("#regStatus").html(data);
                 })
             }else {
               $("#regStatus").html("password Do Not Match Make sure they match");
             }
       }
   })

</script>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
