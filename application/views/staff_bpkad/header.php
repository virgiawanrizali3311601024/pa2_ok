<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BPKAD | Staf Aset</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load.   
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">    
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">    
  -->

  
  

  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/datatables/js/dataTables.bootstrap.js"></script> 
  
  <!--  
  <script src="<?php echo base_url()?>assets/bower_components/morris.js/morris.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
  -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
     <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size:11px;"><b>BPKAD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BPKAD</b> | Pembukuan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">   </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <p><?php echo $this->session->userdata('nama');?></p>
                  <p><?php echo $this->session->userdata('tipe_user');?></p>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()?>staff_bpkad/gantipassword" class="btn btn-default btn-flat"><i class="fa fa-cogs"></i> Kata Sandi</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('tipe_user');?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-hashtag"></i> <span>Data Masukan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kiba'?>"><i class="fa fa-circle-o"></i> KIB A</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kibb'?>"><i class="fa fa-circle-o"></i> KIB B</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kibc'?>"><i class="fa fa-circle-o"></i> KIB C</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kibd'?>"><i class="fa fa-circle-o"></i> KIB D</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kibe'?>"><i class="fa fa-circle-o"></i> KIB E</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/masukan_kibf'?>"><i class="fa fa-circle-o"></i> KIB F</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Arsip</span>
            <span class="pull-right-container"> 
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kiba'?>"><i class="fa fa-circle-o"></i> KIB A</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kibb'?>"><i class="fa fa-circle-o"></i> KIB B</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kibc'?>"><i class="fa fa-circle-o"></i> KIB C</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kibd'?>"><i class="fa fa-circle-o"></i> KIB D</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kibe'?>"><i class="fa fa-circle-o"></i> KIB E</a></li>
            <li><a href="<?php echo base_url().'staff_bpkad/arsip_kibf'?>"><i class="fa fa-circle-o"></i> KIB F</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url().'staff_bpkad/scan'?>"><i class="fa fa-qrcode"></i>Pemindai KodeQR</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
