<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Service Motor</title>
    <!-- Bootstrap Core CSS -->
    <link href="_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="_assets/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="_assets/yukcoding.png">
</head>

<body>
    <div class="wrapper container">
        <div class="container">
            <div align="center" style="margin-top: 200px;">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4">
                                <div class="alert alert-warning" role="alert">
                                    <p>Selamat Datang Di Bengkel Kami</p>
                                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                                    <strong>Masuk Sebagai Pelanggan atau Admin ?</strong><br><br>
                                    <div class="input-group">
                                        <a href="pelanggan/registrasi/registrasi.php" class="btn btn-info btn-lg"><i class="glyphicon glyphicon-user"></i> Pelanggan</a>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <a href="index2.php" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-cog"></i> Admin Bengkel</a>
                                    </div>
                                </div>
                            </div>
                        </div>        
            </div>
        </div>
    </div>
    

    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
</body>
</html>

