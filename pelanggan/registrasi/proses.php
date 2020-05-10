<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['register'])) {
        $uuid = Uuid::uuid4()->toString();
        $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
        $noken = trim(mysqli_real_escape_string($con, $_POST['noken']));
        $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
        $password = trim(mysqli_real_escape_string($con, $_POST['password']));
        $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
        $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
        $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
        $sql_cek_identitas = mysqli_query($con, "SELECT nama_pengunjung FROM tb_pengunjung WHERE nama_pengunjung = '$nama'") or die (mysqli_error($con));
        if(mysqli_num_rows($sql_cek_identitas)){
            echo "<script>alert('Nomor identitas sudah pernah diinput!'); window.location='registrasi.php';</script>";
        return false;

        }


        mysqli_query($con, "INSERT INTO tb_pengunjung (id_pengunjung, nomor_identitas, nomor_kendaraan, nama_pengunjung, password, jenis_kelamin, alamat, no_telp) 
                            VALUES ('$uuid', '$identitas', '$noken', '$nama', '$password', '$jk','$alamat','$telp')") or die (mysqli_error($con));
        echo "<script>window.location='login.php';</script>";
        
    
    } 

?>