<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i=1; $i<=$total; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama'.$i]));  
        $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan'.$i]));
        $sql = mysqli_query($con, "INSERT INTO tb_status (id_status, nama_status, keterangan) VALUES ('$uuid', '$nama', '$keterangan')") or die (mysqli_error($con));
    }
    if($sql){
        echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generate.php';</script>";

    }
    
} else if(isset($_POST['edit'])) {
    for ($i=0; $i<count($_POST['id']); $i++) { 
        $id = $_POST['id'][$i];
        $nama = $_POST['nama'][$i];
        $keterangan = $_POST['keterangan'][$i];
        $sql = mysqli_query($con, "UPDATE tb_status SET nama_status = '$nama', keterangan = '$keterangan' WHERE id_status = '$id'") or die (mysqli_error($con));
    }
    echo "<script>alert('Data berhasil di update'); window.location='data.php';</script>";

}



?>