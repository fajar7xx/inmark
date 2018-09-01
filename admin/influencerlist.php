<?php 
include 'header.php'; 

$qinfluencerList = "SELECT * FROM influencer GROUP BY tgl_gabung DESC";
$sqlinfluencerList = mysqli_query($koneksi, $qinfluencerList) or die(mysqli_error($koneksi));

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Data Influencer</h1>
          </div>

          <div class="table">
            <table class="table table-striped" id="proyek">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telp</th>
                  <th>Status Aktif</th>
                  <th>Tanggal Gabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
				<?php  
				if(mysqli_num_rows($sqlinfluencerList) > 0):
					$no = 1;
					while($datainfluencerList = mysqli_fetch_array($sqlinfluencerList, MYSQLI_ASSOC)):
				?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$datainfluencerList['nm_lengkap'];?></td>
                  <td><?=$datainfluencerList['email'];?></td>
                  <td><?=$datainfluencerList['telp'];?></td>
                  <td><?=cek_aktif($datainfluencerList['aktif']);?></td>
                  <td><?=tanggal($datainfluencerList['tgl_gabung']);?></td>
                  <td>
                  	<div class="btn-group">
                  		<a href="infdetail.php?detail=<?=$datainfluencerList['id_influencer'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span> Kelola</a>
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