<?php  
require_once 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title> Masuk - InMark</title>
	
	<!-- favicon -->
	<link rel="icon" href="<?=base_url('img/favicon/fav.png');?>" type="image/x-icon" />
	<!-- css file -->
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
	<!-- css for login	 -->
	<link rel="stylesheet" href="<?=base_url('assets/css/login.css');?>" />	
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="<?=base_url();?>" title="inmark logo"><img src="<?=base_url('img/favicon/fav.png');?>" alt="user logo" class="d-inline-block align-top"></a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Silahkan Masuk</h4>
							<?php
							// session nnti dlu di pikirkan

							// teslogindlu
							if(isset($_POST['masuk'])){
								$pengguna = $_POST['email'];
								$pass = md5($_POST['password']);
								// $aktif = 1;
								$akses = $_POST['akses'];

								// influencer 
								if($akses == 1){
									$qLogin2 = "SELECT * FROM influencer WHERE (email = '$pengguna' AND password = '$pass' AND aktif = 1)";
									$sql_login2 = mysqli_query($koneksi, $qLogin2) or die(mysqli_connect_error($koneksi));

								
									if(mysqli_num_rows($sql_login2)){
										$_SESSION['pengguna'] =mysqli_fetch_array($sql_login2, MYSQLI_ASSOC);
										// $data_pengguna = $_SESSION['pengguna'];
										// jika berhasil login tolog ganti ini yaa
										header('location: influencer/index.php');					
									}
									else{
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												  <strong>Gagal Masuk!</strong><br> Silahkan Masukkan Username dan Password yang sesuai
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}	
								}
								// perusahaan
								elseif($akses == 2){
									$qLogin2 = "SELECT * FROM perusahaan WHERE (email = '$pengguna' AND password = '$pass' AND aktif = 1) ";
									$sql_login2 = mysqli_query($koneksi, $qLogin2) or die(mysqli_connect_error($koneksi));

								
									if(mysqli_num_rows($sql_login2)){
										$_SESSION['pengguna'] =mysqli_fetch_array($sql_login2, MYSQLI_ASSOC);
										// $data_pengguna = $_SESSION['pengguna'];
										// jika berhasil login tolog ganti ini yaa
										header('location: perusahaan/index.php');					
									}
									else{
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
												  <strong>Gagal Masuk!</strong><br> Silahkan Masukkan Username dan Password yang sesuai
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>';
									}	
								}
							}
							?>
							<form method="post">
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="email" required autofocus />
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control"  placeholder="password" required data-eye />
								</div>
								
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="input-group-text">Akses Sebagai</label>
									</div>
									<select  class="custom-select" name="akses">
										<option selected>Pilih Salah Satu</option>
										<option value="1">Influencer</option>
										<option value="2">Perusahaan</option>
									</select>
								</div>
								<hr>
								<div class="form-group no-margin">
									<button type="submit" name="masuk" class="btn btn-primary btn-block">Masuk</button>
								</div>
								<div class="margin-top20 text-center">
									Tidak Punya Akun? <a href="<?=base_url('new.php')?>">Daftar</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2018 &mdash; INMARK
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- javascript file -->
	<script src="<?=base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
	<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<script defer src="<?=base_url('assets/js/fontawesome-all.min.js');?>"></script>
	<script src="<?=base_url('assets/js/ajax.js');?>"></script>
	<script src="<?=base_url('assets/js/main.js');?>"></script>
	<!-- login js -->
	<script src="<?=base_url('assets/js/login.js');?>"></script>
</body>
</html>