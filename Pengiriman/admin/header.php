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
<body style="background-image:url('Background.jpg'); background-size: cover; height: 100vh;">
    <!-- Memeriksa apakah sudah login -->
    <?php
    session_start();
    if ($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
    ?>
    <?php date_default_timezone_set('Asia/Jakarta'); ?>

    <!-- Menu navigasi -->
    <nav class="navbar navbar-dark" style="background-color:#FFFC87;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#\bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ASHIAP PAKET</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="pengirim.php"><i class="glyphicon glyphicon-user"></i> Pengirim</a></li>
                    <li><a href="pengiriman.php"><i class="glyphicon glyphicon-random"></i> Pengiriman</a></li>
                    <li><a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i> Laporan</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-wrench"></i> Pengaturan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="harga.php"><i class="glyphicon glyphicon-usd"></i> Pengaturan Harga</a></li>
                            <li><a href="ganti_password.php"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text"><b><?php echo date('l, d / m / Y H:i:s A');?></b></p></li>
                    <li><p class="navbar-text">Halo, <b><?php echo $_SESSION['username']; ?></b> !</p></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir menu navigasi -->