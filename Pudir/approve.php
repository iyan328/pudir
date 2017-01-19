<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}
else{
	$nm = $_SESSION['username'];
}

//cek level user
if($_SESSION['hak_akses']!="pudir"){
die("Anda bukan Pudir");//jika bukan admin jangan lanjut
}
?>
<?php
	include "koneksi.php";
	if(isset($_GET['kode'])){
		$kode = $_GET['kode'];
		$sql = "UPDATE sp set s_pudir='Disetujui' where id='$kode'";
			$kueri = mysql_query($sql);
			if ($kueri){
				echo "<script> document.location='../upload-download-files/spm1.php'</script>";
			}
			else {
				echo "<script> alert('Gagal');document.location='../upload-download-files/spm1.php'</script>";
				echo mysql_error();
			}
	} else {
		echo "<script>alert('Data Belum Dipilih');document.location='../upload-download-files/spm1.php'</script>";
	}

	?>