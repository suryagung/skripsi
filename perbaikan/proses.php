<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    $harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
    mysqli_query($con, "INSERT INTO tb_perbaikan (id_perbaikan, nama_perbaikan, ket_perbaikan, harga_perbaikan) VALUES ('$uuid', '$nama', '$ket', '$harga')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    $harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
    mysqli_query($con, "UPDATE tb_perbaikan SET nama_perbaikan = '$nama', ket_perbaikan = '$ket', harga_perbaikan = '$harga' WHERE id_perbaikan = '$id'") or die (mysqli_error($con));
    
    echo "<script>window.location='data.php';</script>";
}



?>