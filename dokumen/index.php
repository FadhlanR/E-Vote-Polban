<!-- Author : Waffi-->
<?php
session_start();
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$doc = $db->query('SELECT COUNT(*)as count FROM dokumen')->fetch();
$kategori = $db->query("SELECT * FROM dokumen_kategori")->fetchALL();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Dokumen</title>

		<!-- Bootstrap -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/style.css" rel="stylesheet">

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
					<a class="btn-menu btn btn-lg" style="background-color:rgb(246,77,77)" href="../pemilihan/logout.php" >Log Out</a>
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
    <div class="container">
			<ol class="breadcrumb">
				<li><a href="./../">Home</a></li>
				<li><strong>Dokumen</strong></li>
			</ol>
		</div>

		<div class="container">
			<div class="col-md-4 col-md-offset-4">
				<form method="GET" onchange="getSomething('getpdf.php','#kategoricmb','pdflist')">
				<center><h3>Pilih Kategori</h3></center>
				<select id="kategoricmb" name="kategoricmb" class="form-control">
					<?php foreach ($kategori as $key => $row): ?>
						<option value="<?php echo $row['kategori_id']?>"><?php echo $row['nama_kategori']?></option>
					<?php endforeach ?>
				</select>
			</form>
			</div>
			</div>

			<hr style="border:none">

<div class="container" id="pdflist">
<?php include("getpdf.php"); ?>
</div>

<?php include("./../php/footer-text.php"); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="./../assets/js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./../assets/js/bootstrap.min.js"></script>

<script type='text/javascript'>
function getSomething(url,from,to){
	var value=$(from).val();
	if (value == "") {
		document.getElementById(from).innerHTML = "";
		return;
	} else {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById(to).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET",url+"?id="+value,true);
	xmlhttp.send();
	}
}

</script>
	</body>
</html>
