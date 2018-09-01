<?php 
include 'header.php'; 

$id_detailPer = $_GET['detail'];

$qPerDetail = "SELECT * FROM perusahaan 
                JOIN profil_perusahaan USING(id_perusahaan)
                WHERE id_perusahaan = $id_detailPer";
$sqlPerDetail = mysqli_query($koneksi, $qPerDetail) or die(mysqli_error($koneksi));
$dataPerDetail = mysqli_fetch_array($sqlPerDetail);

// update status
if(isset($_POST['simpan'])){
  $statusPerusahaan = $_POST['status'];

  $updateStatus = mysqli_query($koneksi, "UPDATE perusahaan SET aktif = '$statusPerusahaan' WHERE id_perusahaan = '$id_detailPer'") or die(mysqli_error());

  if(!$updateStatus){
    printf("Error message: %s\n", mysqli_error($koneksi));
  }

  if($updateStatus){
    header('Location: perusahaanlist.php');
  }
  else{
    echo "<script>alert('Gagal memperbaharui data, coba lagi');</script>";
  }
}

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 ml-3">
            <h1 class="h2">Detail Perusahaan</h1>
          </div>
          <hr>

          <!-- place coding here -->
          <div class="container-fluid mb-lg-4">
            <div class="row">
              <!-- deskripsi proyek -->
              <div class="col-8">
                <div class="p-3 bg-white rounded box-shadow border">
                  <div class="mb-4">
                    <h2 class="text-primary">Tentang</h2>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="justify-content-around">
                    <?=$dataPerDetail['tentang'];?>
                  </div>
                </div>
              </div>
              <!-- ./deskripsi proyek -->

              <div class="col-4">
                <!-- bagian data perusahaan dan proyek -->
                <div class="card" style="width: 20rem;">
                  <div class="card-body">
                    <img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataPerDetail['gbr_profil']);?>" style="width: 60%; height: auto;">
                    <p class="card-text text-center text-primary lead"><?=$dataPerDetail['nm_perusahaan'];?></p>
                    <p class="card-text text-center text-primary lead m-0"><?=$dataPerDetail['email'];?></p>
                    <p class="card-text text-center m-0"><?=$dataPerDetail['kota'];?>,<?=$dataPerDetail['provinsi'];?></p>
                     <p class="card-text text-center m-0"><?=$dataPerDetail['negara'];?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <span data-feather="globe"></span>&nbsp;
                      <a href="<?=$dataPerDetail['website'];?>" target="blank">
                        <?=$dataPerDetail['website'];?>
                      </a>
                    </li>
                    
                    <li class="list-group-item">
                      <span data-feather="phone"></span>&nbsp;
                      <?=$dataPerDetail['telp'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="map-pin"></span>&nbsp;
                      <?=$dataPerDetail['alamat'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="user"></span>&nbsp;
                      Contact Person : <?=$dataPerDetail['nm_cp'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="smartphone"></span>&nbsp;
                      No Contact Person : <?=$dataPerDetail['no_cp'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="credit-card"></span>&nbsp;
                      No NPWP : <?=$dataPerDetail['no_npwp'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="credit-card"></span>&nbsp;
                      No SIUP : <?=$dataPerDetail['no_siup'];?>
                    </li>

                  </ul>
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                          <option value="1" >Aktif</option>
                          <option value="0" >Non-Aktif</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary float-left">
                        <a href="perusahaanlist.php" class="btn btn-outline-warning float-right">Batal</a>
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