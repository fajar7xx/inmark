<?php
include_once 'template/header.php'; 

$id_influencer = $id_pengguna;

$idProyek = $_GET['idproyek'];

$querydetailProyek = "SELECT
					    proyek.id_proyek,
					    proyek.judul_proyek,
					    proyek.deskripsi,
					    proyek.dana,
					    proyek.tgl_mulai,
					    proyek.tgl_akhir,
					    proyek.tgl_dibuat,
					    perusahaan.id_perusahaan,
					    perusahaan.nm_perusahaan,
					    perusahaan.gbr_profil,
					    kategori.nama_kategori,
					    jlh_proposal
					FROM
					    proyek
					LEFT JOIN kategori USING(id_kategori)
					LEFT JOIN perusahaan USING(id_perusahaan)
					LEFT JOIN(
					    SELECT
					        id_proyek,
					        COUNT(id_proyek) AS jlh_proposal
					    FROM
					        proposal
					    GROUP BY
					        id_proyek
					) AS proposal USING(id_proyek)
					WHERE
					    id_proyek = '$idProyek'";

$sqldetailProyek = mysqli_query($koneksi, $querydetailProyek);
$dataDetailProyek = mysqli_fetch_array($sqldetailProyek, MYSQLI_ASSOC);

// ubah tanggal menjadi yyyy-mm-dd
$tanggalDibuat = date('d F Y', strtotime($dataDetailProyek['tgl_dibuat']));
?>

		<div class="container">
			<!-- daftar proyek -->
			<div class="row my-3">
				<div class="col-8">
					<!-- deskripsi -->
					<div class="p-3 bg-white rounded box-shadow">
						<div class="mb-4">
							<h2 class="text-primary"><?=$dataDetailProyek['judul_proyek'];?></h2>
							<small>Diposting pada : <?=$tanggalDibuat;?></small>
						</div>
						<div class="justify-content-around">
							<?=$dataDetailProyek['deskripsi'];?>
						</div>

						<div class="row mt-4 mb-2">
							<div class="col-6 text-left">Tangal Mulai : <?=date('d F Y', strtotime($dataDetailProyek['tgl_mulai']));?></div>
							<div class="col-6 text-left">Tangal Berakhir : <?=date('d F Y', strtotime($dataDetailProyek['tgl_akhir']));?></div>
						</div>
						<div class="dropdown-divider"></div>
						<div class="row">
					    	<div class="col-3 text-left">Kategori : <?=$dataDetailProyek['nama_kategori'];?></div>
					    	<div class="col-3 text-center">Dana : <?=rupiah($dataDetailProyek['dana']);?></div>
					    	<div class="col-3 text-center">Proposal : <?=($dataDetailProyek['jlh_proposal']>0)?$dataDetailProyek['jlh_proposal']:'0';?> Orang</div>
					    	<div class="col-3 text-right"><?=waktulalu($dataDetailProyek['tgl_dibuat']);?></div>
					    </div>
					</div>
				</div>

				<!-- perusahaan section -->
				<div class="col-4">
					<div class="card box-shadow">
						<div class="card-header">
							<h4 class="font-weight-normal text-center">Di posting oleh:</h4>
						</div>
						<div class="card-body">
							<img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataDetailProyek['gbr_profil']);?>" style="width: 60%; height: auto;">
							<h4 class="card-title text-center my-2"><?=$dataDetailProyek['nm_perusahaan'];?></h4>
							<div class="dropdown-divider mt-4"></div>
							<a href="profil-per.php?id=<?=$dataDetailProyek['id_perusahaan'];?>" class="btn btn-primary w-100">Detail Perusahaan</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-8">

					<?php  
					$qProposal = "SELECT * FROM proposal WHERE(id_proyek = '$idProyek' AND id_influencer = '$id_influencer')";
					$sql_proposal = mysqli_query($koneksi, $qProposal) or die(mysqli_connect_error($koneksi));
					
					if(mysqli_num_rows($sql_proposal) > 0):
					?>
						<a href="#" class="btn btn-primary disabled">Anda Sudah Mendaftar Pada Proyek ini</a>
					<?php	
					else:
					?>
						<a href="daftar-proyek.php?daftarproyek=<?=$dataDetailProyek['id_proyek'];?>" class="btn btn-primary">Ajukan Proposal</a>
					<?php
					endif;

					$qProposalProyek = "SELECT
										    proyek.id_proyek,
										    proposal.id_proposal,
										    proposal.tgl_dibuat,
										    influencer.nm_lengkap,
										    influencer.email,
										    influencer.gbr_profil
										FROM
										    proyek
										LEFT JOIN proposal USING(id_proyek)
										LEFT JOIN influencer USING(id_influencer)
										WHERE
										    id_proyek = '$idProyek'";

					$sql_ProposalProyek =mysqli_query($koneksi, $qProposalProyek) or die(mysqli_connect_error($koneksi));
					?>
					
					<div class="my-3 p-3 bg-white rounded box-shadow">
						<h6 class="border-bottom border-gray pb-2 mb-0">Proposal</h6>
						<?php  
						if(mysqli_num_rows($sql_ProposalProyek) > 0):
							while($data_ProposalProyek = mysqli_fetch_array($sql_ProposalProyek, MYSQLI_ASSOC)):
						?>
						<div class="media text-muted border-bottom">
							<img class="img-thumbnail img-fluid" style="width: 64px; height: 64px;" src="<?=base_url($data_ProposalProyek['gbr_profil']);?>">
							<div class="media-body pb-2 mb-0 my-auto small lh-125">
								<div class="d-flex justify-content-between align-items-end w-100 pl-2">
									<strong class="text-gray-dark"><?=$data_ProposalProyek['nm_lengkap'];?></strong>
									<span><?=date('d F Y',strtotime($data_ProposalProyek['tgl_dibuat']));?></span>
									<!-- <a href="#">Lihat</a> -->
								</div>
							</div>
						</div>
						<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
				<div class="col-4"></div>
			</div>
			
		</div>

<?php include_once 'template/footer.php' ?>