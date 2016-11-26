<!DOCTYPE html>
<!-- Author : Fadhlan Ridhwanallah-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>PEMIRA KEMA POLBAN 2016</title>
		<script type="text/javascript" src="./../grafik/jquery.min.js"></script>
		<script type="text/javascript" src="./../grafik/highcharts.js"></script>
		<!-- Bootstrap -->
		<link href="./../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./../assets/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<?php include_once("./../php/analyticstracking.php") ?>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<center>
						<img src="../img/logo.png" width="150px"></img>
						<img src="../img/kema.png" width="150px"></img>
					</center>
					<h1 style="text-align: center;">PEMIRA KEMA POLBAN 2016</h1>
					<p style="text-align: center;">Pemilihan Ketua dan Wakil Ketua BEM KEMA POLBAN</p>
				</div>
			</div>
		</div>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="./../">Home</a></li>
				<li><strong>Hasil Penilaian</strong></li>

			</ol>
		</div>
  <div class="container">
    <div class="col-md-5">
      <ul class="nav nav-justified">
        <li <?php if ($_GET['s']==1) {?>class="active"<?php } ?>><a href="?s=1">Penilaian Administrasi</a></li>
				<li <?php if ($_GET['s']==2) {?>class="active"<?php } ?>><a href="?s=2">Penilaian <br>Debat</a></li>
        <li <?php if ($_GET['s']==3) {?>class="active"<?php } ?>><a href="?s=3">Penilaian Uji Publik</a></li>
				<li <?php if ($_GET['s']==4) {?>class="active"<?php } ?>><a href="?s=4">Akumulasi Penilaian</a></li>
      </ul>
    </div>
  </div>
  <div class="tab-content">
		<div class="container tab-pane <?php if ($_GET['s']==1) {?>active<?php } ?>" id="adm">
  			<div class="panel-body" style="border-style:solid; border-width:10px; border-color:rgb(124, 181, 236); background-color:white">
  				<?php include("./../grafik/penilaianadm.php") ?>
  			</div>
  	</div>

  	<div class="container tab-pane <?php if ($_GET['s']==2) {?>active<?php } ?>" id="debat">
  			<div class="panel-body" style="border-style:solid; border-width:10px; border-color:rgb(124, 181, 236); background-color:white">
  				<?php include("./../grafik/penilaiandebat.php") ?>
  			</div>
  	</div>

		<div class="container tab-pane <?php if ($_GET['s']==3) {?>active<?php } ?>" id="publik">
  			<div class="panel-body" style="border-style:solid; border-width:10px; border-color:rgb(124, 181, 236); background-color:white">
  				<?php include("./../grafik/penilaianuji.php") ?>
  			</div>
  	</div>
		<div class="container tab-pane <?php if ($_GET['s']==4) {?>active<?php } ?>" id="akumulasi">
  			<div class="panel-body" style="border-style:solid; border-width:10px; border-color:rgb(124, 181, 236); background-color:white">
  				<?php include("./../grafik/penilaianakumulasi.php") ?>
  			</div>
  	</div>
  </div>
	</body>
  <script src="./../assets/js/jquery-2.1.4.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="./../assets/js/bootstrap.min.js"></script>
</html>
