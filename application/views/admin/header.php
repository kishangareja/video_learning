<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=PROJECT_NAME;?> | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/dist/css/skins/_all-skins.min.css');?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/morris.js/morris.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/timepicker/bootstrap-timepicker.min.css');?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
     <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/plugins/iCheck/all.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/jvectormap/jquery-jvectormap.css');?>">
      <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/bower_components/select2/dist/css/select2.min.css');?>">
    <!-- jQuery 3 -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="<?=base_url('assets/admin/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/admin/bower_components/jquery/dist/jquery.validate.min.js');?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=base_url('assets/admin/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>

    <!-- sweetalert Stylesheets -->
    <link rel="stylesheet" href="<?=base_url('assets/admin/regform/sweetalert.css');?>" type="text/css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <style type="text/css" media="screen">
  h3.box-title.page_title {
  float: left;
  }
  a.pull-right.btn.btn-block.btn-primary.btn-flat.add_button {
  width: 15%;
  }
  </style>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Video Learning</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Video Learning</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a onclick="return confirm('Are you sure want to logout ?')" href="<?php echo base_url('admin/login/logout') ?>" >
                  <img src="<?=base_url('assets/admin/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">Logout </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->