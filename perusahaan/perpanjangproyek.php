<?php 
include_once 'template/header.php'; 

// autentikasi kepada pihak yang bukan pemilik proyek

$id_proyek = $_GET['proyek'];

$query_proyek = "SELECT * FROM proyek WHERE id_proyek = '$id_proyek'";
$sql_proyek = mysqli_query($koneksi, $query_proyek) or die(mysqli_error($koneksi));
$data_proyek = mysqli_fetch_array($sql_proyek, MYSQLI_ASSOC);


if(isset($_POST['perpanjang'])){
	$perpanjang = 4 ;
	$tgl_mulaibaru = mysqli_real_escape_string($koneksi, $_POST['tgl_mulaibaru']);
	$tgl_akhirbaru = mysqli_real_escape_string($koneksi, $_POST['tgl_akhirbaru']);

	$query_perpanjangan = "UPDATE proyek SET tgl_mulai = '$tgl_mulaibaru', tgl_akhir = '$tgl_akhirbaru', selesai = '$perpanjang', tgl_dibuat = now() WHERE id_proyek = '$id_proyek'";
	$sql_perpanjangan = mysqli_query($koneksi, $query_perpanjangan);


	if(!$sql_perpanjangan){
		printf("Error message: %s\n", mysqli_error($koneksi));
	}
	// tampilNotif($sql_perpanjangan);
	header('location:'.base_url('perusahaan/index.php'));
}


?>
<!-- dilakukan untuk memperpanjang proyek
hanya dapat dilakukan sekali secara sistem karena
proyek akan ditutup secara sistem -->

<div class="container">
	<div class="my-3 p-3 bg-white rounded shadow-sm">
		<h4 class="border-bottom border-gray pb-2 mb-3 text-center">Pengajuan Perpanjangan Proyek</h4>
		<p><?=(!empty($pesan))?$pesan:'';?></p>
		<form class="mt-4" method="post">
			<h3>Judul Proyek : <?=$data_proyek['judul_proyek'];?></h3>
			<div>
				<?=$data_proyek['deskripsi'];?>
			</div>
			
			<div class="row">
				<div class="col-3">
					Tanggal Mulai <br>
					<span><?=tanggal($data_proyek['tgl_mulai']);?></span>
				</div>
				<div class="col-3">
					Tanggal Berakhir <br>
					<span><?=tanggal($data_proyek['tgl_akhir']);?></span>
				</div>
			</div>
			
			<div class="dropdown-divider"></div>

			<div class="row">
				<div class="col-3">
					<label>Perpanjang Tanggal Mulai</label>
					<input type="date" class="form-control" name="tgl_mulaibaru">
				</div>
				<div class="col-3">
					<label>Perpanjang Tanggal Akhir</label>
					<input type="date" class="form-control" name="tgl_akhirbaru">
				</div>
			</div>
			<div class="form-group mt-4">
				<button type="submit" class="btn btn-primary" name="perpanjang">Perpanjang Proyek</button>
				<a href="<?=base_url('perusahaan');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
			</div>

		</form>
	</div>
</div>


<?php include_once 'template/footer.php'; ?>