<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Pengirim</h4>
        </div>
        <div class="panel-body">
            <a href="pengirim_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br/>
            <br/>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th width="15%">AKSI</th>
                </tr>
        
        <?php
        include "../koneksi.php";
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengirim order by nama_pengirim asc");
        while ($d = mysqli_fetch_array($query)) {
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_pengirim']; ?></td>
                    <td><?php echo $d['hp_pengirim']; ?></td>
                    <td><?php echo $d['alamat_pengirim']; ?></td>
                    <td>
                        <a href="pengirim_edit.php?id=<?php echo $d['id_pengirim']; ?>" class="btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="pengirim_hapus.php?id=<?php echo $d['id_pengirim']; ?>" class="btn-sm btn-danger" onclick="return confirm('Yakin akan dihapus?')"><span class="glyphicon glyphicon-trash"></span></a>
                </tr>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>