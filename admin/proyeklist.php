<?php 
include 'header.php'; 

$qProyeklist = " SELECT * FROM proyek 
					JOIN kategori USING(id_kategori)
          GROUP BY id_proyek
          ORDER BY tgl_dibuat DESC";
$sqlProyeklist = mysqli_query($koneksi, $qProyeklist) or die(mysqli_error($koneksi));

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Data Proyek</h1>
          </div>

          <div class="table-responsive">
            <table class="table table-striped table-responsive" id="tabel">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Dana</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Berakhir</th>
                  <th>Tanggal Posting</th>
                  <th>Status Aktif</th>
                  <th>Status Selesai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
				<?php  
				if(mysqli_num_rows($sqlProyeklist) > 0):
					$no = 1;
					while($dataProyekList = mysqli_fetch_array($sqlProyeklist, MYSQLI_ASSOC)):
				?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$dataProyekList['judul_proyek'];?></td>
                  <td><?=$dataProyekList['nama_kategori'];?></td>
                  <td><?=rupiah($dataProyekList['dana']);?></td>
                  <td><?=tanggal($dataProyekList['tgl_mulai']);?></td>
                  <td><?=tanggal($dataProyekList['tgl_akhir']);?></td>
                  <td><?=tanggal($dataProyekList['tgl_dibuat']);?></td>
                  <td><?=cek_aktif($dataProyekList['aktif']);?></td>
                  <td><?=cek_selesai($dataProyekList['selesai']);?></td>
                  <td>
                  	<div class="btn-group">
                  		<a href="proyekdetail.php?detail=<?=$dataProyekList['id_proyek'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span> Kelola</a>
                  		<!-- <a href="" class="btn btn-outline-danger btn-sm" title="Hapus Proyek"><span data-feather="trash"></span></a> -->
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
include 'footer.php';
?>