<?php
include("./../php/credentials.php");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME); ?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Calon</h3>
                      <hr>
                      <a href="index.php?page=tambahcalon"><input type="button" class="btn btn-primary" value="Tambah Calon"></a>
                      <br><br>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Nama Calon</th>
                                  <th>Nim Calon</th>
                                  <th>Nomor Urut</th>
                                  <th>Keterangan</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                                  $query=mysqli_query($con,"select * from calon order by id_calon");
                                  while($has=mysqli_fetch_row($query))
                                  {

                                      echo "
                                      <tr>
                                          <td>$has[4]</td>
                                          <td>$has[5]</td>
                                           <td>$has[3]</td>
                                          <td>";
                                          if($has[1]==1){echo "Cakabem";}else{echo "Cawakabem";}
                                      echo "</td>

                                          <td style='text-align:center'>

                                          <span data-placement='top' data-toggle='tooltip' title='Edit'>
                                          <button class='editcalon btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-id=$has[0] data-target='#Edit' >
                                          <span class='glyphicon glyphicon-pencil'></span></button><span></a>

                                          <span data-placement='top' data-toggle='tooltip' title='Delete'>
                                          <button class='hapuscalon btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-id=$has[0]>
                                          <span class='glyphicon glyphicon-trash'></span></button><span>
                                          </td>
                                      </tr>
                                      ";
                                  }
                             ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>

        </div>
      <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
                  </div>
                  <div class="modal-body">
                      Anda yakin ingin menghapus data ini ?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <a id="hapuslink" href=""><button type="button" class="btn btn-primary">Hapus Data</button></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="EditLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Pilih perubahan yang ingin anda lakukan</h4>
                  </div>
                  <div class="modal-body">
                  <a id='editidentitas' href="" data-link="tambahcalon"><button type="button" class="btn btn-primary">Identitas Calon</button></a>
                  <a id='editriwayat' href="" data-link="tambahriwayat"><button type="button" class="btn btn-primary">Riwayat Calon</button></a>
                  <a id='editujipublik' href="" data-link="tambahujipublik"><button type="button" class="btn btn-primary">Uji Publik Calon</button></a>
                  </div>
              </div>
          </div>
      </div>

      <script>
      	$(".editcalon").click(function(){
          var ID = $(this).attr('data-id');
          var LINK = $('#editidentitas').attr('data-link');
          document.getElementById("editidentitas").href = "./index.php?page="+LINK+"&&id="+ID;
          var LINK = $('#editriwayat').attr('data-link');
          document.getElementById("editriwayat").href = "./index.php?page="+LINK+"&&id="+ID;
          var LINK = $('#editujipublik').attr('data-link');
          document.getElementById("editujipublik").href = "./index.php?page="+LINK+"&&id="+ID;
      	});
        $(".hapuscalon").click(function(){
      			var ID = $(this).attr('data-id');
              document.getElementById("hapuslink").href = "./delete.php?id="+ID;
              $('#Delete').modal('show');
      	});
      </script>
