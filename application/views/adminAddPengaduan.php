<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
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
      background-color: #fff;
      margin: 40px;
    }
  </style>

</head>

<body>
  <div class="container"  style="width:700px;">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h1 class="box-title">Add Pengaduan</h1>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <form id="submitpengaduan" method="post" action="<?= base_url('AdminPengaduan/submit/')?>" class="form-horizontal" style="color:white;">
        <div class="form-group"></br>
          <div class="col-sm-12">
            <label class="control-label" for="instansi" style="color:black; font-family:calibri ;">Instansi:</label>
          </div>
          <div class="col-sm-12">
            <select name="instansi" class="form-control" id="instansi">
              <option>- Select Dinas -</option>
                <?php 
                  foreach($instansi as $ins)
                  {
                    echo '<option value="'.$ins->id.'">'.$ins->nama.'</option>';
                  }
                ?>
            </select></br>
          </div>

          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Kategori:</label>
          </div>
          <div class="col-sm-12">
            <select name="idKategori" class="form-control" id="kategori"  onChange="cariKerusakan()">
              <option>- Select Kategori -</option>
                <?php 
                  foreach($kategori as $kat)
                  {
                    echo '<option value="'.$kat->id.'">'.$kat->nama.'</option>';
                  }
                ?>
            </select></br>
          </div>

          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Kerusakan:</label>
          </div>
          <div class="col-sm-12">
            <select name="idKerusakan" class="form-control" id="kerusakan">
              <option>- Select Kerusakan -</option>
                                            
            </select></br>
          </div>
          
          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Comment:</label>
          </div>
          <div class="col-sm-12">
            <textarea class="form-control" name="comment" rows="10" cols"30" placeholder="Enter comment"></textarea></br>
          </div>

          <div class="col-sm-12">
            <label class="control-label" style="color:black; font-family:calibri ;">Nomor Surat:</label>
          </div>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="nomorSurat" placeholder="Enter nomor surat">
          </div> 
        </div>
        
          <div class="box-footer">
            <a href="<?php echo base_url('adminPengaduan/pengaduan') ?>" type="button" class="btn btn-default">Cancel</a>
            <input type="submit" value="submit" name="submit" class="btn btn-info">
          </div>        
      </form>   
    </div>
  </div>

</body>

</html>

<!-- Bootstrap core JavaScript -->
    <script src="/skripsi/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/skripsi/assets/vendor/popper/popper.min.js"></script>
    <script src="/skripsi/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/skripsi/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/skripsi/assets/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="/skripsi/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/skripsi/assets/js/creative.min.js"></script>


<script type="text/javascript">
  function cariKerusakan()
         {
           idKategori = document.getElementById("kategori").value;
           
           $.ajax({
             url:"<?= base_url() ?>AdminPengaduan/cariKategori/"+idKategori+"",
             success: function(response){
             $("#kerusakan").html(response);
             },
             dataType:"html"
           });

           return false;
         }
</script>