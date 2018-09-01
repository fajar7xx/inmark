<?php  
include_once 'header.php';

$id_pemasukan = $_GET['detail'];

$query_pemasukan = " SELECT
                        pembayaran_proyek.*,
                        proyek.id_proyek,
                        proyek.judul_proyek,
                        proyek.dana,
                        perusahaan.id_perusahaan,
                        perusahaan.nm_perusahaan,
                        perusahaan.alamat
                    FROM
                        pembayaran_proyek
                    JOIN perusahaan USING(id_perusahaan)
                    JOIN proyek USING(id_proyek)
                    WHERE
                    	id_pembayaranproyek = '$id_pemasukan'";

$sql_pemasukan = mysqli_query($koneksi, $query_pemasukan) or die(mysqli_error($koneksi));
$data_pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQLI_ASSOC);

$id_proyek = $data_pemasukan['id_proyek'];

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-4 text-center">No Tagihan <u><?=$data_pemasukan['no_tagihan'];?></u></h1>
			<hr class="m-y-md">
			<div class="container">
				<div class="card">
					<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-6">
											<address>
												<strong>Dibayar oleh</strong><br>
												<?=$data_pemasukan['nm_perusahaan'];?><br>
												<?=$data_pemasukan['alamat'];?> <br>
												An. <?=$data_pemasukan['nama_pengirim'];?><br>
												<?=$data_pemasukan['bank_pengirim'];?><br>
												<?=$data_pemasukan['norek_pengirim'];?><br>
												waktu <?=$data_pemasukan['waktu_transfer']. '  ' . tanggal($data_pemasukan['tgl_transfer']);?>
											</address>
										</div>
										<div class="col-6 text-right">
											<address>
												<strong><?=cetakstatus_pembayaran($data_pemasukan['konfirmasi']);?></strong><br>
											</address>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<address>
												<strong>Metode Pembayaran:</strong><br>
												Bank <?=$data_pemasukan['bank_tujuan'];?><br>
												No. Rekening: 0221 1234 134 <br>
												a.n PT. Digital Nusantara
											</address>
										</div>
										<div class="col-6 text-right">
											<address>
												<strong>Waktu Transaksi:</strong><br>
												<?=$data_pemasukan['tgl_dibuat'];?><br><br>
											</address>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><strong>Detail Pembayaran</strong></h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table table-condensed">
													<thead>
														<tr>
															<td><strong>No</strong></td>
															<td class="text-center"><strong>Nama Proyek</strong></td>
															<td class="text-center"><strong>Total</strong></td>
														</tr>
													</thead>
													<tbody>
														<!-- foreach ($order->lineItems as $line) or some such thing here -->
														<tr>
															<td>01</td>
															<td class="text-center">
																<a href="proyekdetail.php?detail=<?=$id_proyek;?>" target="blank">
																	<?=$data_pemasukan['judul_proyek'];?>
																</a>
															</td>
															<td class="text-center"><?=rupiah($data_pemasukan['dana']);?></td>
														</tr>
														<tr>
															<td class="no-line"></td>
															<td class="no-line text-right"><strong>Total</strong></td>
															<td class="no-line text-center" style="font-size: 2em;"><?=rupiah($data_pemasukan['dana']);?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p class="h3">Bukti Pembayaran</p>
						<img class="img-fluid" src="<?=base_url($data_pemasukan['gbr_buktitf']);?>" style="width: 30%; height: auto">
					</div>

					<?php  
					if(isset($_POST['konfirmasiPembayaran'])){
						$query_konfirmasi = "UPDATE pembayaran_proyek SET konfirmasi = 1 WHERE id_pembayaranproyek = '$id_pemasukan'"; 
						$sql_konfirmasi = mysqli_query($koneksi, $query_konfirmasi);

						if(!$sql_konfirmasi){
							printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
						}


						$query_konfirmasi2 = "UPDATE proyek SET aktif = 1, selesai =1  WHERE id_proyek = '$id_proyek'"; 
						$sql_konfirmasi2 = mysqli_query($koneksi, $query_konfirmasi2);

						if(!$sql_konfirmasi2){
							printf("Pesan Kesalahan Pada : %s\n", mysqli_error($koneksi));
						}
						

						header('location: pemasukanlist.php');
						// ob_end_flush();
					}
					?>
	
					<div class="card-footer">
						<?php  
						if($data_pemasukan['konfirmasi'] == 1):
						?>
							<a href="<?=base_url('admin/pemasukanlist.php');?>" class="text-right btn btn-warning">Kembali</a>
						<?php
						else:  
						?>
							<form method="post">
								<div class="form-row">
									<div class="form-group col-4">
										<button class="form-control btn btn-primary" name="konfirmasiPembayaran">Proses dan Konfirmasi</button>
									</div>
									<div class=" form-group col-4">
										<a href="<?=base_url('admin/pemasukanlist.php');?>" class="text-right btn btn-warning">Kembali</a>
									</div>
								</div>
							</form>
						<?php 
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php  
include_once 'footer.php';
?>