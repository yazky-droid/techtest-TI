<?php

$server 	= "localhost"; //nama host database
$username	= "root"; //username db
$password	= ""; //password jika ada
$db 		= "techtest"; //nama db
$koneksi = mysqli_connect($server, $username, $password, $db); //mengkoneksikan ke db

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()) {
	echo "Koneksi gagal : ".mysqli_connect_error();
}