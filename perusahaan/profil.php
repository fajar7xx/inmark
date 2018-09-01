<?php 

include_once 'template/header.php';

$id_perusahaan = $id_pengguna;

$queryProfil_per = "SELECT * FROM perusahaan
					JOIN profil_perusahaan USING(id_perusahaan)
					WHERE id_perusahaan = '$id_perusahaan'";
$sqlProfil_per = mysqli_query($koneksi, $queryProfil_per);
$dataProfil_per = mysqli_fetch_array($sqlProfil_per, MYSQL_ASSOC);

if(!$sqlProfil_per){
	printf("Error message: %s\n", mysqli_error($koneksi));
}


?>
		<!-- container section -->
		<div class="container my-3">
			<div class="row">
				<div class="col-4">
					<!-- profile section -->
					<div class="card box-shadow">
						<div class="card-body">
							<img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataProfil_per['gbr_profil']);?>" style="width: 60%; height: auto;">
							<div class="text-center mt-lg-4">
								<h3 class="card-title text-primary m-0"><?=$dataProfil_per['nm_perusahaan'];?></h3>
								<p><?=$dataProfil_per['email'];?></p>
								<p class="m-0"><?=$dataProfil_per['kota'];?>, <?=$dataProfil_per['provinsi'];?></p>
								<p class="m-0"><?=$dataProfil_per['negara'];?></p>
							</div>

							<ul class="list-group list-group-flush small">
								<li class="list-group-item">
									<i class="fas fa-globe fa-lg text-primary"></i>&nbsp;
									<a href="<?=$dataInfDetail['website'];?>" target="blank" class="text-body">
										<?=$dataProfil_per['website'];?>
									</a>
								</li>
								<li class="list-group-item">
									<i class="fas fa-phone fa-lg text-primary"></i>&nbsp;
									<?=$dataProfil_per['telp'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-map-marker-alt fa-lg text-primary"></i></span>&nbsp;
									<?=$dataProfil_per['alamat'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-user-circle fa-lg text-primary"></i></span>&nbsp;
									Contact Person : <?=$dataProfil_per['nm_cp'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-mobile-alt fa-lg text-primary"></i></span>&nbsp;
									no. Contact Person : <?=$dataProfil_per['no_cp'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-file fa-lg text-primary"></i></span>&nbsp;
									NO. NPWP : <?=$dataProfil_per['no_npwp'];?>
								</li>
								<li class="list-group-item">
									<i class="fas fa-file fa-lg text-primary"></i></span>&nbsp;
									NO. SIUP : <?=$dataProfil_per['no_siup'];?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- ./profile section -->

				<!-- about us section -->
				<div class="col-8">
					<div class="p-3 bg-white rounded box-shadow border">
						<div class="mb-4">
							<h2 class="text-primary">Tentang Kami</h2>
							<div class="dropdown-divider"></div>
						</div>
						<div>
							<?=$dataProfil_per['tentang'];?>
						</div>
					</div>
				</div>
				<!-- <div class="col-1"></div> -->
			</div>
		</div>
		<!-- ./container section -->

<?php include_once 'template/footer.php'; ?>