<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Pengaduan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hi, Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$this->session->userdata('foto')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Pengaduan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('adminPengaduan/pengaduan') ?>">
            <i class="fa fa-history"></i> <span>Pengaduan</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('adminNambahUser/') ?>">
            <i class="fa fa-users"></i> <span>Daftar user</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('adminNambahInstansi/') ?>">
            <i class="fa fa-university"></i> <span>Daftar instansi</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('adminPengaduan/profile') ?>">
            <i class="fa fa-user-circle"></i> <span>Profile</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('AdminPengaduan/signOut') ?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>       
          </a>          
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Instansi
        
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          </br>
          <div class="">
            <a href="<?php echo base_url('adminNambahInstansi/add/') ?>" type="button" class="btn btn-primary">Tambah Instansi</a>
          </div>
          </br>
          <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                
                <tr>
                  <th style="width: 10px">NO</th>
                  <th style="width: 500px">Nama Instansi</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($instansi as $key => $post): ?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $post->nama;?></td>                 
                  <td>
                    <div class="btn-group" style="align:center";>
                      <a href="<?php echo base_url('AdminNambahInstansi/edit/').$post->id ?>" type="button" class="btn btn-default">Edit</a>
                      <a href="<?php echo base_url('AdminNambahInstansi/delete/').$post->id ?>" type="button" class="btn btn-default">Hapus</a>
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
                
              </table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div> -->
          </div>         
        </div>
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/skripsi/assets/bower_components/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/skripsi/assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/css/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/css/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/css/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/css/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
  