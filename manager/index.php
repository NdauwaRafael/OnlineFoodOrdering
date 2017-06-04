<?php
 require "config/connect.php";
  require 'config/admin_session.php';
 require "config/select_user.php";
 require "config/query_hotel.php";
 require "config/check_active.php";


 if (!owner_loggin()) {
   header("location: login.php");
 }else {
     if (!owner_active()) {
       header("location: ../error/error.php");
     }
 }

 ?>
﻿<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Online Food Ordering</title>
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

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="datatable/skin/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-brown">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Owner Account ~ <span class="glyphicon glyphicon-glass"></span> <?=$hotel_name;  ?></a>
            </div>
</div>
</nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$owner_firstname. " ". $owner_lastname?></div>
                    <div class="email"><?=$owner_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                      <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="glyphicon glyphicon-chevron-down"></span>

                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);">Food Menus</a></li>
                            <li><a href="javascript:void(0);">Sales Requests</a></li>
                            <li><a href="javascript:void(0);">Deliveries</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="config/logout.php">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="#">

                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a id="menus">

                            <span>Menu</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">

                            <span>Orders</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a id="new_requests">
                                    <span>New Requests</span>
                                </a>

                            </li>
                            <li>
                                <a id="pending_requests" >
                                      <span>Pending Requests</span>
                                </a>

                            </li>

                            <li>
                                <a id="finished_requests" >
                                      <span>Completed Requests</span>
                                </a>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">

                            <span>Hotel</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a id="new_hotel">Add New</a>
                            </li>
                            <li>
                                <a id="view_hotel">View Hotel Details</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">

                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a id="sales_report">Sales Report</a>
                            </li>


                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->

            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->



                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix" >
                <div class="col-md-12" id="conceptarea"></div>
              </div>
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

        <!-- Jquery DataTable Plugin Js -->
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>


        <!-- Custom Js -->
        <script src="js/admin.js"></script>


        <!-- Demo Js -->
        <script src="js/demo.js"></script>


<script>
$("#menus").click(function(){
   $("#conceptarea").load('mods/menus.php');
})

$("#new_requests").click(function () {
   $("#conceptarea").load('mods/new_requests.php');
});

$("#pending_requests").click(function () {
   $("#conceptarea").load('mods/pending_requests.php');
});

$("#finished_requests").click(function () {
   $("#conceptarea").load('mods/finished_request.php');
});

$("#new_hotel").click(function () {
   $("#conceptarea").load('mods/new_hotel.php');
});

$("#view_hotel").click(function () {
   $("#conceptarea").load('mods/view_hotel.php');
});

$("#sales_report").click(function () {
   $("#conceptarea").load('mods/sales_report.php');
});

    $('.datatable').DataTable();
$('table').dataTable();
</script>
</body>

</html>
