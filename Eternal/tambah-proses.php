<!-- Author : Fadhlan Ridhwanallah-->
<?php
include("../php/credentials.php");


if(isset($_POST['tambah'])){
		idcalon();
	}
elseif (isset($_POST['tambahno'])) {
		nopasangan();
}
elseif (isset($_POST['tambahujipublik']) and isset($_GET['id'])) {
		ujipublik();
}
elseif (isset($_POST['tambahpendidikan'])) {
		riwayatpendidikan();
}
elseif (isset($_POST['tambahorganisasi'])) {
		riwayatorganisasi();
}
elseif (isset($_POST['tambahprestasi'])) {
		riwayatprestasi();
}
elseif (isset($_POST['tambahkategori'])) {
		kategori();
}







function idcalon(){
		$foto = UploadImage($_FILES['fotocalon']);
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$result = $db->prepare("INSERT INTO calon VALUES(0,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$result->bindParam(1,$_POST['keterangan_no_calon']);
		$result->bindParam(2,$_POST['kelascmb']);
		$result->bindParam(3,$_POST['listnocalon']);
		$result->bindParam(4,$_POST['nama']);
		$result->bindParam(5,$_POST['nimcmb']);
		$result->bindParam(6,$_POST['tempatlahir']);
		$result->bindParam(7,$_POST['tanggallahir']);
		$result->bindParam(8,$_POST['jeniskelamin']);
		$result->bindParam(9,$_POST['agama']);
		$result->bindParam(10,$_POST['alamatsekarang']);
		$result->bindParam(11,$_POST['alamatrumah']);
		$result->bindParam(12,$_POST['nohp']);
		$result->bindParam(13,$_POST['email']);
		$result->bindParam(14,$foto);
		$success = $result->execute();

		if(!$success){
			return($result->errorInfo());
		}
		else{
			$id = $db->query("SELECT MAX(id_calon) as max FROM calon")->fetch();
			header('location: ./index.php?page=tambahriwayat&&id='.$id['max']);
		}

}

function nopasangan(){
		$paper = UploadPaper($_FILES['paper']);
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$result = $db->prepare("INSERT INTO no_pasangan VALUES(?,?,?,?,0)");
		$result->bindParam(1,$_POST['nomor']);
		$result->bindParam(2,$_POST['visi']);
		$result->bindParam(3,$_POST['misi']);
		$result->bindParam(4,$paper);

		$success = $result->execute();

		if(!$success){
			return($result->errorInfo());
		}
		else{
			header('location: ./index.php?page=tambahcalon');
		}

}

function ujipublik(){
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$result = $db->prepare("UPDATE penilaian_uji_public SET visimisi = ?,wawasaninternal = ?,wawasaneksternal = ?,kepemimpinan = ?,pengambilankeputusan = ?,sikap = ? WHERE id_calon = ?");
		$result->bindParam(1,$_POST['visimisi']);
		$result->bindParam(2,$_POST['wawasaninternal']);
		$result->bindParam(3,$_POST['wawasaneksternal']);
		$result->bindParam(4,$_POST['kepemimpinan']);
		$result->bindParam(5,$_POST['pengambilankeputusan']);
		$result->bindParam(6,$_POST['sikap']);
		$result->bindParam(7,$_GET['id']);
		$success = $result->execute();

		if(!$success){
			var_dump($result->errorInfo());
		}
		else{
			header('location: ./index.php?page=tambahujipublik&&id='.$_GET['id']);
		}

}

function UploadImage($img){
	if(isset($img)){
      $errors= array();
      $file_name = $img['name'];
      $file_size = $img['size'];
      $file_tmp =$img['tmp_name'];
      $file_type=$img['type'];
      $file_ext=strtolower(end(explode('.',$img['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./../img/".$file_name);
         return $file_name;
      }else{
         return 'Eror';
      }
   }
}

function UploadPaper($paper){
	if(isset($paper)){
      $errors= array();
      $file_name = $paper['name'];
      $file_size = $paper['size'];
      $file_tmp =$paper['tmp_name'];
      $file_type=$paper['type'];
      $file_ext=strtolower(end(explode('.',$paper['name'])));

      $expensions= array("pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./../paper/".$file_name);
         return $file_name;
      }else{
         return 'Eror';
      }
   }
}

function riwayatpendidikan(){
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$success = false;
		for($row = 1;$row <= $_POST['rowpendidikan'];$row++) {
			$result = $db->prepare("INSERT INTO riwayat_pendidikan VALUES(0,?,?,?,?,?)");
			$result->bindParam(1,$_POST['idcalonpendidikan']);
			$result->bindParam(2,$_POST['jenjang-'.$row]);
			$result->bindParam(3,$_POST['namasekolah-'.$row]);
			$result->bindParam(4,$_POST['kotasekolah-'.$row]);
			$result->bindParam(5,$_POST['tahunlulus-'.$row]);
			$success = $result->execute();
		}

		if(!$success){
			echo "Eror";
		}
		else{
			header('location: ./index.php?page=calon');
		}

}

function riwayatorganisasi(){
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);

		for($row = 1;$row <= $_POST['roworganisasi'];$row++) {
			$tahun = (int)explode('-',$_POST['periode-'.$row]);
			$awal = (int)$tahun[0];
			$akhir = (int)$tahun[1];
			$result = $db->prepare("INSERT INTO riwayat_organisasi VALUES(0,?,?,?,?,?)");
			$result->bindParam(1,$_POST['idcalonorganisasi']);
			$result->bindParam(2,$_POST['tingkatorganisasi-'.$row]);
			$result->bindParam(3,$_POST['namaorganisasi-'.$row]);
			$result->bindParam(4,$awal);
			$result->bindParam(5,$akhir);
			$success = $result->execute();
		}

		if(!$success){
			var_dump($result->errorInfo());
		}
		else{
			header('location: ./index.php?page=calon');
		}

}

function riwayatprestasi(){
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		for($row = 1;$row <= $_POST['rowprestasi'];$row++) {
			$result = $db->prepare("INSERT INTO riwayat_prestasi VALUES(0,?,?,?,?,?)");
			$result->bindParam(1,$_POST['namakegiatan-'.$row]);
			$result->bindParam(2,$_POST['tingkatprestasi-'.$row]);
			$result->bindParam(3,$_POST['idcalonprestasi']);
			$result->bindParam(4,$_POST['prestasi-'.$row]);
			$result->bindParam(5,$_POST['tahunprestasi-'.$row]);
			$success = $result->execute();
		}

		if(!$success){
			var_dump($result->errorInfo());
		}
		else{
			header('location: ./index.php?page=calon');
		}

}

function kategori(){
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$result = $db->prepare("INSERT INTO dokumen_kategori VALUES(NULL,?)");
		$result->bindParam(1,$_POST['Kategori']);
		$success = $result->execute();

		if(!$success){
			var_dump($result->errorInfo());
		}
		else{
			header('location: ./index.php?page=dokumen');
		}

}
	?>
