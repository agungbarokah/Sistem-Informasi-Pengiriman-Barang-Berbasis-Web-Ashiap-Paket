<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Pengiriman Barang</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="pengiriman.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/><br/>
                <?php
                // Menangkap id yang dikirim melalui url
                $id = $_GET['id'];

                // Mengambil data pelanggan yang ber id di atas dari tabel pelanggan
                $pengiriman = mysqli_query($koneksi,"SELECT * FROM pengiriman WHERE pengiriman_id='$id'");
                while($t = mysqli_fetch_array($pengiriman)){ ?>
                    <form method="post" action="pengiriman_update.php">
                        <!-- Menyimpan id transaksi yang di edit dalam from hidden berikut -->
                        <input type="hidden" name="id" value="<?php echo $t['pengiriman_id']; ?>">
                        <div class="form-group">
                            <label>Pengirim</label>
                            <select class="form-control" name="pengirim" required="required">
                                <option value="">- Pilih Pengirim</option>
                                <?php
                                // Mengambil data pelanggan dari Database
                                $data = mysqli_query($koneksi,"SELECT * FROM pengirim");
                                // Mengubah data ke array dan menampilkannya dengan perulangan while
                                while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <option <?php if($d['id_pengirim']==$t['pengiriman_pengirim']){echo "selected='selected'";} ?> value="<?php echo $d['id_pengirim']; ?>"><?php echo $d['nama_pengirim']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Penerima</label>
                            <input type="text" class="form-control" name="penerima" placeholder="Masukkan nama penerima ..." required="required" value="<?php echo $t['pengiriman_penerima']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" placeholder="Masukkan tujuan penerima ..." required="required" value="<?php echo $t['pengiriman_tujuan']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Berat</label>
                            <input type="number" class="form-control" name="berat" placeholder="Masukkan berat paket ..." required="required" value="<?php echo $t['pengiriman_berat']; ?>">
                        </div>
                        <br/>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama Barang
                                <th>Jenis Barang</th>
                                <th width="20%">Jumlah</th>
                            </tr>
                            <?php
                            // Menyimpan id transaksi ke variabel id_transaksi
                            $id_pengiriman = $t['pengiriman_id'];
                            // Menampilkan pakaian-pakaian dari transaksi yang ber id di atas
                            $barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE barang_pengiriman='$id_pengiriman'");

                            while($b = mysqli_fetch_array($barang)){
                                ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="nama_barang[]" value="<?php echo $b['barang_nama']; ?>"></td>
                                    <td>
                                        <select class="form-control" name="jenis_barang[]" required="required">
                                            <option <?php if($b['barang_jenis']=="1"){echo "selected='selected'";} ?> value="1">Mudah Pecah</option>
                                            <option <?php if($b['barang_jenis']=="2"){echo "selected='selected'";} ?> value="2">Tidak Mudah Pecah</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="jumlah_barang[]" value="<?php echo $b['barang_jumlah']; ?>"></td>
                                </tr>
                            <?php } ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="nama_barang[]"></td>
                                    <td>
                                        <select class="form-control" name="jenis_barang[]" required="required">
                                            <option value="1">Mudah Pecah</option>
                                            <option value="2">Tidak Mudah Pecah</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="nama_barang[]"></td>
                                    <td>
                                        <select class="form-control" name="jenis_barang[]" required="required">
                                            <option value="1">Mudah Pecah</option>
                                            <option value="2">Tidak Mudah Pecah</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="nama_barang[]"></td>
                                    <td>
                                        <select class="form-control" name="jenis_barang[]" required="required">
                                            <option value="1">Mudah Pecah</option>
                                            <option value="2">Tidak Mudah Pecah</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="nama_barang[]"></td>
                                    <td>
                                        <select class="form-control" name="jenis_barang[]" required="required">
                                            <option value="1">Mudah Pecah</option>
                                            <option value="2">Tidak Mudah Pecah</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" name="jumlah_barang[]"></td>
                                </tr>
                        </table>

                        <div class="form-group alert alert-info">
                            <label>Status</label>
                            <select class="form-control" name="status" required="required">
                                <option <?php if($t['pengiriman_status']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>
                                <option <?php if($t['pengiriman_status']=="1"){echo "selected='selected'";} ?> value="1">DIKIRIM</option>
                                <option <?php if($t['pengiriman_status']=="2"){echo "selected='selected'";} ?> value="2">DITERIMA</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>       
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>