<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));

    $gambar = upload();
    if( !$gambar){
        return false;
    }

    mysqli_query($con, "INSERT INTO tb_mekanik (id_mekanik, nama_mekanik, spesialis, alamat, no_telp, gambar) VALUES ('$uuid', '$nama', '$spesialis','$alamat','$telp','$gambar')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";

} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $gambarLama = trim(mysqli_real_escape_string($con, $_POST["gambarLama"]));

    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    mysqli_query($con,"UPDATE tb_mekanik SET nama_mekanik = '$nama',
                        spesialis = '$spesialis', alamat = '$alamat', 
                        no_telp = '$telp', gambar = '$gambar' WHERE id_mekanik = '$id'") or die (mysqli_error($con));
    
    echo "<script>window.location='data.php';</script>";
}

function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4){
        echo "<script>
            alert('pilih gambar terlebih dahulu!');
            </script>";
            return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    //dari comen yt
    //$format = pathinfo($namaFile, PATHINFO_EXTENSION); 
    //$format menyimpan ekstensi file.
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
//dari coment yt
    // $ekstensiFile = [' > 1500000 ' ];
    // if(in_array($ukuranFile , $ekstensiFile )) {
    //     echo "<script>
    //         alert('ukuran gambar terlalu besar !');
    //     </script>";
    //     return false;
    // }

    if( $ukuranFile > 2000000){
        echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>";
            return false;
    }

// lolos pengecekan, gambar siap diupload
//generate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;

// var_dump($namaFileBaru);die;

    move_uploaded_file($tmpName, '../_file/' . $namaFileBaru);

    return $namaFileBaru;


}


?>