<!-- lihat laporan dari influencer -->

<?php  
include_once 'template/header.php';

$id_laporproyek = $_GET['data'];

$id_perusahaan = $id_pengguna;

$query_laporProyek = "SELECT
                          lapor_proyek.*,
                          perusahaan.nm_perusahaan,
                          influencer.nm_lengkap,
                          proyek.judul_proyek,
                          proyek.dana
                      FROM
                          lapor_proyek
                      LEFT JOIN perusahaan USING(id_perusahaan)
                      LEFT JOIN influencer USING(id_influencer)
                      LEFT JOIN proyek USING(id_proyek)
                      WHERE 
                      	id_laporproyek = '$id_laporproyek'";
$sql_laporProyek = mysqli_query($koneksi, $query_laporProyek) or die(mysqli_error($koneksi));
$data_laporProyek = mysqli_fetch_array($sql_laporProyek, MYSQLI_ASSOC);

$id_proyek = $data_laporProyek['id_proyek'];
$dana_proyek = $data_laporProyek['dana'];
$id_influencer = $data_laporProyek['id_influencer']; 
?>


<div class="container-fluid my-2">
	<div class="row">
		<!-- deskripsi proyek -->
		<div class="card mx-auto w-75 h-100">
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
							<i class="fas fa-download"></i> Unduh Lampiran
						</a>
					</div>
				</div>
				<?php  
				if(isset($_POST['konfirmasi'])){
					$query_konfirmasiLaporan = "UPDATE lapor_proyek SET status_laporan = 1 WHERE id_laporproyek = '$id_laporproyek'";
					$sql_konfirmasilaporan = mysqli_query($koneksi, $query_konfirmasiLaporan);

					if(!$sql_konfirmasilaporan){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}
					// tampilNotif($sql_konfirmasilaporan);
					// tutup proyek ketika konfirmas laporan pengerjaan proyek selesai 
					// dan berikan rating pada influencer

					// // defenisi proyek berjalan dan selesai
					// aktif dan berjalan  => aktif = 1 & selesai = 0
					// selesai => aktif = 0 dan selesai = 1
					$query_tutup = "UPDATE proyek SET aktif = 0, selesai = 2 WHERE id_proyek = '$id_proyek'";
					$sql_tutup = mysqli_query($koneksi, $query_tutup);

					if(!$sql_tutup){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}

					// membuat invoice untuk di serahkan kepada admin dan di setujui lalu
					// di tampilkan ke influencer
					$no_tagihan = 'TI' . $id_influencer . $id_proyek . $id_perusahaan . date('dmY');
					$generate_tagihan = "INSERT INTO pembayaran_influencer (id_proyek, id_influencer, no_tagihan, nominal) VALUES ('$id_proyek', '$id_influencer', '$no_tagihan', '$dana_proyek')";
					// var_dump($generate_tagihan);

					$update_tagihan = mysqli_query($koneksi, $generate_tagihan);

					if(!$update_tagihan){
						printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
					}

					header('location:rating.php?id='.$id_proyek);
				}


				?>

				<div class="btn-group">
				<?php if(empty($data_laporProyek['status_laporan'])): ?>
					<form method="post">
						<div class="btn-group">
							<button class="btn btn-primary mr-2" name="konfirmasi">Konfirmasi dan Tutup Proyek</button>
						</div>
					</form>
				<?php endif; ?>

					<a href="<?=base_url('perusahaan/index.php');?>" class="card-link btn btn-warning">
						Kembali
					</a>
				</div>
				
				
			</div>
		</div>
		<!-- ./deskripsi proyek -->
	</div>
</div>
<?php  
include_once 'template/footer.php';
?>