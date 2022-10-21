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
    <title>Technical Test - Talenta Indonesia</title>
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

        <div class="row">
            <h1>Tabel View Data</h1>
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        DATA TEMAN <a href="tambah.php" class="btn btn-sm btn-light float-end">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Teman</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        include('../config.php'); //memanggil file koneksi
                                        $data = mysqli_query($koneksi, "select * from datateman where userId='$_SESSION[id]'") or die(mysqli_error($koneksi));
                                        //script untuk menampilkan data
                                        
                                        $no = 1; //untuk pengurutan nomor
                                        
                                        //melakukan perulangan
                                        while($row = mysqli_fetch_assoc($data)) {
                                            ?>

                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama']; //untuk menampilkan nama ?></td>
                                    <td><?= $row['jenisKelamin']; ?></td>
                                    <td><?= $row['usia']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Anda yakin ingin hapus?');"
                                            style="margin-left:5px;">Hapus</a>
                                    </td>
                                </tr>

                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <p class="h2 fw-semibold px-2 pt-2 " style="font-size:2.2rem; margin-left:20%;">Selamat datang,<span
                        class="fw-bold"> <?php echo $_SESSION['nama']; ?></span>!</p>
                <p class="h1 fw-bolder px-2 pt-2 " style="font-size:4rem; margin-left:20%;">Semakin Kenal <small
                        class="h1 text-muted" style="font-size:1em;">dengan Teman.</small></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>