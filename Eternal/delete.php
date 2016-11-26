<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$id_calon = $_GET['id'];

$del = $db->prepare('Delete FROM riwayat_prestasi WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM riwayat_pendidikan WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM riwayat_organisasi WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM hobi WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM keahlian WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM penilaian_uji_public WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();
$del = $db->prepare('Delete FROM calon WHERE id_calon=:id');
$del->bindValue(':id',$id_calon);
$del = $del->execute();

if(!$del){
		echo "Eror penghapusan";
}else{
		header('location: ./index.php?page=calon');
}

?>
