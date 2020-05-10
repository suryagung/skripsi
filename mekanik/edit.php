<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Mekanik</h1>
        <h4>
            <small>Edit Data Mekanik</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_mekanik = mysqli_query($con, "SELECT * FROM tb_mekanik WHERE id_mekanik = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_mekanik);
                ?>
                <form action="proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Mekanik</label>
                        <input type="hidden" name="id" value="<?=$data['id_mekanik']?>">
                        <input type="hidden" name="gambarLama" value="<?=$data["gambar"]?>">
                        <input type="text" name="nama" id="nama" value="<?=$data['nama_mekanik']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" value="<?=$data['spesialis']?>" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp" id="telp"  value= "<?=$data['no_telp']?>" class="form-control" required></input>
                    </div><div class="form-group">
                        <label for="gambar">Foto</label>
                        <img src="../_file/<?= $data['gambar']?>" width="60" alt="">
                        <input type="file" name="gambar" id="gambar" class="form-control"></input>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>

<?php include_once('../_footer.php'); ?>
