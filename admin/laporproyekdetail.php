<?php 
include_once 'header.php'; 

$id_laporproyek = $_GET['data'];

$query_laporProyek = "SELECT
                          lapor_proyek.*,
                          perusahaan.nm_perusahaan,
                          influencer.nm_lengkap,
                          proyek.judul_proyek
                      FROM
                          lapor_proyek
                      LEFT JOIN perusahaan USING(id_perusahaan)
                      LEFT JOIN influencer USING(id_influencer)
                      LEFT JOIN proyek USING(id_proyek)
                      WHERE 
                      	id_laporproyek = '$id_laporproyek'";
$sql_laporProyek = mysqli_query($koneksi, $query_laporProyek) or die(mysqli_error($koneksi));
$data_laporProyek = mysqli_fetch_array($sql_laporProyek, MYSQLI_ASSOC);


?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 ml-3">
		<h1 class="h2">Detail Pengerjaan Proyek oleh Influencer</h1>
	</div>
	<hr>
	<!-- place coding here -->
	<div class="container-fluid mb-lg-4">
		<div class="row">
			<!-- deskripsi proyek -->
			<div class="card w-100 h-100">
				<div class="card-body">
					<h5 class="card-title"><?=$data_laporProyek['judul_proyek'];?></h5>
					<h6 class="card-subtitle mb-2 text-muted">dikerjakan oleh: <?=$data_laporProyek['nm_lengkap'];?></h6>
					<span>Status Laporan : <?=status_laporan($data_laporProyek['status_laporan']);?></span>
					<div class="card-text mt-4">
						<h5>deskripsi penyelesaian proyek</h5>
						<?=$data_laporProyek['isi_laporan'];?>
					</div>
					
					<div class="my-2">
						<p>Bukti File</p>
						<img src="<?=base_url($data_laporProyek['bukti_laporan']);?>" class="img-thumbnail" style="height: auto; width: 30%;">
						<div class="my-3">
							<a href="<?=base_url($data_laporProyek['bukti_laporan']);?>" download class="btn btn-outline-info">
								<span data-feather="download" class="align-middle"></span> Unduh Lampiran
							</a>
						</div>
					</div>
					<a href="<?=base_url('admin/laporproyek.php');?>" class="card-link btn btn-warning">
					Kembali
					</a>
				</div>
			</div>
			<!-- ./deskripsi proyek -->
		</div>
	</div>
</main>

<?php include_once 'footer.php'; ?>