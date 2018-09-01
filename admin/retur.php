<?php 

include_once 'header.php'; 

$query_pengembalian = "SELECT
						    pengembalian_uang.*,
						    perusahaan.nm_perusahaan,
						    proyek.judul_proyek
						FROM
						    pengembalian_uang
						JOIN perusahaan USING(id_perusahaan)
						JOIN proyek USING(id_proyek)
						ORDER BY
						    tgl_dibuat
						DESC";
$sql_pengembalian = mysqli_query($koneksi, $query_pengembalian) or die(mysqli_error($koneksi));

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
		<h1 class="h3">Laporan Permintaan Retur Akibat Pembatalan Proyek</h1><br>
		<!-- <h2>Waktu <?=date('Y-m-d H:i:s');?></h2> -->
	</div>

	<div class="table-responsive">
		<table class="table table-striped table-hover" id="tabel">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama Perusahaan</th>
					<th>Dana</th>
					<th>Judul Proyek</th>
					<th>Status</th>
					<th>Tanggal Pengajuan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				if(mysqli_num_rows($sql_pengembalian) > 0):
					$no = 1;
					while($data_pengembalian = mysqli_fetch_array($sql_pengembalian, MYSQLI_ASSOC)):
				?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$data_pengembalian['nm_perusahaan'];?></td>
					<td><?=rupiah($data_pengembalian['dana']);?></td>
					<td><?=$data_pengembalian['judul_proyek'];?></td>
					<td><?=review($data_pengembalian['konfirmasi']);?></td>
					<td><?=tanggal($data_pengembalian['tgl_dibuat']);?></td>
					<td>
						<a href="konfirmasibatal.php?id=<?=$data_pengembalian['id_pengembalian'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span> Kelola</a>
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