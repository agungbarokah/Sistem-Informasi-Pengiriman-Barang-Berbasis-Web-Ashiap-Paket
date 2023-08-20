<?php
// Menghubungkan koneksi
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// Update data 
mysqli_query($koneksi, "UPDATE pengirim set nama_pengirim='$nama', hp_pengirim='$hp', alamat_pengirim='$alamat' WHERE id_pengirim='$id'");

// Mengalihkan halaman kembali ke halaman pelanggan
header("location:pengirim.php");
?>