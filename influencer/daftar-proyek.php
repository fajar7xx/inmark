<?php 
include_once 'template/header.php';

// untuk mengatahui id pengguna
$id_influencer = $id_pengguna;

// untuk mengatahui idproyek
$id_proyek = $_GET['daftarproyek']; 

$query_proyek = "SELECT proyek.id_proyek, proyek.judul_proyek,  proyek.dana, proyek.tgl_akhir, 
				proyek.tgl_dibuat,kategori.nama_kategori 
                FROM proyek
				LEFT JOIN kategori USING(id_kategori)
				WHERE id_proyek = '$id_proyek'";

$sql_proyek = mysqli_query($koneksi, $query_proyek);
$data_proyek = mysqli_fetch_array($sql_proyek, MYSQLI_ASSOC);

$querycek_proposal = "SELECT * FROM proposal WHERE
						(
							id_influencer = '$id_influencer' AND
							id_proyek = '$id_proyek'
						)";
$sqlcek_proposal = mysqli_query($koneksi, $querycek_proposal);

if(mysqli_num_rows($sqlcek_proposal) > 0)
{
    // redirect ke laman proyek
    header('Location: proyek.php');
    exit;
}
?>
<p class="text-center mt-4 h3">Daftar Proposal Pada Proyek ini </p>
<div class="container">
	<div class="row  p-3 d-flex justify-content-center">
		<div class="card h-100  w-75">
			<div class="card-header text-center">
				 <h3>Proyek</h3>
			</div>
			<div class="card-body">
				<h4 class="card-title display-4 text-center"><?=$data_proyek['judul_proyek'];?></h4>
				<hr>
				<table>
				<tr>
					<td class="pr-2">Di Posting Pada</td>
					<td> : <?=tanggal($data_proyek['tgl_dibuat']);?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td> : <?=$data_proyek['nama_kategori'];?></td>
				</tr>
				<tr>
					<td>Dana</td>
					<td> : <?= rupiah($data_proyek['dana']);?></td>
				</tr>
				<tr>
					<td>Batas Proyek</td>
					<td> : <?=$data_proyek['tgl_akhir'];?></td>
				</tr>	
				</table>
			</div>
		</div>
		<div class="card h-100  w-75 mt-3">
			<div class="card-header text-center">
				 <h3>Ajukan Proposal Pada Proyek Ini</h3>
			</div>
			<div class="card-body">
				<?php  
				if(isset($_POST['pengajuan'])){
					$proposal = mysqli_real_escape_string($koneksi, $_POST['proposal']);

					$query_proposal = "INSERT INTO proposal(id_proyek, id_influencer, deskripsi) VALUES('$id_proyek', '$id_influencer', '$proposal')";
					$sql_proposal = mysqli_query($koneksi, $query_proposal);

					if(!$sql_proposal){
						printf("Pean Kesalahan Pada : %s\n", mysqli_error($koneksi));
					}
					else{
						header('location: proyek.php');
					}	
				}
				?>
				<form method="post">
					<div class="form-group">
						<label class="h3">Proposal</label>
						<textarea class="form-control" id="proposal" name="proposal"></textarea>
					</div>
					<button type="submit" class="btn btn-primary" name="pengajuan">Ajukan Proposal</button>
					<a href="<?=base_url('influencer/proyek.php');?>" class="text-warning float-right">Kembali Ke Daftar Proyek</a>
				</form>
			</div>
			<!-- <div class="card-footer text-muted">
				2 days ago
			</div> -->
		</div>
	</div>
</div>


<?php include_once 'template/footer.php' ?>