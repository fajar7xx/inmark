<?php  
include 'header.php';



// data influncer
$qinfluencer =  "SELECT * FROM influencer";  
$sqlInfluencer = mysqli_query($koneksi, $qinfluencer) or die(mysqli_error($koneksi));
$jlhInfluencer = mysqli_num_rows($sqlInfluencer);
$dataInfluencer = mysqli_fetch_array($sqlInfluencer);

//data perusahaan
$qPerusahaan = "SELECT * FROM perusahaan";
$sqlPerusahaan = mysqli_query($koneksi, $qPerusahaan) or die(mysqli_error($koneksi));
$jlhPerusahaan = mysqli_num_rows($sqlPerusahaan);
$dataperusahaan = mysqli_fetch_array($sqlPerusahaan);

//data proyek
$qProyek = "SELECT * FROM proyek ORDER BY tgl_dibuat DESC";
$sqlProyek = mysqli_query($koneksi, $qProyek) or die(mysqli_error($koneksi));
$jlhProyek = mysqli_num_rows($sqlProyek);

// jumlah Pemasukan
$qpemasukan = "SELECT SUM(dana_pengirim) AS total FROM pembayaran_proyek WHERE konfirmasi = 1";
$sql_pemasukan = mysqli_query($koneksi, $qpemasukan) or die(mysqli_error($koneksi));
$data_pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQL_ASSOC);
$pemasukan = $data_pemasukan['total'];

// jumlah pengeluaran
$qpengeluaran = "SELECT SUM(nominal) AS total_pengeluaran from pembayaran_influencer WHERE konfirmasi = 1";
$sql_pengeluaran = mysqli_query($koneksi, $qpengeluaran) or die(mysqli_error($koneksi));
$data_pengeluaran = mysqli_fetch_array($sql_pengeluaran, MYSQLI_ASSOC);
$pengeluaran = $data_pengeluaran['total_pengeluaran'];

$qretur = "SELECT SUM(dana) AS total_retur FROM pengembalian_uang WHERE konfirmasi = 1";
$sretur = mysqli_query($koneksi, $qretur) or die(mysqli_error($koneksi));
$dretur = mysqli_fetch_array($sretur, MYSQLI_ASSOC);
$retur = $dretur['total_retur'];

// saldo di dapatkan dengan totalnya pemasukan di kurangi pengeluaran
$saldo = $pemasukan - ($pengeluaran + $retur);

?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <!-- <pre> -->
            <!-- cek session berjalan -->
            <?php 
            // print_r($_SESSION['admin']);
            ?>
          <!-- </pre> -->
          <!-- overview section -->
          <div class="container-fluid">
          	<h4>Overview</h4>
          	<div class="row">
          		<div class="col-3">
                  <div class="card bg-primary text-white shadow rounded">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                          <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <div class="col-8">
                          <h5 class="card-title"><?=$jlhInfluencer;?></h5>
                          <div class="dropdown-divider"></div>
                          <p class="card-text">Users Influencer</p>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card bg-primary text-white shadow rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-server feathercon"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                        </div>
                        <div class="col-8">
                          <h5 class="card-title"><?=$jlhPerusahaan;?></h5>
                          <div class="dropdown-divider"></div>
                          <p class="card-text">Users Perusahaan</p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card bg-primary text-white shadow rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <div class="col-8">
                          <h5 class="card-title"><?=$jlhProyek;?></h5>
                          <div class="dropdown-divider"></div> 
                          <p class="card-text">Proyek</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card bg-primary text-white shadow rounded">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <svg class=" feather-credit-card" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                        </div>
                        <div class="col-8">
                          <h5 class="card-title" style="font-size: 1em;"><?=rupiah($pemasukan);?></h5>
                          <div class="dropdown-divider"></div>
                          <p class="card-text">Pemasukan</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          	</div>
          </div>
          <!-- ./overview section -->

          <div class="card mt-3">
            <div class="card-header bg-primary text-white">Proyek Baru</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped dashboard table-sm" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul Proyek</th>
                      <th>Dana</th>
                      <th>Status</th>
                      <th>Tanggal Terbit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    if($jlhProyek > 0):
                      $no = 1;
                      while($dataProyek = mysqli_fetch_array($sqlProyek, MYSQLI_ASSOC)):
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$dataProyek['judul_proyek'];?></td>
                      <td><?=rupiah($dataProyek['dana']);?></td>
                      <td><?=cek_aktif($dataProyek['aktif']);?></td>
                      <td><?=tanggal($dataProyek['tgl_dibuat']);?></td>
                    </tr>
                    <?php
                      endwhile;  
                    endif;
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-header bg-primary text-white">Dana Baru</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm dashboard" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Tagihan</th>
                      <th>Judul Proyek</th>
                      <th>Perusahaan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Tanggal Terbit</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  
                  $query_pembayaran = "SELECT
                                          pembayaran_proyek.*,
                                          proyek.judul_proyek,
                                          proyek.dana,
                                          perusahaan.id_perusahaan,
                                          perusahaan.nm_perusahaan
                                      FROM
                                          pembayaran_proyek
                                      JOIN perusahaan USING(id_perusahaan)
                                      JOIN proyek USING(id_proyek)
                                      GROUP BY
                                          pembayaran_proyek.tgl_dibuat
                                      DESC";
                  $sql_pembayaran = mysqli_query($koneksi, $query_pembayaran);
                  $jlh_dataPembayaran = mysqli_num_rows($sql_pembayaran);

                  if($jlh_dataPembayaran > 0):
                      $no = 1;
                      while($data_pembayaran = mysqli_fetch_array($sql_pembayaran, MYSQLI_ASSOC)):
                  ?>
                      <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data_pembayaran['no_tagihan'];?></td>
                          <td><?=$data_pembayaran['judul_proyek'];?></td>
                          <td><?=$data_pembayaran['nm_perusahaan'];?></td>
                          <td><?=rupiah($data_pembayaran['dana']);?></td>
                          <td><?=cetakstatus_pembayaran($data_pembayaran['konfirmasi']);?></td>
                          <td><?=tanggal($data_pembayaran['tgl_dibuat']);?></td>
                      </tr>
                  <?php  
                      endwhile;
                  endif;
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>

<?php  
include 'footer.php';
?>