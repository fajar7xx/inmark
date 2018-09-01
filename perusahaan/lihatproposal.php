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
					<h2 class="text-primary">Nama Influencer : <?=$data_proposal['nm_lengkap'];?> </h2>
					<a href="profil-inf.php?id=<?=$data_proposal['id_influencer'];?>" class="btn btn-outline-primary btn-sm">
						Lihat Profil Influencer &nbsp;
						<i class="fas fa-angle-right fa-lg"></i>
					</a>
					<div class="dropdown-divider"></div>
				</div>
				<div class="justify-content-around mb-3">
					<h3 class="text-center">Judul Proyek : <?=$data_proposal['judul_proyek'];?></h3>
					<h3><u>Deskripsi</u></h3>

					<?=$data_proposal['deskripsi'];?>
				</div>
				<div class="dropdown-divider"></div>

				<?php  
				if(isset($_POST['setuju'])){
					$qproposal = "UPDATE proposal SET diterima = 1 WHERE id_proposal = '$id_proposal'";
					$sproposal = mysqli_query($koneksi, $qproposal);

					header('location:detailproyek.php?idproyek='.$data_proposal['id_proyek']);
				}
				elseif(isset($_POST['tolak'])){
					$qproposal = "UPDATE proposal SET diterima = 2 WHERE id_proposal = '$id_proposal'";
					$sproposal = mysqli_query($koneksi, $qproposal);

					header('location:detailproyek.php?idproyek='.$data_proposal['id_proyek']);
				}
				?>


				<form method="post">
					<div class="form-row">
						<div class="form-group">
							<input type="submit" name="setuju" value="Setuju" class="btn btn-success float-left mr-3">
							<input type="submit" name="tolak" value="Tolak" class="btn btn-danger float-left">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php  
include_once 'template/footer.php';
?>