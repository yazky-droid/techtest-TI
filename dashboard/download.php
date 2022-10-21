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
        <div class="row">
            <div class="col-12">
                <div class="card mt-3 mb-2">
                    <div class="card-header bg-dark text-white">
                        DATA TEMAN
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Teman</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
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
                                </tr>

                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" align="center">
            <div class="mt-2 fw-normal" align="center">
                <h4>Jumlah data: <?= "$jumlah_data" ?> Teman</h4>
                <p><em>Note: Data dibawah merupakan visualisasi chart dalam bentuk persentase.</em></p>
            </div>
            <div class="col-md-5">
                <div class="mb-2"><b>Chart Dounat</b><br />
                    <p>Berdasarkan usia</p>
                </div>
                <div>
                    <canvas id="myChartAge" width="20%" height="20%"></canvas>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mt-5"></div>
            </div>
            <div class="col-md-5">
                <div class="mb-2"><b>Chart Pie</b>
                    <br />
                    <p>Berdasarkan gender</p>
                </div>
                <div>
                </div>
                <canvas id="myChartGender" width="20%" height="20%"></canvas>
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
    setTimeout(() => {
        window.print();
    }, 1000);
    setTimeout(() => {
        window.location = "index.php";
    }, 2200);
    </script>
</body>

</html>