<?php include_once('../_header.php');?>

    <div class="box">
        <h1>Mekanik</h1>
        <h4>
            <small>Data Mekanik</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"> Refresh</i></a>
                <!-- <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mekanik</a> -->
            </div>
        </h4>
        <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="mekanik">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama mekanik</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                   $sql_mekanik = mysqli_query($con,"SELECT * FROM tb_mekanik") or die (mysqli_error($con));
                    while($data= mysqli_fetch_array($sql_mekanik)){?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['nama_mekanik']?></td>
                        <td><?=$data['spesialis']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['no_telp']?></td>
                        <td align="center"><img src="../_file/<?= $data['gambar'];?>" width="100px" alt=""></td>
                    </tr>
                    <?php
                       }
                   ?>
                </tbody>
            </table>
        </div>
        </form>
    </div>

<?php include_once('../_footer.php'); ?>