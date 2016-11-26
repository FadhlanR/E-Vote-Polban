<?php
if(!isset($db)){
  include("./../php/credentials.php");
  $db = new PDO(DB_DSN, DB_USER, DB_PASS);
}
$tingkat = $db->query("SELECT * FROM tingkat")->fetchALL(); ?>
<table class="table table-bordered" style="margin-top:15px">
  <tr>
    <th>No</th>
    <th>Nama Kegiatan</th>
    <th>Prestasi</th>
    <th>Tahun</th>
    <th>Tingkat</th>
  </tr>
  <tr>
    <td>Contoh</td>
    <td>Ungkara Award</td>
    <td>Aktor Terbaik</td>
    <td>2012</td>
    <td>Nasional</td>
  </tr>

  <?php if(isset($_POST['data'])){
    $rowprestasi = $_POST['data'];
  }
  else{
    $rowprestasi = 3;
  }?>
  <input id="rowprestasi" name="rowprestasi" type="hidden" value="<?php echo $rowprestasi?>" data-row="<?php echo $rowprestasi?>"/>
  <input id="idcalonprestasi" name="idcalonprestasi" type="hidden" value="<?php echo $_GET['id']?>"/>
  <?php for($i = 1;$i <= $rowprestasi; $i++): ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><input id="namakegiatan-<?php echo $i ?>" name="namakegiatan-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td><input id="prestasi-<?php echo $i ?>" name="prestasi-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td><input id="tahunprestasi-<?php echo $i ?>" name="tahunprestasi-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td>
      <select id="tingkatprestasi-<?php echo $i ?>" name="tingkatprestasi-<?php echo $i ?>" class="form-control">
        <?php foreach ($tingkat as $key => $row): ?>
          <option value="<?php echo $row['nama_tingkatan']?>"><?php echo $row['nama_tingkatan']?></option>
        <?php endforeach ?>
      </select>
    </td>
  </tr>
<?php endfor ?>
</table>
