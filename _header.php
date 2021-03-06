<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";
//jika tidak ada sesion di redirect ke login jika ada langsung ke html


if(!isset($_SESSION['user'])){
    echo "<script>window.location='".base_url('dashboard')."';</script>";

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
                    <a href="<?=base_url('dashboard')?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?=base_url('pengunjung/data.php')?>">Data Pengunjung</a>
                </li>
                <li>
                    <a href="<?=base_url('mekanik/data.php')?>">Data Mekanik</a>
                </li>
                <li>
                    <a href="<?=base_url('status/data.php')?>">Data Status</a>
                </li>
                <li>
                    <a href="<?=base_url('perbaikan/data.php')?>">Data Harga Perbaikan</a>
                </li>
                <li>
                    <a href="<?=base_url('rekam_perbaikan/data.php')?>">Rekaman Perbaikan</a>
                </li>
                <li>
                    <a href="<?=base_url('auth/logout.php')?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <!-- <div class="container"> -->
            <!-- <div class="col-lg-12"> -->
        <a href="#menu-toggle" class="btn btn-primary btn-sm" id="menu-toggle">Menu Utama</a>
         <!-- </div> -->

