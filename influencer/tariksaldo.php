<?php 
include_once 'template/header.php';

$id_influencer = $id_pengguna;

// / saldo virtual influencer
$query_pemasukan = "SELECT
                        SUM(nominal) AS dana_masuk
                    FROM
                        pembayaran_influencer
                    WHERE
                    (
                        id_influencer = '$id_influencer' AND
                        konfirmasi = 1
                    )";
$sql_pemasukan = mysqli_query($koneksi, $query_pemasukan) or die(mysqli_error($koneksi));
$pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQLI_ASSOC);
$dana_masuk = $pemasukan['dana_masuk'];

$query_pengeluaran = "SELECT
                        SUM(nominal) AS pengeluaran
                    FROM
                        tarik_saldo
                    WHERE
                        (
                            id_influencer = '$id_influencer' AND konfirmasi = 1
                        )";
$sql_pengeluaran = mysqli_query($koneksi, $query_pengeluaran) or die(mysqli_error($koneksi));
$pengeluaran = mysqli_fetch_array($sql_pengeluaran, MYSQLI_ASSOC);
$dana_keluar = $pengeluaran['pengeluaran'];

$saldo = $dana_masuk - $dana_keluar;

if(isset($_POST['proses'])){
	$dana = mysqli_real_escape_string($koneksi, $_POST['dana']);
	$nama_rekening = mysqli_real_escape_string($koneksi, $_POST['nama_rekening']);
	$no_rekening = mysqli_real_escape_string($koneksi, $_POST['no_rekening']);

	$query_tariksaldo = "INSERT INTO tarik_saldo(id_influencer, nominal, nama_rekening, no_rekening) VALUES('$id_influencer', '$dana', '$nama_rekening', '$no_rekening')";
	$sql_tarik_saldo = mysqli_query($koneksi, $query_tariksaldo) or die(mysqli_error($koneksi));

	header('location:'.base_url('influencer/index.php'));
}

?>

<div class="container">
	<div class="my-3 p-3 bg-white rounded shadow-sm w-50 h-100 mx-auto">
		<h4 class="border-bottom border-gray pb-2 mb-3 text-center">Permohonan Tarik Saldo</h4>
		<p><?=(!empty($pesan))?$pesan:'';?></p>
		<form method="post">
			<div class="form-group">
				<p class="text-justify">Sebelum menarik pastikan jumlah saldo yang di tarik tidak melebihi saldo yang anda miliki saat ini</p>
				<p class="text-center">
					<span class="border border-info rounded p-1">Saldo saat ini: <?=rupiah($saldo);?></span>
				</p>
			</div>
			<div class="form-group w-50 mx-auto">
				<label class="d-flex justify-content-center">Dana Yang ingin di tarik</label>
				<input type="number" name="dana"  placeholder="Jumlah" max="<?=$saldo;?>" class="form-control" required>
			</div>
			<div class="w-50 mx-auto">
				<div class="form-group">
					<input type="text" name="nama_rekening" placeholder="nama pemilik rekening" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="text" name="no_rekening" placeholder="nomor rekening" class="form-control" required>
				</div>
			</div>
			<p class="text-justify text-danger small">*Proses Dapat Memakan Waktu sampai 2-4 hari jam kerja, tergantung bank anda</p>
			<div class="dropdown-divider"></div>
			<div class="form-group w-75 mx-auto">
				<button type="submit" class="btn btn-primary" name="proses">Proses</button>
				<a href="<?=base_url('influencer');?>" class="text-danger float-right">Batal, Kembali ke laman utama</a>
			</div>
		</form>
	</div>
</div>


<?php include_once 'template/footer.php'; ?>