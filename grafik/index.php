<!-- Author : Waffi Fatur Rahman-->
<?php
session_start();
	include("./../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	$setting = $db->query("SELECT * FROM `setting`")->fetch();
?>
<!DOCTYPE html>
<html>
<head>
<title>Rekapitulasi Suara</title>
<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./highcharts.js"></script>
		<link href="./../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./../assets/css/style.css" rel="stylesheet">
				<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div class="jumbotron">
			<div class="container">
				<div class="row">
					<a class="btn-menu btn btn-lg" style="background-color:rgb(246,77,77)" href="../pemilihan/logout.php" >Log Out</a>
					<center>
						<img src="../img/logo.png" width="150px"></img>
						<img src="../img/kema.png" width="150px"></img>
					</center>
					<h1 style="text-align: center;">PEMIRA KEMA POLBAN 2016</h1>
					<p style="text-align: center;">Pemilihan Ketua dan Wakil Ketua BEM KEMA POLBAN</p>
					<?php

					if (isset($_SESSION['login_user'])) {
						$username = $_SESSION['login_user'];
						$result = $db->prepare("SELECT * FROM pemilih WHERE nim=:nim");
						$result->bindValue(':nim',$username);
						$result->execute();
						$result = $result->fetch(PDO::FETCH_ASSOC);
						if (!isset($result['id_nomor'])) {
							header("location: ../index.php");
						}
						?>

					<?php }else{
						header("location: ../index.php");
					}?>
				</div>
			</div>
		</div>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="./../">Home</a></li>
				<li><strong>Rekapitulasi Suara</strong></li>

			</ol>
		</div>
<div class="container">
<div class="col-md-offset-1 col-md-10" >
	<?php
		if($setting['freeze_quick_count']==1){
			?>
			<center class="btn-lg" style="background-color:#f5f5f5" >Freeze Mode</center>
	<?php
		}
		?>
<?php

	$categories = array('Calon KaBEM dan W.KaBEM');

	// data series
	$row = $db->query("SELECT COUNT(*) AS result FROM no_pasangan")->fetch();
	$result = $row['result'];
	if($result == 2){
		$data_series = array('No urut 1', 'No urut 2');
	}else if($result == 3){
		$data_series = array('No urut 1', 'No urut 2', 'No urut 3');
	}else if($result == 4){
		$data_series = array('No urut 1', 'No urut 2', 'No urut 3', 'No urut 4');
	}else if($result == 5){
		$data_series = array('No urut 1', 'No urut 2', 'No urut 3', 'No urut 4', 'No urut 5');
	}

	// set sereis
	$series = array();

	// set series
	foreach ($data_series as $key=>$val) {
		array_push($series, array(
			'name'=>$val,
			'data'=>array()
		));
	}
	$i=1;

	// set data value per series
	foreach ($data_series as $key=>$val) {
		if($setting['freeze_quick_count']==0){
			$row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor =' .$i)->fetch();
			$result = $row['result'];
		}else{
			$row = $db->query('SELECT `freeze_result` FROM `no_pasangan` WHERE `id_nomor`=' .$i)->fetch();
			$result = $row['freeze_result'];
		}

		array_push($series[$key]['data'], (int) $result );
		$i=$i+1;
	}
?>
<div id="contoh" style="width: 100%; height: 500px"></div>
</div>
</div>

<script type="text/javascript">
$('#contoh').highcharts({
	chart: {
		type: 'column'
	},
	title: {
		text: 'Rekapitulasi Suara PEMIRA KEMA POLBAN 2016'
	},
	xAxis: {
		categories: <?php echo json_encode($categories); ?>,
		labels: {
			rotation: 0,
			align: 'center'
		}
	},
	series: <?php echo json_encode($series); ?>
});
</script>
<?php
	if($setting['freeze_quick_count']==0){
		$row = $db->query('SELECT COUNT(*) AS result FROM pemilih')->fetch();
		$total = $row['result'];

		$row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NOT NULL')->fetch();
		$sudah = $row['result'];
	}else {
		# code...
		$row = $db->query('SELECT * FROM setting')->fetch();
		$total = $row['belum']+$row['sudah'];
		$sudah = $row['sudah'];
	}

?>
<center>
<p>
<h5>Total Mahasiswa : <?php echo $total; ?> - Sudah memilih : <?php echo $sudah; ?> - Belum memilih : <?php echo $total - $sudah;?><h5></p></center>

<?php include("../php/footer-text.php"); ?>
		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>

</body>
</html>
