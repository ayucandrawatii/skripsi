<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Layanan Pengaduan Online</title>

    <!-- Bootstrap core CSS -->
    <link href="/skripsi/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/skripsi/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="/skripsi/assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/skripsi/assets/css/creative.min.css" rel="stylesheet">
    <link href="/skripsi/assets/css/tambahan.css" rel="stylesheet">

    
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Pengaduan Online</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#alur">Alur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#form">Form</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url('welcome/posting') ?>">Posting</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontak Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url('Pengaduan/signOut') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">Pengaduan Kerusakan Komputer Dinas Kota Denpasar</h1>
          <hr>
          <p>Aplikasi berbasis website yang digunakan sebagai alat bantu untuk melakukan pengaduan kerusakan komputer untuk dinas Kota Denpasar.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about"><!-- About -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Selamat datang!</h2>
            <hr class="light">
            <p class="text-faded">Web ini adalah sebagai sarana untuk melakukan pengaduan apabila ada masalah pada komputer pada tiap dinas yang ada di Kota Denpasar. Kerusakan komputer tersebut mencakup kerusakan hardware, software, ataupun serangan virus.</p></br>
            <!-- <a class="btn btn-default btn-xl" data-toggle="collapse" data-target="#demo">lihat tabel jenis kerusakan</a></br> -->         
          </div>
        </div>
      </div>
    </section>

    <section id="alur"><!-- alur -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Alur Pengaduan</h2>
            <hr class="primary">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
              <h3>Form Pengaduan</h3>
              <p class="text-muted">Pegawai mengisi form pengaduan kerusakan komputer</br>
                (1)
              </p>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
              <h3>Proses</h3>
              <p class="text-muted">Pengaduan akan diproses dan ditangani oleh Technical support</br>
                (2)
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
              <h3>Konfirmasi</h3>
              <p class="text-muted">Status pengaduan pada halaman posting berubah menjadi sedang diproses</br>
                (3)
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
              <h3>Kirim ke Pusat</h3>
              <p class="text-muted">Pengaduan dikirim ke pusat apabila tidak bisa ditangani Technical Support</br>
                (4)
              </p>
            </div>
          </div>
          
          
        </div>
      </div>
    </section>

    <section class="bg-primary" id="form"><!-- Form -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">

            <h2 class="section-heading text-white">FORM PENGADUAN</h2>
            <hr class="light">
            <div class="text-justify">
            </br>
              <p class="text-faded" style="font-size:14px;">(*) Harap mengisi data yang benar</p>
              
              <form id="submitpengaduan" method="post" action="<?= base_url() ?>welcome/submit" class="form-horizontal" style="color:white;">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="instansi">Instansi:</label>
                  <div class="col-sm-12">
                    <select name="idInstansi" class="form-control" id="instansi">
                        <option>- Select Dinas -</option>
                        <?php 
                          foreach($instansi as $ins)
                          {
                            echo '<option value="'.$ins->id.'">'.$ins->nama.'</option>';
                          }
                        ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2">Kategori:</label>
                    <div class="col-sm-12">
                      <select name="idKategori" class="form-control" id="kategori"  onChange="cariKerusakan()">
                          <option>- Select Kategori -</option>
                          <?php 
                            foreach($kategori as $kat)
                            {
                              echo '<option value="'.$kat->id.'">'.$kat->nama.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                </div>    

                <label class="control-label col-sm-2">Kerusakan:</label>
                <div class="col-sm-12">
                  <select name="idKerusakan" class="form-control" id="kerusakan">
                      <option>- Select Kerusakan -</option>
                                                
                  </select>
                </div></br>

                <label class="control-label col-sm-2">Comment :</label>
                <div class="col-sm-12">
                  <textarea name="comment" rows="10" cols="60" class="form-control">
                    
                  </textarea>
                </div>
                </br>
                  
                </div>
                <div class="form-group"> 
                  <div class="col-sm-offset-2 col-sm-12" align="left">
                    <button type="submit" name="submit" id="save" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>
    </section>   

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Kontak Kami</h2>
            <hr class="primary">
            <p>Hubungi kami melalui telfon atau melalui email. Bisa juga datang ke alamat kami, Graha Sewaka Dharma Lumintang Lt. III. Kami akan merespon secepatnya</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x sr-contact"></i>
            <p>0361-431229</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">kominfo@denpasarkota.go.id</a>
            </p>
          </div>
        </div>
      </div>
    </section>

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

  </body>


</html>

<script type="text/javascript">

function cariKerusakan()
       {
         idKategori = document.getElementById("kategori").value;
         
         $.ajax({
           url:"<?= base_url() ?>Pengaduan/cariKategori/"+idKategori+"",
           success: function(response){
           $("#kerusakan").html(response);
           },
           dataType:"html"
         });

         return false;
       }
</script>