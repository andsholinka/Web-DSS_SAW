<?php  

require 'functions.php';
require "assets/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php";


// if(isset($_POST['import'])) {
// 	$file = $_FILES['file']['name'];
// 	$ekstensi = explode(".", $file);
// 	$file_name = "file-".round(microtime(true)).".".end($ekstensi);
// 	$sumber = $_FILES['file']['tmp_name'];
// 	$target_dir = "_file/";
// 	$target_file = $target_dir.$file_name;
// 	move_uploaded_file($sumber, $target_file);

// 	$obj = PHPExcel_IOFactory::load($target_file);
// 	$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

// 	$sql = "INSERT INTO solia (id_solia, nama_solia, art, alamat) VALUES";
// 	for ($i=1; $i <= count($all_data); $i++) {
// 		$nama_solia = $all_data[$i]['B'];
// 		$art = $all_data[$i]['C'];
// 		$alamat = $all_data[$i]['A'];
// 		$sql .= "('','$nama_solia','$art','$alamat'),";

		
// 	}
// $sql = substr($sql, 0, -1);
	
// 	mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));

// 	unlink($target_file);
// 	echo "<script>window.location='solia.php';</script>";
// }

if(isset($_POST['import2'])) {
	$file = $_FILES['file']['name'];
	$ekstensi = explode(".", $file);
	$file_name = "file-".round(microtime(true)).".".end($ekstensi);
	$sumber = $_FILES['file']['tmp_name'];
	$target_dir = "_file/";
	$target_file = $target_dir.$file_name;
	move_uploaded_file($sumber, $target_file);

	$obj = PHPExcel_IOFactory::load($target_file);
	$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

	$sql = "INSERT INTO pilihan (id_pilihan, nama_solia, C1, C2, C3, C4, C5, alamat) VALUES";
	for ($i=3; $i <= count($all_data); $i++) {
		$alamat = $all_data[$i]['A'];
		$nama_solia =addslashes($all_data[$i]['B']);
		$C1 = $all_data[$i]['C'];
		$C2 = $all_data[$i]['D'];
		$C3 = $all_data[$i]['E'];
		$C4 = $all_data[$i]['F'];
		$C5 = $all_data[$i]['G'];
		$sql .= "('','$nama_solia','$C1', '$C2','$C3', '$C4', '$C5', '$alamat'),";

		
	}
$sql = substr($sql, 0, -1);
	
	mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));

	unlink($target_file);
	echo "<script>window.location='pilihan.php';</script>";
}


?>