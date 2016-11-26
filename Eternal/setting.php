<?php

include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$row = $db->query('SELECT * FROM setting')->fetch();

$row2 = $db->query('SELECT COUNT(*)as calon FROM no_pasangan')->fetch();
?>

<?php
if(isset($_POST["submit"]))
{
  	if (!empty($_POST['tanggal']))
    {
      $statement = $db->prepare("UPDATE setting SET tanggal_pemilihan = :tanggal_pemilihan");
      $statement->bindValue(':tanggal_pemilihan',$_POST['tanggal']);
      $update = $statement->execute();

      $row = $db->query('SELECT * FROM setting')->fetch();
    }
}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Setting Tanggal Pemilihan</h3>
                <hr>
                    <div class="row">
                      <form action="" method="POST">

                        <label class="col-md-2 control-label" >Tanggal Pemilihan : </label><br><br>
                        <div class="col-md-3">
                        <input id="datepicker" name="tanggal" class="form-control input-md" type="datetime" required/>
                      </div>
                      <button class="btn btn-primary col-md-2 btn-login" name="submit" type="submit">Ganti Tanggal</button>
                    </form>
                    </div>
              </div>
          </div>
      </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Setting Freeze Quick Count</h3>
                <hr>
                        <br>
                        <div class="col-md-offset-0 col-md-3" >
                                      <div class="panel panel-default">
                                          <div class="panel-heading">
                                            <center>

                                                <i class="fa fa-bell fa-fw"></i> Data Freeze
                                              </center>
                                          </div>
                                          <!-- /.panel-heading -->
                                          <table class="table table-bordered">
                                              <tr>
                                  <th>
                                    Total Mahasiswa
                                  </th>
                                  <td>
                                    <?php echo $row['belum']+$row['sudah'] ?>
                                  </td>
                                </tr>
                                <?php for ($i=1; $i <= $row2['calon']; $i++) {
                                  # code...
                                  $row3 = $db->query('SELECT freeze_result FROM `no_pasangan` WHERE `id_nomor`=' .$i)->fetch();

                                ?>
                                              <tr>
                                  <th>
                                    Calon <?php echo $i ?>
                                  </th>
                                  <td>
                                    <?php echo $row3['freeze_result'] ?>
                                                  </td>
                                </tr>
                                <?php } ?>
                                              <tr>
                                  <th>
                                    Total sudah memilih
                                                  </th>
                                  <td>
                                    <?php echo $row['sudah'] ?>
                                  </td>
                                </tr>
                                              <tr>
                                  <th>
                                    Total belum memilih
                                                  </th>
                                  <td>
                                    <?php echo $row['belum'] ?>
                                  </td>
                                </tr>


                                          </table>
                                          <!-- /.panel-body -->
                                      </div>
                                      <center>
                                        <?php if ($row['freeze_quick_count']==0){ ?>
                                          <a href="freeze.php"><input type="button" class="btn btn-primary" value="Freeze"></a>
                                        <?php }else{?>
                                        <a href="unfreeze.php"><input type="button" class="btn btn-danger" value="Unfreeze"></a>
                                        <?php }?>


                                    </center>
                                  </div>

                                  <div class="col-md-offset-0 col-md-3" >
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                      <center>

                                                          <i class="fa fa-bell fa-fw"></i> Data Real
                                                        </center>
                                                    </div>
                                                    <!-- /.panel-heading -->
                                                    <table class="table table-bordered">
                                                        <tr>
                                            <th>
                                              Total Mahasiswa
                                            </th>
                                            <td>
                                              <?php
                                                  $row4 = $db->query('SELECT COUNT(*) AS result FROM pemilih')->fetch();
                                                        $total = $row4['result'];

                                                        $row4 = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NOT NULL')->fetch();
                                                        $sudah = $row4['result'];
                                                        echo $total ?>

                                            </td>
                                          </tr>
                                          <?php for ($i=1; $i <= $row2['calon']; $i++) {
                                            # code...
                                            $row3 = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor =' .$i)->fetch();


                                          ?>
                                                        <tr>
                                            <th>
                                              Calon <?php echo $i ?>
                                            </th>
                                            <td>
                                              <?php echo $row3['result'] ?>
                                            </td>
                                          </tr>
                                          <?php } ?>
                                                        <tr>
                                            <th>
                                              Total sudah memilih
                                                            </th>
                                            <td>
                                              <?php echo $sudah ?>

                                            </td>
                                          </tr>
                                                        <tr>
                                            <th>
                                              Total belum memilih
                                                            </th>
                                            <td>
                                              <?php echo $total - $sudah ?>

                                            </td>
                                          </tr>


                                                    </table>
                                                    <!-- /.panel-body -->
                                                </div>
                                            </div>
                <br>
            </div>
        </div>
    </div>
</div>




<!-- <script src="./../assets/js/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
<script src="./../assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

<script>
$( "#datepicker" ).datepicker({
	dateFormat: 'yy-dd-mm',
    onSelect: function(datetext){

        var d = new Date(); // for now

        var h = d.getHours();
        h = (h < 10) ? ("0" + h) : h ;

        var m = d.getMinutes();
        m = (m < 10) ? ("0" + m) : m ;

        var s = d.getSeconds();
        s = (s < 10) ? ("0" + s) : s ;

        datetext = datetext + " " + h + ":" + m + ":" + s;

        $('#datepicker').val(datetext);
    }
});
</script> -->

<!--Load Script and Stylesheet -->
<script type="text/javascript" src="./../assets/js/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="../assets/css/jquery.simple-dtpicker.css" rel="stylesheet" />

<script type="text/javascript">
$( "#datepicker" ).appendDtpicker({
  "current": "<?php echo $row['tanggal_pemilihan'] ?>"
});
</script>
