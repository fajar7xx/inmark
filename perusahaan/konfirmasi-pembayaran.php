<?php 
include_once 'template/header.php';

$id_perusahaan = $id_pengguna;
$id_pembayaran = $_GET['pembayaran'];

$queryt = "SELECT no_tagihan FROM pembayaran_proyek WHERE id_pembayaranproyek = $id_pembayaran";
$tagihan = mysqli_query($koneksi, $queryt);
$tagihanData = mysqli_fetch_array($tagihan, MYSQLI_ASSOC);

// printf($id_pembayaran);
?>
		<div class="container mt-3">
			<div class="row">
				<div class="card h-100 w-100">
					<div class="card-header">
						<h3 class="text-center">Konfirmasi Pembayaran Tagihan <u><?=$tagihanData['no_tagihan'];?></u></h3>
					</div>
					<div class="card-body">
						<!-- <h5 class="card-title">Special title treatment</h5> -->
						<p class="card-text">bayarlah sesuai dengan tagihan yang telah ditentukan sebelumnya dan berdasarkan bukti transfer</p>
						<?php  
						if(isset($_POST['konfirmasiPembayaran'])){
							// cek file uplioda dlu
							$ekstensi_allow = array('jpg', 'jpeg', 'png');
							$bukti_tf = $_FILES['buktiTf']['name'];
							$x = explode('.', $bukti_tf);
							$ekstensi = strtolower(end($x));
							$ukuran = $_FILES['buktiTf']['size'];
							$file_temp = $_FILES['buktiTf']['tmp_name'];
							$target_dir ="img/tf/";

							// generate nama file baru sebelum di upload
							$namafile_unik = substr(md5(time('dmY')), 0, 8).'.'.$ekstensi;
							
							$bankPengirim = mysqli_real_escape_string($koneksi, $_POST['bankPengirim']);
							$norekPengirim = mysqli_real_escape_string($koneksi, $_POST['norekPengirim']);
							$namaPengirim = mysqli_real_escape_string($koneksi, $_POST['namaPengirim']);
							$bankTujuan = mysqli_real_escape_string($koneksi, $_POST['bankTujuan']);
							$dana = mysqli_real_escape_string($koneksi, $_POST['dana']);
							$tgl_tf = mysqli_real_escape_string($koneksi, $_POST['tgl_tf']);
							$waktu_tf = mysqli_real_escape_string($koneksi, $_POST['waktu_tf']);


							$sekarang = date('Y/m/d H:i:s'); 

							if(in_array($ekstensi, $ekstensi_allow) === TRUE){
								if($ukuran < 1000000){
									move_uploaded_file($file_temp, '../img/tf/'.$namafile_unik);
									$query_pembayaran = "UPDATE pembayaran_proyek 
														SET 
															bank_tujuan = '$bankTujuan',
															nama_pengirim = '$namaPengirim',
															norek_pengirim = '$norekPengirim',
															dana_pengirim = '$dana',
															bank_pengirim = '$bankPengirim',
															gbr_buktitf = '$target_dir$namafile_unik',
															tgl_transfer = '$tgl_tf',
															waktu_transfer = '$waktu_tf',
															tgl_dibuat = '$sekarang'
														WHERE 
															id_pembayaranproyek = '$id_pembayaran'";

									$sql_pembayaran = mysqli_query($koneksi, $query_pembayaran);

									if(!$sql_pembayaran){
										printf("Error message: %s\n", mysqli_error($koneksi));
									}	
									// tampilNotif($sql_pembayaran);
									header('location: index.php');
								}
								else{
									echo "Ukuran File melebihi 1 Mb";
								}
							}
							else{
								echo "Ekstensi file yang diperbolahkan hanya jpg, jpeg dan png";
							}
						}
						?>
							<form class="mt-4" method="post" enctype="multipart/form-data">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Bank Pengirim</label>
										<input type="text" class="form-control" name="bankPengirim" placeholder="contoh : Bank BCA, Bank Mandiri, BNI, BRI">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Nomor Rekening Pengirim</label>
										<input type="text" class="form-control" name="norekPengirim" placeholder="contoh : 1123444556">
									</div>
									<div class="form-group col-md-6">
										<label>Nama Pengirim</label>
										<input type="text" class="form-control" name="namaPengirim" placeholder="Contoh : fulan bin fulan">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Bank Tujuan</label>
										<select class="form-control" name="bankTujuan">
											<option>Bank Tujuan</option>
											<option value="mandiri">Mandiri no.Rek 0123458545 An PT Inmark</option>
											<option value="bni">BNI no.Rek 0123458545 An PT Inmark</option>
											<option value="bca">BCA no.Rek 0123458545 An PT Inmark</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label>Dana Transfer</label>
										<input type="text" class="form-control" name="dana" placeholder="RP. xxx.xxx">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Waktu Transfer</label>
										<input type="date" name="tgl_tf" class="form-control mb-1">
										<input type="time" name="waktu_tf" class="form-control">
									</div>		
									<div class="form-group col-md-4">
										<label>Bukti Transfer</label>
										<input type="file" class="form-control" name="buktiTf" placeholder="Judul Proyek">
										<p class="text-danger">*Format yang diterima hanya jpg dan JPEG dengan maksimal Photo yang diupload sebesar 1 MB</p>
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="konfirmasiPembayaran">Konfirmasi Pembayaran</button>
								<a href="<?=base_url('perusahaan');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
							</form>
						
					</div>
				</div>
			</div>
			
		</div>

<?php include_once 'template/footer.php' ?>