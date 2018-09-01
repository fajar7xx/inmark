<?php 
include 'header.php'; 

$qPerusahaanlist = " SELECT * FROM perusahaan GROUP BY tgl_gabung DESC";
$sqlPerusahaanlist = mysqli_query($koneksi, $qPerusahaanlist) or die(mysqli_error($koneksi));

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Data Perusahaan</h1>
          </div>

          <div class="table-responsive">
            <table class="table table-striped" id="proyek">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Perusahaan</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Nama Contact Person</th>
                  <th>Status Aktif</th>
                  <th>Tanggal Gabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
				<?php  
				if(mysqli_num_rows($sqlPerusahaanlist) > 0):
					$no = 1;
					while($dataPerusahaanList = mysqli_fetch_array($sqlPerusahaanlist, MYSQLI_ASSOC)):
				?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$dataPerusahaanList['nm_perusahaan'];?></td>
                  <td><?=$dataPerusahaanList['email'];?></td>
                  <td><?=$dataPerusahaanList['alamat'];?></td>
                  <td><?=$dataPerusahaanList['telp'];?></td>
                  <td><?=$dataPerusahaanList['nm_cp'];?></td>
                  <td><?=cek_aktif($dataPerusahaanList['aktif']);?></td>
                  <td><?=tanggal($dataPerusahaanList['tgl_gabung']);?></td>
                  <td>
                  	<div class="btn-group">
                  		<a href="perusahaandetail.php?detail=<?=$dataPerusahaanList['id_perusahaan'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span> Kelola</a>
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