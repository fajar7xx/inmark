<?php 
require_once '../config/config.php';

if(!isset($_SESSION['pengguna'] ))
{
    // User is not logged in
    $_SESSION['message'] = 'Youre not logged in';

    // redirect to home page
    header('Location: ' . base_url());
    exit;
}

$id_pengguna = $_SESSION['pengguna']['id_influencer'];
$nama_pengguna = $_SESSION['pengguna']['nm_lengkap'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="influencer marketplace indonesia">
		<meta name="author" content="team 1 ta mikroskil">
		<link rel="icon" href="<?=base_url('img/favicon/fav.png');?>">
		<title>Influencer - InMARK</title>
		
		<!-- css file -->
		<!-- normalize.css -->
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/normalize.css');?>" />
		<!-- Bootstrap core CSS -->
		<link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
		<!-- datatables -->
		<link href="<?=base_url('assets/css/datatables.min.css');?>" rel="stylesheet" />
		<!-- style.css -->
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>" />
	</head>
	<body class="bg-light">
		<!-- navigasi baru -->
		<nav class="navbar navbar-expand-lg navbar-light box-shadow" style="border-bottom:2px solid #007bff;">
			<div class="container">
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
							<a class="nav-link" href="<?=base_url('influencer/index.php');?>">Beranda<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('influencer/profil.php');?>">Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('influencer/proyek.php');?>">Cari Proyek</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('influencer/tariksaldo.php');?>">Tarik Saldo</a>
						</li>
					</ul>

					<!-- <a href="" class="mr-4"><i class="fas fa-bell"></i>&nbsp; Notifikasi</a> -->
					<div class="dropdown">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-user"></i> &nbsp;
							<?=$nama_pengguna;?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="edit-profil.php?edit=<?=$id_pengguna;?>">
								<i class="fas fa-user-circle mr-2 text-primary"></i> 
								<span class="lead small">Edit Profil</span>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?=base_url('logout.php');?>">
								<i class="fas fa-power-off mr-2 text-danger"></i> 
								<span class="lead small">Keluar</span>
							</a>
						</div>
					</div>
					<!-- dropdown menu user account dan notification -->
					</ul>
				</div>
			</div>				
		</nav>