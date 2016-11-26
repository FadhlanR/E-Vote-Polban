<!-- Author : Fadhlan Ridhwanallah-->
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		if(isset($calon)){
			$id_prodi = $calon['id_prodi'];
		}
		else{
		$id_prodi = $_GET['id'];
		}
		$prodi = $db->prepare("SELECT k.* FROM kelas k WHERE k.id_prodi = :id");
		$prodi->bindValue(':id',$id_prodi);
		$prodi->execute();
		$prodi = $prodi->fetchAll();
	?>
		<option value="0">Pilih Kelas...</option>
	<?php foreach ($prodi as $key => $row): ?>
		<option value="<?php echo $row['id_kelas']?>" <?php if(isset($calon)){if($row['id_kelas']==$calon['id_kelas']){echo 'selected="selected"';}}?>><?php echo $row['nama_kelas']?></option>
	<?php endforeach ?>
	<?php $db=null; ?>
<?php else: ?>
	<option value="0">Pilih Prodi Dahulu, Pilih Kelas...</option>
<?php endif?>
