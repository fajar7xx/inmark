<?php  
require_once 'config/config.php.';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title> InMark - Influencer Marketplace</title>
		
		<!-- css file -->
		<link rel="icon" href="img/favicon/fav.png" type="image/x-icon" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
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
							<a class="nav-link" href="<?=base_url('index.php');?>">Beranda<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('about.php');?>">Tentang Kami</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('kontak.php');?>">Kontak</a>
						</li>
					</ul>
					<div class="btn-toolbar my-2" role="toolbar" aria-label="toolbar with button groups">				<a class="btn btn-outline-primary mr-2" href="<?=base_url('new.php');?>" role="button">Daftar</a>
						<a class="btn btn-primary" href="<?=base_url('login.php');?>" role="button">Masuk</a>
					</div>
				</div>
			</div>
		</nav>

		<div id="stage">
			<div id="stage-caption">
				<h1 class="display-3 text-primary">Influencer Marketplace Indonesia</h1>
				<h3 class="text-dark">Temukan Influencer Sesuai keinginanmu dan mulailah</h3>
				<a href="<?=base_url('influencer/register.php');?>" class="btn btn-lg btn-outline-primary">Daftar  Sebagai Influencer</a>
				<a href="<?=base_url('perusahaan/register.php');?>" class="btn btn-lg btn-outline-primary">Daftar Sebagai Perusahaan</a>
			</div>
		</div>

		<section id="feature-one">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<h2 class="text-center">Kategori Influencer</h2>
							<h4 class="text-center">Media Sosial</h4>
					</div>
				</div>
				<div class="row my-4 px-auto">
					<div class="col-md-2"></div>
					<div class="col-md-2">
						<img src="<?=base_url('img/medsos/002-instagram.png');?>" alt="instagram" class="img-fluid mx-auto d-block" width="64">
						<h5 class="font-weight-normal text-center my-1">Instagram</h5>
					</div>
					<div class="col-md-2">
						<img src="<?=base_url('img/medsos/003-twitter.png');?>" alt="twitter" class="img-fluid mx-auto d-block" width="64">
						<h5 class="font-weight-normal text-center my-1">Twitter</h5>
					</div>
					<div class="col-md-2">
						<img src="<?=base_url('img/medsos/004-blogger.png');?>" alt="blogger" class="img-fluid mx-auto d-block" width="64">
						<h5 class="font-weight-normal text-center my-1">Blogger</h5>
					</div>
					<div class="col-md-2">
						<img src="<?=base_url('img/medsos/001-youtube.png');?>" alt="youtube" class="img-fluid mx-auto d-block" width="64">
						<h5 class="font-weight-normal text-center my-1">Youtube</h5>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</section>

		<!-- Icons Grid -->
		<section class="features-icons bg-light text-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
							<div class="features-icons-icon d-flex " style="font-size: 4.5rem;">
								<i class="fas fa-list m-auto text-primary"></i>
							</div>
							<h3>1. Jelaskan Kebutuhanmu</h3>
							<p class="lead mb-0">Jelaskan Kebutuhan Digital Marketing Anda Kepada Kami</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
							<div class="features-icons-icon d-flex" style="font-size: 4.5rem;">
								<i class="fas fa-users m-auto text-primary"></i>
							</div>
							<h3>2. Pilih Influencer</h3>
							<p class="lead mb-0">Pilih INfluencer yang telah mendaftar pada Proyek anda</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="features-icons-item mx-auto mb-0 mb-lg-3">
							<div class="features-icons-icon d-flex" style="font-size: 4.5rem;">
								<i class="fas fa-bullseye m-auto text-primary"></i>
							</div>
							<h3>3. Lihat Hasilnya</h3>
							<p class="lead mb-0">Lihat Hasilnya dengan anda merekrut influencer pada sistem kami</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- anonim testimoni -->
		<section id="feature-four">
				<div class="feature-alt">
					<div class="container">
						<div class="row">
							<div class="feature-content">
								<div class="col-lg-6">
									<h6>Influencer</h6>
									<blockquote class="blockquote">
										&ldquo;We Can generate leads from your testimonial.&rdquo;
										<footer class="blockquote-footer">Anonim, <cite>Personal Blogger</cite></footer>
									</blockquote>
								</div>
								<div class="col-lg-6 hidden-md-down">
									<img src="<?=base_url('img/man.png');?>" alt="bbrad elvis">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

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