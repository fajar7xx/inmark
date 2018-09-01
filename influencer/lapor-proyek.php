<?php 
include_once 'template/header.php'; 

// untuk mengatahui id pengguna
$id_influencer = $id_pengguna;
$id_proyek = $_GET['lapor'];
?>



<div class="container">
	<div class="my-3 p-3 bg-white rounded shadow-sm">
		<h4 class="border-bottom border-gray pb-2 mb-3 text-center">Lapor Pengerjaan Proyek</h4>
		<p><?=(!empty($pesan))?$pesan:'';?></p>
		<?php  
		$query_proyek = "SELECT
						    proyek.judul_proyek,
						    proyek.id_proyek,
						    kategori.nama_kategori,
						    proyek.dana,
						    perusahaan.id_perusahaan,
						    perusahaan.nm_perusahaan
						FROM
						    proyek
						JOIN kategori USING(id_kategori)
						JOIN perusahaan USING(id_perusahaan)
						WHERE
						    id_proyek = '$id_proyek'";
		$sql_proyek = mysqli_query($koneksi, $query_proyek);
		$data_proyek = mysqli_fetch_array($sql_proyek, MYSQLI_ASSOC);

		$id_proyek = $data_proyek['id_proyek'];
		$id_perusahaan = $data_proyek['id_perusahaan'];
		?>
		<table>
			<tbody>
				<tr>
					<td class="pr-2">Judul Proyek</td>
					<td> : <?=$data_proyek['judul_proyek'];?></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td> : <?=$data_proyek['nama_kategori'];?></td>
				</tr>
				<tr>
					<td>Dana</td>
					<td> : <?=rupiah($data_proyek['dana']);?></td>
				</tr>
				<tr>
					<td>Di Buat Oleh</td>
					<td> : <?=$data_proyek['nm_perusahaan'];?></td>
				</tr>
			</tbody>
		</table>
		<?php  
		if(isset($_POST['konfirmasi'])){
			// cek file uplioda dlu
			$ekstensi_allow = array('jpg', 'jpeg', 'png');
			$laporan = $_FILES['laporan']['name'];
			$x = explode('.', $laporan);
			$ekstensi = strtolower(end($x));
			$ukuran = $_FILES['laporan']['size'];
			$file_temp = $_FILES['laporan']['tmp_name'];
			$target_dir ="img/laporan/";

			// generate nama file baru sebelum di upload
			$namafile_unik = substr(md5(time('dmY')), 0, 8).'.'.$ekstensi;
			$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
			$nama_laporan ='LP_' . $id_perusahaan . $id_proyek . date('dmY');

			if(in_array($ekstensi, $ekstensi_allow) === TRUE){
				if($ukuran < 1000000){
					move_uploaded_file($file_temp, '../img/laporan/'.$namafile_unik);
					$query_laporan = "INSERT INTO lapor_proyek(
									    id_proyek,
									    id_influencer,
									    id_perusahaan,
									    nama_laporan,
									    isi_laporan,
									    bukti_laporan
									)
									VALUES(
										'$id_proyek',
										'$id_influencer',
										'$id_perusahaan',
										'$nama_laporan',
										'$deskripsi',
										'$target_dir$namafile_unik'
									)";

					$sql_laporan = mysqli_query($koneksi, $query_laporan);

					if(!$sql_laporan){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}

					$qupdata_proposal = "UPDATE proposal SET diterima = 3 WHERE (id_proyek = '$id_proyek' AND id_influencer = '$id_influencer')";
					$supdate_proposal = mysqli_query($koneksi, $qupdata_proposal) or die(mysqli_error($koneksi));

					header('location:'.base_url('influencer/index.php'));
				}
				else{
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Ukuran File Terlalu Besar</strong> Maksimal file hanya 1Mb
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
				}
			}
			else{
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Ekstensi tidak di izinkan</strong> Ekstensi file yang diperbolahkan hanya jpg, jpeg dan png
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
			}
		}
		?>
		<form class="mt-4" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label> Deskripsi Laporan</label>
				<textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label>Bukti Laporan</label>
					<input type="file" name="laporan" class="form-control">
					<p class="text-danger small">*Bukti Laporan dapat berupa secreenshot atau photo <br>Format yang diterima hanya jpg dan JPEG dengan maksimal file yang diupload sebesar 1 MB</p>
				</div>
			</div>
			<button type="submit" class="btn btn-success" name="konfirmasi">Konfirmasi dan Selesai</button>
			<a href="<?=base_url('influencer');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
		</form>
	</div>
</div>

<?php include_once 'template/footer.php' ?>