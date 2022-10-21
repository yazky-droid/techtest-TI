		<!-- cek apakah sudah login -->
		<?php 
	session_start();
	$id = $_SESSION['id'];
	if($_SESSION['status']!="login"){
		header("location:../login/index.php?pesan=belum_login");
	}
	?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
		    <meta charset="UTF-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		    <title>Tambah Data</title>
		</head>

		<body>
		    <div class="container">
		        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
		            <div class="container-fluid">
		                <a class="navbar-brand fw-bolder" href="#">Tech Test</a>
		                <div class="navbar-nav">
		                    <a class="nav-link" href="index.php">Home</a>
		                    <a class="nav-link" href="chart.php">Chart</a>
		                    <a class="nav-link" href="download.php">Download</a>
		                    <a class="nav-link" href="logout.php">Logout</a>
		                </div>
		            </div>
		        </nav>
		        <div class="container col-md-6 mt-4">
		            <h1>Form Create</h1>
		            <div class="card">
		                <div class="card-header bg-success bg-gradient text-white fw-semibold">
		                    Tambah Data
		                </div>
		                <div class="card-body">
		                    <form action="" method="post" role="form">
		                        <div class="form-group mb-2">
		                            <label>Nama</label>
		                            <input type="text" name="nama" class="form-control" required>
		                        </div>
		                        <div class="form-group mb-2">
		                            <label>Jenis Kelamin</label><br>
		                            <input type="radio" name="jenisKelamin" value="Laki-laki" required>Laki-laki
		                            <input type="radio" name="jenisKelamin" value="Perempuan" class="ms-1"
		                                required>Perempuan<br>
		                        </div>

		                        <div class="form-group mb-2">
		                            <label>Usia</label>
		                            <input type="number" class="form-control" name="usia" required>
		                        </div>

		                        <button type="submit" class="btn btn-dark" name="submit" value="simpan">Simpan Data</button>
		                    </form>

		                    <?php
				include('../config.php');
				
				//melakukan pengecekan jika button submit/simpan data diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$jenisKelamin = $_POST['jenisKelamin'];
					$usia = $_POST['usia'];

					//query untuk menambahkan data ke database
					$data = mysqli_query($koneksi, "INSERT INTO datateman (userId,nama,jenisKelamin,usia) values('$id','$nama', '$jenisKelamin', '$usia')") or die(mysqli_error($koneksi));
					//id barang tidak dimasukkan, AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('Data berhasil disimpan.');window.location='index.php'; </script>";
				}
				?>
		                </div>
		            </div>
		        </div>
		    </div>
		    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
		    </script>
		    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
		    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
		</body>

		</html>