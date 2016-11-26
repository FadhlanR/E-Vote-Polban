<!-- Author : Fadhlan Ridhwanallah-->
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		if(isset($calon)){
			$id_jurusan = $calon['id_jurusan'];
		}
		else {
		$id_jurusan = $_GET['id'];
		}
		$prodi = $db->prepare("SELECT p.* FROM prodi p WHERE p.id_jurusan = :id");
		$prodi->bindValue(':id',$id_jurusan);
		$prodi->execute();
		$prodi = $prodi->fetchAll();
	?>
		<option value="0">Pilih Prodi...</option>
	<?php foreach ($prodi as $key => $row): ?>
		<option value="<?php echo $row['id_prodi']?>" <?php if(isset($calon)){if($row['id_prodi']==$calon['id_prodi']){echo 'selected="selected"';}}?>><?php echo $row['nama_prodi']?></option>
	<?php endforeach ?>
	<?php $db=null; ?>
<?php else: ?>
	<option value="0">Pilih Jurusan Dahulu, Pilih Prodi...</option>
<?php endif?>
