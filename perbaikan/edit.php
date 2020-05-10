<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Perbaikan</h1>
        <h4>
            <small>Edit Data Perbaikan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_perbaikan = mysqli_query($con, "SELECT * FROM tb_perbaikan WHERE id_perbaikan = '$id'") or die (mysqli_error($con));
            $data = mysqli_fetch_array(($sql_perbaikan));
            ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Perbaikan</label>
                        <input type="hidden" name="id" value="<?=$data['id_perbaikan']?>">
                        <input type="text" name="nama" value="<?=$data['nama_perbaikan']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" required><?=$data['ket_perbaikan']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Perbaikan</label>
                        <input type="number" name="harga" id="harga" class="form-control" value="<?=$data['harga_perbaikan']?>"  required></input>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>

<?php include_once('../_footer.php'); ?>
