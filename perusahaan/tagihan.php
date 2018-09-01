<?php  
include_once 'template/header.php';

$id_perusahaan = $id_pengguna;

// ni get nomor tahihan
$get_tagihan = $_GET['tagihan'];

$query_tagihan = "SELECT
				    pembayaran_proyek.id_pembayaranproyek,
				    pembayaran_proyek.no_tagihan,
				    pembayaran_proyek.id_perusahaan,
				    proyek.dana
				FROM
				    pembayaran_proyek
				LEFT JOIN proyek USING(id_proyek)
				WHERE
				    (
				        pembayaran_proyek.id_perusahaan = '$id_perusahaan' AND no_tagihan = '$get_tagihan'
				    )";
$sql_tagihan = mysqli_query($koneksi, $query_tagihan);
$data_tagihan = mysqli_fetch_array($sql_tagihan, MYSQLI_ASSOC);
?>

<!-- keterangan
jika aktif = 0 dan selesai = 0 => status proyek belum aktif
jika aktif = 1 dan selesai = 0 => status proyek aktif dan sedang mencari influencer
jika aktif = 0 dan selesai = 1 => status proyek selesai
 -->

<div class="container">
	<div class="jumbotron">
		<h1 class="display-4 text-center">No Tagihan <?=$data_tagihan['no_tagihan'];?></h1>
		<hr class="m-y-md">
		<div class="container">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Cara Pembayaran Transfer Bank</h4>
					<article class="col-xs-12 data-block decent">
						<div class="data-container">
							<p>Lakukan pembayaran sejumlah <strong><?=rupiah($data_tagihan['dana']);?></strong> dan tambahkan berita <strong><?=$data_tagihan['no_tagihan'];?></strong> agar dapat diproses oleh administrator.<br>
							Pembayaran dapat dilakukan melalui transfer ke rekening berikut:</p>
							<ul>
								<li>
									<p class="mb-0 text-primary font-weight-bold">BCA</p>
									<p class="m-0">No. Rekening: 0221 1234 134</p>
									<p>a.n: PT. Digital Nusantara</p>
								</li>
								<li>
									<p class="mb-0 text-primary font-weight-bold">Bank Mandiri</p>
									<p class="m-0">No. Rekening: 0221 1234 134</p>
									<p>a.n: PT. Digital Nusantara</p>
								</li>
								<li>
									<p class="mb-0 text-primary font-weight-bold">Bank BNI</p>
									<p class="m-0">No. Rekening: 0221 1234 134</p>
									<p>a.n: PT. Digital Nusantara</p>
								</li>
								<li>
									<p class="mb-0 text-primary font-weight-bold">Bank BRI</p>
									<p class="m-0">No. Rekening: 0221 1234 134</p>
									<p>a.n: PT. Digital Nusantara</p>
								</li>
							</ul>
							<p><b>Penting:</b> setalah melakukan pembayaran photo bukti transfer dan lapor pada menu lapor tagihan: melalui tombol Proses dan Konfirmasi</p>
						</div>
					</article>
					<div class="card-footer">
						<a href="konfirmasi-pembayaran.php?pembayaran=<?=$data_tagihan['id_pembayaranproyek'];?>" class="text-left btn btn-primary mr-3">Proses dan Konfirmasi</a>
						<a href="<?=base_url('perusahaan');?>" class="text-right btn btn-warning">Nanti Saja</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
	

<?php
include_once 'template/footer.php';
?>