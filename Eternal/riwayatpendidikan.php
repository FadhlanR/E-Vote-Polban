<table class="table table-bordered" style="margin-top:15px">
  <tr>
    <th>No</th>
    <th>Jenjang Pendidikan</th>
    <th>Nama Sekolah</th>
    <th>Kota</th>
    <th>Tahun Lulus</th>
  </tr>
  <tr>
    <td>Contoh</td>
    <td>TK/SD/SMP</td>
    <td>SMAN 24 Bandung</td>
    <td>Bandung</td>
    <td>2014</td>
  </tr>

  <?php if(isset($_POST['data'])){
    $row = $_POST['data'];
  }
  else{
    $row = 3;
  }?>
  <input id="rowpendidikan" name="rowpendidikan" type="hidden" value="<?php echo $row?>" data-row="<?php echo $row?>"/>
  <input id="idcalonpendidikan" name="idcalonpendidikan" type="hidden" value="<?php echo $_GET['id']?>"/>
  <?php for($i = 1;$i <= $row; $i++): ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><input id="jenjang-<?php echo $i ?>" name="jenjang-<?php echo $i ?>" type="text" class="form-control input-md" size="1" maxlength="3"/></td>
    <td><input id="namasekolah-<?php echo $i ?>" name="namasekolah-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td><input id="kotasekolah-<?php echo $i ?>" name="kotasekolah-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td><input id="tahunlulus-<?php echo $i ?>" name="tahunlulus-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
  </tr>
<?php endfor ?>
</table>
