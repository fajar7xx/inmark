<?php 

include_once 'template/header.php';

$id_influencer = $id_pengguna;

$queryProfil_inf = "SELECT * FROM influencer
					JOIN profil_influencer USING(id_influencer)
					WHERE id_influencer = '$id_influencer'";
$sqlProfil_inf = mysqli_query($koneksi, $queryProfil_inf) or die(mysqli_connect_error($koneksi));
$dataProfil_inf = mysqli_fetch_array($sqlProfil_inf, MYSQL_ASSOC);

$query_rating = "SELECT
				    rating.*,
				    FORMAT(AVG(bintang),
				    1) AS rating,
				    COUNT(id_rating) AS ulasan
				FROM
				    rating
				WHERE
				    id_influencer = '$id_influencer'";
$sql_rating = mysqli_query($koneksi, $query_rating) or die(mysqli_error($koneksi));
$data_rating = mysqli_fetch_array($sql_rating, MYSQLI_ASSOC);
$rating = $data_rating['rating'];
$jlh_ulasan = $data_rating['ulasan'];

?>
		<!-- container section -->
		<div class="container my-3">
			<div class="row">
				<div class="col-4">
					<!-- profile section -->
					<div class="card box-shadow">
						<!-- <div class="card-header">
							<h4 class="font-weight-normal text-center">Tentang Perusahaan</h4>
						</div> -->
						<div class="card-body">
							<img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataProfil_inf['gbr_profil']);?>" style="width: 60%; height: auto;">
							<div class="text-center mt-lg-4">
								<h3 class="card-title text-primary m-0"><?=$dataProfil_inf['nm_lengkap'];?></h3>
								<p><?=$dataProfil_inf['email'];?></p>
								<p class="m-0"><?=$dataProfil_inf['kota'];?>, <?=$dataProfil_inf['negara'];?></p>
								<p>DA/PA : <?=$dataProfil_inf['da'];?>/<?=$dataProfil_inf['pa'];?> </p>
							</div>

							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<i class="far fa-star fa-lg text-primary"></i>&nbsp;
										Rating : <?=$rating;?>/5 - (<?=$jlh_ulasan;?> Ulasan)
								</li>
								<li class="list-group-item">
									<i class="fas fa-globe fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataProfil_inf['website'];?>" target="blank" class="text-body">
										<?=$dataProfil_inf['website'];?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fab fa-facebook fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataProfil_inf['akun_fb'];?>" target="blank" class="text-body">
										<?=get_username($dataProfil_inf['akun_fb']);?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fab fa-twitter-square fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataProfil_inf['akun_twitter'];?>" target="blank" class="text-body">
										<?=get_username($dataProfil_inf['akun_twitter']);?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fab fa-youtube fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataProfil_inf['akun_youtube'];?>" target="blank" class="text-body">
										<?=get_username($dataProfil_inf['akun_youtube']);?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fab fa-instagram fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataProfil_inf['akun_ig'];?>" target="blank" class="text-body">
										<?=get_username($dataProfil_inf['akun_ig']);?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fas fa-phone fa-lg text-primary"></i>&nbsp;
									<?=$dataProfil_inf['telp'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-map-marker-alt fa-lg text-primary"></i></span>&nbsp;
									<?=$dataProfil_inf['alamat'];?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- ./profile section -->
				<div class="col-8">
					<div class="p-3 bg-white rounded box-shadow">
						<div class="mb-4">
							<h2 class="text-primary">Tentang Saya</h2>
							<div class="dropdown-divider"></div>
						</div>
						<div>
							<?=$dataProfil_inf['tentang'];?>
						</div>
					</div>
					<div class="p-3 bg-white rounded box-shadow mt-2">
						<div class="mb-4">
							<h2 class="text-primary">Kemampuan Saya</h2>
							<div class="dropdown-divider"></div>
						</div>
						<div>
							<?=$dataProfil_inf['kemampuan'];?>
						</div>
					</div>
				</div>
				<!-- <div class="col-1"></div> -->
			</div>
		</div>
		<!-- ./container section -->

<?php include_once 'template/footer.php'; ?>