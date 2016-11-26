<!-- Author : Fadhlan Ridhwanallah-->
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		if(isset($calon)){
			$id_kelas = $calon['id_kelas'];
		}
		else{
				$id_kelas = $_GET['id'];
		}
		$mahasiswa = $db->prepare("SELECT p.* FROM pemilih p WHERE p.id_kelas = :id");
		$mahasiswa->bindValue(':id',$id_kelas);
		$mahasiswa->execute();
		$mahasiswa = $mahasiswa->fetchAll();
	?>
		<option value="0">Pilih NIM Mahasiswa.. </option>
	<?php foreach ($mahasiswa as $key => $row): ?>
		<option value="<?php echo $row['nim']?>" <?php if(isset($calon)){if($row['nim']==$calon['nim_calon']){echo 'selected="selected"';}}?>><?php echo $row['nim']?></option>
	<?php endforeach ?>
	<?php $db=null; ?>
<?php else: ?>
	<option value="0">Pilih Kelas Dahulu </option>
<?php endif?>
