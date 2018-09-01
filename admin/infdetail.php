<?php 
include 'header.php'; 

$id_detailInf = $_GET['detail'];

$qInfDetail = "SELECT * FROM influencer 
                JOIN profil_influencer USING(id_influencer)
                WHERE id_influencer = $id_detailInf";
$sqlInfDetail = mysqli_query($koneksi, $qInfDetail) or die(mysqli_error($koneksi));
$dataInfDetail = mysqli_fetch_array($sqlInfDetail);

// update status
if(isset($_POST['simpan'])){
  $statusInfluencer = $_POST['status'];

  $updateStatus = mysqli_query($koneksi, "UPDATE influencer SET aktif = '$statusInfluencer' WHERE id_influencer = '$id_detailInf'") or die(mysqli_connect_error($koneksi));

  if(!$updateStatus){
    printf("Errormessage: %s\n", mysqli_error($koneksi));
  }
  if($updateStatus){
    header('Location: influencerlist.php');
  }
  else{
    echo "<script>alert('Gagal memperbaharui data, coba lagi');</script>";
  }
}

?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-1 ml-3">
            <h1 class="h2">Detail Influencer</h1>
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
                    <?=$dataInfDetail['tentang'];?>
                  </div>
                </div>
                <br>
                <div class="p-3 bg-white rounded box-shadow border">
                  <div class="mb-4">
                    <h2 class="text-primary">Kemampuan</h2>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="justify-content-around">
                    <?=$dataInfDetail['kemampuan'];?>
                  </div>
                </div>
              </div>
              <!-- ./deskripsi proyek -->

              <div class="col-4">
                <!-- bagian data perusahaan dan proyek -->
                <div class="card" style="width: 20rem;">
                  <div class="card-body">
                    <img class="card-img-top mx-auto d-block my-1 rounded-circle" src="<?=base_url($dataInfDetail['gbr_profil']);?>" style="width: 60%; height: auto;">
                    <p class="card-text text-center text-primary lead"><?=$dataInfDetail['nm_lengkap'];?></p>
                    <p class="card-text text-center text-primary lead"><?=$dataInfDetail['email'];?></p>
                    <p class="card-text text-center m-0"><?=$dataInfDetail['kota'];?>, <?=$dataInfDetail['negara'];?></p>
                    <p class="card-text text-center m-0">DA/PA : <?=$dataInfDetail['da'];?>/<?=$dataInfDetail['pa'];?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <span data-feather="globe"></span>&nbsp;
                      <a href="<?=$dataInfDetail['website'];?>" target="blank">
                        <?=$dataInfDetail['website'];?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="facebook"></span>&nbsp;
                      <a href="<?=$dataInfDetail['akun_fb'];?>" target="blank">
                        <?=get_username($dataInfDetail['akun_fb']);?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="twitter"></span>&nbsp;
                      <a href="<?=$dataInfDetail['akun_twitter'];?>" target="blank">
                        <?=get_username($dataInfDetail['akun_twitter']);?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="youtube"></span>&nbsp;
                      <a href="<?=$dataInfDetail['akun_youtube'];?>" target="blank">
                        <?=get_username($dataInfDetail['akun_youtube']);?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="instagram"></span>&nbsp;
                      <a href="<?=$dataInfDetail['akun_ig'];?>" target="blank">
                        <?=get_username($dataInfDetail['akun_ig']);?>
                      </a>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="phone"></span>&nbsp;
                      <?=$dataInfDetail['telp'];?>
                    </li>
                    <li class="list-group-item">
                      <span data-feather="map-pin"></span>&nbsp;
                      <?=$dataInfDetail['alamat'];?>
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
                        <a href="influencerlist.php" class="btn btn-outline-warning float-right">Batal</a>
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