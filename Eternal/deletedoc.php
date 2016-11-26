<?php

	include("../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);
$id = $_GET['no'];

$calon = $db->prepare('DELETE FROM `dokumen` WHERE doc_id = :id');
$calon->bindValue(':id',$id);
$calon->execute();

header('Location: ./index.php?page=dokumen');
?>
