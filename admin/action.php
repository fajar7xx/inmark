<?php  
require_once '../config/config.php';

$idpay_influencer = $_GET['konfirmasipay'];

$query_konfirmasipay = "UPDATE pembayaran_influencer SET konfirmasi = 1 WHERE id_pembayaraninf = '$idpay_influencer'";
$sql_konfirmasipay = mysqli_query($koneksi, $query_konfirmasipay) or die(mysqli_error($koneksi));

if($sql_konfirmasipay){
	header('location: pay.php');
}



// konfirmasi tarik saldo
$id_tariksaldo = $_GET['tariksaldo'];
$query_tarikSaldo = "UPDATE tarik_saldo SET konfirmasi = 1 WHERE id_tariksaldo = '$id_tariksaldo'";
$sql_tarikSaldo = mysqli_query($koneksi, $query_tarikSaldo) or die(mysqli_error($koneksi));

if($sql_tarikSaldo){
	header('location: tarik-saldo.php');
}


// perpanjang proyek
$id_perpanjangproyek = $_GET['perpanjang'];
$query_perpanjangproyek = "UPDATE proyek SET aktif = 1, selesai = 1 WHERE id_proyek = '$id_perpanjangproyek'";
$sql_perpanjangproyek = mysqli_query($koneksi, $query_perpanjangproyek) or die(mysqli_error($koneksi));

if($sql_perpanjangproyek){
	header('location: perpanjanganproyek.php');
}


$id_pengembalian = $_GET['batal'];
$query_batal = "UPDATE pengembalian_uang SET konfirmasi = 1 WHERE id_pengembalian = '$id_pengembalian'";
$sql_batal = mysqli_query($koneksi, $query_batal) or die(mysqli_error($koneksi));

if($sql_batal){
	header('location: retur.php');
}


?>