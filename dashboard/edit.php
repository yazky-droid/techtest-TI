		<!-- cek apakah sudah login -->
		<?php 
	session_start();
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
		    <title>Edit Data</title>
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
		            <h1>Form Edit</h1>
		            <div class="card">
		                <div class="card-header bg-warning bg-gradient fw-semibold">
		                    Edit Data
		                </div>
		                <div class="card-body">
		                    <?php
				include('../config.php');

				$id = $_GET['id']; //mengambil id yang ingin diubah

				//menampilkan data teman berdasarkan id
				$data = mysqli_query($koneksi, "select * from datateman where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
		                    <form action="" method="post" role="form">
		                        <div class="form-group mb-2">
		                            <label>Nama</label>
		                            <!--  menampilkan data teman pada value -->
		                            <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>

		                            <!-- ini digunakan untuk menampung id yang ingin diubah -->
		                            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
		                        </div>
		                        <div class="form-group mb-2">
		                            <label>Jenis Kelamin</label><br>
		                            <input type="radio" name="jenisKelamin" value="Laki-laki"
		                                <?php if($row['jenisKelamin']=='Laki-laki') echo 'checked'?> required>Laki-laki
		                            <input type="radio" class="ms-1" name="jenisKelamin" value="Perempuan"
		                                <?php if($row['jenisKelamin']=='Perempuan') echo 'checked'?> required>Perempuan<br>
		                        </div>

		                        <div class="form-group mb-2">
		                            <label>Usia</label>
		                            <input type="number" class="form-control" name="usia" value="<?= $row['usia']; ?>"
		                                required>
		                        </div>
		                        <button type="submit" class="btn btn-dark" name="submit" value="simpan">Update Data</button>
		                    </form>

		                    <?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$jenisKelamin = $_POST['jenisKelamin'];
					$usia = $_POST['usia'];

					//query mengubah data
					mysqli_query($koneksi, "UPDATE datateman SET nama='$nama', jenisKelamin='$jenisKelamin', usia='$usia' WHERE id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('Data berhasil diupdate.');window.location='index.php';</script>";
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