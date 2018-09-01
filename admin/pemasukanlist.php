admin<?php 
include_once 'header.php'; 
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Dana Pemasukan</h1><br>
            <!-- <h2>Waktu <?=date('Y-m-d H:i:s');?></h2> -->
          </div>

          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Success</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pending</a>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="table-responsive my-lg-4">
                <table class="table table-striped table-hover dashboard" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Tagihan</th>
                      <th>Perusahaan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query_pemasukan = "SELECT
                                            pembayaran_proyek.*,
                                            proyek.dana,
                                            perusahaan.id_perusahaan,
                                            perusahaan.nm_perusahaan
                                        FROM
                                            pembayaran_proyek
                                        JOIN perusahaan USING(id_perusahaan)
                                        JOIN proyek USING(id_proyek)
                                        WHERE
                                            konfirmasi = 1
                                        GROUP BY
                                            pembayaran_proyek.tgl_dibuat
                                        DESC";
                    $sql_pemasukan = mysqli_query($koneksi, $query_pemasukan) or die(mysqli_error($koneksi));

                    if(mysqli_num_rows($sql_pemasukan) > 0):
                      $no = 1;
                      while($data_pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQLI_ASSOC)):
                        ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data_pemasukan['no_tagihan'];?></td>
                          <td><?=$data_pemasukan['nm_perusahaan'];?></td>
                          <td><?=rupiah($data_pemasukan['dana']);?></td>
                          <td><?=cetakstatus_pembayaran($data_pemasukan['konfirmasi']);?></td>
                          <td><?=$data_pemasukan['tgl_dibuat'];?></td>
                          <td>
                            <div class="btn-group">
                              <a href="pemasukandetail.php?detail=<?=$data_pemasukan['id_pembayaranproyek'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span>&nbsp; Kelola</a>
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
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="table-responsive my-lg-4">
                <table class="table table-striped table-hover dashboard" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Tagihan</th>
                      <th>Perusahaan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query_pemasukan = "SELECT
                                            pembayaran_proyek.*,
                                            proyek.dana,
                                            perusahaan.id_perusahaan,
                                            perusahaan.nm_perusahaan
                                        FROM
                                            pembayaran_proyek
                                        JOIN perusahaan USING(id_perusahaan)
                                        JOIN proyek USING(id_proyek)
                                        WHERE
                                            konfirmasi = 0
                                        GROUP BY
                                            pembayaran_proyek.tgl_dibuat
                                        DESC";
                    $sql_pemasukan = mysqli_query($koneksi, $query_pemasukan) or die(mysqli_error($koneksi));

                    if(mysqli_num_rows($sql_pemasukan) > 0):
                      $no = 1;
                      while($data_pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQLI_ASSOC)):
                        ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$data_pemasukan['no_tagihan'];?></td>
                          <td><?=$data_pemasukan['nm_perusahaan'];?></td>
                          <td><?=rupiah($data_pemasukan['dana']);?></td>
                          <td><?=cetakstatus_pembayaran($data_pemasukan['konfirmasi']);?></td>
                          <td><?=$data_pemasukan['tgl_dibuat'];?></td>
                          <td>
                            <div class="btn-group">
                              <a href="pemasukandetail.php?detail=<?=$data_pemasukan['id_pembayaranproyek'];?>" class="btn btn-outline-primary btn-sm" title="Lihat Proposal"><span data-feather="edit"></span>&nbsp; Kelola</a>
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
            </div>
          </div>

          
        </main>

<?php 
include_once 'footer.php';
?>