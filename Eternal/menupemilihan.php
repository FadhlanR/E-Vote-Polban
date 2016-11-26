<!-- Author : Fadhlan Ridhwanallah-->
<div class="box-header">
    <h3 class="box-title">Pemilihan</h3>
    <hr>
</div>
<div class="panel">
	<h4 class="panel-header">List kelas yang diizinkan memilih</h4>
	<div id=listKelas class="panel-body"><?php include("./listkelas.php") ?></div>
</div>
						<ul class="nav nav-pills">
							<li class="active"><a href="#aturpemilihan" data-toggle="tab">Atur Pemilihan</a></li>
							<li><a href="#cekpemilih" data-toggle="tab">Cek Pemilih</a>	</li>
						</ul>
<div class="row mt">
			<div class="tab-content">
						<div class="active tab-pane fade in" id="aturpemilihan">
							<div class="box-body">
										<?php include("./izinmemilih.php") ?>
							</div><!-- /.box-body -->
						</div>

						<div class="tab-pane fade in" id="cekpemilih">
							<div class="box-body">
								<?php include("./cekpemilih.php") ?>
							</div><!-- /.box-body -->
						</div>
			</div>
</div>
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
		<script>
    $("#diizinkan").click(function(){
  			var ID = $("#kelas").val();
        var STATUS = 1;
  			$.ajax({url:"ubahstatuskelas.php?kelas="+ID+"&status="+STATUS,cache:true,success:function(result){
            $('#listKelas').load('listkelas.php');
  			}});
  	});
		</script>
