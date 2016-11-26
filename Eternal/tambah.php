<!-- Author : Fadhlan Ridhwanallah-->
<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$jurusan = $db->query("SELECT * FROM jurusan")->fetchALL();
$nopasangan = $db->query("SELECT * FROM no_pasangan")->fetchALL();
$jmlnopasangan = $db->query("SELECT COUNT(id_nomor) as total FROM no_pasangan")->fetch();
$keterangancalon = $db->query("SELECT * FROM keterangan_calon")->fetchALL();

if(isset($_GET['id'])){
  $calon = $db->prepare("SELECT * FROM calon c,jurusan j, prodi p, kelas k WHERE c.id_calon = :id and c.id_kelas = k.id_kelas and k.id_prodi = p.id_prodi and p.id_jurusan=j.id_jurusan");
  $calon->bindValue(':id',$_GET['id']);
  $calon->execute();
  $calon = $calon->fetch();
}
?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                    <?php if(!isset($_GET['id'])):?>
                      <h3 class="box-title">Tambah Identitas Calon</h3>
                    <?php else:?>
                      <h3 class="box-title">Ubah Identitas Calon</h3>
                    <?php endif; ?>
                  </div>
                  <div class="box-body">
										<form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
												<fieldset>
												<!-- Text input-->
                        <div class="form-group">
												  <label class="col-md-4 control-label" for="nocalon">Nomor Calon</label>
												  <div class="col-md-1">
												    <select id="listnocalon" name="listnocalon" class="form-control">
															<option value="0">No</option>
																	<?php foreach ($nopasangan as $key => $row): ?>
																		<option value="<?php echo $row['id_nomor']?>" <?php if(isset($calon)){if($row['id_nomor']==$calon['id_nomor']){echo 'selected="selected"';}}?>><?php echo $row['id_nomor']?></option>
																	<?php endforeach ?>
												    </select>
												  </div>
                          <button id="btntambah" type="button" class="btn ol-md-1" style="background-color:#0d950d;color:white;border-color:#0d950d"data-toggle="modal" data-target="#TambahCalon">+</button>
												</div>

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="keterangancalon">Keterangan Calon</label>
												  <div class="col-md-2">
												    <select id="keterangan_no_calon" name="keterangan_no_calon" class="form-control">
															<option value="0">Pilih</option>
																	<?php foreach ($keterangancalon as $key => $row): ?>
																		<option value="<?php echo $row['id_keterangan']?>" <?php if(isset($calon)){if($row['id_keterangan']==$calon['id_keterangan']){echo 'selected="selected"';}}?>><?php echo $row['nama_keterangan']?></option>
																	<?php endforeach ?>
												    </select>
												  </div>
												</div>

												<div class="form-group">
												  <label class="col-md-4 control-label" for="prodi">Jurusan</label>
												  <div class="col-md-4">
														<select id="jurusancmb" name="jurusancmb" class="form-control" onclick="getSomething('getprodi.php','#jurusancmb','prodicmb'), getSomething('getkelas.php','#prodicmb','kelacmbs')">
															<option value="0">Pilih Program Studi...</option>
																	<?php foreach ($jurusan as $key => $row): ?>
																		<option value="<?php echo $row['id_jurusan']?>" <?php if(isset($calon)){if($row['id_jurusan']==$calon['id_jurusan']){echo 'selected="selected"';}}?>><?php echo $row['nama_jurusan']?></option>
																	<?php endforeach ?>
														</select>
												  </div>
												</div>

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="prodi">Prodi</label>
												  <div class="col-md-4">
														<select id="prodicmb" name="prodicmb" class="form-control" onclick="getSomething('getkelas.php','#prodicmb','kelascmb')">
															<?php include('getprodi.php'); ?>
														</select>
												  </div>
												</div>

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="prodi">Kelas</label>
												  <div class="col-md-4">
														<select id="kelascmb" name="kelascmb" class="form-control" onclick="getSomething('getnim.php','#kelascmb','nimcmb')">
															<?php include('getkelas.php'); ?>
														</select>
												  </div>
												</div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" for="prodi">NIM</label>
                          <div class="col-md-2">
                            <select id="nimcmb" name="nimcmb" class="form-control">
                              <?php include('getnim.php'); ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="prodi">Nama</label>
												  <div class="col-md-4">
														<input id="nama" name="nama" type="text" placeholder="Nama" class="form-control input-md" required="" value="<?php if(isset($calon)){echo $calon['nama_calon'];}?>" readonly=""/>
												  </div>
												</div>

												<!-- Text input-->
												<div class="form-group">
												  <label class="col-md-4 control-label" for="tempatlahir">Tempat Lahir</label>
												  <div class="col-md-4">
												  <input id="tempatlahir" name="tempatlahir" type="text" placeholder="Tempat Lahir" class="form-control input-md" value="<?php if(isset($calon)){echo $calon['tempat_lahir'];}?>" required=""/>
												  </div>
												</div>

												<div class="form-group">
												  <label class="col-md-4 control-label" for="tanggalLahir">Tanggal Lahir</label>
												  <div class="col-md-4">
												  <input id="datepicker" name="tanggallahir" type="datetime" placeholder="Tanggal Lahir" class="form-control input-md" type="datetime" value="<?php if(isset($calon)){echo $calon['tanggal_lahir'];}?>" required=""/>
												  </div>
												</div>


												<div class="form-group">
													<label class="col-md-4 control-label" for="gender">Jenis Kelamin</label>
												  <div class="col-md-1">
												    <select id="jeniskelamin" name="jeniskelamin" class="form-control">
												      <option value="L">L</option>
															<option value="P">P</option>
												    </select>
												  </div>
												  </div>

													<div class="form-group">
													  <label class="col-md-4 control-label" for="agama">Agama</label>
													  <div class="col-md-4">
													  <input id="agama" name="agama" type="text" placeholder="Agama" class="form-control input-md" value="<?php if(isset($calon)){echo $calon['agama'];}?>" required=""/>
													  </div>
													</div>

													<div class="form-group">
													  <label class="col-md-4 control-label" for="alamatsekarang">Alamat Sekarang</label>
													  <div class="col-md-4">
														<textarea name="alamatsekarang" placeholder="  Alamat Sekarang" id="alamatsekarang" value="<?php if(isset($calon)){echo $calon['alamat_sekarang'];}?>" maxlength="1400" cols="52" rows="4"></textarea>
													  </div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label" for="alamatrumah">Alamat Rumah</label>
														<div class="col-md-4">
														<textarea id="alamatrumah" name="alamatrumah" placeholder="  Alamat Rumah" value="<?php if(isset($calon)){echo $calon['alamat_rumah'];}?>" maxlength="1400" cols="52" rows="4"></textarea>
														</div>
													</div>

													<div class="form-group">
													  <label class="col-md-4 control-label" for="">No. HP</label>
													  <div class="col-md-4">
													  <input id="nohp" name="nohp" type="text" placeholder="No HP" class="form-control input-md" value="<?php if(isset($calon)){echo $calon['no_hp'];}?>" maxlength="13" required=""/>
													  </div>
													</div>
													<div class="form-group">
													  <label class="col-md-4 control-label" for="">Email</label>
													  <div class="col-md-4">
													  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" value="<?php if(isset($calon)){echo $calon['email'];}?>" required=""/>
													  </div>
													</div>

													<div class="form-group">
													  <label class="col-md-4 control-label" for="foto">Foto</label>
													  <div class="col-md-4">
													      <input type="file" id="fotocalon" name="fotocalon" class="form-control input-md" value="<?php if(isset($calon)){echo $calon['foto'];}?>" required=""/>
													  </div>
													</div>

													<div class="form-group">
  													<div class="col-md-4">
  														<input class="btn btn-primary" name="tambah" type="submit"/>
  													</div>
                          </div>


												</fieldset>
										</form>
                  </div>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
          <div class="modal fade" id="TambahCalon" role="dialog">
          	<div class="modal-dialog" role="document">
          		<div class="modal-content">
                <div class="modal-header" style="background:#232f4e;color:white">
                  <h4><b>Isi data berikut untuk menambah nomor pasangan</b></h4>
      					</div>
                <form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
      						<div class="modal-body">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="nomor">Nomor</label>
                      <div class="col-md-2">
                        <input id="nomor" name="nomor" type="text" class="form-control input-md" value="<?php echo $jmlnopasangan['total']+1 ?>" required="" readonly="" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="visi">Visi</label>
                      <div class="col-md-4">
                      <textarea name="visi" id="visi" maxlength="1400" cols="52" rows="4"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" for="misi">Misi</label>
                      <div class="col-md-4">
                      <textarea id="misi" name="misi"  maxlength="1400" cols="52" rows="4"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label" for="paper">Paper</label>
                      <div class="col-md-4">
                          <input type="file" id="paper" name="paper" class="form-control input-md" required=""/>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-5">
                        <input class="btn btn-primary" name="tambahno" type="submit"/>
                      </div>
                    </div>
                  </form>
      		    </div>
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
$("#nimcmb").click(function(){
    var nim = $("#nimcmb").val();
    $.ajax({url:"getnama.php?nim="+nim,success:function(result){
        $('#nama').val(result);
    }});
});
</script>

<script>
$( "#datepicker" ).datepicker({
	inline: true
});
</script>
