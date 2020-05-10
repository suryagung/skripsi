<?php

session_start();


// require 'functions.php';
require 'functions.php';

// $databayi = query("SELECT * FROM tb_pengunjung ORDER BY id DESC");
$databayi = query("SELECT * FROM tb_pengunjung where nama_pengunjung = '$_SESSION[nama_pengunjung]' and password = '$_SESSION[password]' ");
// print_r($databayi);


// echo 'ini hasil nya '. $databayi;

// var_dump($databayi);


// echo $databayi[0]['namabayi'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Databayi</title>

    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins&display=swap');

        body {
            background: #f2f2f2;
            font-family: 'Poppins', sans-serif;
        }

        h3,
        h1 {
            font-family: 'Poppins', sans-serif;
        }

        .fa {
            color: #4183D7;
            color: black;
        }

        .table-responsive {
            padding: 20px;
        }

        th {
            text-align: center;
        }

        .aksi {
            padding: 20px;
            margin: 10px;

            /* float: right; */
            /* color: #4183D7; */
            /* background-color: blanchedalmond; */
        }

        .bg {
            background-color: #3282b8;
        }

        footer {
            align-items: center;
            align-content: center;
        }

        .bg-4 {
            background-color: #2f2f2f;
            color: #ffffff;
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-ligh bg">
        <a class="navbar-brand">e-Posyandu</a>
        <form class="form-inline">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">
                <a href="logout.php"> Logout</a>
            </button>
        </form>
    </nav>
    <br>

    


    <h3 class="display-4 text-center">Selamat Datang Di Halaman Data Bayi</h3>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No. </th>
                <!-- <th>Aksi</td> -->
                <td>Nama Bayi</td>
                <td>Nama Ibu Bayi</td>
                <td>Nama Bapak Bayi</td>
                <TD>Alamat</TD>
                <TD>Tempat Tanggal Lahir</TD>
                <td>Berat Badan</td>
                <td>Tinggi Badan</td>
                <td>Bulan Vaksin</td>
                <td>Jenis Vaksin</td>
                <td>Tanggal Vaksin</td>
                <td>Keterangan</td>

            </tr>

            <?php $i = 1; ?>
            <?php foreach ($databayi as $bayi) : ?>
                <tr>
                    <th><?= $i ?></th>

                    <td><?= $bayi["nama_pengunjung"]; ?></td>
                    <td><?= $bayi["password"]; ?></td>
                    <td><?= $bayi["nomor_kendaraan"]; ?></td>
                    <td><?= $bayi["nama_pengunjung"]; ?></td>
                    <td><?= $bayi["jenis_kelamin"]; ?></td>
                    <td><?= $bayi["alamat"]; ?></td>
                    <td><?= $bayi["no_telp"]; ?></td>



                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <br>
    <footer class="container-fluid bg-4 text-center">
        <p>e-Posyandu - 2020</p>
    </footer>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>