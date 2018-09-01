<?php  
include_once 'template/header.php';

$id_pengguna = $_GET['edit'];
?>

<div class="container my-4">
	<div class="row">
		<div class="card h-100 d-inline-block w-100 p-3">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Detail Pengguna</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="photo-tab" data-toggle="tab" href="#photo" role="tab" aria-controls="profile" aria-selected="false">Photo Profil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="sosmed-tab" data-toggle="tab" href="#sosmed" role="tab" aria-controls="profile" aria-selected="false">Edit Akun Media Sosial</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profil Pengguna</a>
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
				$qProfilDetail = "SELECT * FROM influencer where id_influencer = '$id_pengguna'";
				$sProfilDetail = mysqli_query($koneksi, $qProfilDetail) or die(mysqli_connect_error($koneksi));
				$dataPengguna = mysqli_fetch_array($sProfilDetail, MYSQLI_ASSOC);

				if(isset($_POST['perbaharui-data'])){
					$nama = stripslashes(mysqli_real_escape_string($koneksi, $_POST['nama']));
					$tel = stripslashes(mysqli_real_escape_string($koneksi, $_POST['tel']));
					$alamat = stripslashes(mysqli_real_escape_string($koneksi, $_POST['alamat']));
					$qPerbaharui_data = "UPDATE influencer SET nm_lengkap = '$nama', telp='$tel', alamat='$alamat' WHERE id_influencer = '$id_pengguna'";
					$sPerbaharui_data = mysqli_query($koneksi, $qPerbaharui_data);

					if(!$sPerbaharui_data){
						printf("Errormessage: %s\n", mysqli_error($koneksi));
					}


					
					tampilNotif($sPerbaharui_data);
				}
				?>
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Nama Lengkap</label>
							<input type="text" class="form-control"  name="nama" value="<?=$dataPengguna['nm_lengkap'];?>">
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
					<button type="submit" name="perbaharui-data" class="btn btn-primary">Perbaharui</button>
				</form>
			</div>

			<!-- photoprofiel -->
			<div class="tab-pane fade show" id="photo" role="tabpanel" aria-labelledby="photo-tab">
				<p class="h3 text-center">Photo Profil Anda.</p>
				<?php 
				// menampilkna photo saat ini 
				$qphoto_profil = "SELECT gbr_profil FROM influencer where id_influencer = '$id_pengguna'";
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
							$qupload_photo = "UPDATE influencer SET gbr_profil = '$target_dir$namafile_unik' 
												WHERE id_influencer = '$id_pengguna'";
							$supload_photo = mysqli_query($koneksi, $qupload_photo);

							if(!$supload_photo){
								printf("Errormessage: %s\n", mysqli_error($koneksi));
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
					<img class="card-img-top img-thumbnail mx-auto d-block my-1 rounded border border-light" src="<?=base_url($data_photo['gbr_profil']);?>" style="width: 50%; height: auto;" />
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
			<!-- detail Sosial media -->
			<div class="tab-pane fade" id="sosmed" role="tabpanel" aria-labelledby="sosmed-tab">
				<p class="h4 text-center">Edit Data Akun Sosial Media</p>

				<?php  
				$qSosmed = "SELECT website, akun_ig, akun_youtube, akun_twitter, akun_fb FROM profil_influencer WHERE id_influencer = '$id_pengguna'";
				$sql_sosmed = mysqli_query($koneksi, $qSosmed) or die(mysqli_connect_error($koneksi));
				$data_sosmed = mysqli_fetch_array($sql_sosmed, MYSQLI_ASSOC);

				if(isset($_POST['updateSosmed'])){
					$website = mysqli_real_escape_string($koneksi, $_POST['website']);
					$twitter = mysqli_real_escape_string($koneksi, $_POST['twitter']);
					$instagram = mysqli_real_escape_string($koneksi, $_POST['instagram']);
					$youtube = mysqli_real_escape_string($koneksi, $_POST['youtube']);
					$facebook = mysqli_real_escape_string($koneksi, $_POST['facebook']);

					$qPerbaharui_sosmed = "UPDATE profil_influencer SET website = '$website', akun_twitter = '$twitter', akun_ig = '$instagram', akun_youtube = '$youtube', akun_fb = '$facebook' WHERE id_influencer = '$id_pengguna'";
					$sPerbaharui_sosmed = mysqli_query($koneksi, $qPerbaharui_sosmed);

					if(!$sPerbaharui_sosmed){
						printf("Errormessage: %s\n", mysqli_error($koneksi));
					}

					tampilNotif($sPerbaharui_sosmed);
				}
				?>
				
				<div class="row">
					<div class="col-8">
						<form method="post">
							<div class="form-group row">
								<label class="col-3 col-form-label">Alamat Website</label>
								<div class="col-9">
									<input type="text" class="form-control"  name="website"  value="<?=$data_sosmed['website'];?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Akun Twitter</label>
								<div class="col-9">
									<input type="text" class="form-control"  name="twitter" value="<?=$data_sosmed['akun_twitter'];?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Akun Instagram</label>
								<div class="col-9">
									<input type="text" class="form-control" name="instagram"  value="<?=$data_sosmed['akun_ig'];?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Akun Youtube</label>
								<div class="col-9">
									<input type="text" class="form-control" name="youtube"  value="<?=$data_sosmed['akun_youtube'];?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3 col-form-label">Akun Facebook</label>
								<div class="col-9">
									<input type="text" class="form-control"  name="facebook" value="<?=$data_sosmed['akun_fb'];?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" name="updateSosmed" class="btn btn-primary">Perbaharui</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-4"></div>
				</div>
				
			</div>

			<!-- detail profile -->
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<p class="h4 text-center">Edit Informasi Pengguna</p>
				<p class="text-center">untuk mengecek DA/PA web kamu. kamu bisa mengunakan lin berikut ini <a href="https://www.checkmoz.com/" target="blank">Cek DA/PA</a></p>

				<?php  
				$qdetail1 = "SELECT da, pa,kota, negara, tentang, kemampuan FROM profil_influencer WHERE id_influencer = '$id_pengguna'";
				$sql_detail1 = mysqli_query($koneksi, $qdetail1) or die(mysqli_connect_error($koneksi));
				$data_detail1 = mysqli_fetch_array($sql_detail1, MYSQLI_ASSOC);

				if(isset($_POST['updateDetail'])){
					$da = mysqli_real_escape_string($koneksi, $_POST['da']);
					$pa = mysqli_real_escape_string($koneksi, $_POST['pa']);
					$kota = mysqli_real_escape_string($koneksi, $_POST['kota']);
					$negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
					$tentang = mysqli_real_escape_string($koneksi, $_POST['tentang']);
					$kemampuan = mysqli_real_escape_string($koneksi, $_POST['kemampuan']);

					

					$qPerbaharui_detail1 = "UPDATE profil_influencer SET da = '$da', pa = '$pa',kota = '$kota', negara = '$negara', tentang = '$tentang', kemampuan = '$kemampuan' WHERE id_influencer = '$id_pengguna'";
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
							<label>D0main Authority (Da)</label>
							<input type="number" min="0" max="100" class="form-control"  name="da" value="<?=$data_detail1['da'];?>">
						</div>
						<div class="form-group col-4">
							<label>Page Authority (PA)</label>
							<input type="number" min="0" max="100" class="form-control" name="pa" value="<?=$data_detail1['pa'];?>">
						</div>
						<div class="form-group col-4"></div>
					</div>
					<div class="form-row">
						<div class="form-group col-4">
							<label>Kota</label>
							<input type="text" class="form-control"  name="kota" value="<?=$data_detail1['kota'];?>">
						</div>
						<div class="form-group col-4">
							<label>Negara</label>
							<input type="text" class="form-control" name="negara" value="<?=$data_detail1['negara'];?>">
						</div>
						<div class="form-group col-4"></div>
					</div>
					<div class="form-group">
						<label>Tentang Saya</label>
						<textarea class="form-control" id="editor" name="tentang"><?=$data_detail1['tentang'];?></textarea>
					</div>
					<div class="form-group">
						<label>Kemampuan Saya</label>
						<textarea class="form-control" id="editor2" name="kemampuan" rows="5"><?=$data_detail1['kemampuan'];?></textarea>
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
					$qcek_pass = "SELECT * FROM influencer WHERE(id_influencer = '$id_pengguna' AND password = '$pass_lama')";
					$sql_passlama = mysqli_query($koneksi, $qcek_pass);

					// cek masalah
					if(!$sql_passlama){
						printf("Errormessage: %s\n", mysqli_error($koneksi));
					}

					if(mysqli_num_rows($sql_passlama)){
						if(strlen($pass_baru1) >= 8){
							if($pass_baru1 == $pass_baru2){
								$pass_baru1 = md5($pass_baru1);
								$qPass_baru = "UPDATE influencer SET password = '$pass_baru1' WHERE id_influencer = '$id_pengguna'";
								$sPass_baru = mysqli_query($koneksi, $qPass_baru);

								if(!$sPass_baru){
									printf("Errormessage: %s\n", mysqli_error($koneksi));
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