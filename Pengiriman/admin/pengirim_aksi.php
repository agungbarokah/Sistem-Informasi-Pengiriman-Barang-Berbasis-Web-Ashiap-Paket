<?php
include '../koneksi.php';

// Menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

// Input data ke tabel pelanggan
mysqli_query($koneksi, "INSERT into pengirim values('', '$nama','$hp','$alamat')");

header("location:pengirim.php");
?>