<?php  
include_once '../config/config.php';
ob_start();

if(!isset($_SESSION['admin'] ))
{
    // User is not logged in
    $_SESSION['message'] = 'Youre not logged in';

    // redirect to home page
    header('Location: login.php');
    exit;
}

$nama_admin = $_SESSION['admin']['nama_admin'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="admin dashboard influencer marketplace">
    <meta name="author" content="team 1 ta mikroskil">
    <link rel="icon" href="<?=base_url('img/favicon/fav.png');?>">
    <title>Administrator In-Mark</title>
    
    <!-- normalize.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/normalize.css');?>" />
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/dashboard.css');?>" rel="stylesheet" />
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('admin/assets/plugins/DataTables/datatables.min.css');?>"/>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hi, <?=$nama_admin ;?></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="btn btn-outline-warning" href="<?=base_url('admin/logout.php');?>">
            <span data-feather="log-out"></span>
            Keluar
          </a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/dashboard.php');?>">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/proyeklist.php');?>">
                  <span data-feather="folder"></span>
                  Proyek
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/perpanjanganproyek.php');?>">
                  <span data-feather="calendar"></span>
                  Perpanjangan Proyek
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/influencerlist.php');?>">
                  <span data-feather="users"></span>
                  Influencer
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/perusahaanlist.php');?>">
                  <span data-feather="server"></span>
                  Perusahaan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/proposalist.php');?>">
                  <span data-feather="file-text"></span>
                  Proposal
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/laporproyek.php');?>">
                  <span data-feather="book"></span>
                  Laporan Pengerjaan Proyek
                </a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/pemasukanlist.php');?>">
                  <span data-feather="download"></span>
                  Pembayaran Dari Proyek
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/pay.php');?>">
                  <span data-feather="upload"></span>
                  Bayar  Influencer
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/retur.php');?>">
                  <span data-feather="refresh-ccw"></span>
                  Retur Dana Proyek
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('admin/tarik-saldo.php');?>">
                  <span data-feather="refresh-ccw"></span>
                  Tarik Saldo Influencer
                </a>
              </li>
            </ul>
          </div>
        </nav>