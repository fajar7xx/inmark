<?php 
include_once 'template/header.php'; 

$id_perusahaan = $id_pengguna;
$id_proyek = $_GET['id'];

$query_cek = "SELECT * FROM rating WHERE(id_proyek = '$id_proyek' AND id_perusahaan = '$id_perusahaan')";
$sql_cek = mysqli_query($koneksi, $query_cek);

if(mysqli_num_rows($sql_cek) > 0){
	header('location:'.base_url('perusahaan/index.php'));
}

$query_proyek = "SELECT
				    lapor_proyek.*,
				    influencer.nm_lengkap,
				    influencer.gbr_profil,
				    proyek.judul_proyek
				FROM
				    lapor_proyek
				LEFT JOIN influencer USING(id_influencer)
				LEFT JOIN proyek USING(id_proyek)
				WHERE
				    id_proyek = '$id_proyek'";
$sql_proyek = mysqli_query($koneksi, $query_proyek);
$data_proyek = mysqli_fetch_array($sql_proyek, MYSQLI_ASSOC);

$id_influencer = $data_proyek['id_influencer'];


$query_avgrating = "SELECT FORMAT(AVG(bintang),1) AS jml FROM rating WHERE id_influencer = '$id_influencer'";
$sql_avgrating = mysqli_query($koneksi, $query_avgrating);
$data_avgrating = mysqli_fetch_array($sql_avgrating, MYSQLI_ASSOC);
$hasil = ceil($data_avgrating['jml']);
?>

<div class="container my-4">
	<div class="row">
		<div class="card text-center h-100 w-75 mx-auto">
			<div class="card-header">
				Rating This Influencer
			</div>
			<div class="card-body">
				<h5 class="card-title"><?=$data_proyek['nm_lengkap'];?></h5>
				<img src="<?=base_url($data_proyek['gbr_profil']);?>" class="img-fluid img-thumbnail" style="width: 256px; height: auto;"> <br>
				<!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
				<?php  
				if(isset($_POST['submit'])){
					$bintang = mysqli_real_escape_string($koneksi, $_POST['bintang']);
					$testimoni = mysqli_real_escape_string($koneksi,$_POST['testimoni']);

					$query_tambahRating = "INSERT INTO rating(id_influencer, id_proyek, id_perusahaan, bintang, pesan) VALUES('$id_influencer', '$id_proyek', '$id_perusahaan', '$bintang', '$testimoni')";
					$sql_tambahRating = mysqli_query($koneksi, $query_tambahRating);

					if(!$sql_tambahRating){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}

					header('location: index.php');
					
				}
				?>
				<h5 class="mt-3">Proyek Yang Dikerjkan</h5>
				<p class="lead"><?=$data_proyek['judul_proyek'];?></p>
				<form method="post" class="my-2">
					<div class="form-group">
						<label>Rating: <?=$hasil;?>/5</label><br>
						<label>Berikan Rating dari 1 s/d 5</label> <br>

						<div class="btn-group-toggle" data-toggle="buttons">
							<?php foreach(range(1, 5) as $rating): ?>
								<label class="btn btn-outline-info">
									<input type="radio" name="bintang" value="<?=$rating;?>" autocomplete="off" checked><?=$rating;?>
								</label>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="form-group">
						<label>Detail Ulasan</label>
						<textarea name="testimoni" class="form-control" id="deskripsi"></textarea>
					</div>
					<button class="btn btn-primary" name="submit">Submit</button>
					<a href="<?=base_url('perusahaan/index.php');?>" class="btn btn-warning">Kembali, Lain kali</a>
				</form>
			</div>

			<!-- <div class="card-footer text-muted">
				2 days ago
			</div> -->
		</div>
		
	</div>
</div>

<?php include_once 'template/footer.php'; ?>