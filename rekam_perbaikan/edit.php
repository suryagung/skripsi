<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Edit Rekam Perbaikan</h1>
        <h4>
            <small>Tambah Rekam Perbaikan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_rp = mysqli_query($con, "SELECT * FROM tb_status WHERE nama_status  = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_rp);
                ?>
                <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Dalam Antrian" <?php if($data['nama_status'] == 'Dalam Antrian') { echo 'selected'; }?>>Dalam Antrian</option>
                        <option value="Sedang Dikerjakan YA" <?php if($data['nama_status'] == 'Sedang Dikerjakan YA') { echo 'selected'; }?>>Sedang Dikerjakan YA</option>
                        <option value="Sudah Selesai" <?php if($data['nama_status'] == 'Sudah Selesai') { echo 'selected'; }?>>Sudah Selesai</option>
                    </select>
    </div>
              
                    <!-- <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" value= "<?=$data['nama_status']?>" class="form-control" required></input>
                    </div> -->
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                <script>

            </script>
            </div>
        </div>
</div>

<?php include_once('../_footer.php'); ?>
