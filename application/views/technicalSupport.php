<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Technical Support
  </title>
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

  <style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

  </style>
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
      <span class="logo-lg"><b>Hi, T.Support</b></span>
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
          <img src="<?php echo base_url()?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Technical Support</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url('TechnicalSupport/') ?>">
            <i class="fa fa-history"></i> <span>List Pengaduan</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('TechnicalSupport/daftarKerusakan') ?>">
            <i class="fa fa-cog"></i> <span>Daftar kerusakan</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('TechnicalSupport/listSolusi') ?>">
            <i class="fa fa-wrench"></i> <span>List solusi</span>       
          </a>          
        </li>
        <li>
        <li>
          <a href="<?php echo base_url('TechnicalSupport/profile') ?>">
            <i class="fa fa-user-circle"></i> <span>Profile</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('TechnicalSupport/signOut') ?>">
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
        List Pengaduan
      </h1>      
      </br>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          </br>        
          <div class="row">
            <div class="col-md-12">
                <!-- <a href="<?php echo base_url('TechnicalSupport/tambahSolusi/') ?>" type="button" class="btn btn-primary">Tambah Solusi</a> -->
            </div>
          <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                
                <tr>
                  <th style="width: 10px">NO</th>
                  <th style="width: 200px">Instansi</th>
                  <th style="width: 150px">Kategori</th>
                  <th style="width: 150px">Kerusakan</th>
                  <th style="width: 150px">Comment</th>
                  <th style="width: 150px">Status</th>
                  <th style="width: 100px">Action</th>
                </tr>
                <?php foreach ($posting as $key => $post): ?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $post->instansi;?></td>
                  <td><?php echo $post->kategori;?></td>
                  <td><?php echo $post->kerusakan;?></td>
                  <td><?php echo $post->comment;?></td>
                  <td><?php echo $post->status;?></td>
                  <td>
                    <div class="btn-group">
                      <button  onclick="solusi(<?php echo $post->id; ?>)" type="button" class="btn btn-success" >Solusi</button>
                    </div>
                  </td>
                 </tr>
                <?php endforeach ?>
                
              </table>
              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Launch demo modal
              </button> -->

              <!-- Modal -->
              <div class="modal fade" id="viewSolusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Solusi</h4>
                    </div>
                    <div id="hasilView" class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/bower_components/Chart.js/Chart.js"></script>
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

<script>
  // function myFunction() {
  //   var input, filter, table, tr, td, i;
  //   input = document.getElementById("myInput");
  //   filter = input.value.toUpperCase();
  //   table = document.getElementById("myTable");
  //   tr = table.getElementsByTagName("tr");
  //   for (i = 0; i < tr.length; i++) {
  //     td = tr[i].getElementsByTagName("td")[0];
  //     if (td) {
  //       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  //         tr[i].style.display = "";
  //       } else {
  //         tr[i].style.display = "none";
  //       }
  //     }       
  //   }
  // }
</script>

<script>
  // $(function () {
  //   //MODAL
  //   $('#myModal').on('shown.bs.modal', function () {
  //     $('#myInput').focus()
  //   })

function solusi(id){
   
  $.ajax({
           url:"<?= base_url() ?>TechnicalSupport/solusi/"+id+"",
           success: function(response){
           $("#hasilView").html(response);
           $('#viewSolusi').modal();
           },
           dataType:"html"
         });

         return false;
       }

   
</script>
</body>
</html>
