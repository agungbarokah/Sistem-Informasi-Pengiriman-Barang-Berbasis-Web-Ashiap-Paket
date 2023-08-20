<?php include 'header.php'; ?>

<div class="container">
    <br/><br/><br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pengirim</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';

                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM pengirim WHERE id_pengirim='$id'");
                while($d = mysqli_fetch_array($data)){?>
                    <form method="post" action="pengirim_update.php">
                        <div class="form-group">
                            <label>Nama</label>
                            <!-- Form id pelanggan yang di edit, untuk di kirim ke file aksi -->
                            <input type="hidden" name="id" value="<?php echo $d['id_pengirim']; ?>">
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama ..." value="<?php echo $d['nama_pengirim']; ?>">
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="number" class="form-control" name="hp" placeholder="Masukkan no.hp ..." value="<?php echo $d['hp_pengirim']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat ..." value="<?php echo $d['alamat_pengirim']; ?>">
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                    <?php }?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>