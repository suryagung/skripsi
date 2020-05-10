<?php
include_once('../_header.php');

require 'functions.php';
$datadata = query("SELECT * FROM tb_pengunjung where nama_pengunjung = '$_SESSION[nama_pengunjung]' and password = '$_SESSION[password]' ");

?>
    <div class="box">
        <h1>Pengunjung</h1>
        <h4>
            <small>Data Pengunjung</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"> Refresh</i></a>
                <!-- <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mekanik</a> -->
            </div>
        </h4>
        <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pengunjung">
                <thead>
            <tr>
                <th>No</th>
                <th>Nomor Identitas</th>
                <th>Nomor Kendaraan</th>
                <th>Nama Pengunjung</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th><i class="glyphicon glyphicon-cog"></i></th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($datadata as $data) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $data["nomor_identitas"]; ?></td>
                    <td><?= $data["nomor_kendaraan"]; ?></td>
                    <td><?= $data["nama_pengunjung"]; ?></td>
                    <td><?= $data["jenis_kelamin"];?></td>
                    <td><?= $data["alamat"]; ?></td>
                    <td><?= $data["no_telp"]; ?></td>
                    <td align="center">
                            <a href="edit.php?id=<?=$data['id_pengunjung']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="del.php?id=<?=$data['id_pengunjung']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>


                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
        </form>
        <div>
            
        </div>
    </div>

    <?php include_once('../_footer.php'); ?>