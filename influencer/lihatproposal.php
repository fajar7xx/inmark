<?php  
include_once 'template/header.php';

$id_proposal = $_GET['id'];

$query_proposal = "SELECT
			    proposal.*,
			    proyek.judul_proyek,
			    influencer.id_influencer,
			    influencer.nm_lengkap
			FROM
			    proposal
			JOIN proyek USING(id_proyek)
			JOIN influencer USING(id_influencer)
			WHERE
			    id_proposal = $id_proposal";
$sql_proposal = mysqli_query($koneksi, $query_proposal);
$data_proposal = mysqli_fetch_array($sql_proposal, MYSQLI_ASSOC);
?>

<div class="container">
	<!-- daftar proyek -->
	<div class="row my-3">
		<div class="col-12">
			<!-- deskripsi -->
			<div class="p-3 bg-white rounded box-shadow">
				<div class="mb-4">
					<h3 class="text-center">Judul Proyek : <?=$data_proposal['judul_proyek'];?></h3>
					<div class="dropdown-divider"></div>
					<p>
						Status Proposal : <span class="text-right"><?=cek_status($data_proposal['diterima']);?></span>
					</p>
				</div>
				<div class="justify-content-around mb-3">
					<h3><u>Deskripsi</u></h3>
					<?=$data_proposal['deskripsi'];?>
				</div>
				<div class="dropdown-divider"></div>
			</div>
		</div>
	</div>
</div>


<?php  
include_once 'template/footer.php';
?>