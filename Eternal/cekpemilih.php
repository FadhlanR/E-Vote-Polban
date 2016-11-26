<!-- Author : Fadhlan Ridhwanallah-->
<?php
	$jurusan = $db->query("SELECT * FROM jurusan")->fetchALL();

?>
			<div class="panel-body" >
				<table style="margin-top:15px;margin-left:7%">
					<tr>
						<th style="padding-right:30px"><h4><b>Jurusan</<b></h4></th>
						<td>
							<form method="GET" onclick="getSomething('getprodi.php','#jurusan1','prodi1'), getSomething('getkelas.php','#prodi1','kelas1'), getSomething('getsiswa.php','#kelas1','pemilih')">
								<select class="btn-success" name="jurusan" id="jurusan1" style="width:100%; padding:10px;border-style:solid">
									<option value="0">Pilih Jurusan...</option>
											<?php foreach ($jurusan as $key => $row): ?>
												<option value="<?php echo $row['id_jurusan']?>"><?php echo $row['nama_jurusan']?></option>
											<?php endforeach ?>
								</select>
							</form>
						</td>
					</tr>
					<tr>
						<th style="padding-right:30px"><h4><b>Prodi</b></h4></th>
						<td>
							<form method="GET" onclick="getSomething('getkelas.php','#prodi1','kelas1')">
								<select class="btn-success" name="prodi" id='prodi1' style="width:100%; padding:10px;border-style:solid">
									<?php include("./getprodi.php"); ?>
								</select>
							</form>
						</td>
					</tr>
					<tr>
						<th style="padding-right:30px"><h4><b>Kelas</b></h4></th>
						<td>
							<form method="GET" onclick="getSomething('getsiswa.php','#kelas1','pemilih')">
								<select class="btn-success" name="kelas" id='kelas1' style="width:100%; padding:10px;border-style:solid">
									<?php include("./getkelas.php"); ?>
								</select>
							</form>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<div class="panel">
				<h3 style="margin-left:7%"><b>Daftar Pemilih<b/></h3>
				<br>
				<table class="table table-border" style="margin-left:7%; width:30%; color:black; border-style:none">
					<tr>
						<th style="margin-left:7%">Sudah Memilih<th>
						<td style="background-color:#337ab7; width:80px; height:5px"></td>
					</tr>
					<tr>
						<th style="margin-left:7%">Belum Memilih<th>
						<td style="background-color:#d9534f; width:80px; height:5px;"></td>
					</tr>
				</table>
				<br><br>
				<table class="table table-border" id="pemilih" style="margin-left:7%; width:87%; color:black;"><?php include("./getsiswa.php") ?></table>
			</div>
			</div>
