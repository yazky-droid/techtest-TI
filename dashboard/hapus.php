<?php				
			include '../config.php'; //menghubungkan ke file koneksi untuk ke database
			$id = $_GET['id']; //menampung id

			//query hapus
			$deleteData = mysqli_query($koneksi, "delete from datateman where id ='$id'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
	?>