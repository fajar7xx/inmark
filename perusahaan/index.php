<?php 
/*
defenisi proyek berjalan dan selesai
aktif dan berjalan  => aktif = 1 & selesai = 0
selesai => aktif = 0 dan selesai = 1
*/

include_once 'template/header.php'; 

$id_perusahaan = $id_pengguna;

// jlh proyek yang pernah di buat
$query_jlhProyek = "SELECT * FROM proyek
                    JOIN perusahaan USING(id_perusahaan)
                    WHERE id_perusahaan = $id_perusahaan";
$sql_jlhProyek = mysqli_query($koneksi, $query_jlhProyek) or die(mysqli_connect_error($koneksi));
$hitung_jlhProyek = mysqli_num_rows($sql_jlhProyek);

// jlh proyek yang berjalan
$query_proyekJalan = "SELECT * FROM proyek
                    JOIN perusahaan USING(id_Perusahaan)
                    WHERE (
                        id_perusahaan = $id_perusahaan AND
                        proyek.aktif = 1 AND
                        proyek.selesai = 1
                    )";
$sql_proyekJalan = mysqli_query($koneksi, $query_proyekJalan) or die(mysqli_connect_error($koneksi));
$hitung_proyekJalan = mysqli_num_rows($sql_proyekJalan);

// jlh proyek yang berjalan
$query_proyekSelesai = "SELECT * FROM proyek
                    JOIN perusahaan USING(id_Perusahaan)
                    WHERE (
                        id_perusahaan = $id_perusahaan AND
                        proyek.aktif = 0 AND
                        proyek.selesai = 2
                    )";
$sql_proyekSelesai = mysqli_query($koneksi, $query_proyekSelesai) or die(mysqli_connect_error($koneksi));
$hitung_proyekSelesai = mysqli_num_rows($sql_proyekSelesai);
?>


<div class="container my-2">
    <div class="row">
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="far fa-file-alt fa-3x float-left"></i>
                    <h5 class="card-title float-right"><?=$hitung_jlhProyek;?> Proyek</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Jumlah Proyek
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-list fa-3x float-left text-dark"></i>
                    <h5 class="card-title float-right"><?=$hitung_proyekJalan;?> Proyek Berjalan</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Proyek Berjalan
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="far fa-check-square fa-3x float-left"></i>
                    <h5 class="card-title float-right"><?=$hitung_proyekSelesai;?> Proyek Selesai</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Proyek Selesai
                </div>
            </div>
        </div>
    </div>

    <!-- data proyek yang pernah dibuat -->
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">Data Proyek</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php  
                        $query_listProyek = "SELECT
                                                proyek.id_proyek,
                                                proyek.id_perusahaan,
                                                proyek.id_kategori,
                                                proyek.judul_proyek,
                                                proyek.dana,
                                                proyek.aktif,
                                                proyek.selesai,
                                                proyek.tgl_dibuat,
                                                kategori.nama_kategori
                                            FROM
                                                proyek
                                            JOIN kategori USING(id_kategori)
                                            WHERE
                                                id_perusahaan = '$id_perusahaan'
                                            GROUP BY
                                                proyek.tgl_dibuat DESC";
                        $sql_listProyek = mysqli_query($koneksi, $query_listProyek) or die(mysqli_connect_error($koneksi));
                        $jlh_listProyek = mysqli_num_rows($sql_listProyek);
                        ?>
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th>Judul Proyek</th>
                                    <th>Kategori</th>
                                    <th>Dana</th>
                                    <th>Status Aktif</th>
                                    <th>Status Selesai</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                if($jlh_listProyek > 0):
                                    $no = 1;
                                    while($data_listProyek = mysqli_fetch_array($sql_listProyek, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td>
                                        <a href="detailproyek.php?idproyek=<?=$data_listProyek['id_proyek'];?>" class="text-primary">
                                            <?=$data_listProyek['judul_proyek'];?>
                                        </a>
                                    </td>
                                    <td><?=$data_listProyek['nama_kategori'];?></td>
                                    <td><?=rupiah($data_listProyek['dana']);?></td>
                                    <td><?=cek_aktif($data_listProyek['aktif']);?></td>
                                    <td><?=cek_selesai($data_listProyek['selesai']);?></td>
                                    <td><?=tanggal($data_listProyek['tgl_dibuat']);?></td>
                                    <td>
                                        <!-- tombol hanya akan aktif jika sudah expire atau dimatikan admin -->
                                        <?php if($data_listProyek['selesai'] == 3):?>
                                            <a href="perpanjangproyek.php?proyek=<?=$data_listProyek['id_proyek'];?>" class="btn btn-success btn-sm my-1 btn-block">Perpanjang Proyek</a>
                                        <?php endif; ?>
                                        
                                        <?php if($data_listProyek['selesai'] == 1):?>
                                           <a href="batalproyek.php?batal=<?=$data_listProyek['id_proyek'];?>" class="btn btn-warning btn-sm btn-block">Batalkan Proyek</a>
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
            </div>
        </div>
    </div>


    <!-- data proposal yang terkirim -->
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">Data Proposal Yang Masuk</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Infuencer</th>
                                    <th>Judul Proyek</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $query_listProposal = "SELECT
                                                            proposal.id_proposal,
                                                            proposal.id_proyek,
                                                            proposal.id_influencer,
                                                            proposal.diterima,
                                                            proposal.tgl_dibuat,
                                                            kategori.nama_kategori,
                                                            proyek.id_proyek,
                                                            proyek.judul_proyek,
                                                            proyek.id_perusahaan,
                                                            perusahaan.nm_perusahaan,
                                                            influencer.id_influencer,
                                                            influencer.nm_lengkap
                                                        FROM
                                                            proposal
                                                        LEFT JOIN influencer USING(id_influencer)
                                                        LEFT JOIN proyek USING(id_proyek)
                                                        LEFT JOIN kategori USING(id_kategori)
                                                        LEFT JOIN perusahaan USING(id_perusahaan)
                                                        WHERE
                                                            id_perusahaan = '$id_perusahaan'
                                                        GROUP BY
                                                            proposal.tgl_dibuat
                                                        DESC";
                                $sql_listProposal = mysqli_query($koneksi, $query_listProposal) or die(mysqli_connect_error($koneksi));
                                $jlh_listProposal = mysqli_num_rows($sql_listProposal);

                                if($jlh_listProposal > 0):
                                    $no = 1;
                                    while($data_listProposal = mysqli_fetch_array($sql_listProposal, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td>
                                        <a href="profil-inf.php?id=<?=$data_listProposal['id_influencer'];?>" class="pl-1">
                                            <?=$data_listProposal['nm_lengkap'];?>
                                        </a>
                                    </td>
                                    <td><?=$data_listProposal['judul_proyek'];?></td>
                                    <td><?=$data_listProposal['nama_kategori'];?></td>
                                    <td><?=cek_status($data_listProposal['diterima']);?></td>
                                    <td><?=tanggal($data_listProposal['tgl_dibuat']);?></td>
                                    <td class="float-left">
                                        <a href="lihatproposal.php?id=<?=$data_listProposal['id_proposal'];?>" class="btn btn-sm btn-outline-primary btn-block">
                                            <i class="far fa-sticky-note"></i> Lihat Proposal
                                        </a>
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
        </div>
    </div>

    <!-- data lporan dari influencer -->
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">Data Laporan pengerjaan Proyek dari influencer</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nama Infuencer</th>
                                    <th>Judul Proyek</th>
                                    <th>Status</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $query_laporProyek = "SELECT
                                                            lapor_proyek.*,
                                                            influencer.nm_lengkap,
                                                            proyek.judul_proyek
                                                        FROM
                                                            lapor_proyek
                                                        LEFT JOIN influencer USING(id_influencer)
                                                        LEFT JOIN proyek using(id_proyek)
                                                        WHERE
                                                            lapor_proyek.id_perusahaan = '$id_perusahaan'
                                                        ORDER BY
                                                            tgl_dibuat
                                                        DESC";
                                $sql_laporProyek = mysqli_query($koneksi, $query_laporProyek) or die(mysqli_error($koneksi));

                                if(mysqli_num_rows($sql_laporProyek) > 0):
                                    $no = 1;
                                    while($data_laporProyek = mysqli_fetch_array($sql_laporProyek, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td><?=$data_laporProyek['nm_lengkap'];?></td>
                                    <td><?=$data_laporProyek['judul_proyek'];?></td>
                                    <td><?=status_laporan($data_laporProyek['status_laporan']);?></td>
                                    <td><?=tanggal($data_laporProyek['tgl_dibuat']);?></td>
                                    <td class="float-left">
                                        <a href="laporan-influencer.php?data=<?=$data_laporProyek['id_laporproyek'];?>" class="btn btn-sm btn-outline-info btn-block">
                                            <i class="far fa-sticky-note"></i> Lihat Laporan
                                        </a>

                                        <?php
                                        $id_proyek = $data_laporProyek['id_proyek']; 
                                        $query_cek = "SELECT * FROM rating WHERE(id_proyek = '$id_proyek' AND id_perusahaan = '$id_perusahaan')";
                                        $sql_cek = mysqli_query($koneksi, $query_cek);

                                        if(empty(mysqli_num_rows($sql_cek))):
                                        ?>
                                            <a href="rating.php?id=<?=$data_laporProyek['id_proyek'];?>" class="btn btn-sm btn-outline-success btn-block">
                                                <i class="fas fa-star"></i> Beri Rating
                                            </a>

                                        <?php else: ?>
                                        
                                           <a href="rating.php?id=<?=$data_laporProyek['id_proyek'];?>" class="btn btn-sm btn-success disabled mt-1">
                                                <i class="fas fa-star"></i> Sudah Diberi Rating
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
            </div>
        </div>
    </div>
    

    <!-- data history transaksi -->
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">History Transaksi Pembayaran</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>No Tagihan</th>
                                    <th>Total</th>
                                    <th>Status Pembayaran</th>
                                    <th>tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            $query_pembayaran = "SELECT
                                                    pembayaran_proyek.*,
                                                    proyek.dana,
                                                    perusahaan.id_perusahaan
                                                FROM
                                                    pembayaran_proyek
                                                JOIN perusahaan USING(id_perusahaan)
                                                JOIN proyek USING(id_proyek)
                                                WHERE
                                                    perusahaan.id_Perusahaan = '$id_perusahaan'
                                                GROUP BY
                                                    pembayaran_proyek.tgl_dibuat
                                                DESC";
                            $sql_pembayaran = mysqli_query($koneksi, $query_pembayaran);
                            $jlh_dataPembayaran = mysqli_num_rows($sql_pembayaran);

                            if($jlh_dataPembayaran > 0):
                                $no = 1;
                                while($data_pembayaran = mysqli_fetch_array($sql_pembayaran, MYSQLI_ASSOC)):
                            ?>
                                <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td><?=$data_pembayaran['no_tagihan'];?></td>
                                    <td><?=rupiah($data_pembayaran['dana']);?></td>
                                    <td><?=cetakstatus_pembayaran($data_pembayaran['konfirmasi']);?></td>
                                    <td><?=$data_pembayaran['tgl_dibuat'];?></td>
                                    <td>
                                        <?php  
                                        $no_pembayaranproyek = $data_pembayaran['no_tagihan'];
                                        if($data_pembayaran['konfirmasi'] == 0){
                                            echo '<a href="tagihan.php?tagihan=' . $no_pembayaranproyek .'" class="btn btn-sm btn-outline-info"><i class="fas fa-info-circle"></i> Konfirmasi Pembayaran</a>';
                                        }
                                        if($data_pembayaran['konfirmasi'] == 1)
                                            echo '<a href="" class="btn btn-sm btn-success disabled"> <i class="fas fa-check"></i> Pembayaran Lunas</a>';
                                        ?>
                                        <!-- <a href="" class="btn btn-sm btn-outline-success">status</a> -->
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
        </div>
    </div>

    <!-- data pembatalan proyek dan pengajuan retur -->
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">Daftar Proyek yang dibatalkan dan pengajuan retur</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Judul Proyek</th>
                                    <th>Dana</th>
                                    <th>Tangal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            $query_batal = "SELECT
                                                pengembalian_uang.*,
                                                proyek.judul_proyek
                                            FROM
                                                pengembalian_uang
                                            JOIN proyek USING(id_proyek)
                                            WHERE
                                               pengembalian_uang.id_perusahaan = '$id_perusahaan'
                                            ORDER BY
                                                tgl_dibuat
                                            DESC";
                            $sql_batal = mysqli_query($koneksi, $query_batal) or die(mysqli_error($koneksi));

                            if(mysqli_num_rows($sql_batal) > 0):
                                $no = 1;
                                while($data_batal = mysqli_fetch_array($sql_batal, MYSQLI_ASSOC)):
                            ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$data_batal['judul_proyek'];?></td>
                                    <td><?=rupiah($data_batal['dana']);?></td>
                                    <td><?=tanggal($data_batal['tgl_dibuat']);?></td>
                                    <td><?=review($data_batal['konfirmasi']);?></td>
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
        </div>
    </div>
</div>


<?php include_once 'template/footer.php'; ?>