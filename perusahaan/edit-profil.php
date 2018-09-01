<?php  
include_once 'template/header.php';

$id_perusahaan = $_GET['edit'];


?>

<div class="container my-4">
	<div class="row">
		<div class="card h-100 d-inline-block w-100 p-3">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detail Peruahaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="photo-tab" data-toggle="tab" href="#photo" role="tab" aria-controls="profile" aria-selected="false">Photo Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="cp-tab" data-toggle="tab" href="#cp" role="tab" aria-controls="profile" aria-selected="false">Data Penanggung Jawab</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Profil Perusahaan</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ganti Password</a>
			</li>
		</ul>
		<div class="tab-content p-2" id="myTabContent">
			<!-- Detailpengguna -->
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<p class="h3 text-center">Silahkan Perbaharui data diri anda.</p>
				<?php  
				$qProfilDetail = "SELECT * FROM perusahaan where id_perusahaan = '$id_perusahaan'";
				$sProfilDetail = mysqli_query($koneksi, $qProfilDetail) or die(mysqli_connect_error($koneksi));
				$dataPengguna = mysqli_fetch_array($sProfilDetail, MYSQLI_ASSOC);

				if(isset($_POST['perbaharui-data'])){
					$nama = stripslashes(mysqli_real_escape_string($koneksi, $_POST['nama']));
					$tel = stripslashes(mysqli_real_escape_string($koneksi, $_POST['tel']));
					$alamat = stripslashes(mysqli_real_escape_string($koneksi, $_POST['alamat']));
					$npwp = stripslashes(mysqli_real_escape_string($koneksi, $_POST['npwp']));
					$siup = stripslashes(mysqli_real_escape_string($koneksi, $_POST['siup']));
					$qPerbaharui_data = "UPDATE perusahaan SET nm_perusahaan = '$nama', telp='$tel', alamat='$alamat', no_npwp = '$npwp', no_siup = '$siup' WHERE id_perusahaan = '$id_perusahaan'";
					$sPerbaharui_data = mysqli_query($koneksi, $qPerbaharui_data);

					if(!$sPerbaharui_data){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}
					tampilNotif($sPerbaharui_data);
				}
				?>
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Nama Perusahaan</label>
							<input type="text" class="form-control"  name="nama" value="<?=$dataPengguna['nm_perusahaan'];?>">
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="email" class="form-control" value="<?=$dataPengguna['email'];?>" disabled>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Telepon</label>
							<input type="tel" class="form-control"  name="tel" value="<?=$dataPengguna['telp'];?>">
						</div>
						<div class="form-group col-md-6">
							<label>Alamat</label>
							<input type="text" class="form-control"  name="alamat" value="<?=$dataPengguna['alamat'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>NO NPWP</label>
							<input type="tel" class="form-control"  name="npwp" value="<?=$dataPengguna['no_npwp'];?>">
						</div>
						<div class="form-group col-md-6">
							<label>NO SIUP</label>
							<input type="text" class="form-control"  name="siup" value="<?=$dataPengguna['no_siup'];?>">
						</div>
					</div>
					<button type="submit" name="perbaharui-data" class="btn btn-primary">Perbaharui</button>
				</form>
			</div>

			<!-- photoprofiel -->
			<div class="tab-pane fade show" id="photo" role="tabpanel" aria-labelledby="photo-tab">
				<p class="h3 text-center">Photo Profil Anda.</p>
				<?php 
				// menampilkna photo saat ini 
				$qphoto_profil = "SELECT gbr_profil FROM perusahaan where id_perusahaan = '$id_perusahaan'";
				$sphoto_profil = mysqli_query($koneksi, $qphoto_profil) or die(mysqli_connect_error($koneksi));
				$data_photo = mysqli_fetch_array($sphoto_profil, MYSQLI_ASSOC);

				// cek jika photo hanya palsu
				// 
				if(isset($_POST['uploadphoto'])){
					$ekstensi_allow = array('jpg', 'jpeg', 'png');
					$nama_file = $_FILES['photo']['name'];
					$x = explode('.', $nama_file);
					$ekstensi = strtolower(end($x));
					$ukuran = $_FILES['photo']['size'];
					$file_temp = $_FILES['photo']['tmp_name'];
					$target_dir ="img/uploads/";

					// generate nama file baru sebelum di upload
					$namafile_unik = substr(md5(time()), 0, 10).'.'.$ekstensi;

					if(in_array($ekstensi, $ekstensi_allow) === TRUE){
						if($ukuran < 1000000){
							move_uploaded_file($file_temp, '../img/uploads/'.$namafile_unik);
							$qupload_photo = "UPDATE perusahaan SET gbr_profil = '$target_dir$namafile_unik' 
												WHERE id_perusahaan = '$id_perusahaan'";
							$supload_photo = mysqli_query($koneksi, $qupload_photo);

							if(!$supload_photo){
								printf("Error message: %s\n", mysqli_error($koneksi));
							}	
							tampilNotif($supload_photo);
						}
						else{
							echo "Ukuran File melebihi 1 Mb";
						}
					}
					else{
						echo "EKstensi file yang diperbolahkan hanya jpg, jpeg dan png";
					}
				}
				?>
				<div class="card d-flex justify-content-center">
					<img class="card-img-top img-thumbnail mx-auto d-block my-1 rounded border border-light" src="<?=base_url($data_photo['gbr_profil']);?>" style="width: 30%; height: auto;" />
				</div>
				<div class="h-100 d-inline-block w-50 mt-3">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" class="form-control" name="photo">
							<small>Ukuran Photo maks 1 Mb</small> <br>
							<small>Tipe yang dapat di upload, JPEG, JPG, PNG</small>
						</div>
						<button type="submit" name="uploadphoto" class="btn btn-primary">Perbaharui</button>
					</form>
				</div>	
			</div>

			<!-- detail kontak person -->
			<div class="tab-pane fade" id="cp" role="tabpanel" aria-labelledby="cp-tab">
				<p class="h4 text-center">Edit Data Akun Sosial Media</p>

				<?php  
				$qKontak = "SELECT nm_cp, no_cp FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'";
				$sql_Kontak = mysqli_query($koneksi, $qKontak) or die(mysqli_connect_error($koneksi));
				$data_Kontak = mysqli_fetch_array($sql_Kontak, MYSQLI_ASSOC);

				if(isset($_POST['updateKontak'])){
					$nm_cp = mysqli_real_escape_string($koneksi, $_POST['nm_cp']);
					$no_cp = mysqli_real_escape_string($koneksi, $_POST['no_cp']);
					

					$qPerbaharui_cp = "UPDATE perusahaan SET nm_cp = '$nm_cp', no_cp = '$no_cp' WHERE id_perusahaan = '$id_perusahaan'";
					$sPerbaharui_cp = mysqli_query($koneksi, $qPerbaharui_cp);

					if(!$sPerbaharui_cp){
						printf("Errormessage: %s\n", mysqli_error($koneksi));
					}

					tampilNotif($sPerbaharui_cp);
				}
				?>
				
				<div class="row">
					<div class="col-8">
						<form method="post">
							<div class="form-group row">
								<label class="col-4 col-form-label">Nama Penanggung Jawab</label>
								<div class="col-8">
									<input type="text" class="form-control"  name="nm_cp"  value="<?=$data_Kontak['nm_cp'];?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-4 col-form-label">Nomor Kontak</label>
								<div class="col-8">
									<input type="tel" class="form-control"  name="no_cp" value="<?=$data_Kontak['no_cp'];?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" name="updateKontak" class="btn btn-primary">Perbaharui</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-4"></div>
				</div>
				
			</div>

			<!-- detail profile -->
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<p class="h4 text-center">Edit Informasi Perusahaan</p>

				<?php  
				$qdetail1 = "SELECT tentang, kota, website, negara, provinsi FROM profil_perusahaan WHERE id_perusahaan = '$id_perusahaan'";
				$sql_detail1 = mysqli_query($koneksi, $qdetail1) or die(mysqli_connect_error($koneksi));
				$data_detail1 = mysqli_fetch_array($sql_detail1, MYSQLI_ASSOC);

				if(isset($_POST['updateDetail'])){
					$kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
					$provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
					$negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
					$website = mysqli_real_escape_string($koneksi, $_POST['website']);
					$tentang = mysqli_real_escape_string($koneksi, $_POST['tentang']);					

					$qPerbaharui_detail1 = "UPDATE profil_perusahaan SET kota = '$kota',provinsi = '$provinsi', negara = '$negara', website = '$website', tentang = '$tentang' WHERE id_perusahaan = '$id_perusahaan'";
					$sPerbaharui_detail1 = mysqli_query($koneksi, $qPerbaharui_detail1);

					if(!$sPerbaharui_detail1){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}

					tampilNotif($sPerbaharui_detail1);

				}
				?>
				<form method="post">
					<div class="form-row">
						<div class="form-group col-4">
							<label>Kota</label>
							<input type="text" class="form-control"  name="kota" value="<?=$data_detail1['kota'];?>">
						</div>
						<div class="form-group col-4">
							<label>Provinsi</label>
							<input type="text" class="form-control" name="provinsi" value="<?=$data_detail1['provinsi'];?>">
						</div>
						<div class="form-group col-4">
							<label>Negara</label>
							<input type="text" class="form-control" name="negara" value="<?=$data_detail1['negara'];?>">
						</div>
					</div>
					<div class="form-group" style="width: 25rem;">
						<label>Alamat Website</label>
						<input type="text" class="form-control" name="website" value="<?=$data_detail1['website'];?>">
					</div>
					<div class="form-group">
						<label>Tentang Perusahaan</label>
						<textarea class="form-control" id="editor" name="tentang"><?=$data_detail1['tentang'];?></textarea>
					</div>
					<button type="submit" name="updateDetail" class="btn btn-primary">Perbaharui</button>
				</form>
			</div>

			<!-- ganti password -->
			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<p class="h4 text-center my-3">Ganti Password</p>
				
				<?php  
				if(isset($_POST['updatepass'])){
					$pass_lama = mysqli_real_escape_string($koneksi ,$_POST['pass']);
					$pass_baru1 = mysqli_real_escape_string($koneksi, $_POST['passbaru1']);
					$pass_baru2 = mysqli_real_escape_string($koneksi, $_POST['passbaru2']);

					$pass_lama = md5($pass_lama);
					$qcek_pass = "SELECT * FROM perusahaan WHERE(id_perusahaan = '$id_perusahaan' AND password = '$pass_lama')";
					$sql_passlama = mysqli_query($koneksi, $qcek_pass);

					// cek masalah
					if(!$sql_passlama){
						printf("Error message: %s\n", mysqli_error($koneksi));
					}

					if(mysqli_num_rows($sql_passlama)){
						if(strlen($pass_baru1) >= 8){
							if($pass_baru1 == $pass_baru2){
								$pass_baru1 = md5($pass_baru1);
								$qPass_baru = "UPDATE perusahaan SET password = '$pass_baru1' WHERE id_perusahaan = '$id_perusahaan'";
								$sPass_baru = mysqli_query($koneksi, $qPass_baru);

								if(!$sPass_baru){
									printf("Error message: %s\n", mysqli_error($koneksi));
								}

								tampilNotif($sPass_baru);
							}
							else{
								echo "Pasword tidak cocok";
							}
						}
						else{
							echo "Password Minimal harus 8 karakter";
						}
					}
					else{
						echo "Password lama tidak diketahui";
					}		
				}
				?>

				<div class="row">
					<div class="col-8">
						<form method="post">
							<div class="form-group row">
								<label class="col-3 col-form-label">Password Sekarang</label>
								<div class="col-9">
									<input type="password" class="form-control"  name="pass">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Password Baru</label>
								<div class="col-9">
									<input type="password" class="form-control"  name="passbaru1">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Konfirmasi Password Baru</label>
								<div class="col-9">
									<input type="password" class="form-control"  name="passbaru2">
									<small>Password minimal 8 karakter</small>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" name="updatepass" class="btn btn-primary">Perbaharui</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-4"></div>
				</div>
			</div>
		</div>
		</div>
		
	</div>
</div>

<?php  
include_once 'template/footer.php'
?>