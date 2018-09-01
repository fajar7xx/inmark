<?php 
include_once 'header.php'; 

$query_tarikSaldo = "SELECT
                        tarik_saldo.*,
                        influencer.nm_lengkap
                    FROM
                        tarik_saldo
                    JOIN influencer USING(id_influencer)
                    ORDER BY
                        tgl_dibuat
                    DESC";
$sql_tarikSaldo = mysqli_query($koneksi, $query_tarikSaldo) or die(mysqli_error($koneksi));

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">laporan Tarik Saldo dari Influencer</h1><br>
    <!-- <h2>Waktu <?=date('Y-m-d H:i:s');?></h2> -->
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-hover" id="tabel">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Influencer</th>
          <th>Nama Rekening</th>
          <th>No Rekening</th>
          <th>Nominal</th>
          <th>Tanggal Pengajuan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php  
        if(mysqli_num_rows($sql_tarikSaldo) > 0):
          $no = 1;
          while($data_tarikSaldo = mysqli_fetch_array($sql_tarikSaldo, MYSQLI_ASSOC)):
        ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$data_tarikSaldo['nm_lengkap'];?></td>
          <td><?=$data_tarikSaldo['nama_rekening'];?></td>
          <td><?=$data_tarikSaldo['no_rekening'];?></td>
          <td><?=rupiah($data_tarikSaldo['nominal']);?></td>
          <td><?=tanggal($data_tarikSaldo['tgl_dibuat']);?></td>
          <td><?=cetakstatus_pembayaran($data_tarikSaldo['konfirmasi']);?></td>
          <td>
            <?php
            if(empty($data_tarikSaldo['konfirmasi'])):
            ?>
              <a href="action.php?tariksaldo=<?=$data_tarikSaldo['id_tariksaldo'];?>" class="btn btn-outline-primary btn-sm">
                <span data-feather="check"></span> Konfirmasi
              </a>

            <?php else: ?>
               <a class="btn btn-primary btn-sm disabled">
                <span data-feather="dollar-sign"></span> Sudah Konfirmasi
              </a> 

            <?php endif; ?>
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