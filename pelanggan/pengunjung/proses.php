<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $noken = trim(mysqli_real_escape_string($con, $_POST['noken']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pengunjung WHERE nama_pengunjung = '$_SESSION[nama_pengunjung]' and password = '$_SESSION[password]' ") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0){
        echo "<script>alert('Nomor identitas sudah pernah diinput!'); window.location='add.php';</script>";
    } else {
    mysqli_query($con, "INSERT INTO tb_pengunjung (id_pengunjung, nomor_identitas, nomor_kendaraan, nama_pengunjung, jenis_kelamin, alamat, no_telp) 
                        VALUES ('$uuid', '$identitas', '$noken', '$nama', '$jk','$alamat','$telp')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $noken = trim(mysqli_real_escape_string($con, $_POST['noken']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pengunjung 
                                            WHERE nomor_identitas = '$identitas'
                                            AND id_pengunjung != '$id'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0){
        echo "<script>alert('Nomor identitas sudah pernah diinput!'); window.location='edit.php?id=$id';</script>";
    } else {
    mysqli_query($con, "UPDATE tb_pengunjung SET nomor_identitas = '$identitas', nomor_kendaraan = '$noken', 
                        nama_pengunjung = '$nama', jenis_kelamin = '$jk', alamat = '$alamat', 
                        no_telp = '$telp' WHERE id_pengunjung = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
    }
} else if(isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-".round(microtime(true)).".".end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir.$file_name;
    $upload = move_uploaded_file($sumber, $target_file);
  
    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    // echo $all_data[3]['A'];
    $sql = "INSERT INTO tb_pengunjung (id_pengunjung, nomor_identitas, nomor_kendaraan, nama_pengunjung,
            jenis_kelamin, alamat, no_telp) VALUES";
    for ($i=3; $i <= count($all_data) ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $no_id = $all_data[$i]['A'];
        $noken = $all_data[$i]['B'];
        $nama = $all_data[$i]['C'];
        $jk = $all_data[$i]['D'];
        $alamat = $all_data[$i]['E'];
        $telp = $all_data[$i]['F'];
        $sql .= "('$uuid', '$no_id', '$noken', '$nama', '$jk', '$alamat', '$telp'),";

    }   
    $sql = substr($sql, 0, -1);
    echo $sql;
    mysqli_query($con, $sql) or die (mysqli_error($con));

    unlink($target_file);
    echo "<script>window.location='data.php';</script>";

}
?>  