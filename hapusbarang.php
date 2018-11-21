<?php 
	session_start();
	$ID_BUKU=$_GET['id'];
	unset($_SESSION['keranjang'][$ID_BUKU]);

	echo "<script>alert('Barang Berhasil Di Hapus')</script>";
	echo "<script>location='keranjang.php';</script>";
	
 ?>