<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

if( isset ($_POST["register"]) > 0 ){

    // if( register($_POST) > 0){
        echo "<script>
                alert('user baru berhasil ditambahkan!')
                </script>";
    }else{
        echo mysqli_error($con);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Jasa Service</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>/_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/libs/DataTables/datatables.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/_assets/js/jquery.js" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/_assets/yukcoding.png">
    <title>Document</title>
<!-- 
    <style>
        .box{
            margin-right: 10px;
        }
    </style> -->
</head>
<body>
       <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
    
<div class="container box">
    <h1 class="text-center">Halaman Registrasi Pengunjung</h1>
        <h4>
            <h4 class="text-center">Tambah Data Pengunjung</h4>
            <div class="pull-right">
                <p>Sudah Pernah Registrasi ? Silahkan Login</p>
                <a href="data.php" class="btn btn-warning btn-md"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
                <a href="login.php" class="btn btn-primary btn-md"><i class="glyphicon glyphicon-chevron-user"></i>Login Pelanggan</a>
            </div>
        </h4>
        <div class="container row">
            <div class="col-lg-6 col-lg-offset-3">
                
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required autofocus></input>
                    </div>
                    <div class="form-group">
                        <label for="noken">Nomor Kendaraan</label>
                        <input type="text" name="noken" id="noken" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pengunjung</label>
                        <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <div>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required> Laki-laki
                            </label>
                            <label for="" class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" required> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="number" name="telp" id="telp" class="form-control" required></input>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="register" value="Registrasi" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>

</body>
</html>




 