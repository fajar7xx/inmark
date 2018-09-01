<?php 
include_once 'header.php'; 

$query_perpanjangan = "SELECT * FROM proyek WHERE selesai = 4";
$sql_perpanjangan = mysqli_query($koneksi, $query_perpanjangan);

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
		<h1 class="h3">Laporan Permintaan Perpanjangan Proyek</h1><br>
		<h2>Waktu <?=date('Y-m-d H:i:s');?></h2>
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover" id="proyek">
			<thead>
				<tr>
					<th>#</th>
					<th>Judul Proyek</th>
					<th>tgl mulai baru</th>
					<th>tgl mulai akhir</th>
					<!-- <th></th>
					<th></th -->
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				if(mysqli_num_rows($sql_perpanjangan) > 0):
					$no = 1;
					while($data = mysqli_fetch_array($sql_perpanjangan, MYSQLI_ASSOC)):
				?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$data['judul_proyek'];?></td>
					<td><?=tanggal($data['tgl_mulai']);?></td>
					<td><?=tanggal($data['tgl_akhir']);?></td>
					<!-- <td></td>
					<td></td> -->
					<td>
						<a href="action.php?perpanjang=<?=$data['id_proyek'];?>" class="btn btn-outline-primary btn-sm" title="perpanjang proyek">
							<span data-feather="edit"></span> Konfirmasi
						</a>
					</td>
				</tr>
				<?php  
					endwhile;
				endif;
				?>
			</tbody>
		</table>
	</div>
</main>


<?php include_once 'footer.php'; ?>