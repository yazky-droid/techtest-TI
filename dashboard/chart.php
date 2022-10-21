<?php
include('../config.php');

// cek apakah sudah login
session_start();
if($_SESSION['status']!="login"){
header("location:../login/index.php?pesan=belum_login");
}

    $queryByUserId = mysqli_query($koneksi,"SELECT * FROM datateman where userId='$_SESSION[id]'");
    $jumlah_data = $queryByUserId->num_rows;

    //itung persentase data usia dibawah 20 tahun
    $data = mysqli_query($koneksi,"SELECT * FROM datateman WHERE userId='$_SESSION[id]' AND usia < 20");
    $count_under20 = $data->num_rows;
    $jumlah_under20 = $count_under20/$jumlah_data*100;

    //itung persentase data usia diatas 20 tahun
    $data = mysqli_query($koneksi,"SELECT * FROM datateman WHERE userId='$_SESSION[id]' AND usia >= 20");
    $count_over20 = $data->num_rows;
    $jumlah_over20 = $count_over20/$jumlah_data*100;

    //itung persentase data laki-laki
    $data = mysqli_query($koneksi, "SELECT * FROM datateman WHERE userId='$_SESSION[id]' AND jenisKelamin='Laki-laki'");
    $count_pria = $data->num_rows;
    $jumlah_pria = (($count_pria/$jumlah_data)*100);
    //itung persentase data perempuan
    $data = mysqli_query($koneksi, "SELECT * FROM datateman WHERE userId='$_SESSION[id]' AND jenisKelamin='Perempuan'");
    $count_perempuan = $data->num_rows;
    $jumlah_perempuan = (($count_perempuan/$jumlah_data)*100);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tech Test || Chart View</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
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
    </div>
    <div class="container">
        <div class="row" align="center">
            <div class="mt-2 fw-normal" align="center">
                <h4>Jumlah data: <?= "$jumlah_data" ?> Teman</h4>
                <p><em>Note: Data dibawah merupakan visualisasi chart dalam bentuk persentase.</em></p>
            </div>
            <div class="col-md-5">
                <div class="mb-1"><b>Chart Dounat</b>
                    <p>Berdasarkan usia</p>
                </div>
                <div>
                    <canvas id="myChartAge" width="20%" height="20%"></canvas>
                </div>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
                <div class="mb-1"><b>Chart Pie</b>
                    <p>Berdasarkan gender</p>
                </div>
                <div>
                    <canvas id="myChartGender" width="20%" height="20%"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const datas = {
        labels: [
            'Dibawah 20 Tahun: <?=$jumlah_under20?>%',
            'Diatas 20 Tahun: <?=$jumlah_over20?>%'
        ],
        datasets: [{
            label: 'Dataset Age',
            data: [
                <?php
        echo $jumlah_under20;
        ?>,
                <?php
        echo $jumlah_over20;
        ?>
            ],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    };
    const configurasi = {
        type: 'doughnut',
        data: datas,
    };
    const myAgeChart = new Chart(
        document.getElementById('myChartAge'),
        configurasi
    );
    //chart based on Gender
    const data = {
        labels: [
            'Laki-laki: <?=$jumlah_pria?>%',
            'Perempuan: <?=$jumlah_perempuan?>%'
        ],
        datasets: [{
            label: 'Dataset Jenis Kelamin',
            data: [
                <?php 
        echo $jumlah_pria;
        ?>,
                <?php 
        echo $jumlah_perempuan;
        ?>
            ],
            backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)'
            ],
            hoverOffset: 4
        }]
    };
    const config = {
        type: 'pie',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChartGender'),
        config
    );
    </script>
</body>

</html>