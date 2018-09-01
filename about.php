<?php  
require_once 'config/config.php.';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title> Tentang Kami - InMark</title>
		
		<!-- css file -->
		<link rel="icon" href="<?=base_url('img/favicon/fav.png');?>" type="image/x-icon" />
		<link rel="stylesheet" href="<?=base_url('assets/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?> "/>
	</head>
	<body>
		<!-- navigasi baru -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
				<img src="<?=base_url('img/favicon/fav.png');?>" alt="inmark logo" class="d-inline-block align-top" width="30" height="30">
				InMark
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('index.php');?>">Beranda<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="<?=base_url('about.php');?>">Tentang Kami</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('kontak.php');?>">Kontak</a>
						</li>
					</ul>
					<div class="btn-toolbar my-2" role="toolbar" aria-label="toolbar with button groups">				
						<a class="btn btn-outline-primary mr-2" href="<?=base_url('new.php');?>" role="button">Daftar</a>
						<a class="btn btn-primary" href="<?=base_url('login.php');?>" role="button">Masuk</a>
					</div>
				</div>
			</div>
		</nav>

		
		<div class="mt-5">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<h1 class="strong text-primary">Who we are and<br>what we do</h1>
						<p class="lead">InMark adalah Influencer marketplace<br>Based on Indonesia </p>
					</div>
					<div class="col-6">
						<p>InMark menghubungkan Perusahaan dengan Influencer yang saling membutuhkan dalam bidang digital marketing.</p>
						<p>Inmark Membantu perusahaan dalam pemenuhan kebutuhan akan influencer pada digital marketing.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row my-3">
				<div class="mx-auto">
					<h3 class="text-center text-primary">Our Team</h3>
					<p>Tim kami yang sangat hebat </p>
					<div class="border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 team-box">
					<div class="team-img thumbnail border">
						<img src="img/tim/141112699.jpg" style="height: 350px; width: auto;">
						<div class="team-content">
							<h3>Fajar Setiawan Siagan</h3>
							<h3>14.111.2699</h3>
							<div class="border-team"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
							<div class="social-icons">
								<a href="https://www.facebook.com/">
									<i class="fab fa-facebook fa-2x"></i>	
								</a>
								<a href="https://twitter.com/">
									<i class="fab fa-twitter-square fa-2x"></i>
								</a>
								<a href="https://plus.google.com/">
									<i class="fab fa-instagram fa-2x"></i>
								</a>
								<a href="mailto:bootsnipp@gmail.com">
									<i class="fa fa-envelope-square fa-2x"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 team-box">
					<div class="team-img thumbnail border">
						<img src="img/tim/131112951.jpg" style="height: 350px; width: auto;">
						<div class="team-content">
							<h3>Andi Chang</h3>
							<h3>13.111.2951</h3>
							<div class="border-team"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
							<div class="social-icons">
								<a href="https://www.facebook.com/">
									<i class="fab fa-facebook fa-2x"></i>	
								</a>
								<a href="https://twitter.com/">
									<i class="fab fa-twitter-square fa-2x"></i>
								</a>
								<a href="https://plus.google.com/">
									<i class="fab fa-instagram fa-2x"></i>
								</a>
								<a href="mailto:bootsnipp@gmail.com">
									<i class="fa fa-envelope-square fa-2x"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 team-box">
					<div class="team-img thumbnail border">
						<img src="img/tim/131114544.jpg" style="height: 350px; width: auto;">
						<div class="team-content">
							<h3>Sanrico Ryandi Tambunan</h3>
							<h3>13.111.4544</h3>
							<div class="border-team"></div>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p> -->
							<div class="social-icons">
								<a href="https://www.facebook.com/">
									<i class="fab fa-facebook fa-2x"></i>	
								</a>
								<a href="https://twitter.com/">
									<i class="fab fa-twitter-square fa-2x"></i>
								</a>
								<a href="https://plus.google.com/">
									<i class="fab fa-instagram fa-2x"></i>
								</a>
								<a href="mailto:bootsnipp@gmail.com">
									<i class="fa fa-envelope-square fa-2x"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section id="feature-seven">
			<div class="container">
				<div class="row">
					<div class="feature-content">
						<div class="col-lg-8 offset-lg-2">
							<h6>Selamat  Datang</h6>
							<h2>Mari Bergabung dengan Ribuan Influencer di Seluruh Indonesia</h2>
							<p>Ribuan influencer seluruh indonesia telah bergabung pada aplikasi kami. sehingga anda dapat memilih berbagai jenis influencer sesuai dengan kebutuhan bisnis anda</p>
							<a href="new.php" role="button" class="btn btn-outline-primary btn-lg">Ayo Bergabung</a>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php include_once 'footer.php' ?>