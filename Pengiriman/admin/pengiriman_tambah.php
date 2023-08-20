<?php include 'header.php'; ?>

<?php
// Koneksi Database
include '../koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Pengiriman Barang Baru</h4>
        </div>
        <div class="panel-body">

            <div class="col-md-8 col-md-offset-2">
                <a href="pengiriman.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>
                <form method="post" action="pengiriman_aksi.php">
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
                                <option value="<?php echo $d['id_pengirim']; ?>"><?php echo $d['nama_pengirim']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penerima</label>
                        <input type="text" class="form-control" name="penerima" placeholder="Masukkan nama penerima ..." required="required">
                    </div>
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" class="form-control" name="tujuan" placeholder="Masukkan tujuan penerima ..." required="required">
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" class="form-control" name="berat" placeholder="Masukkan berat paket ..." required="required">
                    </div>
                    <br/>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th width="20%">Jumlah</th>
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

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>