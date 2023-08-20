<?php
// Menghubungkan dengan koneksi
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$tgl_hari_ini = date('Y-m-d');
$pengirim = $_POST['pengirim'];
$penerima = $_POST['penerima'];
$tujuan = $_POST['tujuan'];
$berat = $_POST['berat'];
$status = 0;

// Mengambil data harga per kilo dari database
$h = mysqli_query($koneksi,"SELECT harga_perkilo FROM harga");
$harga_per_kilo = mysqli_fetch_assoc($h);

// Menghitung harga laundry, harga perkilo x berat cucian
$harga = $berat * $harga_per_kilo['harga_perkilo'];

// Input data ke tabel transaksi
mysqli_query($koneksi,"INSERT INTO pengiriman VALUES('','$tgl_hari_ini','$pengirim','$penerima','$tujuan','$berat','$harga','$status')");

// Menyimpan id dari data yang disimpan pada query insert data sebelumnya
$id_terakhir = mysqli_insert_id($koneksi);

// Menangkap data form input array (jenis pakaian dan jumlah pakaian)
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$jumlah_barang = $_POST['jumlah_barang'];

//Input data cucian berdasarkan id transaksi (invoice) ke tabel pakaian
for($x=0; $x<count($nama_barang); $x++){
    if($nama_barang[$x] != ""){
        mysqli_query($koneksi,"INSERT INTO barang VALUES('','$id_terakhir','$nama_barang[$x]','$jenis_barang[$x]','$jumlah_barang[$x]')");

    }
}
header("location:pengiriman.php");
?>