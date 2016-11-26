<?php
if(isset($_POST['edit'])){

	include("../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);

  echo $_POST['nomor'];

  echo $_POST['kategori'];

    $result = $db->prepare("UPDATE `dokumen_kategori` SET `nama_kategori`=? WHERE `kategori_id`=?");
    $result->bindParam(1,$_POST['kategori']);
    $result->bindParam(2,$_POST['nomor']);
    $success = $result->execute();



  header('Location: ./index.php?page=dokumen');
}

	?>
