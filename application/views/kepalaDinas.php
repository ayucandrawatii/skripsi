<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kepala Dinas</title>
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
      font-size: 14px;
      padding: 5px 20px 5px 10px;
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
      <span class="logo-lg"><b>Hi, Kepala Dinas</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a> -->

      <div class="navbar-custom-menu">
      </div>
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
          <p>Kepala Dinas</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
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
          <a href="<?php echo base_url('adminPengaduan/profile') ?>">
            <i class="fa fa-users"></i> <span>Profile</span>       
          </a>          
        </li>
        <li>
          <a href="<?php echo base_url('loginAdmin/index') ?>">
            <i class="fa fa-users"></i> <span>Sign Out</span>       
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
          <!-- <h3 class="box-title">Title</h3> -->
          </br>
          
          <div class="row">
            <div class="col-md-4">
              <!-- <a href="<?php echo base_url('adminPengaduan/add/') ?>" type="button" class="btn btn-primary">Tambah Pengaduan</a> -->
            </div>
            
            <div class="col-md-6">
              <form action="" method="get">
                <div class="col-md-4">
                  <select class="form-control" name="tahun">
                    <option>-pilih tahun-</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                  </select>
                </div>
              
                <div class="col-md-4">
                  <select class="form-control" name="bulan">
                    <option>-pilih bulan-</option>
                    <option value="1">januari</option>
                    <option value="2">februari</option>
                    <option value="3">maret</option>
                    <option value="4">april</option>
                    <option value="5">mei</option>
                    <option value="6">juni</option>
                    <option value="7">juli</option>
                    <option value="8">agustus</option>
                    <option value="9">september</option>
                    <option value="10">oktober</option>
                    <option value="11">november</option>
                    <option value="12">desember</option>
                  </select>
                </div>

                <div class="col-mg-4">
                  <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                </div>
              </form>
            </div>

            <div class="col-md-2">
              <a href="<?= site_url('KepalaDinas/cetak/').$bulan.'/'.$tahun ?>" type="button" class="btn btn-primary" style="right">Cetak Pengaduan</a>
            </div>
          </div>

          </br>

          <!-- /.box-header -->
            <div class="box-body">
              <!-- BAR CHART -->
              <div style="width:500px; align:center">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Pengaduan</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              </div>
              <!-- /.box -->
            </div>

            <!-- SEARCH -->
            <div class="col-md-12 text-right">
              <form action="<?php echo base_url('KepalaDinas/pengaduan/') ?>" method="get">
                <label>Search</label>
                <input style="width:330px;" name="search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Ketik nomor surat atau nama instansi.." title="" value="<?= $search ?>">
              </form>
            </div>

            <div class="box-body">
              <table class="table table-bordered">
                
                <tr>
                  <th style="width: 10px">NO</th>
                  <th style="width: 100px">No Surat</th>
                  <th style="width: 200px">Instansi</th>
                  <th style="width: 100px">Kategori</th>
                  <th style="width: 150px">Kerusakan</th>
                  <th style="width: 150px">Status</th>
                  <th style="width: 200px">Action</th>
                </tr>
                <?php foreach ($posting as $key => $post): ?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $post->nomorSurat;?></td>
                  <td><?php echo $post->instansi;?></td>
                  <td><?php echo $post->kategori;?></td>
                  <td><?php echo $post->kerusakan;?></td>
                  <td><?php echo $post->status;?></td>
                  <td>
                    <div class="btn-group">
                      <!-- <a href="<?php echo base_url('AdminEdit/edit/').$post->id ?>" type="button" class="btn btn-default">Edit</a>
                      <a href="<?php echo base_url('AdminHapus/delete/').$post->id ?>" type="button" class="btn btn-default" onclick="deletePengaduan()">Hapus</a>
                      <a href="<?php echo base_url('KirimEmail/index/').$post->id ?>" type="button" class="btn btn-default">Kirim</a> -->
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
  function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
     
    var areaChartData = {
      labels  : 
      <?php 
      $month = array('', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des');
      echo '[ ';
      foreach ($grafik as $key => $g) {
        echo "'".$month[$g->bulan]."', ";
      } 
      echo ' ]'; ?> 
      ,
      datasets: [
        {
          label               : 'Pengaduan',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : 
            <?php 
            echo '[ ';
            foreach ($grafik as $key => $g) {
              echo $g->total.', ';
            } 
            echo ' ]'; ?> 
        },
      ]
    }

    

    
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

<script>
function deletePengaduan() {
    var ask = window.confirm("Are you sure you want to delete this post?");
    if (ask) {
        window.location.href = "<?php echo base_url() ?>AdminHapus/delete";

    }
}
</script>

</body>
</html>
