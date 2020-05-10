<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";
//jika tidak ada sesion di redirect ke login jika ada langsung ke h

if(!isset($_SESSION['registrasi'])){
    // echo "<script>window.location='".base_url('dashboard')."';</script>";

}

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
</head>

<body>
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
    
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=""><span class="text-primary">Service Motor</span></a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/registrasi/data.php')?>">Data Pengunjung</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/mekanik/data.php')?>">Daftar Mekanik</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/status/data.php')?>">Data Status</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/perbaikan/data.php')?>">Daftar Harga Perbaikan</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/rekam_perbaikan/data.php')?>">Rekaman Perbaikan</a>
                </li>
                <li>
                    <a href="<?=base_url('pelanggan/auth/logout.php')?>"><span class="text-danger">Keluar</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <!-- <div class="container"> -->
            <!-- <div class="col-lg-12"> -->
        <a href="#menu-toggle" class="btn btn-primary btn-sm" id="menu-toggle">Menu Utama</a>
         <!-- </div> -->

