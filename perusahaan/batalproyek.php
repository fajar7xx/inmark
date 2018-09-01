<?php 
include_once 'template/header.php'; 

$id_perusahaan = $id_pengguna;
$id_proyek = $_GET['batal'];

$query_proyek = "SELECT * FROM proyek WHERE id_proyek = '$id_proyek'";
$sql_proyek = mysqli_query($koneksi, $query_proyek) or die(mysqli_error($koneksi));
$data_proyek = mysqli_fetch_array($sql_proyek, MYSQLI_ASSOC);

$judul = $data_proyek['judul_proyek'];
$dana = $data_proyek['dana'];

if(isset($_POST['ajukan'])){
	$alasan = mysqli_real_escape_string($koneksi, $_POST['alasan']);

	$query_batal = "INSERT INTO pengembalian_uang(id_perusahaan, id_proyek, alasan, dana) VALUES('$id_perusahaan', '$id_proyek', '$alasan', '$dana')";
	$sql_batal = mysqli_query($koneksi, $query_batal) or die(mysqli_error($koneksi));

	$query_matikanProyek = "UPDATE proyek SET aktif = 0, selesai = 5 WHERE id_proyek = '$id_proyek'";
	$sql_matikanProyek = mysqli_query($koneksi, $query_matikanProyek) or die(mysqli_error($koneksi));

	if($sql_matikanProyek){
		header('location: index.php');
	}
}

?>

<!-- batal proyek ini di gunakan agar
dapat membuat permintaan retur proyek dengan syarat yang di tetapkan kemudian dana
di simpan ke perusahaan
 -->

 <div class="container">
 	<div class="my-3 p-3 bg-white rounded shadow-sm h-100 w-75 mx-auto">
 		<h4 class="border-bottom border-gray pb-2 mb-3 text-center">Form Pembatalan Proyek dan Retur Pembayaran</h4>
 		<p><?=(!empty($pesan))?$pesan:'';?></p>
 		<p>
 			Judul Proyek : <?=$judul;?> <br> 
			Dana : <?=rupiah($dana);?>
 		</p>
 		<form class="mt-4" method="post">			
 			<div class="form-group mt-2">
 				<label>Alasan Pembatalan</label>
 				<textarea class="form-control" name="alasan" id="deskripsi"></textarea>
 			</div>
 			<button type="submit" class="btn btn-warning" name="ajukan">Ajukan Pembatan Proyek</button>
 			<a href="<?=base_url('perusahaan');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
 		</form>
 	</div>
 </div>

<?php include_once 'template/footer.php'; ?>