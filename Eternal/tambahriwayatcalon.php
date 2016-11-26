<!-- Author : Fadhlan Ridhwanallah-->
<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$calon = $db->prepare("SELECT * FROM calon WHERE id_calon = :id ");
$calon->bindValue(':id',$_GET['id']);
$status = $calon->execute();
$calon = $calon->fetch();
?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Tambah Riwayat Calon</h3>
											<hr>
                  </div>
                  <div class="box-body">
                  <div class= "row">
                    <div class="container col-md-5">
                    <table class="table table-bordered">
                      <tr>
                        <th>No Urut</th>
                        <td><?php echo $calon['id_nomor']; ?></td>
                      </tr>
                      <tr>
                        <th>Nim</th>
                        <td><?php echo $calon['nim_calon']; ?></td>
                      </tr>
                      <tr>
                        <th>Nama</th>
                        <td><?php echo $calon['nama_calon']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row">
                <div class="container col-md-12">
            			<ul class="nav nav-tabs">
            			<li class="active"><a href="#rpendidikan" data-toggle="tab"><h4>Riwayat Pendidikan</h4></a></li>
            			<li><a href="#rorganisasi" data-toggle="tab"><h4>Riwayat Organisasi</h4></a></li>
            			<li><a href="#rprestasi" data-toggle="tab"><h4>Riwayat Prestasi</h4></a></li>
            			</ul>
                </div>
                </div>
              </div>
              <div class="tab-content">
                <div class="tab-pane active fade in" id="rpendidikan">
                  <div class="row">
                    <div id = 'riwayatpendidikan' class="col-sm-12">
                      <form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
                          <?php include('./riwayatpendidikan.php');?>
                          </div>
                          </div>
  												<input class="btn btn-primary" name="tambahpendidikan" type="submit"/>
                        </form>
                          <button id="tambahpendidikan" class="btn btn-info">Tambah</button>
                        </div>
                        <div class="tab-pane fade in" id="rorganisasi">
                          <div class="row">
                            <div id = 'riwayatorganisasi' class="col-sm-12">
                              <form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
                                  <?php include('./riwayatorganisasi.php');?>
                                  </div>
                                  </div>
          												<input class="btn btn-primary" name="tambahorganisasi" type="submit"/>
                                </form>
                                  <button id="tambahorganisasi" class="btn btn-info">Tambah</button>
                                </div>
                                <div class="tab-pane fade in" id="rprestasi">
                                  <div class="row">
                                    <div id = 'riwayatprestasi' class="col-sm-12">
                                      <form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
                                          <?php include('./riwayatprestasi.php');?>
                                          </div>
                                          </div>
                                          <input class="btn btn-primary" name="tambahprestasi" type="submit"/>
                                        </form>
                                          <button id="tambahprestasi" class="btn btn-info">Tambah</button>
                                        </div>
                      </div>
                    </div>
                  </div>

    		  </div>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
          <script src="./../assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
          <script>
          $('#tambahpendidikan').click(function(){
            var ROW = parseInt($('#rowpendidikan').attr('data-row'))+1;
          $('#riwayatpendidikan').load("./riwayatpendidikan.php", {
             'data': ROW
          });
          });
          $('#tambahorganisasi').click(function(){
            var ROW = parseInt($('#roworganisasi').attr('data-row'))+1;
          $('#riwayatorganisasi').load("./riwayatorganisasi.php", {
             'data': ROW
          });
          });
          $('#tambahprestasi').click(function(){
            var ROW = parseInt($('#rowprestasi').attr('data-row'))+1;
          $('#riwayatprestasi').load("./riwayatprestasi.php", {
             'data': ROW
          });
          });
          </script>
