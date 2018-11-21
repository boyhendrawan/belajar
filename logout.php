<?php 
	session_start();

	session_destroy();

    echo "<script>alert('anda telah logout');</script>";
	echo "<script>location='login.php';</script>";

	echo "<div class='alert alert-info'>Data tersimpan Akan Kembali Ke Login</div>";
 	echo "<meta http-equiv='refresh' content='5 url=login.php'>";
 ?>