<?php include 'header.php'; ?>

<div class="container">
    <br/><br/><br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';

                // Mengambil data harga per kilo dari tabel harga
                $data = mysqli_query($koneksi, "SELECT password FROM admin");
                while($d = mysqli_fetch_array($data)){?>
                    <form method="post" action="ganti_password_update.php">
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" name="password_lama" value="<?php echo $d['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" placeholder="Masukkan password baru ...">
                        </div>
                        <br/>
                        <center><input type="submit" class="btn btn-primary" value="Ubah Password" onclick="return confirm('Yakin akan diubah?')">
                    </form>
                    <?php }?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>