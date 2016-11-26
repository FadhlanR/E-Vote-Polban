
<?php if(isset($_GET['nim'])){

		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$nim = $_GET['nim'];
		$nama = $db->prepare("SELECT p.nama_pemilih FROM pemilih p WHERE p.nim = :nim");
		$nama->bindValue(':nim',$nim);
		$nama->execute();
		$nama = $nama->fetch();
		echo $nama[0];
	}
	?>
