<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Technical Support</title>
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

  <style type="text/css">
    body {
      background-color: #ebeff4;
      margin: 40px;
    }
  </style>

</head>

<body>
  <div class="container"  style="width:700px;">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-body">
      <div class="box-header with-border">
        <h1 class="box-title">Tambah Solusi</h1>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <form id="submitpengaduan" method="post" action="<?= base_url('TechnicalSupport/submit/')?>" class="form-horizontal" style="color:white;">
        <div class="form-group"></br>
                    
          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Gejala:</label>
            <textarea class="form-control" name="gejala" id="gejala"></textarea><br>
          </div>

          
          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Kemungkinan Penyebab:</label>
            <textarea id="penyebab" class="form-control" name="penyebab"  ></textarea><br>
          </div>

          
          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Solusi:</label>
            <textarea id="solusi" class="form-control" name="solusi"   ></textarea>
          </div>
     
          
        </div>
        
          <div class="box-footer" style="text-align: right">
            <a href="<?php echo base_url('TechnicalSupport/listSolusi') ?>" type="button" class="btn btn-default">Cancel</a>
            <input type="submit" value="submit" name="submit" class="btn btn-info">
          </div>        
      </form>   
    </div>
    </div>
  </div>

</body>

</html>
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/ckeditor/config.js"></script>

<script type="text/javascript">
CKEDITOR.replace('gejala');
CKEDITOR.replace('solusi');
CKEDITOR.replace('penyebab');
 CKEDITOR.on('instanceLoaded', function(e) {e.editor.resize('100%', 350)} )
</script>