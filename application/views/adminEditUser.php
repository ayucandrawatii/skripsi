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
        <h1 class="box-title">Edit User</h1>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

      <form id="submitpengaduan" method="post" action="<?= base_url('AdminNambahUser/submitEdit/').$user->id_user?>" class="form-horizontal" style="color:white;">
                <div class="form-group">
                  <label class="control-label col-sm-2" style="color:black;">Nama User:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="username" value="<?= $user->username ?>">
                  </div>

                  <label class="control-label col-sm-2" style="color:black;">Password:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="password">
                  </div>

                </div>             

                <div class="form-group"> 
                  <div class="box-footer">
                    <a href="<?php echo base_url('AdminNambahUser').$user->id_user ?>" type="button" class="btn btn-default">Cancel</a>
                    <input type="submit" value="submit" name="submit" class="btn btn-info">
                  </div>
                </div>
      </form>

    </div>
  </div>

</body>

</html>