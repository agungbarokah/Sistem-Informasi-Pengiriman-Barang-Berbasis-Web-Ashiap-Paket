<?php
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$password_baru = $_POST['password_baru'];

// Update data 
mysqli_query($koneksi, "UPDATE admin set password='$password_baru'");

// Mengalihkan halaman kembali ke halaman pelanggan
header("location:ganti_password.php");
?>