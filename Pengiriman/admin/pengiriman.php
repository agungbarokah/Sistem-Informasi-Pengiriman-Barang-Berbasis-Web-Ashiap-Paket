<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Pengiriman Barang</h4>
        </div>
        <div class="panel-body">
            <a href="pengiriman_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br/>
            <br/>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Tujuan</th>
                    <th>Berat (Kg)</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="20%">OPSI</th>
                </tr>

                <?php
                // Koneksi Database
                include '../koneksi.php';
                // Mengambil data pelanggan dari Database
                $data = mysqli_query($koneksi,"SELECT * FROM pengirim, pengiriman WHERE pengiriman_pengirim=id_pengirim ORDER BY pengiriman_id DESC");
                $no = 1;
                // Mengubah data ke array dan menampilkannya dengan perulangan while
                while($d = mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>KRM00372315<?php echo $d['pengiriman_id']; ?></td>
                        <td><?php echo $d['pengiriman_tgl']; ?></td>
                        <td><?php echo $d['nama_pengirim']; ?></td>
                        <td><?php echo $d['pengiriman_penerima']; ?></td>
                        <td><?php echo $d['pengiriman_tujuan']; ?></td>
                        <td><?php echo $d['pengiriman_berat']; ?></td>
                        <td><?php echo "Rp. ".number_format($d['pengiriman_harga']) ." ,-"; ?></td>
                        <td>
                            <?php
                            if($d['pengiriman_status']=="0"){
                                echo "<div class='label label-warning'>PROSES</div>";
                            }else if($d['pengiriman_status']=="1"){
                                echo "<div class='label label-info'>DIKIRIM</div>";
                            }else if($d['pengiriman_status']=="2"){
                                echo "<div class='label label-success'>DITERIMA</div>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="pengiriman_invoice_cetak.php?id=<?php echo $d['pengiriman_id']; ?>" target="_blank" class="btn-sm btn-info"><span class="glyphicon glyphicon-print"></span></a>
                            <a href="pengiriman_edit.php?id=<?php echo $d['pengiriman_id']; ?>" class="btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>