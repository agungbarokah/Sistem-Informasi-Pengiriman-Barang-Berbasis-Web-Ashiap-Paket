<?php
// Menghubungkan dengan koneksi
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$pengirim = $_POST['pengirim'];
$penerima = $_POST['penerima'];
$tujuan = $_POST['tujuan'];
$berat = $_POST['berat'];
$status = $_POST['status'];

// Mengambil data harga per kilo dari database
$h = mysqli_query($koneksi,"SELECT harga_perkilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);

// Menghitung harga laundry, harga perkilo x berat cucian
$harga = $berat * $harga_per_kilo['harga_perkilo'];

// Update data transaksi
mysqli_query($koneksi,"UPDATE pengiriman SET pengiriman_pengirim='$pengirim', pengiriman_penerima='$penerima', pengiriman_tujuan='$tujuan', pengiriman_berat='$berat', pengiriman_harga='$harga', pengiriman_status='$status' WHERE pengiriman_id='$id'");

// Menangkap data form input array (jenis pakaian dan jumlah pakaian)
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

// Menghapus semua pakaian dalam transaksi ini
mysqli_query($koneksi,"DELETE FROM barang WHERE barang_pengiriman='$id'");

//Input ulang data cucian berdasarkan id transaksi (invoice) ke tabel pakaian
for($x=0; $x<count($nama_barang); $x++){
    if($nama_barang[$x] != ""){
        mysqli_query($koneksi,"INSERT INTO barang VALUES('','$id','$nama_barang[$x]','$jenis_barang[$x]','$jumlah_barang[$x]')");

    }
}
header("location:pengiriman.php");
?>