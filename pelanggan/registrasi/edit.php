<?php include_once('../_header.php');?>

<div class="box">
    <h1>Pengunjung</h1>
        <h4>
            <small>Edit Data Pengunjung</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_pengunjung = mysqli_query($con, "SELECT * FROM tb_pengunjung WHERE id_pengunjung = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_pengunjung);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="hidden" name="id" value="<?= $data['id_pengunjung']?>">
                        <input type="number" name="identitas" id="identitas" class="form-control" value="<?=$data['nomor_identitas']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="noken">Nomor Kendaraan</label>
                        <input type="text" name="noken" id="noken" class="form-control" value="<?=$data['nomor_kendaraan']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pengunjung</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?=$data['nama_pengunjung']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label for="" class="radio-inline"> 
                                <input type="radio" name="jk" id="jk" value="L" required <?=$data['jenis_kelamin'] == "L" ? "checked" : null ?>> Laki-laki
                            </label>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" <?=$data['jenis_kelamin'] == "P" ? "checked" : null ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="<?=$data['no_telp']?>" required></input>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>

<?php include_once('../_footer.php'); ?>
