<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require 'functions.php';

// menangkap data yang dikirim dari form login
$nama_pengunjung = $_POST['nama_pengunjung'];
$password = $_POST['password'];
// $level    = $_GET['level'];



// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * FROM tb_pengunjung WHERE nama_pengunjung='$nama_pengunjung' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	
        

	// cek jika user login sebagai pengurus
	 if($data){
		// buat session login dan username
        $_SESSION['nama_pengunjung'] = $nama_pengunjung;
		$_SESSION['password'] = $password;
		// $_SESSION['level'] = "ibubayi";
		// alihkan ke halaman dashboard pengurus
        // header("location:halaman_pengurus.php");
        // echo "Wellcome anu ani ibubayi  ";
        // echo "Wellcome,".$_SESSION['username'] = $username;
        // echo "<br>";

        header("location: data.php");
        // echo "berhasil ";

	}else{

		// alihkan ke halaman login kembali
        // header("location:index.php?pesan=gagal");
        echo "gagal";
	}	
}else{
    // header("location:index.php?pesan=gagal");
    echo "gagal";
    
}

?>