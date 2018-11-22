<?php 
    session_start();
  require('koneksi.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Nota Pembelian</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
 
 <?php include ('navbar.php'); ?>

<section class="konten">
  <div class="container">
    
    <h2>Detail Pembelian</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM PEMBELIAN_PRODUK
  JOIN PASOK ON PEMBELIAN_PRODUK.ID_PASOK=PASOK.ID_PASOK
  JOIN DISTRIBUTOR ON PASOK.ID_DISTRIBUTOR=DISTRIBUTOR.ID_DISTRIBUTOR
  JOIN BUKU ON PEMBELIAN_PRODUK.ID_BUKU = BUKU.ID_BUKU
  JOIN ONGKIR ON PASOK.ID_ONGKIR=ONGKIR.ID_ONGKIR
  WHERE PASOK.ID_PASOK='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>
 <br>
<table class="table table-bordered">
     <tr>
      <th>Email</th>
      <td><?php echo $detail['EMAIL']; ?></td>
    </tr>
    <tr>
      <th>Telp/Hp</th>
      <td><?php echo $detail['TELEPON']; ?></td>
    </tr>
    <tr>
      <th>Tanggal Pembelian</th>
      <td><?php echo $detail['TANGGAL']; ?></td>
    </tr>
    <tr>
      <th rowspan="2">Ongkir</th>
      <td><?php echo $detail['NAMA_KOTA']; ?></td>
    </tr>
    <tr>
      <td>Rp. <?php echo number_format($detail['TARIF']); ?></td>
    </tr>
  
</table>




 
  <?php 
  $ambil1=$koneksi->query("SELECT * FROM PASOK JOIN ONGKIR ON PASOK.ID_ONGKIR=ONGKIR.ID_ONGKIR JOIN DISTRIBUTOR ON PASOK.ID_DISTRIBUTOR=DISTRIBUTOR.ID_DISTRIBUTOR WHERE PASOK.ID_PASOK='$_GET[id]'");
  $dt=$ambil1->fetch_assoc();
   ?>
</p>  
 </p>

 <div class="row">
   <div class="col-md-4">
   <h3>TOTAL</h3>
   <hr>
     
  Tanggal : <?php echo $detail['TANGGAL']; ?> <br>
  Total : Rp. <?php echo number_format($dt['JUMLAH']); ?>

   </div>
   <div class="col-md-4">
   <h3>PELANGGAN</h3>
   <hr>
    <strong>Nama:<?php echo $detail['NAMA_DISTRIBUTOR']; ?></strong><br> 
    <p>
      <strong>Alamat : <?php echo $detail['ALAMAT']; ?></strong><br>
    <p>

    </div>
    <div class="col-md-4">
      <h3>PENGIRIM</h3>
      <hr>
      <strong>Pengiriman :<?php echo $dt['NAMA_KOTA'] ?></strong><br/>
      <strong>Kode Pos : <?php echo $dt['KODE']; ?></strong><br>
      <strong>Tarif : Rp.<?php echo number_format($dt['TARIF']) ?></strong>
    </div>
 </div>

<br>
<br>

    <div class="row">
      <div class="col-md-7">
        <div class="alert alert-info">
          silahkan melakukan pembayaran melalui  Rp. <?php echo number_format($detail['JUMLAH']); ?>
          <strong>SHOPBOOK</strong>
        </div>
      </div>
      <?php $ID_PEMBELIAN_BARUSAN=$koneksi->insert_id; ?>
      <a class="btn btn-success" href="order.php?id=<?php echo $dt['ID_PASOK']?>"><strong>Lanjut Ke Pembayaran</strong></a>
  </div>
</section>

</body>
</html>