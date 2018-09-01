<?php 
include_once 'template/header.php';

// pagination code inisialisasi
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

if($page == '' || $page == 1 ){
	$page1 = 0;
}
else{
	// mengatur batas perhalaman berapa tabel ubah angka 5
	$page1 = ($page * 5) - 5;
}


// pencarian
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$pencarian = trim(mysqli_real_escape_string($koneksi, $_POST['pencarian']));

	if($pencarian != ''){
		$queryProyek = "SELECT id_proyek, judul_proyek,deskripsi, dana,nama_kategori,
				jlh_proposal, tgl_dibuat FROM proyek
				LEFT JOIN kategori USING(id_kategori)
				LEFT JOIN(
						SELECT id_proyek, 
						COUNT(id_proyek) AS jlh_proposal
						FROM proposal
						GROUP BY id_proyek
    			)AS proposal
				USING(id_proyek)
                WHERE
                	(aktif = 1) AND
                	(judul_proyek LIKE '%$pencarian%')
				ORDER BY tgl_dibuat";
		$totalProyek = $queryProyek;
	}
	else{
		$queryProyek = "SELECT id_proyek, judul_proyek,deskripsi, dana,nama_kategori,
					jlh_proposal, tgl_dibuat FROM proyek
					LEFT JOIN kategori USING(id_kategori)
					LEFT JOIN(
							SELECT id_proyek, 
							COUNT(id_proyek) AS jlh_proposal
							FROM proposal
							GROUP BY id_proyek
	    			)AS proposal
					USING(id_proyek)
	                WHERE aktif = 1
					ORDER BY tgl_dibuat DESC limit $page1, 5";
		$totalProyek = "SELECT * FROM proyek WHERE aktif = 1";
	}
}
else{
	$queryProyek = "SELECT id_proyek, judul_proyek,deskripsi, dana,nama_kategori,
					jlh_proposal, tgl_dibuat, tgl_mulai, tgl_akhir FROM proyek
					LEFT JOIN kategori USING(id_kategori)
					LEFT JOIN(
							SELECT id_proyek, 
							COUNT(id_proyek) AS jlh_proposal
							FROM proposal
							GROUP BY id_proyek
	    			)AS proposal
					USING(id_proyek)
	                WHERE aktif = 1
					ORDER BY tgl_dibuat DESC limit $page1, 5";
	$totalProyek = "SELECT * FROM proyek WHERE aktif = 1";
}


$sqlProyek = mysqli_query($koneksi, $queryProyek) or die(mysqli_error($koneksi));

// query oppebcarian

?>
		<!-- pencarian -->
		<div class="container mt-2" style="width: 50%;">
			<form action="" method="post">
				<div class="input-group">
					<input type="text" class="form-control" name="pencarian" placeholder="Cari Proyek......"/>
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit" id="btn-cari">Cari</button>
						<!-- <input type="submit" name="" value="Cari" class="btn btn-outline-primary"> -->
						<a href="" class="btn btn-warning">Reset</a>	
					</span>
				</div>
			</form>
		</div>
		<!--./pencarian -->

		<div class="container">
			<!-- daftar proyek -->
			<?php  
			if(mysqli_num_rows($sqlProyek) > 0):
				while($dataProyek = mysqli_fetch_array($sqlProyek, MYSQLI_ASSOC)):
			?>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-8">
						<div class="card my-2">
							<div class="card-body">
								<h5 class="card-title"><a href="detail-proyek.php?idproyek=<?=$dataProyek['id_proyek'];?>" class="text-body"><?=$dataProyek['judul_proyek'];?></a></h5>
								<p class="card-text text-justify"><?=bataskata($dataProyek['deskripsi']) ;?></p>
								<a href="detail-proyek.php?idproyek=<?=$dataProyek['id_proyek'];?>" class="btn btn-outline-primary">Selengkapnya</a>
							</div>
							<div class="card-footer text-muted">
								<div class="row mt-1">
									<div class="col-6 text-left">Tangal Mulai : <?=date('d F Y',strtotime($dataProyek['tgl_mulai']));?></div>
									<div class="col-6 text-left">Tangal Berakhir : <?=date('d F Y',strtotime($dataProyek['tgl_akhir']));?></div>
								</div>
								<div class="dropdown-divider"></div>
								<div class="row">
									<div class="col-3 text-left">Kategori : <?=$dataProyek['nama_kategori'];?> </div>
									<div class="col-3 text-center">Dana : <?=rupiah($dataProyek['dana']);?> </div>
									<div class="col-3 text-center">Proposal : <?=($dataProyek['jlh_proposal']>0)?$dataProyek['jlh_proposal']:'0';?> Orang</div>
									<div class="col-3 text-right"><?=waktulalu($dataProyek['tgl_dibuat']);?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-2"></div>
				</div>
			
			<?php
				endwhile;
			else:
			?>
				<!-- jika data yang dicari tidak ditemukan -->
				<div class="container">
					<div class="row my-4">
						<div class="col-2"></div>
						<div class="col-8">
							<div class="card">
								<div class="card-body">
									<h2 class="text-center text-primary">Proyek Terbaru Tidak Tersedia</h2> 
								</div>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			<?php  
			endif;
			?>

			<!-- pagination link -->
			<?php  
			$queryPage = "SELECT id_proyek, judul_proyek, deskripsi, dana,nama_kategori,
							jlh_proposal, tgl_dibuat FROM proyek
							LEFT JOIN kategori USING(id_kategori)
							LEFT JOIN(
										SELECT id_proyek, 
										COUNT(id_proyek) AS jlh_proposal
										FROM proposal
										GROUP BY id_proyek
    						)AS proposal
    						USING(id_proyek)
    						WHERE aktif=1";
    		$sqlPage = mysqli_query($koneksi, $queryPage) or die(mysqli_error($koneksi));
    		$recordsPage = mysqli_num_rows($sqlPage);
    		// menampilkan berapabanyak field dalam satu laman
    		$records_page = $recordsPage/5;
    		$records_page = ceil($records_page);
    		$sebelum = $page - 1;
    		$selanjutnya = $page + 1;
    		?>

			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					
					<!-- div pagination and jumlah data -->
					<div class="row">
						<?php 
						// if($_POST['pencarian'] == ''): 
						?>
						<div class="col-4 my-auto">
							<p class="text-left">Jumlah Proyek Aktif : <?=mysqli_num_rows(mysqli_query($koneksi, $totalProyek));?></p>
						</div>
						<div class="col-8">
							<nav aria-label="Page navigation example" class="my-3">
							  <ul class="pagination pagination-sm justify-content-end">
							   
								<?php
								// jika kita sudah menuju laman lebih dari dua halaman 
								// maka tombol pertama akan muncul
								if($page > 2):
								?>
									<li class="page-item">
							      		<a class="page-link" href="?page=1" tabindex="-1">Pertama</a>
							    	</li>
								<?php  
								endif;
								// pagination uintuk sebelumnya  
								if($sebelum >= 1):
								?>
									<li class="page-item">
							      		<a class="page-link" href="?page=<?=$sebelum;?>" tabindex="-1">Sebelumnya</a>
							    	</li>
								<?php  
								endif;

					    		// looping untuk buat pagianation link 1, 2,3
					    		if($records_page >= 2):
					    			for($r = 1; $r <= $records_page; $r++):
					    				$aktif = $r == $page ? 'active':'';
					    		?>
					    				<!-- <a href="?page=<?=$r;?>"><?=$r;?></a> -->
					    				<li class="page-item <?=$aktif;?>">
					    					<a class="page-link" href="?page=<?=$r;?>"><?=$r;?></a>
					    				</li>
					    		<?php
					    			endfor;
					    		endif;

					    		// pagination uintuk selanjutnya
								if($selanjutnya <= $records_page && $records_page >= 2):
								?>
									<li class="page-item">
							      		<a class="page-link" href="?page=<?=$selanjutnya;?>" tabindex="-1">Selanjutnya</a>
							    	</li>
								<?php  
								endif;

								//menampilkan tombol terakhir
								if($page != $records_page && $records_page >= 2):
								?>
									<li class="page-item">
							      		<a class="page-link" href="?page=<?=$records_page;?>" tabindex="-1">Terakhir</a>
							    	</li>
								<?php  
								endif;
								?>  
							  </ul>
							</nav>
							<!-- ./pagination link -->
						</div>
					<?php
					// endif; 
					?>
					</div>
					<!-- ./div pagination and jumlah data -->
					
					
				</div>
				<div class="col-2"></div>
			</div>
    		
    		
		</div>
		<!-- ./end cointainer -->
<?php 
include_once 'template/footer.php'; 
?>