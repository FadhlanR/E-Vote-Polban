
<!-- Author : Waffi Fatur Rahman-->



<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Login</title>

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
	<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Judul modal</h4>
					</div>

					<div class="modal-body">
						Isi dari modal yang akan ditampilkan, letakkan di sini...
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="button" class="btn btn-primary">Aksi</button>
					</div>
				</div>
			</div>
		</div>

					<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#myModal').modal('show');
		</script>
	</body>

</html>
