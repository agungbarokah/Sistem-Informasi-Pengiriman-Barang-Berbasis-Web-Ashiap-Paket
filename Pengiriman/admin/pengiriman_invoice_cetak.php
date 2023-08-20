<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pengiriman Barang - Pemrograman Web Dasar</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
    <!-- Cek apakah sudah login -->
    <?php
    session_start();
    if ($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <?php
    include '../koneksi.php';
    ?>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <?php
            // Menangkap id yang dikirim melalui url
            $id = $_GET['id'];
            // Mengambil data pelanggan yang ber id di atas dari tabel pelanggan
            $pengiriman = mysqli_query($koneksi,"SELECT * FROM pengiriman, pengirim WHERE pengiriman_id='$id' AND pengiriman_pengirim=id_pengirim");
            while($t = mysqli_fetch_array($pengiriman)){
                ?>
                <br/>
                <table class="table" border="1">
                    <tr>
                        <td colspan="2" width="60%"><center><img src="php-barcode-master/barcode.php?text=KRM00372315&print=true&size=45" width="300"></td>
                        <td rowspan="2">Tanggal :
                                        <br><?php echo $t['pengiriman_tgl']; ?>
                                        <br>Alamat Pengirim :
                                        <br><?php echo $t['alamat_pengirim']; ?>
                                        <br>Berat :
                                        <br><?php echo $t['pengiriman_berat']." Kg"; ?>
                                        <br>Biaya Kirim :
                                        <br><?php echo "Rp. ".number_format($t['pengiriman_harga']) ." ,-"; ?>
                                        <br>Alamat Penerima :
                                        <br><?php echo $t['pengiriman_tujuan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%"><center><img src="logo.png" width="150" height="150"></td>
                        <td>Pengirim :
                            <br><?php echo $t['nama_pengirim']; ?>
                            <br>
                            <br>Penerima :
                            <br><?php echo $t['pengiriman_penerima']; ?>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>