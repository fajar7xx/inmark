<?php 
include_once 'header.php'; 

$id_pengembalian = $_GET['id'];

$query_pengembalian = "SELECT
						    pengembalian_uang.*,
						    perusahaan.nm_perusahaan,
						    proyek.judul_proyek
						FROM
						    pengembalian_uang
						JOIN perusahaan USING(id_perusahaan)
						JOIN proyek USING(id_proyek)
						WHERE id_pengembalian = '$id_pengembalian'";
$sql_pengembalian = mysqli_query($koneksi, $query_pengembalian) or die(mysqli_error($koneksi));
$data_pengembalian = mysqli_fetch_array($sql_pengembalian, MYSQLI_ASSOC);



?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 ml-3">
		<h1 class="h2">Detail Pembatalan Proyek</h1>
	</div>
	<hr>
	<!-- place coding here -->
	<div class="container-fluid mb-lg-4">
		<div class="row">
			<!-- deskripsi proyek -->
			<div class="card w-100 h-100">
				<div class="card-body">
					<h5 class="card-title"><?=$data_pengembalian['judul_proyek'];?></h5>
					<h6 class="card-subtitle mb-2 text-muted">diajukan oleh: <?=$data_pengembalian['nm_perusahaan'];?></h6>
					<div class="card-text mt-4">
						<h5>Alasan Pembatalan</h5>
						<?=$data_pengembalian['alasan'];?>
					</div>
					<?php if($data_pengembalian['konfirmasi'] == 0):?>
						<a href="action.php?batal=<?=$data_pengembalian['id_pengembalian'];?>" class="card-link btn btn-success">
						Konfirmasi dan retur uang
						</a>
					<?php endif; ?>
					<a href="<?=base_url('admin/retur.php');?>" class="card-link btn btn-warning">
					Kembali
					</a>
				</div>
			</div>
			<!-- ./deskripsi proyek -->
		</div>
	</div>
</main>

<?php include_once 'footer.php'; ?>