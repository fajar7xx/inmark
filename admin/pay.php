<?php 
include_once 'header.php'; 
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Bayar Influencer</h1><br>
          </div>

          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Success</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pending</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active pt-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="table-responsive">
                <table class="table table-striped table-hover dashboard" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Tagihan</th>
                      <th>Nama Influencer</th>
                      <th>Proyek Yang Telah Di selesaikan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
            $query_pay = "SELECT
                      pembayaran_influencer.*,
                      proyek.judul_proyek,
                      influencer.nm_lengkap
                  FROM
                      pembayaran_influencer
                  LEFT JOIN proyek USING(id_proyek)
                  LEFT JOIN influencer USING(id_influencer)
                  WHERE
                    konfirmasi = 1
                  GROUP BY
                      pembayaran_influencer.tgl_dibuat
                  DESC";
            $sql_pay = mysqli_query($koneksi, $query_pay) or die(mysqli_error($koneksi));  

            if(mysqli_num_rows($sql_pay) > 0):
              $no = 1;
              while($data_pay = mysqli_fetch_array($sql_pay, MYSQLI_ASSOC)):
            ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$data_pay['no_tagihan'];?></td>
                      <td><?=$data_pay['nm_lengkap'];?></td>
                      <td><?=$data_pay['judul_proyek'];?></td>
                      <td><?=rupiah($data_pay['nominal']);?></td>
                      <td><?=cetakstatus_pembayaran($data_pay['konfirmasi']);?></td>
                      <td>
                        <?php
                        if(empty($data_pay['konfirmasi'])):
                          ?>
                            <a href="action.php?konfirmasipay=<?=$data_pay['id_pembayaraninf'];?>" class="btn btn-outline-primary btn-sm">
                              <span data-feather="check"></span> Konfirmasi
                            </a>

                          <?php else: ?>

                           <a href="" class="btn btn-primary btn-sm disabled">
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
            </div>
            <div class="tab-pane fade pt-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><div class="table-responsive">
                <table class="table table-striped table-hover dashboard" id="">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>No Tagihan</th>
                      <th>Nama Influencer</th>
                      <th>Proyek Yang Telah Di selesaikan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
            $query_pay = "SELECT
                      pembayaran_influencer.*,
                      proyek.judul_proyek,
                      influencer.nm_lengkap
                  FROM
                      pembayaran_influencer
                  LEFT JOIN proyek USING(id_proyek)
                  LEFT JOIN influencer USING(id_influencer)
                  WHERE
                    konfirmasi = 2
                  GROUP BY
                      pembayaran_influencer.tgl_dibuat
                  DESC";
            $sql_pay = mysqli_query($koneksi, $query_pay) or die(mysqli_error($koneksi));  

            if(mysqli_num_rows($sql_pay) > 0):
              $no = 1;
              while($data_pay = mysqli_fetch_array($sql_pay, MYSQLI_ASSOC)):
            ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$data_pay['no_tagihan'];?></td>
                      <td><?=$data_pay['nm_lengkap'];?></td>
                      <td><?=$data_pay['judul_proyek'];?></td>
                      <td><?=rupiah($data_pay['nominal']);?></td>
                      <td><?=cetakstatus_pembayaran($data_pay['konfirmasi']);?></td>
                      <td>
                        <?php
                        if(empty($data_pay['konfirmasi'])):
                          ?>
                            <a href="action.php?konfirmasipay=<?=$data_pay['id_pembayaraninf'];?>" class="btn btn-outline-primary btn-sm">
                              <span data-feather="check"></span> Konfirmasi
                            </a>

                          <?php else: ?>

                           <a href="" class="btn btn-primary btn-sm disabled">
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
              </div></div>
          </div>


        </main>

<?php 
include_once 'footer.php';
?>