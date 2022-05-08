<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title; ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
	<?= $this->session->flashdata('pesan'); ?>
	<?php unset($_SESSION['pesan']); ?>
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center mt-1 pt-lg-5">
			<div class="col-xl-12 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-lg-12 p-0">
						<!-- Nested Row within Card Body -->
						<table class="mt-3 mb-3" width="90%" align="center">
							<tr class="mt-3">
								<td align="center" colspan="2"><img width="45%" src="<?= base_url('assets/img/askk-me2.jpg'); ?>"></td>
							</tr>
							<tr>
								<td align="center" style="height: 80px" class="mt-1" colspan="2"><img width="70%" src="<?= base_url('assets/img/askk-me.jpg'); ?>"></td>
							</tr>
							<tr>
								<td align="center" style="height: 200px"><img width="70%" src="<?= base_url('assets/img/askk.jpg'); ?>"></td>
								<td align="center"><img width="70%" src="<?= base_url('assets/img/me.jpg'); ?>"></td>
							</tr>
							<tr>
								<td align="center"><button type="button" onclick="window.location.href='<?php echo base_url() ?>auth/askk'" class="btn btn-success">Masuk</button></td>
								<td align="center"><button type="button" onclick="window.location.href='<?php echo base_url() ?>auth/me'" class="btn btn-primary">Masuk</button></td>
							</tr>
							<tr>
								<td colspan="2" align="center" style="height: 200px">
									<img width="9%" src="<?= base_url('assets/img/JKN.jpg'); ?>">
									<img width="9%" src="<?= base_url('assets/img/165.jpg'); ?>">
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style>
		.card {
			background-image: url(<?= base_url('assets/img/Picture1.png'); ?>);
			background-repeat: no-repeat;
			background-size: 100% 100%;
		}
	</style>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>