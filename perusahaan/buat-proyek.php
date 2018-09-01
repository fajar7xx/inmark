<?php  
include_once 'template/header.php';

$id_perusahaan = $id_pengguna;

if(isset($_POST['daftarproyek'])){
	$judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
	$kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
	$dana = mysqli_real_escape_string($koneksi, $_POST['dana']);
	$awal = mysqli_real_escape_string($koneksi, $_POST['awal']);
	$akhir = mysqli_real_escape_string($koneksi, $_POST['akhir']);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);


	
	// cek rentang tanggal
	// kalau rentangnya tanggal mundur gagal
	if (strtotime($awal) > strtotime($akhir)){
        $pesan = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Gagal! </strong>&nbsp; harap mengisi rentang tanggal proyek dengan benar
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    }
    else{
    	if($dana < 100000){
    		$pesan = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>Gagal! </strong>&nbsp; Minimal Dana Rp. 100.000,-
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
    	}
    	else{
    		// $pesan = 'kosong';
	    	$query_ProyekBaru = "INSERT INTO proyek(id_perusahaan, id_kategori, judul_proyek, deskripsi, dana, tgl_mulai, tgl_akhir) VALUES('$id_perusahaan', '$kategori', '$judul', '$deskripsi', '$dana', '$awal', '$akhir')";
			$sql_ProyekBaru = mysqli_query($koneksi, $query_ProyekBaru);

			if(!$sql_ProyekBaru){
				printf("Error message: %s\n", mysqli_error($koneksi));
			}

			// if($updateStatus){
			//     header('Location: perusahaanlist.php');
			// }
			// else{
			// 	echo "<script>alert('Gagal memperbaharui data, coba lagi');</script>";
			// }
			// mendapatkan id saatmendaftar
			$get_id_proyek = mysqli_insert_id($koneksi);
			// var_dump($get_id_proyek);
			// generate no tagihan
			$no_tagihan = 'IM' . $id_perusahaan . $get_id_proyek . date('hisdmY');
			// var_dump($no_tagihan);

			$generate_tagihan = "INSERT INTO pembayaran_proyek (id_proyek, id_perusahaan, no_tagihan) VALUES ('$get_id_proyek', '$id_perusahaan', '$no_tagihan')";
			// var_dump($generate_tagihan);

			$update_tagihan = mysqli_query($koneksi, $generate_tagihan);

			if(!$update_tagihan){
				printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
			}
			// else{
			// 	direct ke pemberitahuan invoice
			// 	header('location:tagihan.php?tagihan='.$no_tagihan);
			// }
			header('location:tagihan.php?tagihan='.$no_tagihan);	
    	}
    }	
}
?>

<!-- keterangan
jika aktif = 0 dan selesai = 0 => status proyek belum aktif
jika aktif = 1 dan selesai = 0 => status proyek aktif dan sedang mencari influencer
jika aktif = 0 dan selesai = 1 => status proyek selesai
 -->
		<!-- <div class="jumbotron">
			<h1 class="display-3">Buat proyek disini</h1>
			<p class="lead">Jelaskan Kebutuhanmu influencer yang kamu inginkan disini. dan meraka akan mengajukan diri pada proyekmu</p>
			<hr class="m-y-md">
		</div> -->
		<div class="container">
			<div class="my-3 p-3 bg-white rounded shadow-sm">
				<h4 class="border-bottom border-gray pb-2 mb-3 text-center">Buat Proyek Terbaru</h4>
				<p><?=(!empty($pesan))?$pesan:'';?></p>
				<form class="mt-4" method="post">
					<div class="form-row">
						<div class="form-group col-md-8">
							<label>Judul Proyek</label>
							<input type="text" class="form-control" name="judul" placeholder="Judul Proyek" required autofocus>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Kategori</label>
							<select class="form-control" name="kategori" required>
								<option>Pilih Kategori</option>
								<option value="1">Blogger</option>
								<option value="2">Youtube</option>
								<option value="3">Twitter</option>
								<option value="4">Instagram</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Dana</label>
							<input type="text" class="form-control" name="dana" min="100000" placeholder="RP. xxx.xxx" required autofocus>
							<small>Dana Minimal Rp. 100.000,-</small>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Estimasi Tanggal Mulai</label>
							<input type="date" class="form-control" name="awal" required autofocus>
						</div>
						<div class="form-group col-md-4">
							<label>Estimasi Tanggal Berakhir</label>
							<input type="date" class="form-control" name="akhir" required autofocus>
						</div>
					</div>
					<div class="form-group mt-2">
						<label>Deskripsi Proyek</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
					</div>
					<button type="submit" class="btn btn-primary" name="daftarproyek">Daftar Proyek</button>
					<a href="<?=base_url('perusahaan');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
				</form>
			</div>
		</div>


<?php
include_once 'template/footer.php';
?>