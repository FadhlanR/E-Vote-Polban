<!-- Author : Fadhlan Ridhwanallah-->
<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$calon = $db->prepare("SELECT * FROM calon c, kelas k, prodi p, jurusan j WHERE c.id_calon = :id and c.id_kelas = k.id_kelas and k.id_prodi = p.id_prodi and p.id_jurusan = j.id_jurusan ");
$calon->bindValue(':id',$_GET['id']);
$status = $calon->execute();
$calon = $calon->fetch();
$id_no = $calon['id_nomor'];
?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Tambah Riwayat Calon</h3>
											<hr>
                  </div>
                  <div class="box-body">
                    <div class="row">
              				<div class="col-sm-12">
              					<div class="panel panel-default">
              						<div class="panel-heading">
              								<h3 class="panel-title"></h3>
              						</div>
              						<div class="row">
              						<div class="col-sm-4">
              							<div class="panel-body">
              								<div class="thumbnail">
              									<img src="./../img/<?php echo $calon['foto'];?>"></img><br>

              								<?php
                              if($calon['id_keterangan'] == 1){
                              include("./../grafik/radar.php");
                            }
                              else{
                                include("./../grafik/radar2.php");
                              }?>

              								</div>
              							</div>

              						</div>
              						<div class="col-sm-7">
              								<h3>Identitas</h3>
              								<table class="table table-bordered" style="margin-top:15px">
              									<tr>
              										<th>NIM</th>
              										<td><?php echo $calon['nim_calon'];?></td>
              									</tr>
              									<tr>
              										<th>Nama</th>
              										<td><?php echo $calon['nama_calon'];?></td>
              									</tr>
              									<tr>
              										<th>Jurusan</th>
              										<td><?php echo $calon['nama_jurusan'];?></td>
              									</tr>
              									<tr>
              										<th>Prodi</th>
              										<td><?php echo $calon['nama_prodi'];?></td>
              									</tr>
              									<tr>
              										<th>TTL</th>
              										<td><?php echo ($calon['tempat_lahir'].', '.$calon['tanggal_lahir']);?></td>
              									</tr>
              								</table>
                              <h3>Isi Penilaian Uji Publik</h3>
                              <form method="POST" action="tambah-proses.php?id=<?php echo $_GET['id']?>" class="form-horizontal" enctype="multipart/form-data">
          												<fieldset>

          												<!-- Text input-->
          												<div class="form-group">
          												  <label class="col-md-4 control-label" for="visimisi">Visi Misi</label>
          												  <div class="col-md-2">
          												  <input id="visimisi" name="visimisi" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>
                                  <div class="form-group">
          												  <label class="col-md-4 control-label" for="wawasaninternal">Wawasan Internal</label>
          												  <div class="col-md-2">
          												  <input id="wawasaninternal" name="wawasaninternal" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>
                                  <div class="form-group">
          												  <label class="col-md-4 control-label" for="wawasaneksternal">Wawasan Eksternal</label>
          												  <div class="col-md-2">
          												  <input id="wawasaneksternal" name="wawasaneksternal" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>
                                  <div class="form-group">
          												  <label class="col-md-4 control-label" for="kepemimpinan">Kepemimpinan</label>
          												  <div class="col-md-2">
          												  <input id="kepemimpinan" name="kepemimpinan" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>
                                  <div class="form-group">
          												  <label class="col-md-4 control-label" for="pengambilankeputusan">Pengambilan Keputusan</label>
          												  <div class="col-md-2">
          												  <input id="pengambilankeputusan" name="pengambilankeputusan" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>
                                  <div class="form-group">
          												  <label class="col-md-4 control-label" for="sikap">Sikap</label>
          												  <div class="col-md-2">
          												  <input id="sikap" name="sikap" type="text"class="form-control input-md" required=""/>
          												  </div>
          												</div>


          													<div class="form-group">
            													<div class="col-md-4">
            														<input class="btn btn-primary" name="tambahujipublik" type="submit"/>
            													</div>
                                    </div>


          												</fieldset>
          										</form>
              						</div>
              						</div>
              					</div>
              				</div>
              			</div>
                </div>
              </div>
            </div>
                  <!-- /.box-body -->
        </div>
              <!-- /.box -->
          </div>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
