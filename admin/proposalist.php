<?php 
include 'header.php'; 

$qProposaList = "SELECT proposal.id_proposal, proposal.diterima, proposal.tgl_dibuat,
                  proyek.id_proyek, proyek.judul_proyek, kategori.nama_kategori, 
                  influencer.id_influencer ,influencer.nm_lengkap
                  FROM proposal
                  LEFT JOIN proyek USING(id_proyek)
                  LEFT JOIN kategori USING(id_kategori)
                  LEFT JOIN influencer USING(id_influencer)
                  GROUP BY tgl_dibuat DESC";
$sqlProposaList = mysqli_query($koneksi, $qProposaList) or die(mysqli_error($koneksi));

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Data Proposal</h1>
          </div>

          <div class="table-responsive">
            <table class="table table-striped" id="tabel">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Influencer</th>
                  <th>Judul Proyek</th>
                  <th>Kategori</th>
                  <th>Tanggal Dibuat</th>
                  <th>Status</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
				<?php  
				if(mysqli_num_rows($sqlProposaList) > 0):
					$no = 1;
					while($dataProposaList = mysqli_fetch_array($sqlProposaList, MYSQLI_ASSOC)):
				?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><a href="#"><?=$dataProposaList['nm_lengkap'];?></a></td>
                  <td><a href="proyekdetail.php?detail=<?=$dataProposaList['id_proyek'];?>"><?=$dataProposaList['judul_proyek'];?></a></td>
                  <td><?=$dataProposaList['nama_kategori'];?></td>
                  <td><?=$dataProposaList['tgl_dibuat'];?></td>
                  <td><?=cek_status($dataProposaList['diterima']);?></td>
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