<?php
// default timezone
date_default_timezone_set('Asia/Jakarta');
session_start();
ob_start();


// database defenisi
$host = "localhost";
$user = "root";
$pass = "";
$db = "inmark";


$koneksi = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if(mysqli_connect_errno()){
	printf("Koneksi gagal: %s\n", mysqli_connect_error());
	die();
}


// auto update proyek yang expire
$query_expired = "SELECT * FROM proyek";
$sql_expired = mysqli_query($koneksi, $query_expired);
// echo  time('now');
if(!$sql_expired){
	printf("Error message: %s\n", mysqli_error($koneksi));
}

while($data_expired = mysqli_fetch_array($sql_expired, MYSQLI_ASSOC)){
	$sekarang = time();
	if($data_expired['tgl_akhir'] < $sekarang){
		// echo "mati ";
		$query_tutup = "UPDATE proyek SET aktif = 0, selesai = 3 WHERE tgl_akhir < now()";
		$sql_tutup = mysqli_query($koneksi, $query_tutup);
	}
}


// fungsi base_url
function base_url($url = null){
	$base_url = "http://localhost/teamta";
	if($url != null){
		return $base_url. "/" .$url;
	}
	else{
		return $base_url;
	}
}

// membatasi kata yang di tampilkan
function bataskata($text, $limit=200){
	if(strlen($text) > $limit){
		$word = mb_substr($text, 0,$limit-3). "...";
	}
	else{
		$word = $text;
	}
	return $word;
}

// formattampilan uang
function rupiah($angka){
	$format_rupiah = "Rp " . number_format($angka,0,',','.');
	// var_dump($format_rupiah);
	return $format_rupiah;
}
// cek apakah fungsi tampilan rupiah sudah jalan
// echo rupiah(1000000);


// fungsi menghitung waktu mundur beberapa hari yang lalu
function waktulalu($datetime, $full = false){
	$sekarang = new DateTime;
	$lalu = new DateTime($datetime);
	$diff = $sekarang->diff($lalu);

	$diff->w = floor($diff->d /7);
	$diff->d -= $diff->w *7;

	$string = array(
		'y' => 'tahun',
		'm' => 'bulan',
		'w' => 'minggu',
		'd' => 'hari',
		'h' => 'jam',
		'i' => 'menit',
		's' => 'detik',
	);
	foreach($string as $k => &$v){
		if($diff->$k){
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
		}
		else{
			unset($string[$k]);
		}
	}

	if(!$full) $string = array_slice($string, 0,1);
	return $string ? implode(', ', $string) . ' Lalu' : ' Sekarang';
}

function tanggal($tgl){
	return date('d F Y',strtotime($tgl));
}

// fugsi yang digunakan untuk membuat semua tag html menjadi text bisa untuk di inputkan ke database
function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}


// fungsi mendapatkan username dari alamat sosmed
// $url = 'https://www.youtube.com/channel/UC3-bTgisET6SoqA6bxFIXqg';

// untuk mengetahui URL
// var_dump(parse_url($url));
// var_dump(parse_url($url, PHP_URL_SCHEME));
// var_dump(parse_url($url, PHP_URL_USER));
// var_dump(parse_url($url, PHP_URL_PASS));
// var_dump(parse_url($url, PHP_URL_HOST));
// var_dump(parse_url($url, PHP_URL_PORT));
// var_dump(parse_url($url, PHP_URL_PATH));
// var_dump(parse_url($url, PHP_URL_QUERY));
// var_dump(parse_url($url, PHP_URL_FRAGMENT));

// echo get_username($url);
// hasilnya fajarsetiawan.siagian

function get_username($main_url) {
	$username = parse_url($main_url, PHP_URL_PATH);
	// $username = explode('/', $username);
	// return $username[1];
	return $username;
}

// fungsi cetak aktif dan tidak
function cek_aktif($aktif){
	if($aktif == 1){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-info" disabled>Aktif</button>';
	}
	else{
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-warning" disabled>Non - Aktif</button>';
	}

	return $cetak_aktif;
}

// bag influencer
// untuk mengatahui apakah diterima, ditolak,atau menunggu untuk influencernya
function cek_status($status){
	if($status == 0){
		$status = "<a class='btn btn-sm btn-secondary text-white disabled'>Menunggu</a>";
	}
	elseif($status == 1){
		$status = "<a class='btn btn-sm btn-primary text-white disabled'>Diterima</a>";
	}
	elseif($status == 2){
		$status = "<a class='btn btn-sm btn-danger text-white disabled'>Ditolak</a>";
	}
	elseif($status == 3){
		$status = "<a class='btn btn-sm btn-success text-white disabled'>Selesai</a>";
	}
	elseif($status == NULL){
		$status = " ";
	}
	return $status;
} 



// membuat notifikasi untuk edit profile
// $cetak = true;

// tampilNotif($cetak);

function tampilNotif($cetak){
	if($cetak != true){
		$cetak = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Gagal!</strong><br>Data gagal di perbaharui
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
		echo $cetak;
	}
	else{
		// berhasil 
		$cetak = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Berhasil!</strong><br>Data Telah di perbaharui<br>Silahkan Refresh Laman ini
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';
		echo $cetak;
	}
}


// hanya tampilan untuk membuat cek apakah status selesai atau belum
//
// defenisi proyek berjalan dan selesai
// aktif dan berjalan  => aktif = 1 & selesai = 0
// selesai => aktif = 0 dan selesai = 1
// 3 proyek habis waktu apakah mau di perpanjang
function cek_selesai($selesai){
	if($selesai == 1){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-primary" disabled>Berjalan</button>';
	}
	elseif($selesai == 2){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-success" disabled>Selesai</button>';
	}
	elseif($selesai == 3){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-info" disabled>Masa Berlaku Proyek Habis</button>';
	}
	elseif($selesai == 4){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-danger" disabled>Proyek di Perpanjang</button>';
	}
	elseif($selesai == 5){
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-dark" disabled>Proyek Batal</button>';
	}
	else{
		$cetak_aktif = '<button type="button" class="btn btn-sm btn-warning" disabled>Belum - Aktif</button>';
	}

	return $cetak_aktif;
}

// membuat status konfirmasi pembyaran pada tampilan index perusahaan
// pending
// pembayaran di terima
function cetakstatus_pembayaran($status){
	if($status == 0){
		$cetak_status = '<button type="button" class="btn btn-sm btn-warning" disabled>Pending Payment</button>';
	}
	elseif($status == 1){
		$cetak_status = '<button type="button" class="btn btn-sm btn-success" disabled>Payment Success</button>';
	}

	return $cetak_status;
}

function status_laporan($laporan){
	if($laporan == 0){
		$cetak_status = '<button type="button" class="btn btn-sm btn-warning" disabled>Review Laporan</button>';
	}
	elseif($laporan == 1){
		$cetak_status = '<button type="button" class="btn btn-sm btn-success" disabled>Laporan Selesai</button>';
	}

	return $cetak_status;
}

function review($laporan){
	if($laporan == 0){
		$cetak_status = '<button type="button" class="btn btn-sm btn-warning" disabled>Sedang Direview</button>';
	}
	elseif($laporan == 1){
		$cetak_status = '<button type="button" class="btn btn-sm btn-success" disabled>Laporan Diterima</button>';
	}

	return $cetak_status;
}
?>