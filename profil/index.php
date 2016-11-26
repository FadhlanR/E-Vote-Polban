<!DOCTYPE html>
<!-- Author : Fadhlan Ridhwanallah-->
<?php
include("./../php/credentials.php");

$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$no = $db->query("SELECT * FROM no_pasangan")->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Profil Cakabem</title>

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
		<?php include("./../php/header-text.php") ?>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="./../">Home</a></li>
				<li><strong>Profil</strong></li>
			</ol>
		</div>
		<div class="container">
		<?php foreach($no as $key => $row): ?>
			<?php
				$nomor = $row['id_nomor'];
				$calon = $db->query("SELECT c.* FROM calon c WHERE c.id_nomor = $nomor")->fetchALL();
			?>
			<center>
			<div class="calon">
				<table style="background:rgb(238,238,238)">
					<th colspan="2"><h1 class="calontext"  style="text-align:center; font-size:25px"><?php echo $row['id_nomor'];?></h1></th>
					<tr>
					  <td class="calontext">Cakabem</td>
						<td class="calontext">Cawakabem</td>
					</tr>
					<tr>
						<?php foreach($calon as $key => $col): ?>
						<td><img src="../img/<?php echo $col['foto'];?>" class="calon"></img></td>
						<?php endforeach ?>
					</tr>
					<tr>
						<?php foreach($calon as $key => $col): ?>
						<td class="calontext"><?php echo $col['nama_calon'];?></td>
						<?php endforeach ?>
					</tr>
					<tr>
					 <td colspan="2" style="padding:12px"><a class="btn-menu btn btn-primary btn-lg" href="./detilprofil.php?no=<?php echo $row['id_nomor']?>&q=1">Detil Profil</a></td>
					</tr>
				</table>
			</div>
			</center>
		<?php endforeach ?>
		</div>
		<?php include("../php/footer-text.php"); ?>
		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
	</body>
</html>
