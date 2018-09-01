<?php  
require_once 'config/config.php';

// memili mendaftar sebagai perusahaan atau influencer
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title> Registrasi | Influencer Marketplace</title>
		
		<!-- css file -->
		<link rel="icon" href="<?=base_url('img/favicon/fav.png');?>" type="image/x-icon" />
		<link rel="stylesheet" href="<?=base_url('assets/css/normalize.css');?>" />
		<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?> "/>
	</head>
	<body>
		<!-- navigasi baru -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
						<li class="nav-item active">
							<a class="nav-link" href="<?=base_url();?>">Beranda<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Tentang Kami</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Kontak</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="stage-register" class="my-1">
			<div class="container">
				<div id="stage-caption">
					<!-- <h1 class="display-3 text-primary">Influencer Marketplace Indonesia</h1> -->
					<h3 class="text-dark">Buat Akun di Influencer Marketplace</h3>
					<p class="lead">InMark adalah website untuk mencari influencer di Indonesia. Kami memilik Influencer dengan kategori twitter, instagram, youtube dan bLog</p>
					<div class="row mt-5">
						<div class="col-md-5">
							<i class="fas fa-building fa-5x"></i>
							<h4 class="mt-2">Perusahaan</h4>
							<p style="height: 50px;">Mencari Influencer untuk memasarkan produknya</p>
							<a href="<?=base_url('perusahaan/register.php');?>" class="btn btn-lg btn-outline-primary mt-5">Daftar Sebagai  Perusahaan</a>
						</div>
						<div class="col-2"><span class="border-right"></span></div>
						<div class="col-md-5">
							<i class="fas fa-users fa-5x"></i>
							<h4>Influencer</h4>
							<p style="height: 50px;">Influencer yang mencari pasif income </p>
							<a href="<?=base_url('influencer/register.php');?>" class="btn btn-lg btn-outline-primary mt-5">Daftar Sebagai Influencer</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-light">Tentang InMARK</h4>
						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						&copy; 2018 startup logo is no a real thing. if it is, this site was not meant to be a mocker of it. <br>
						Trademark<a href="#" title="">Mikroskil Team</a>
					</div>
					<div class="col-md-2">
						<h6 class="text-primary">Panduan</h6>
						<ul class="list-unstyled">
							<li>Untuk Perusahaan</li>
							<li>Untuk Influencer</li>
							<li>Syarat Ketentuan</li>
							<li>Kebijakan Privasi</li>
						</ul>
					</div>
					<div class="col-md-2">
						<h6 class="text-primary">Tentang Kami</h6>
						<ul class="list-unstyled">
							<li>Perusahaan</li>
							<li>Layanan</li>
							<li>Karir</li>
							<li>sitemap</li>
						</ul>
					</div>
					<div class="col-md-2">
						<h6 class="text-primary">Ikuti Kami</h6>
						<ul class="list-unstyled">
							<li><i class="fab fa-instagram"></i> Instagram</li>
							<li><i class="fab fa-twitter-square"></i> Twwitter</li>
							<li><i class="fab fa-facebook-square"></i> Facebook</li>
							<li><i class="fab fa-linkedin"></i> Linkedin</li>
							<li><i class="fab fa-google-plus-square"></i> Plus Google</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	
		<!-- javascript file -->
		<script src="<?=base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
		<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
		<script defer src="<?=base_url('assets/js/fontawesome-all.min.js');?>"></script>
	</body>
</html>