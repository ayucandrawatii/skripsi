<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Layanan Pengaduan Online</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- <!-- Custom fonts for this template -->
    <link href="/skripsi/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/blog-post.css" rel="stylesheet">
 

    <!-- Custom styles for this template -->
    <link href="/skripsi/assets/css/creative.min.css" rel="stylesheet">


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('Pengaduan/index') ?>">PENGADUAN ONLINE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Pengaduan/index/#about') ?>">PROFIL</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Pengaduan/index/#alur') ?>">ALUR</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Pengaduan/index/#form') ?>">FORM</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('welcome/posting') ?>">POSTING</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Pengaduan/index/#contact') ?>">KONTAK KAMI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Pengaduan/signOut') ?>">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4">Daftar Pengaduan</h1>
          <?php foreach ($posting as $key => $post): ?>
            <!-- Blog Post -->
            <div class="card mb-4">              
              <div class="card-body">
                <h5 class="card-title"><?php echo $post->instansi;?></h5>
                <h6 class="card-title"><?php echo $post->kategori;?></h6>
                <h6 class="card-title"><?php echo $post->namaKerusakan;?></h6>

                <?php 
                  if($post->status=='belum diproses'){?>
                    <span class="btn btn-danger btn-sm"><?php echo $post->status;?></span><?php
                  }

                  else{?>
                    <span class="btn btn-primary btn-sm"><?php echo $post->status;?></span><?php
                  }?>
                
                
                 </br>
                

                <!-- <a href="#" class="btn btn-primary">Read More &rarr;</a> -->
              </div>
              <div class="card-footer text-muted">
                <?php $date = date_create($post->timestamp);
                  echo date_format($date,"d M Y H:i"); ?>
                <!-- <a href="#">Start Bootstrap</a> -->
              </div>
            </div>
          <?php endforeach ?>
          

          

          <!-- Pagination -->
          <!-- <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul> -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <!-- <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div> -->

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;Layanan Pengaduan Online</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>