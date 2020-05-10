<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <h1 class="text-center">Halaman Login Pengunjung</h1>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="cek_login.php" method="post">
                    <div class="form-group">
                        <label for="nama_pengunjung">Nama Pengunjung</label>
                        <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="form-control" required autocomplete="off" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="login" value="Login" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>

</body>
</html>



 