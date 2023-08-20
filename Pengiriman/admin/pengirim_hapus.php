<?php
// Menghubungkan koneksi
include '../koneksi.php';

// Menangkap data id yang dikirim dari url
$id = $_GET['id'];

// Menghapus pelanggan
mysqli_query($koneksi, "DELETE FROM pengirim WHERE id_pengirim='$id'");

// Mengalihkan halaman ke halaman pelanggan
header("location:pengirim.php");
?>