<?php

$db = new PDO(DB_DSN, DB_USER, DB_PASS);;
$id = $_GET['del'];

$calon = $db->prepare('Delete From calon Where id_calon = :id');
$calon->bindValue(':id',$id);
$calon->execute();

?>
