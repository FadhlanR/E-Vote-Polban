<!DOCTYPE html>
<!-- Author : Fadhlan Ridhwanallah-->
	<?php
		include("./../php/credentials.php");

		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$status = 1;
		$kelas = $db->query("SELECT k.id_kelas, k.nama_kelas, p.nama_prodi, j.nama_jurusan From kelas k, prodi p, jurusan j Where j.id_jurusan = p.id_jurusan AND p.id_prodi = k.id_prodi and status_pemilihan = 1")->fetchALL();
	?>
  <?php $no =0 ?>
	<table class="table table-bordered">
    <tr style="background-color:#337ab7;color:white">
      <th>No</th>
      <th>Kelas</th>
      <th>Prodi</th>
      <th>Jurusan</th>
			<th></th>
    </tr>
  <?php foreach ($kelas as $key => $row): ?>
    <?php $no++ ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $row['nama_kelas']; ?></td>
      <td><?php echo $row['nama_prodi']; ?></td>
      <td><?php echo $row['nama_jurusan']; ?></td>
			<td><button type="button" class="btn btn-danger tidakdiizinkan"  data-a= "<?php echo $row['id_kelas']?>">Hentikan Pemilihan</button></td>
    </tr>
    <?php endforeach ?>
  </table>

<script>
	$(".tidakdiizinkan").click(function(){
			var ID = $(this).attr('data-a');
			$.ajax({url:"ubahstatuskelas.php?kelas="+ID+"&status=0",cache:true,success:function(result){
					$('#listKelas').load('listkelas.php');
			}});
	});
</script>
	<?php $db=null; ?>
