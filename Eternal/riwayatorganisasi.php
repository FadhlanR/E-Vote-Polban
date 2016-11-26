<?php
if(!isset($db)){
  include("./../php/credentials.php");
  $db = new PDO(DB_DSN, DB_USER, DB_PASS);
}
$tingkat = $db->query("SELECT * FROM tingkat")->fetchALL();?>
<table class="table table-bordered" style="margin-top:15px">
  <tr>
    <th>No</th>
    <th>Nama Organisasi</th>
    <th>Periode Menjabat</th>
    <th>Tingkat</th>
  </tr>
  <tr>
    <td>Contoh</td>
    <td>Pramuka Ambalan Samida</td>
    <td>2011-2012</td>
    <td>Nasional</td>
  </tr>

  <?php if(isset($_POST['data'])){
    $roworganisasi = $_POST['data'];
  }
  else{
    $roworganisasi = 3;
  }?>
  <input id="roworganisasi" name="roworganisasi" type="hidden" value="<?php echo $roworganisasi?>" data-row="<?php echo $roworganisasi?>"/>
  <input id="idcalonorganisasi" name="idcalonorganisasi" type="hidden" value="<?php echo $_GET['id']?>"/>
  <?php for($i = 1;$i <= $roworganisasi; $i++): ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><input id="namaorganisasi-<?php echo $i ?>" name="namaorganisasi-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td><input id="periode-<?php echo $i ?>" name="periode-<?php echo $i ?>" type="text" class="form-control input-md" size="1"/></td>
    <td>
      <select id="tingkatorganisasi-<?php echo $i ?>" name="tingkatorganisasi-<?php echo $i ?>" class="form-control">
        <?php foreach ($tingkat as $key => $row): ?>
          <option value="<?php echo $row['nama_tingkatan']?>"><?php echo $row['nama_tingkatan']?></option>
        <?php endforeach ?>
      </select>
    </td>
  </tr>
<?php endfor ?>
</table>
