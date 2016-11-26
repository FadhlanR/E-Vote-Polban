<!-- Author : Fadhlan Ridhwanallah-->

<?php
session_start();
	include("./php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	$error=''; // Variabel untuk menyimpan pesan error
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
		}
		else
		{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// SQL query untuk memeriksa apakah pemilih terdapat di database?
		//$result = $db->query("SELECT * FROM pemilih WHERE password='$password' AND nim='$username'")->fetch();
		$result = $db->prepare('SELECT * FROM pemilih WHERE password = :password AND nim = :username		');
		$result->bindValue(':password',MD5($password));
		$result->bindValue(':username', $username);
		$result->execute();

		$result = $result->fetch(PDO::FETCH_ASSOC);

		if ($result['nim']!=NULL) {
		$_SESSION['login_user']=$username; // Membuat Sesi/session
		header("location: pemilihan/data_pemilih.php");
		} else {
		echo "<script type=\"text/javascript\">window.alert('Wrong username or password');</script>";
		}
		}
	}
//-------------------------------------------------------------------------------------------------------------------------------------

		$setting = $db->query("SELECT * FROM `setting`")->fetch();
		$chooseTime = strtotime($setting['tanggal_pemilihan']);
		$currentTime = strtotime(gmdate("Y-m-d H:i:s", time()+60*60*7));


		$selisih =  $chooseTime - $currentTime;
		// echo "$chooseTime $currentTime $selisih";

$allowed = false;
if (isset($chooseTime) && isset($currentTime)) {
	if ($selisih <= 0) {
		$allowed = true;
	}
}?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>PEMIRA KEMA POLBAN 2016</title>

		<!-- Bootstrap -->
		<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<?php include_once("php/analyticstracking.php") ?>
		<div class="jumbotron">
			<div class="container">
				<div class="row">

					<center>
						<img src="./img/logo.png" width="150px"></img>
						<img src="./img/kema.png" width="150px"></img>
					</center>
					<h1 style="text-align: center;">PEMIRA KEMA POLBAN 2016</h1>
					<p style="text-align: center;">Pemilihan Ketua dan Wakil Ketua BEM KEMA POLBAN</p>
					<center>
					<?php if($allowed){?>
						<button class="btn-menu btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Log in</button>
					<?php }else{?>
						<button class="btn-menu btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Panduan Login</button>
				  <?php }?>
				</center>
				</div>
			</div>
		</div>

		<?php if (!$allowed) { ?>
		<div id="clockdiv">
			<h1>Hitung Mundur Menuju Pemilihan</h1>
			<div>
				<span class="days"></span>
				<div class="smalltext">Days</div>
			</div>
			<div>
				<span class="hours"></span>
				<div class="smalltext">Hours</div>
			</div>
			<div>
				<span class="minutes"></span>
				<div class="smalltext">Minutes</div>
			</div>
			<div>
				<span class="seconds"></span>
				<div class="smalltext">Seconds</div>
			</div>
		</div>
		<?php }else if(!isset($_SESSION['login_user'])){
		 		include("grafik/quick_count.php");
				 ?>
				<br>
		<?php }else{
			header("location: pemilihan/data_pemilih.php");
			 }?>


		<div class="menu">
			<p>Informasi Lebih Lanjut:</p>
			<a class="btn-menu btn btn-primary btn-lg" href="./profil/">Profil Calon</a>
			<a class="btn-menu btn btn-lg" style="background-color:#0d950d" href="./penilaian/index.php?s=1">Hasil Penilaian</a>
			<a class="btn-menu btn btn-lg" style="background-color:rgb(245, 166, 35); color:white;" href="./dokumen/">Dokumen Pemira</a>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content" margin="10px">
					<div class="modal-header">
						<center><h3 class="modal-title">Selamat Datang </h3></center>
					</div>
					<div class="modal-body">

						  <form method="POST" action="" >
							<input name="username" class="form-control" placeholder="Username" required autofocus>
							<input type="password" name="password" class="form-control" placeholder="Password" required>
							<button class="btn btn-lg btn-primary btn-block btn-login" name="submit" type="submit">Log in</button>
							<br>
							<div class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" href="#collapse1">Panduan Login</a>
										</h4>
									</div>
									<div id="collapse1" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												<li>username adalah NIM setiap mahasiswa POLBAN</li>
												<li>password dapat didapatkan dari KPP yang masuk ke dalam kelas</li>
												<li>Jika mengalami permasalahan login dapat melapor kepada KPP yang masuk kedalam kelas, jika tidak ada KPP harap menyampaikan ke Official Account <a target="_blank" href="http://line.me/ti/p/%40itn0592y">PEMIRA 2016</a>.<br>dengan format chat :NAMA_NIM,Permasalahan</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						  </form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal 2-->
		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content" margin="10px">
					<div class="modal-header">
						<center><h3 class="modal-title">Panduan Login</h3></center>
					</div>
					<div class="modal-body">
						<ul>
							<li>username adalah NIM setiap mahasiswa POLBAN</li>
							<li>password dapat didapatkan dari KPP yang masuk ke dalam kelas</li>
							<li>Jika mengalami permasalahan login dapat melapor kepada KPP yang masuk kedalam kelas, jika tidak ada KPP harap menyampaikan ke Official Account <a target="_blank" href="http://line.me/ti/p/%40itn0592y">PEMIRA 2016</a>.<br>dengan format chat :NAMA_NIM,Permasalahan</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<hr>
				<div class="col-md-3">
				</div>
				<div class="col-md-4">
					<h4>Supported By : </h4>
					<img src="img/MPM.png" width="54px"/>
					<!-- <img src="img/eltras.jpg" width="90px"/> -->
				</div>
					<div class="col-md-5">
					<h4>Sponsored By : </h4>
					<img src="img/himakom.jpg" width="47px"/>
					<img src="http://complete-cloud.co.uk/wp-content/uploads/2015/12/microsoft-azure.png" width="220px"/>
				</div>



			</div>
		</div>
		<?php include("php/footer-text.php"); ?>
		<!--countdown javascript-->
		<script src="./timer/time.js"></script>
		<script type="text/javascript">
			var tempTime = <?php echo $chooseTime*1000;?>;
			var chooseTime = new Date(tempTime);

			initializeClock("clockdiv", chooseTime);
		</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./assets/js/bootstrap.min.js"></script>
		<?php if($allowed&&!isset($_SESSION['login_user'])){ ?>
			<script> $('#myModal').modal('show');</script>
		<?php }?>
	</body>
</html>
