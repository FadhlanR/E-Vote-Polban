<?php
session_start();
	include("./../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Data Pemilih</title>

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
          <?php if(isset($_SESSION['login_user'])):?>
					<a class="btn-menu btn btn-lg" style="background-color:rgb(246,77,77)" href="./logout.php" >Log Out</a>
					<?php endif;?>
					<center>
						<img src="../img/logo.png" width="150px"></img>
						<img src="../img/kema.png" width="150px"></img>
					</center>
					<h1 style="text-align: center;">PEMIRA KEMA POLBAN 2016</h1>
					<p style="text-align: center;">Pemilihan Ketua dan Wakil Ketua BEM KEMA POLBAN</p>
				</div>
			</div>
		</div>

		<?php
			$username = $_SESSION['login_user'];
			// $result = $db->query("SELECT * FROM pemilih WHERE nim='$username'")->fetch();
			$result = $db->prepare("SELECT * FROM pemilih a, jurusan b, prodi c, kelas d WHERE a.nim=:nim AND SUBSTRING(a.nim,3,2) = b.id_jurusan AND SUBSTRING(a.nim,3,4) = c.id_prodi AND d.id_kelas=a.id_kelas");
			$result->bindValue(':nim',$username);
			$result->execute();
			$result = $result->fetch(PDO::FETCH_ASSOC);
			 if(isset($_SESSION['login_user'])){
		?>
			<center>
                <h1>Selamat datang di PEMIRA KEMA POLBAN 2016</h1>
			</center>

		<div class="container">
            <br>
			<div class="col-md-offset-4 col-md-4" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<center>
                            	<i class="fa fa-bell fa-fw"></i> Data Pemilih
                            </center>
                        </div>
                        <!-- /.panel-heading -->
                        <table class="table table-bordered">
                            <tr>
								<th>
									Nama
								</th>
								<td>
									<?php echo $result['nama_pemilih'];?>
								</td>
							</tr>
                            <tr>
								<th>
									NIM
								</th>
								<td>
									<?php echo $result['nim'];?>
                                </td>
							</tr>
                            <tr>
								<th>
									Jurusan
                                </th>
								<td>
									<?php echo $result['nama_jurusan'];?>
								</td>
							</tr>
                            <tr>
								<th>
									Prodi
                                </th>
								<td>
									<?php echo $result['nama_prodi'];?>
								</td>
							</tr>
							<tr>
	<th>
		Kelas
									</th>
	<td>
		<?php echo $result['nama_kelas'];?>
	</td>
                            <tr>
								<th>
									Status
								</th>
								<td>
									<?php if(isset($result['id_nomor'])) {echo "Sudah memilih";} else{echo "Belum memilih";}?>
								</td>
							</tr>

                        </table>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>

			<center>
			<?php if (empty($result['id_nomor'])){ ?>
				<?php if ($result['status_pemilihan']==0){ ?>
		<strong><h4 style="color:red; style:bold">Anda belum diperbolehkan memilih</h4></strong>
				<?php }else{?>
		<a class="btn-menu btn btn-lg" style="background-color:#0d950d; color:white" href="./pemilihan.php" >Mulai Memilih</a>
				<?php }?>
			<?php }else{?>
		<a class="btn-menu btn btn-lg" style="background-color:#0d950d; color:white" href="./../grafik/index.php" >Rekapitulasi Suara</a>
			<?php }?>
			</center>
		<?php }else{
			header("location: ../index.php");
		}
		?>

		<div class="menu">
			<p style="margin-top:10px;">Informasi Lebih Lanjut:</p>
			<a class="btn-menu btn btn-primary btn-lg" href="./../profil/">Profil Calon</a>
			<a class="btn-menu btn btn-lg" style="background-color:rgb(245, 166, 35); color:white;" href="./../dokumen/">Dokumen Pemira</a>
		</div>


	<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
							<?php if (empty($result['id_nomor'])){ ?>
						<h4 class="modal-title">Selamat datang <?php echo $result['nama_pemilih'];?></h4>
						</div>

						<div class="modal-body">
								<h5><b>Berikut tatacara pemilihan:</h5></b><br>
								<ul>
									<li>Tombol menu untuk memilih tidak akan muncul sampai pihak dari KPP masuk ke
											kelas anda dan mengizinkan anda untuk memilih.</li>
									<li>Sambil menunggu pihak KPP masuk ke kelas anda, silahkan untuk mengenali calon
											lebih dekat dengan memilih menu profil cakabem yang terdapat di bagian bawah halaman.</li>
									<li>Ketika pihak KPP sudah masuk ke kelas anda dan mengizinkan kelas anda untuk memilih, silahkan lakukan pemilihan
											dengan memilih menu mulai memilih</li>
									<li>Jika anda sudah melakukan pemilihan silahkan menuju halaman quick count untuk melihat hasil perhitungan cepat</li>
									<li>Suara anda sangat berpengaruh besar untuk Polban kedepannya.</li>


						</div>
							<?php }else{?>
						<h4 class="modal-title">Terimakasih telah berpartisipasi di PEMIRA KEMA POLBAN 2016 </h4>
						</div>
							<?php }?>


					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>

		<?php include("../php/footer-text.php"); ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
		<script> $('#myModal').modal('show');</script>
	</body>
</html>
