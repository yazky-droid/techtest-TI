<?php 
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$password = $_POST['password'];
 
//menyimpan akun yang didaftarkan ke db
$createAkun = mysqli_query($koneksi, "INSERT INTO user (nama,password) VALUES('$nama', '$password')") or die(mysqli_error($koneksi));

if($createAkun){
	header("location:index.php?pesan=berhasil");
    } else {
        header("location:signup.php?pesan=gagal_daftar");
    }
?>