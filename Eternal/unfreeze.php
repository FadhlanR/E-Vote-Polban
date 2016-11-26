<?php
include("./../php/credentials.php");
$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$row = $db->query("SELECT COUNT(*) AS result FROM no_pasangan")->fetch();
$result = $row['result'];
for ($i=1; $i <= $result; $i++) {
  # code...
  $row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor =' .$i)->fetch();
  $result2 = $row['result'];

  $statement = $db->prepare("UPDATE no_pasangan SET freeze_result = :freeze_result  WHERE id_nomor = :id_nomor");
  $statement->bindValue(':freeze_result',$result2);
  $statement->bindValue(':id_nomor',$i);
  $update = $statement->execute();
}

$row = $db->query('SELECT COUNT(*) AS result FROM pemilih')->fetch();
$total = $row['result'];

$row = $db->query('SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NOT NULL')->fetch();
$sudah = $row['result'];

$statement = $db->prepare("UPDATE setting SET belum = :belum, sudah = :sudah, freeze_quick_count = :status");
$statement->bindValue(':belum',$total-$sudah);
$statement->bindValue(':sudah',$sudah);
$statement->bindValue(':status',0);
$update = $statement->execute();

header("location: index.php?page=set");

?>
