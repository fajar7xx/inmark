<?php 
include 'header.php'; 

$id_detailP = $_GET['detail'];

$qProyekDetail = "SELECT
                      proyek.*,
                      proyek.aktif AS proyekAktif,
                      kategori.*,
                      perusahaan.*   
                  FROM
                      proyek
                  LEFT JOIN kategori USING(id_kategori)
                  LEFT JOIN perusahaan USING(id_perusahaan)
                  WHERE
                      id_proyek = '$id_detailP'";
$sqlProyekDetail = mysqli_query($koneksi, $qProyekDetail) or die(mysqli_error($koneksi));
$dataProyekDetail = mysqli_fetch_array($sqlProyekDetail);

// update status
if(isset($_POST['simpan'])){
  $statusProyek = $_POST['status'];

  $updateStatus = mysqli_query($koneksi, "UPDATE proyek SET aktif = '$statusProyek' WHERE id_proyek = '$id_detailP'") or die(mysqli_error());

  if($updateStatus){
    header('Location: proyeklist.php');
  }
  else{
    echo "<script>alert('Gagal memperbaharui data, coba lagi');</script>";
  }
}
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 ml-3">
            <h1 class="h2">Detail Proyek</h1>
          </div>
          <hr>

          <!-- place coding here -->
          <div class="container-fluid mb-lg-4">
            <div class="row">
              <!-- deskripsi proyek -->
              <div class="col-8">
                <div class="p-3 bg-white rounded box-shadow border">
                  <div class="row">
                    <div class="col-8">
                      <div class="mb-4">
                        <h2 class="text-primary text-left"><?=$dataProyekDetail['judul_proyek'];?></h2>
                        <small>Diposting pada : <?=  tanggal($dataProyekDetail['tgl_dibuat']);?> </small> 
                        <br>
                        <small>Kategori  : <?=$dataProyekDetail['nama_kategori'];?> </small>
                      </div>
                    </div>
                    <div class="col-4">
                      <span class="float-right"><?=cek_aktif($dataProyekDetail['proyekAktif']);?></span>
                    </div>
                  </div>
                  

                  <div class="dropdown-divider"></div>
                  <div class="justify-content-around">
                    <?=$dataProyekDetail['deskripsi'];?>
                  </div>
                </div>
              </div>
              <!-- ./deskripsi proyek -->

              <div class="col-4">
                <!-- bagian data perusahaan dan proyek -->
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">Di Posting Oleh:</h5>
                    <img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataProyekDetail['gbr_profil']);?>" style="width: 60%; height: auto;">
                    <p class="card-text text-center"><?=  $dataProyekDetail['nm_perusahaan'];?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Dana : <span class="font-weight-bold"><?= rupiah($dataProyekDetail['dana']);?></span></li>
                    <li class="list-group-item">Tanggal Mulai : <?=  tanggal($dataProyekDetail['tgl_mulai']);?></li>
                    <li class="list-group-item">Tanggal Berakhir : <?=  tanggal($dataProyekDetail['tgl_akhir']);?></li>
                  </ul>
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                          <option value="1" <?=($dataProyekDetail['aktif'] == 1)?'selected':'';?>>Aktif</option>
                          <option value="0" <?=($dataProyekDetail['aktif'] == 0)?'selected':'';?>>Non-Aktif</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-left">
                        <a href="proyeklist.php" class="btn btn-outline-warning float-right">Batal</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </main>

<?php 
include 'footer.php';
?>