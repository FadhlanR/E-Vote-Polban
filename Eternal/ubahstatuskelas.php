<!-- Author : Fadhlan Ridhwanallah-->
<?php
	if(isset($_GET['kelas']) and isset($_GET['status'])){
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$id_kelas = $_GET['kelas'];
		$status = $_GET['status'];
		$kelas = $db->prepare("UPDATE kelas SET status_pemilihan=:status WHERE id_kelas = :id	");
		$kelas->bindValue(':id',$id_kelas);
		$kelas->bindValue(':status',$status);
		$kelas->execute();
		}
	else{
		echo "<option>Uy</option>";
		}
		$db=null;
?>
