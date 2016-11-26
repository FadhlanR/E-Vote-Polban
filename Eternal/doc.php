
<div class="row">
    <div class="col-xs-12">
      <div class="box">
          <div class="box-header">
              <h3 class="box-title">Dokumen</h3>
              <hr>
              <a href="index.php?page=tambahdocument"><input type="button" class="btn btn-primary" value="Tambah Dokumen"></a>
              <br><br>
          </div>
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Dokumen</th>
                          <th>Kategori</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <body>
<?php

include("./../php/credentials.php");

$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$ducument = $db->query("SELECT * FROM dokumen")->fetchALL();
$i=1;
foreach ($ducument as $key => $row):
?>
                              <tr>
                                  <td><?php echo $i; $i=$i+1;?></td>
                                  <td><?php echo $row['judul']?></td>
                                  <td><?php
                                    $kategori = $db->query("SELECT nama_kategori FROM dokumen_kategori WHERE kategori_id =" .$row['kategori_id'])->fetch();
                                     echo $kategori['nama_kategori']
                                    ?>
                                  </td>

                                  <td style='text-align:center'>
                                    <span data-placement='top' data-toggle='tooltip' title='Edit'>
                                    <button class='edit btn btn-primary btn-xs ' data-title='Edit' data-toggle='modal' data-id=<?php echo $row['doc_id']?> data-judul='<?php echo $row['judul']?>'>
                                    <span class='glyphicon glyphicon-pencil'></span></button><span>

                                    <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                    <button class='delete btn btn-danger btn-xs ' data-title='Delete' data-toggle='modal' data-id=<?php echo $row['doc_id']?>>
                                    <span class='glyphicon glyphicon-trash'></span></button><span>
                                  </td>

                              </tr>
<?php endforeach ?>

                  </body>
              </table>
          </div>
        </div>

          <!-- /.box -->

          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Kategori</h3>
                  <hr>
                  <button id="btntambah" type="button" class="btn btn-primary" data-toggle="modal" data-target="#TambahKategori">Tambah Kategori</button>
                  <br><br>
              </div>
              <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                    <body>
    <?php

    $kategori = $db->query("SELECT * FROM dokumen_kategori")->fetchALL();
    $i=1;
    foreach ($kategori as $key => $row):
    ?>
                                  <tr>
                                      <td><?php echo $i; $i=$i+1;?></td>
                                      <td><?php echo $row['nama_kategori'] ?>
                                      </td>

                                      <td style='text-align:center'>
                                        <span data-placement='top' data-toggle='tooltip' title='EditKate'>
                                        <button class='editKategori btn btn-primary btn-xs ' data-title='Edit' data-toggle='modal' data-id=<?php echo $row['kategori_id']?> data-kategori='<?php echo $row['nama_kategori']?>'>
                                        <span class='glyphicon glyphicon-pencil'></span></button><span>

                                        <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                        <button class='deleteKategori btn btn-danger btn-xs ' data-title='Delete' data-toggle='modal' data-id=<?php echo $row['kategori_id']?>>
                                        <span class='glyphicon glyphicon-trash'></span></button><span>
                                      </td>

                                  </tr>
    <?php endforeach ?>

                      </body>
                  </table>
              </div>
            </div>

              <!-- /.box -->
          </div>

          </div>



          <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background:#232f4e;color:white">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit Document</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="editdoc.php" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                            <!-- Text input-->

                            <div class="form-group">
                              <div class="col-md-6">
                                <input id="nomor" name="nomor" type="hidden" placeholder="Nomor Dokumen" class="form-control input-md" required="" value="">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-4 control-label" for="prodi">Judul Dokumen</label>
                              <div class="col-md-6">
                                <input id="judul" name="judul" type="text" placeholder="Judul Dokumen" class="form-control input-md" required="" value="">
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="paper">Upload Dokumen</label>
                                <div class="col-md-6">
                                  <input id="doc" name="doc" type="file" class="form-control input-md"/>
                                </div>
                              </div>

                              <div class="form-group">
                                <div style="text-align: right; margin-right:30px">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <input class="btn btn-primary" name="edit" type="submit"/>
                                </div>
                              </div>
                            </fieldset>
                        </form>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="myModalEditKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background:#232f4e;color:white">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="editdockategori.php" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                            <!-- Text input-->

                            <div class="form-group">
                              <div class="col-md-6">
                                <input id="nomorkategori" name="nomor" type="hidden" placeholder="Nomor Kategori" class="form-control input-md" required="" value="">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-4 control-label" for="prodi">Nama Kategori</label>
                              <div class="col-md-6">
                                <input id="kategori" name="kategori" type="text" placeholder="Nama Kategori" class="form-control input-md" required="" value="">
                              </div>
                            </div>

                              <div class="form-group">
                                <div style="text-align: right; margin-right:30px">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <input class="btn btn-primary" name="edit" type="submit"/>
                                </div>
                              </div>
                            </fieldset>
                        </form>
                      </div>
                  </div>
              </div>
          </div>


          <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background:#232f4e;color:white">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
                      </div>
                      <div class="modal-body">
                          Anda yakin ingin menghapus data ini ?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <a id="linkhapus" href=""><button type="button" class="btn btn-primary">Hapus Data</button></a>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="myModalDeleteKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background:#232f4e;color:white">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
                      </div>
                      <div class="modal-body">
                          Anda yakin ingin menghapus data ini ?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <a id="linkhapuskategori" href=""><button type="button" class="btn btn-primary">Hapus Data</button></a>
                      </div>
                  </div>
              </div>
          </div>

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

                    <script>
                         $(document).on("click", ".delete", function () {
                         var id = $(this).data('id');
                         document.getElementById("linkhapus").href= "deletedoc.php?no="+id;
                         $('#myModalDelete').modal('show');
                       });
                    </script>

                    <script>
                         $(document).on("click", ".edit", function () {
                         var id = $(this).data('id');
                         var judul = $(this).data('judul');
                         document.getElementById("nomor").value=id;
                         document.getElementById("judul").value=judul;
                         $('#myModalEdit').modal('show');
                       });
                    </script>

                    <script>
                         $(document).on("click", ".deleteKategori", function () {
                         var id = $(this).data('id');
                         document.getElementById("linkhapuskategori").href= "deletedockategori.php?no="+id;
                         $('#myModalDeleteKategori').modal('show');
                       });
                    </script>

                    <script>
                         $(document).on("click", ".editKategori", function () {
                         var id = $(this).data('id');
                         var kategori = $(this).data('kategori');
                         document.getElementById("nomorkategori").value=id;
                         document.getElementById("kategori").value=kategori;
                         $('#myModalEditKategori').modal('show');
                       });
                    </script>
