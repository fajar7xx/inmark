<?php 
include_once 'header.php'; 

$query_laporProyek = "SELECT
                          lapor_proyek.*,
                          perusahaan.nm_perusahaan,
                          influencer.nm_lengkap,
                          proyek.judul_proyek
                      FROM
                          lapor_proyek
                      LEFT JOIN perusahaan USING(id_perusahaan)
                      LEFT JOIN influencer USING(id_influencer)
                      LEFT JOIN proyek USING(id_proyek)
                      GROUP BY
                          lapor_proyek.tgl_dibuat
                      DESC";
$sql_laporProyek = mysqli_query($koneksi, $query_laporProyek) or die(mysqli_error($koneksi));
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Data Influencer Yang telah menyelesaikan Proyek</h1>
          </div>

          <div class="table">
            <table class="table table-striped" id="proyek">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Proyek</th>
                  <th>laporan</th>
                  <th>Status</th>
                  <th>Tanggal Gabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
				<?php  
				if(mysqli_num_rows($sql_laporProyek) > 0):
					$no = 1;
					while($data_laporProyek = mysqli_fetch_array($sql_laporProyek, MYSQLI_ASSOC)):
				?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data_laporProyek['nm_lengkap'];?></td>
                  <td><?=$data_laporProyek['judul_proyek'];?></td>
                  <td><?=$data_laporProyek['nama_laporan'];?></td>
                  <td><?=status_laporan($data_laporProyek['status_laporan']);?></td>
                  <td><?=$data_laporProyek['tgl_dibuat'];?></td>
                  <td>
                  	<div class="btn-group">
                  		<a href="laporproyekdetail.php?data=<?=$data_laporProyek['id_laporproyek'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="book-open"></span> Lihat</a>
                  	</div>
                  </td>
                </tr>
				<?php
					endwhile;  
				endif;
				?>
              </tbody>
            </table>
          </div>
        </main>

<?php 
include_once 'footer.php';
?>