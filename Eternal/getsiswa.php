<!-- Author : Fadhlan Ridhwanallah-->
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$id_kelas = $_GET['id'];
		$mahasiswa = $db->prepare("SELECT p.* FROM pemilih p WHERE p.id_kelas = :id");
		$mahasiswa->bindValue(':id',$id_kelas);
		$mahasiswa->execute();
		$mahasiswa = $mahasiswa->fetchAll();;
	?>
	<tr>
		<th>No</th>
		<th>Nim</th>
		<th>Nama</th>
	</tr>
	<?php $no=0;?>
	<?php foreach ($mahasiswa as $key => $row): ?>
		<?php $no++; ?>
		<?php 	if(is_null($row['id_nomor'])){
					$color='#d9534f';
				}
				else{
					$color='#337ab7';
				}
		?>
		<tr>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $no?></td>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $row['nim']?></td>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $row['nama_pemilih']?></td>
		</tr>
	<?php endforeach ?>
	<?php $db=null;?>
<?php else: ?>
	<tr>
		<th>List Pemilih Akan Muncul Setelah Anda Memilih Jurusan, Prodi, dan Kelas</th>
	</tr>
<?php endif?>
