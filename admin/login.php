<?php  
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" href="<?=base_url('img/favicon/fav.png');?>">
	<title> Masuk - InMark</title>
	
	<!-- favicon -->
	<link rel="icon" href="img/favicon/fav.png" type="image/x-icon" />
	<!-- css file -->
	<link rel="stylesheet" href="<?=base_url('assets/css/normalize.css');?>" />
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
	
	<!-- css for login	 -->
	<link rel="stylesheet" href="<?=base_url('assets/css/login.css');?>" />	
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper m-auto">
					<div class="card fat">
						<div class="card-body">
		 					<h4 class="card-title">Silahkan Masuk</h4>
							<?php  
							if(isset($_SESSION['admin'])){
								header('location: index.php');
							}
							if(isset($_POST['masuk'])){
								$pengguna = $_POST['username'];
								$pass = md5($_POST['password']);

								$query_login = "SELECT * FROM admin WHERE 
												username = '$pengguna' AND password = '$pass'";
								$sql_login = mysqli_query($koneksi, $query_login) or die(mysqli_connect_error($koneksi));

								if(mysqli_num_rows($sql_login)){
									// $_SESSION['admin'] = $pengguna;
									$_SESSION['admin'] = mysqli_fetch_array($sql_login, MYSQLI_ASSOC);
									header('location: index.php');
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


							?>
							<form action="" method="post">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" required autofocus />
								</div>
								<div class="form-group">
									<label>Kata Sandi</label>
									<input type="password" name="password" class="form-control" required data-eye />
								</div>
								<hr>
								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block" name="masuk">Masuk</button>
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
<!-- 	<script defer src="assets/js/fontawesome-all.min.js"></script> -->
<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?=base_url('assets/js/main.js');?>"></script>
	<script src="../assets/js/main.js"></script>
	<!-- login js -->
	<!-- <script src="assets/js/login.js"></script> -->
</body>
</html>