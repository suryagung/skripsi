<?php 

$conn = mysqli_connect("localhost","root","","rumahservice");

function query($query){
    global $conn;
    $result = mysqli_query( $conn, $query );
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}



function add($data){
    global $conn;

    //stripslashes = untuk memasukkan teks / karaktek saja spasi maupun backslas tidak termasuk
    //untuk huruf kecil saja strtolower
    
    $identitas = trim(mysqli_real_escape_string($conn, $_POST['identitas']));
    $noken = trim(mysqli_real_escape_string($conn, $_POST['noken']));
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $password =htmlspecialchars( $data["password"]);
    $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($conn, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));


    $query = "INSERT INTO `tb_pengunjung` (`id_pengunjung`, `nomor_identitas`, `nomor_kendaraan`, `nama_pengunjung`, `password`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES ('NULL', '$identitas', '$noken', '$nama', '$password', '$jk', '$alamat', '$telp')";
    // INSERT INTO `tb_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `password`) VALUES (NULL, '$nama_pengunjung', '$password')


    mysqli_query($conn,$query);


    return mysqli_affected_rows($conn);

}



//tambah data bayi
function tambah($data){
    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    $namabayi =htmlspecialchars($data["namabayi"]);
    $password =htmlspecialchars( $data["password"]);
    $password = password_hash($password, PASSWORD_BCRYPT);  
    $ibubayi =htmlspecialchars( $data["ibubayi"]);
    $ayahbayi =htmlspecialchars( $data["ayahbayi"]);
    $alamat =htmlspecialchars( $data["alamat"]);
    $tempatlahir =htmlspecialchars( $data["tempatlahir"]);
    $beratbadan =htmlspecialchars( $data["beratbadan"]);
    $tinggibadan =htmlspecialchars( $data["tinggibadan"]);
    $bulan =htmlspecialchars( $data["bulan"]);
    $vaksin =htmlspecialchars( $data["vaksin"]);
    $tanggalvaksin =htmlspecialchars( $data["tanggalvaksin"]);
    $keterangan =htmlspecialchars( $data["keterangan"]);


   $query= " INSERT INTO `databayi`(`id`, `namabayi`, `password`, `ibubayi`, `ayahbayi`, `alamat`, `tempatlahir`, `beratbadan`, `tinggibadan`,  `bulan`, `vaksin`, `tangggalvaksin`, `keterangan`) VALUES  (NULL, '$namabayi', '$password', '$ibubayi', '$ayahbayi', '$alamat', '$tempatlahir', '$beratbadan', '$tinggibadan', '$bulan', '$vaksin', '$tanggalvaksin', '$keterangan' )";


    // $query = "INSERT INTO mahasiswa (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES (NULL, '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    // DELETE FROM `mahasiswa` WHERE `mahasiswa`.`id` = 14

    // $delete = "DELETE FROM `databayi` WHERE `databayi`.`id` = $id"; 
    $delete= "DELETE FROM databayi WHERE id =$id";
    mysqli_query($conn,$delete);
    return mysqli_affected_rows($conn);
}


function ubah($data){

    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    $id = $data["id"];

    $namabayi =htmlspecialchars($data["namabayi"]);
    $password =htmlspecialchars( $data["password"]);
    $password = password_hash($password, PASSWORD_BCRYPT);  
    $ibubayi =htmlspecialchars( $data["ibubayi"]);
    $ayahbayi =htmlspecialchars( $data["ayahbayi"]);
    $alamat =htmlspecialchars( $data["alamat"]);
    $tempatlahir =htmlspecialchars( $data["tempatlahir"]);
    $beratbadan =htmlspecialchars( $data["beratbadan"]);
    $tinggibadan =htmlspecialchars( $data["tinggibadan"]);
    $bulan =htmlspecialchars( $data["bulan"]);

    $vaksin =htmlspecialchars( $data["vaksin"]);
    // $tanggalvaksin =htmlspecialchars( $data["tanggalvaksin"]);
    $keterangan =htmlspecialchars( $data["keterangan"]);


    //upload gambar
    // $gambar = upload();
    // if ( !$gambar ) {
    //     return false;
    // }

    // UPDATE `databayi` SET `namabayi` = 'a12' WHERE `databayi`.`id` = 3;


    $query = "UPDATE databayi SET 
                namabayi ='$namabayi',
                password = '$password',
                ibubayi = '$ibubayi',
                ayahbayi ='$ayahbayi',
                alamat = '$alamat',
                tempatlahir  = '$tempatlahir',
                beratbadan = '$beratbadan',
                tinggibadan = '$tinggibadan',
                bulan = '$bulan ',
                vaksin = '$vaksin',
                keterangan = '$keterangan'  

                WHERE databayi.id = $id

            ";
    mysqli_query($conn,$query);

    //kembalikan return angka
    return mysqli_affected_rows($conn);

}


function cari($keyword){
    $query = "SELECT * FROM bayi WHERE 
            nama LIKE '%$keyword%' OR
            vaksin LIkE '%$keyword%'
             ";

    return query($query);
}



function tambahbidan($data){
    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    // $nama =htmlspecialchars($data["nama"]);
    $username =htmlspecialchars( $data["username"]);
    $password =htmlspecialchars( $data["password"]);
    $level =htmlspecialchars( $data["level"]);
    $alamat =htmlspecialchars( $data["alamat"]);

    // $ibubayi =htmlspecialchars( $data["ibubayi"]);
    // $ayahbayi =htmlspecialchars( $data["ayahbayi"]);
    // $alamat =htmlspecialchars( $data["alamat"]);
    // $posyandu =htmlspecialchars( $data["posyandu"]);
    // $keterangan =htmlspecialchars( $data["keterangan"]);


   $query= " INSERT INTO `users` (`id`, `username`, `password`, `level`, `alamat`) VALUES (NULL, '$username', '$password', '$level', '$alamat')";


    // $query = "INSERT INTO mahasiswa (`id`, `nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES (NULL, '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function ubahbidan($data){

    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    $id = $data["id"];
    $username =htmlspecialchars( $data["username"]);
    $level =htmlspecialchars( $data["level"]);
    $alamat =htmlspecialchars($data["alamat"]);
    // $password =htmlspecialchars( $data["password"]);
    // $ibubayi =htmlspecialchars( $data["ibubayi"]);
    // $ayahbayi =htmlspecialchars( $data["ayahbayi"]);
    // $alamat =htmlspecialchars( $data["alamat"]);
    // $posyandu =htmlspecialchars( $data["posyandu"]);
    // $keterangan =htmlspecialchars( $data["keterangan"]);

    // UPDATE `users` SET `nama` = 'akuak' WHERE `users`.`id` = 7;

    $query = "UPDATE users SET 
                username  = '$username',
                level = '$level',
                alamat ='$alamat'

                WHERE users.id = $id";
    mysqli_query($conn,$query);

    //kembalikan return angka
    return mysqli_affected_rows($conn);

}

function hapusdatabidan($id){
    global $conn;
    // DELETE FROM `mahasiswa` WHERE `mahasiswa`.`id` = 14

    // $delete = "DELETE FROM `databayi` WHERE `databayi`.`id` = $id"; 
    $delete= "DELETE FROM users WHERE id =$id";
    mysqli_query($conn,$delete);
    return mysqli_affected_rows($conn);
}



//edit artikel
function ubahartikel($data){

    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    $id = $data["id"];

    $judul =htmlspecialchars($data["judul"]);
   $artikel = $data["artikel"];
//    $gambar = htmlspecialchars($data['gambar']);
$gambar = upload();
    if(!$gambar){
        return false;
    }

        $query = "UPDATE artikel SET 
                    artikel = '$artikel',
                    judul = '$judul',
                    gambar = '$gambar' 
                    WHERE artikel.id = $id

                ";
    mysqli_query($conn,$query);

    //kembalikan return angka
    return mysqli_affected_rows($conn);

}

// tambah artikel
function tambahartikel($data){
    global $conn;

    //mencegah script html yang di input ke web 
    //htmlspecialchars

    $judul =htmlspecialchars($data["judul"]);
    $artikel =htmlspecialchars( $data["artikel"]);
    // $gambar =htmlspecialchars( $data["gambar"]);

    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }
   
   $query=  "INSERT INTO `artikel` (`id`, `judul`, `artikel`, `gambar`) VALUES (NULL, '$judul', '$artikel', '$gambar')";
   mysqli_query($conn,$query);


    return mysqli_affected_rows($conn);
}


//upload gambar artikel
function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek
    if( $error === 4){
        echo "<script> 
                alert('pilih gambar dulu');
        </script>";
        return false;
    }
    
    //cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
            alert('bukan gambar ini');

        </script>
        ";
        return false;
    }

    //cek jika ukuran nya terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
        alert('ukuran gambar terlalu besar');

    </script>
    ";
    }

    //upload
    move_uploaded_file($tmpName, 'upload/'. $namaFile);
    
    return $namaFile;

}

// hapusartikel
function hapusartikel($id){
    global $conn;
    // DELETE FROM `mahasiswa` WHERE `mahasiswa`.`id` = 14

    // $delete = "DELETE FROM `databayi` WHERE `databayi`.`id` = $id"; 
    // DELETE FROM `artikel` WHERE `artikel`.`id` = 4

    $delete= "DELETE FROM artikel WHERE id =$id";
    mysqli_query($conn,$delete);
    return mysqli_affected_rows($conn);
}


?>