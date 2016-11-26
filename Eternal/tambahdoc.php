<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$kategori = $db->query("SELECT * FROM dokumen_kategori")->fetchALL();

?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Tambah Dokumen</h3>
											<hr>
                  </div>
                  <div class="box-body">
										<form method="POST" action="tambahdocproses.php" class="form-horizontal" enctype="multipart/form-data">
												<fieldset>
												<!-- Text input-->

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="nocalon">Kategori Dokumen</label>
												  <div class="col-md-2">
												    <select id="kategori" name="kategori" class="form-control">
															<option value="0">Nama Kategori</option>
																	<?php foreach ($kategori as $key => $row): ?>
																		<option value="<?php echo $row['kategori_id']?>"><?php echo $row['nama_kategori']?></option>
																	<?php endforeach ?>
												    </select>
												  </div>
                          <button id="btntambah" type="button" class="btn" style="background-color:#0d950d;color:white;border-color:#0d950d"data-toggle="modal" data-target="#TambahKategori">+</button>
												</div>

                        <div class="form-group">
												  <label class="col-md-4 control-label" for="prodi">Judul Dokumen</label>
												  <div class="col-md-4">
														<input id="judul" name="judul" type="text" placeholder="Judul Dokumen" class="form-control input-md" required="" value=""/>
												  </div>
												</div>

												<div class="form-group">
													  <label class="col-md-4 control-label" for="paper">Upload Dokumen</label>
													  <div class="col-md-4">
													    <input id="doc" name="doc" type="file" class="form-control input-md"/>
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

          <div class="modal fade" id="TambahKategori" role="dialog">
          	<div class="modal-dialog" role="document">
          		<div class="modal-content">
                <div class="modal-header" style="background:#232f4e;color:white">
                  <h4><b>Isi data berikut untuk menambah kategori dokumen</b></h4>
      					</div>
                <form method="POST" action="tambah-proses.php" class="form-horizontal" enctype="multipart/form-data">
                    <fieldset>
      						<div class="modal-body">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="visi">Nama Kategori</label>
                      <div class="col-md-4">
                      <input name="Kategori" id="Kategori"cols="52" rows="4"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-5">
                        <input class="btn btn-primary" name="tambahkategori" type="submit"/>
                      </div>
                    </div>
                  </form>
      		    </div>
          		</div>
          	</div>
          </div>
