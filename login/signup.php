<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template · Bootstrap v5.2</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <!-- cek pesan notifikasi -->
    <?php 
	$msg = null;
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal_daftar"){
			$msg = "Maaf proses daftar belum berhasil.";
        }
	}
	?>
    <main class="form-signin w-100 m-auto">
        <div class="<?php if(@$_GET['pesan'] == ""){
			echo '';
		}else{
            echo 'alert alert-danger';
        }?>" role="alert">
            <?php  echo $msg; ?>
        </div>
        <form method="post" action="register.php">
            <h1 class="h1 fw-bold">Tech Test</h1>
            <h1 class="h3 mb-3 fw-normal">Silakan Daftar</h1>

            <div class="form-floating">
                <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama" required>
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
            <p class="mt-3 mb-3 fw-bold border-bottom border-primary" style=""><a href="index.php"
                    style="text-decoration:none;">Masuk</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>



</body>

</html>