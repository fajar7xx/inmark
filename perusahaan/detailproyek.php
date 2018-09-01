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
					    id_proyek ='$idProyek'";

$sqldetailProyek = mysqli_query($koneksi, $querydetailProyek);
$dataDetailProyek = mysqli_fetch_array($sqldetailProyek, MYSQLI_ASSOC);

// ubah tanggal menjadi yyyy-mm-dd
// $tanggalDibuat = date('Y- m-d', strtotime($dataDetailProyek['tgl_dibuat']));
?>

<div class="container">
	<!-- daftar proyek -->
	<div class="row my-3">
		<div class="col-12 my-3">
			<form method="post">
				<div class="form-row bg-light">
					<div class="col text-right">
						<button type="submit" name="proyekselesai" class="btn btn-info btn-block btn-lg">Buat Proyek Telah Selesai</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-12">
			<!-- deskripsi -->
			<div class="p-3 bg-white rounded box-shadow">
				<div class="mb-4">
					<h2 class="text-primary text-left"><?=$dataDetailProyek['judul_proyek'];?></h2>
					<small>Diposting pada : <?=tanggal($dataDetailProyek['tgl_dibuat']);?></small>
				</div>
				<div class="justify-content-around">
					<?=$dataDetailProyek['deskripsi'];?>
				</div>

				<div class="row mt-4 mb-2">
					<div class="col-6 text-left">Tangal Mulai : <?=tanggal($dataDetailProyek['tgl_mulai']);?></div>
					<div class="col-6 text-left">Tangal Berakhir : <?=tanggal($dataDetailProyek['tgl_akhir']);?></div>
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
	</div>
			<div class="my-3 p-3 bg-white rounded box-shadow">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pendaftar" role="tab" aria-controls="pills-home" aria-selected="true">Influencer Yang Mendaftar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#laporan" role="tab" aria-controls="pills-profile" aria-selected="false">Influencer Yang Terpilih</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pendaftar" role="tabpanel" aria-labelledby="pills-home-tab">
						<h6 class="border-bottom border-gray pb-2 mb-0">Influencer Yang Mendaftar Proposal</h6>
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Tanggl Dibuat</th>
									<th scope="col">Diterima</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$qProposalProyek = "SELECT
								    proyek.id_proyek,
								    proposal.id_proposal,
								    proposal.tgl_dibuat,
								    proposal.diterima,
								    influencer.id_influencer,
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
								if((mysqli_num_rows($sql_ProposalProyek)) > 0):
									$no = 1;
									while($data_ProposalProyek = mysqli_fetch_array($sql_ProposalProyek, MYSQLI_ASSOC)):
										?>
										<tr>
											<th scope="row"><?=$no++;?></th>
											<td>
												<a href="profil-inf.php?id=<?=$data_ProposalProyek['id_influencer'];?>" target="blank">
													<?=$data_ProposalProyek['nm_lengkap'];?>
												</a>
											</td>
											<td><?=tanggal($data_ProposalProyek['tgl_dibuat']);?></td>
											<td><?=cek_status($data_ProposalProyek['diterima']);?></td>
											<td>
												<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
													<div class="btn-group mr-2" role="group" aria-label="First group">
														<a href="lihatproposal.php?id=<?=$data_ProposalProyek['id_proposal'];?>" class="btn btn-sm btn-primary" target="blank">Lihat Proposal</a>
														<!-- <a href="laporan-influencer.php" class="btn btn-sm btn-info ml-2">Lihat Laporan</a> -->
													</div>
												</div>
											</td>
										</tr>
										<?php
									endwhile;
								endif;
								?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="laporan" role="tabpanel" aria-labelledby="pills-profile-tab">
						<h6 class="border-bottom border-gray pb-2 mb-0">Laporan dari Influencer Yang Terpilih</h6>
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama</th>
									<th scope="col">Tanggl Dibuat</th>
									<!-- <th scope="col">Diterima</th> -->
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$query_proposalditerima = "SELECT
													    proyek.id_proyek,
													    proposal.id_proposal,
													    proposal.tgl_dibuat,
													    proposal.diterima,
													    influencer.id_influencer,
													    influencer.nm_lengkap,
													    influencer.email,
													    influencer.gbr_profil
													FROM
													    proyek
													LEFT JOIN proposal USING(id_proyek)
													LEFT JOIN influencer USING(id_influencer)
													WHERE(
														id_proyek = '$idProyek' AND
														diterima = 1
													)";

								$sql_proposalditerima =mysqli_query($koneksi, $query_proposalditerima) or die(mysqli_connect_error($koneksi));  
								if((mysqli_num_rows($sql_proposalditerima)) > 0):
									$no = 1;
									while($data_proposalditerima = mysqli_fetch_array($sql_proposalditerima, MYSQLI_ASSOC)): 
										?>
										<tr>
											<th scope="row"></th>
											<td>
												<a href="profil-inf.php?id=<?=$data_proposalditerima['id_influencer'];?>">
													<?=$data_proposalditerima['nm_lengkap'];?>
												</a>
											</td>
											<td>tanggal pembuatan laporan</td>
											<td>
												<a href="laporan-influencer.php" class="btn btn-sm btn-info ml-2">Lihat Laporan</a>
											</td>
										</tr>
								<?php
									endwhile;
								endif;
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<!-- <div class="my-3 p-3 bg-white rounded box-shadow"></div> -->
		</div>
		<div class="col-4"></div>
	</div>
</div>

<?php include_once 'template/footer.php' ?>