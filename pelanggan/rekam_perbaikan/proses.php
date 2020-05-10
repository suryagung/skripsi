<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();

    $pengunjung = trim(mysqli_real_escape_string($con, $_POST['pengunjung']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $mekanik = trim(mysqli_real_escape_string($con, $_POST['mekanik']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $status = trim(mysqli_real_escape_string($con, $_POST['status']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    mysqli_query($con, "INSERT INTO tb_rekamperbaikan (id_rp, id_pengunjung, keluhan, id_mekanik, diagnosa, id_status, tgl_periksa) VALUES ('$uuid', '$pengunjung', '$keluhan', '$mekanik', '$diagnosa', '$status','$tgl')") or die (mysqli_error($con));
   
    $perbaikan = $_POST['perbaikan'];
    foreach ($perbaikan as $pb){
        mysqli_query($con, "INSERT INTO tb_rp_perbaikan (id_rp, id_perbaikan) VALUES ('$uuid', '$pb')") or die (mysqli_error($con));
}
    echo "<script>window.location='data.php';</script>";

}


?>