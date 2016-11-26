<?php
if(isset($_POST['tambah'])){

	include("../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);

	$doc = Upload($_FILES['doc']);

  if ($doc != "error") {

    $result = $db->prepare("INSERT INTO `dokumen`(`doc_id`, `judul`, `doc_file`, `kategori_id`) VALUES (NULL,?,?,?)");
    $result->bindParam(1,$_POST['judul']);
    $result->bindParam(2,$doc);
		$result->bindParam(3,$_POST['kategori']);
    $success = $result->execute();
  }


  header('Location: ./index.php?page=dokumen');
}

function Upload($doc){
	if(isset($doc)){
      $errors= array();
      $file_name = $doc['name'];
      $file_size = $doc['size'];
      $file_tmp =$doc['tmp_name'];
      $file_type=$doc['type'];
      $file_ext=strtolower(end(explode('.',$doc['name'])));
      $expensions= array("pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./../dokumen/".$file_name);
         return $file_name;
      }else{
         return 'Error';
      }
   }
}
	?>
