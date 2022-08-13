<?php
session_start();
include "conn.php";
if (isset($_SESSION['username'])) {
	header("location:test/..");
} else if (isset($_SESSION['nama_pelanggan'])) {
	header("location:pesan-meja.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>
		Login
	</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-4">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Gelato</h1>
									</div>
									<?php
									if (isset($_GET['status'])) {
										if ($_GET['status'] == "digunakan") {
											echo '<div class="alert alert-danger" role="alert">Meja tersebut sedang digunakan!</div>';
										} else if ($_GET['status'] == "kosong") {
											echo '<div class="alert alert-danger" role="alert">Anda belum menulis nama anda!</div>';
										} else if ($_GET['status'] == "salah") {
											echo '<div class="alert alert-danger" role="alert">Harap periksa kembali nama yang akan anda gunakan!</div>';
										}
									}
									if (isset($_GET['pesan'])) {
										if ($_GET['pesan'] == "gagal") {
											echo '<div class="alert alert-danger" role="alert">Wrong username or password!</div>';
										}
									}
									?>
									<form class="user" method="post" action="proses-pesanmeja.php">
										<?php
										$kursi = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=0");
										$tempat = mysqli_num_rows($kursi);
										if ($tempat == 0) {
											?>
											<div class="alert alert-danger" role="alert">Meja tidak tersedia!</div>
											<div class="form-group">
												<select class="form-control">
													<option value="#">Full</option>
												</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan...">
											</div>
											<button class="btn btn-primary btn-user btn-block">
												Pesan
											</button>
										<?php
									} else {
										?>
											<div class="form-group">
												<select class="form-control" name="no_meja" id="no_meja" onchange="jumlah()">
													<?php
													$query = mysqli_query($conn, "SELECT * FROM meja INNER JOIN kursi WHERE meja.id_kursi = kursi.id_kursi AND status_meja=0");
													while ($data = mysqli_fetch_array($query)) {
														?>
														<option value="<?= $data['no_meja']; ?>">No Meja <?= $data['no_meja']; ?> (Kursi <?= $data['jumlah_kursi']; ?>)</option>
														<?php
														$no_meja = $data['no_meja'];
														$query2 = mysqli_query($conn, "SELECT * FROM meja INNER JOIN ursi WHERE meja.id_kursi = kursi.id_kursi AND no_meja='$no_meja' ");
														$data2 = mysqli_fetch_array($query2);
													} ?>
												</select>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan...">
											</div>
											<button type="submit" class="btn btn-primary btn-user btn-block">
												Pesan
											</button>
										<?php } ?>
									</form>
									<hr>
									<div class="text-center">
										<a href="" class="small" data-toggle="modal" data-target="#newMenuModal">Login</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
	<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="user" method="post" action="proses-login.php">
					<div class="modal-body">
						<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username...">
						<?php
						if (isset($_GET['pesan'])) {
							if (($_GET['pesan'] == "gagal2") || ($_GET['pesan'] == "gagal4")) {
								echo '<small class="text-danger pl-3">Please input username</small>';
							}
						}
						?>
					</div>
					<div class="modal-body">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						<?php
						if (isset($_GET['pesan'])) {
							if (($_GET['pesan'] == "gagal3") || ($_GET['pesan'] == "gagal4")) {
								echo '<small class="text-danger pl-3">Please input password</small>';
							}
						}
						?>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

</body>

</html>