<?php
require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title> Daftar Perusahaan - InMark</title>
	
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
				<div class="card-wrapper-register">
					<div class="brand">
						<a href="<?=base_url();?>" title="inmark logo"><img src="<?=base_url('img/favicon/fav.png');?>" class="d-inline-block align-top"></a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Buat Akun Perusahaan Baru</h4>
							<?php
							if(isset($_POST['daftar'])){
								$nama = stripslashes($_POST['nama']);
								$nama = mysqli_real_escape_string($koneksi, $nama);
								$email = stripslashes($_POST['email']);
								$email = mysqli_real_escape_string($koneksi, $email);
								$telp = stripslashes($_POST['telp']);
								$telp = mysqli_real_escape_string($koneksi, $telp);
								$pass = stripslashes($_POST['password']);
								$pass = mysqli_real_escape_string($koneksi, $pass);
								$repass = stripslashes($_POST['repassword']);
								$repass = mysqli_real_escape_string($koneksi, $repass);

								$query_daftar = "SELECT * FROM perusahaan WHERE email = '$email'";
								$sql_daftar = mysqli_query($koneksi, $query_daftar);

								if(mysqli_num_rows($sql_daftar) != 0){
									echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Gagal Daftar!</strong><br> Email telah digunakan. silahkan menggunakan email lain.
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
								}
								elseif($pass != $repass){
									echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Gagal Daftar!</strong><br>Password Tidak cocok.
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
								}
								elseif(strlen($pass) < 8){
									echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Gagal Daftar!</strong><br>Minimal password 8 karakter
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
								}
								else{
									// encrypt the password
									$pass = md5($pass);
									// insert the record
									$qdaftar_perusahaan = "INSERT INTO perusahaan (nm_perusahaan, email, telp, password) VALUES ('$nama', '$email', '$telp', '$pass')";
									$sdaftar_perusahaan = mysqli_query($koneksi, $qdaftar_perusahaan);

									if(!$sdaftar_perusahaan){
										printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
									}

									if($sdaftar_perusahaan != TRUE){
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											  <strong>Gagal Daftar!</strong><br>Terdapat masalah saat mendaftar
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
									}
									else{
									// var_dump($id_daftar_influencer);
										echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
											  <strong>Sukses Daftar!</strong><br>Pendaftaran anda sukses. mohon menunggu untuk aproval oleh administrator
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
									}
								}
								// mendapatkan id saatmendaftar
									$id_daftar_perusahaan = mysqli_insert_id($koneksi);
									// var_dump($id_daftar_perusahaan);
									$generateprofile_perusahaan = "INSERT INTO profil_perusahaan (id_perusahaan) VALUES ('$id_daftar_perusahaan')";
									// var_dump($generateprofile_perusahaan);
									$updateProfil = mysqli_query($koneksi, $generateprofile_perusahaan);

									if(!$updateProfil){
										printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
									}
							}
							?>
							<form method="post">
								<div class="form-group">
									<label>Nama Perusahaan</label>
									<input type="text"  class="form-control" name="nama" placeholder="contoh : PT Kacang Goreng"  required autofocus />
								</div>
								<div class="form-group">
									<label>Alamat E-mail</label>
									<input type="email"  class="form-control" name="email"  placeholder="perusahaan@mail.com" required autofocus />
								</div>
								<div class="form-group">
									<label>Nomor Telepon</label>
									<input type="tel"  class="form-control" name="telp" placeholder="356484259962" required autofocus />
								</div>
								<div class="form-row">
									<div class="col-6">
										<label>Kata Sandi Baru</label>
										<input type="password"  name="password" class="form-control"  placeholder="minimal 8 karakter" required />
									</div>
									<div class="col-6">
										<label>Konfirmasi Kata Sandi Baru</label>
										<input type="password"  name="repassword" class="form-control" placeholder="minimal 8 karakter" required />
									</div>
								</div>
								<hr>
								<div class="form-group">
									<p>Dengan klik 'Daftar', Anda menyetujui Syarat dan Ketentuan, Peraturan, dan Kebijakan Privasi yang ada pada Inmark.</p>
								</div>
								<div class="form-group m-auto" style="width: 50%;">
									<button type="submit" name="daftar" class="btn btn-primary btn-block">Daftar Sebagai Perusahaan</button>
								</div>
							</form>
							<hr>
							<div class="margin-top20 text-center">
								Sudah Punya Akun? <a href="<?=base_url('login.php');?>">Masuk</a>
							</div>
							<div class="mt-1 text-center">
								<a href="<?=base_url();?>">Kembali Ke Laman Utama </a>
							</div>
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
	<script src="<?=base_url('assets/js/main.js');?>"></script>
	<!-- login js -->
	<script src="<?=base_url('assets/js/login.js');?>"></script>
</body>
</html>