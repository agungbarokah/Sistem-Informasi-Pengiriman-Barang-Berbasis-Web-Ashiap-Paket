<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Rekap Data Laporan</h4>
        </div>

        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <br/>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <br/>
                            <input type="date" name="tgl_sampai" class="form-control">
                        </td>
                        <td>
                            <br/>
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br/>

    <?php
    if(isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])){
        $dari = $_GET['tgl_dari'];
        $sampai = $_GET['tgl_sampai'];

    ?>
        <div class="panel">
            <div class="panel-heading">
                <h4>Data Laporan Pengiriman "ASHIAP PAKET" dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="panel-body">
                <a target="_blank" href="laporan_cetak.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
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
                </tr>
                <?php

                include "../koneksi.php";
                $data = mysqli_query($koneksi,"SELECT * FROM pengirim, pengiriman WHERE pengiriman_pengirim=id_pengirim AND date(pengiriman_tgl) >= '$dari' AND date(pengiriman_tgl) <= '$sampai' ORDER BY pengiriman_id DESC");
                $no=1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
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
                    </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>