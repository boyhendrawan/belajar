<h2>Ubah Produk</h2>
<?php 

$ambil=$koneksi->query("SELECT JUDUL,PENULIS,PENERBIT,TAHUN,STOK,HARGA_JUAL,DISKON,FOTO FROM BUKU WHERE ID_BUKU=$_GET[id]");
$pecah=$ambil->fetch_assoc();

 // $ex_tampil=mysqli_query($koneksi,$sql_tampil);
 // $res=mysqli_fetch_array($ex_tampil);


if (isset($_POST['ubah'])) {
	

	$name_p = $_FILES['file']['name'];
	$sumber_p = $_FILES['file']['tmp_name'];
	
	
	
	
	$a=$_POST['JUDUL'];
	$c=$_POST['PENULIS'];
	$d=$_POST['PENERBIT'];
	$e=$_POST['TAHUN'];
	$f=$_POST['STOK'];
	$g=$_POST['HARGA_JUAL'];
	$h=$_POST['DISKON'];
	

	if (!empty($sumber_p))
	{
		
		move_uploaded_file($sumber_p,"foto_produk/$name_p");

		$koneksi->query("UPDATE BUKU SET JUDUL='$a' ,PENULIS='$c' ,PENERBIT='$d' ,TAHUN='$e' ,STOK='$f' ,HARGA_JUAL='$g',DISKON='$h' ,FOTO='$name_p' WHERE ID_BUKU='$_GET[id]'");

	}

	else
	{
		$koneksi->query("UPDATE BUKU SET JUDUL='$a' ,PENULIS='$c' ,PENERBIT='$d' ,TAHUN='$e' ,STOK='$f' ,HARGA_JUAL='$g',DISKON='$h' WHERE ID_BUKU='$_GET[id]'");
	}

	// $sql="UPDATE BUKU SET JUDUL='$a' ,NOISBN='$b' ,PENULIS='$c' ,PENERBIT='$d' ,TAHUN='$e' ,STOK='$f' ,HARGA_JUAL='$g',DISKON='$h', FOTO='$z' WHERE ID_BUKU='$_GET[id]'";

	// $ds=mysqli_query($koneksi,$sql);

	if ($pecah) {

		echo "<script>alert('data berhasil, klik tombol oke untuk kembali ke produk anda');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
	else{
		echo "<div class='alert alert-danger'>Datagagal</div>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul Buku</label>
			<input class="form-control" type="text" name="JUDUL" placeholder="Masukkan JudulBuku"
			value="<?php echo $pecah['JUDUL']; ?>">
		</div>
		<div class="form-group">
			<label>Penulis</label>
			<input class="form-control" type="text" name="PENULIS" placeholder="Masukkan Penulis" value="<?php echo $pecah['PENULIS']; ?>">
		</div>
		<div class="form-group">
			<label>Penerbit</label>
			<input class="form-control" type="text" name="PENERBIT" placeholder="Masukkan Penerbit" value="<?php echo $pecah['PENERBIT']; ?>" >
		</div>
		<div class="form-group">
			<label>Tahun</label>
			<input class="form-control" type="number" name="TAHUN" placeholder="Masukkan Tahun" value="<?php echo $pecah['TAHUN']; ?>">
		</div>
		<div class="form-group">
			<label>Stock</label>
			<input class="form-control" type="number" name="STOK" placeholder="Masukkan Stock" value="<?php echo $pecah['STOK']; ?>">
		</div>
		<div class="form-group">
			<label>Harga Jual(Rp)</label>
			<input class="form-control" type="number" name="HARGA_JUAL" placeholder="Masukkan HargaJual(Rp)" value="<?php echo $pecah['HARGA_JUAL']; ?>">
		</div>
		<div class="form-group">
			<label>Diskon (%)</label>
			<input class="form-control" type="number" name="DISKON" placeholder="Masukkan Diskon(%)" value="<?php echo $pecah['DISKON']; ?>">
		</div>
		<div class="form-group">

			<img width="200" src="foto_produk/<?php echo $pecah['FOTO']; ?>">
		</div>
		<div class="form-group">
			<label>FOTO</label>
			<input type="file" name="file" class="form-control">
		</div>
		<button class="btn btn-primary" name="ubah">Ubah</button>
	</form>


</body>
</html>

