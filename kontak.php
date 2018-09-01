<?php  
require_once 'config/config.php.';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title> Hubungi Kami - InMark</title>
		
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
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('about.php');?>">Tentang Kami</a>
						</li>
						<li class="nav-item active">
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

		<section class="container mt-5" id="stage-1">
			<!--Contact heading-->
			<h2 class="h1 m5-3">Hubungi Kami</h2>
			<!--Contact description-->
			<p class="pb-4">Hubungi kami mengenai tata cara penggunaan atau hal yang berkaitan dengan sistem dan tata cara kerja sama antar perusahaan dengan influencer</p>
			<div class="row">
				<!--Grid column-->
				<div class="col-lg-5 mb-4">
					<!--Form with header-->
					<div class="card border-primary rounded-0">
						<div class="card-header p-0">
							<div class="bg-primary text-white text-center py-2">
								<h3><i class="fa fa-envelope"></i> Write to us:</h3>
								<p class="m-0">We'll write rarely, but only the best content.</p>
							</div>
						</div>
						<div class="card-body p-3">
							<!--Body-->
							<div class="form-group">
								<label>Your name</label>
								<div class="input-group">
									<input class="form-control" id="inlineFormInputGroupUsername" placeholder="Your Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<label>Your email</label>
								<div class="input-group mb-2 mb-sm-0">
									<input class="form-control" id="inlineFormInputGroupUsername" placeholder="Your Email" type="text">
								</div>
							</div>
							<div class="form-group">
								<label>Message</label>
								<div class="input-group mb-2 mb-sm-0">
									<textarea class="form-control"></textarea>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-primary btn-block rounded-0 py-2">Kirm</button>
							</div>
						</div>
					</div>
					<!--Form with header-->
				</div>
				<!--Grid column-->
				<!--Grid column-->
				<div class="col-lg-7">
					<!--Google map-->
					<div class="mb-4">
						
					</div>
					<!--Buttons-->
					<div class="row text-center">
						<div class="col-md-4">
							<a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
							<p>Medan, STMIK MIkroskil<br> Indonesia</p>
							
						</div>
						<div class="col-md-4">
							<a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
							<p>+62 61 234 324, <br> Mon - Fri, 8:00-17:00</p>
						</div>
						<div class="col-md-4">
							<a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
							<p>info@gmail.com <br> sale@gmail.com</p>
						</div>
					</div>
				</div>
				<!--Grid column-->
			</div>
		</section>
<?php include_once 'footer.php' ?>