<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>skripsi</title>

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

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 14px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		text-align: center;
		color: #444;
		background-color: transparent;
		font-size: 24px;
		font-weight: normal;
		margin: 30px 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	

	#body {
		margin: 0px 15px 0 15px;
		padding: 0px;

	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		width: 400px;
		margin: 0 auto;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	input[type=text], input[type=password] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }

	</style>
</head>
<body>

<div id="container">
	<h1>HALAMAN LOGIN</h1><hr></br>
	
	<div id="body">
		<?php echo form_open('welcome/ceklogin')?>   <!--mengalihkan halaman login ke controller welcome dgn fungction ceklogin-->
			<div>
				<input type="text" name="username" placeholder="username"/></br></br>
				<input type="password" name="password" placeholder="password"/></br></br></br></br>`
				<input type="submit" class="btn btn-primary btn-m" name="login" value="LOGIN">
			</div>
			<?php var_dump($this->session->userdata()); ?>
		<?php echo form_close() ?>					<!--jika ada form_open, maka harus ada form_close-->
	</div>
	<p class="footer">Selamat datang di website kami</p>
</div>



</body>
</html>