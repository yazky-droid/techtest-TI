<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../config.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan name dan password yang sesuai

$data = mysqli_query($koneksi,"SELECT * from user WHERE nama ='$nama' AND password ='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$row = mysqli_fetch_array($data);
$id = $row['id'];
	if($cek > 0){
		$_SESSION['nama'] = $nama;
		$_SESSION['id'] = $id;
		$_SESSION['status'] = "login";
		header("location:../dashboard/index.php");
	}else{
			header("location:index.php?pesan=gagal");
		}
?>