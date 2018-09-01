<?php 
include_once 'template/header.php'; 

$id_influencer = $id_pengguna;

// data proposal yang sudah di apply
$queryProposalH = "SELECT * FROM proposal
                    JOIN influencer USING(id_influencer)
                    WHERE id_influencer = $id_influencer";
$sqlQProposalH = mysqli_query($koneksi, $queryProposalH) or die(mysqli_connect_error($koneksi));
$hitungProposalH = mysqli_num_rows($sqlQProposalH);

// data proposal yang di terima
$queryProposalJ = "SELECT * FROM proposal
                    JOIN influencer USING(id_influencer)
                    WHERE (
                        id_influencer = $id_influencer AND
                        proposal.diterima = 1
                    )";
$sqlQProposalJ = mysqli_query($koneksi, $queryProposalJ) or die(mysqli_connect_error($koneksi));
$hitungProposalJ = mysqli_num_rows($sqlQProposalJ);

//data proyek yang telah selesai
$queryProposalS = "SELECT * FROM proposal
                    JOIN influencer USING(id_influencer)
                    WHERE (
                        id_influencer = $id_influencer AND
                        proposal.diterima = 3
                    )";
$sqlQProposalS = mysqli_query($koneksi, $queryProposalS) or die(mysqli_connect_error($koneksi));
$hitungProposalS = mysqli_num_rows($sqlQProposalS);


// list proposal yang dia terbitkan
$queryListProposal = "SELECT
                            proposal.id_proposal,
                            proposal.id_proyek,
                            proposal.id_influencer,
                            proposal.deskripsi,
                            proposal.diterima,
                            proposal.tgl_dibuat,
                            proyek.judul_proyek,
                            proyek.dana,
                            kategori.nama_kategori,
                            perusahaan.nm_perusahaan,
                            perusahaan.alamat
                        FROM
                            proposal
                        JOIN proyek USING(id_proyek)
                        JOIN kategori USING(id_kategori)
                        JOIN perusahaan USING(id_perusahaan)
                        WHERE 
                            id_influencer = '$id_influencer'
                        GROUP BY 
                            proposal.tgl_dibuat 
                        DESC";
$sql_listProposal = mysqli_query($koneksi, $queryListProposal) or die(mysqli_connect_error($koneksi));
$jlh_listProposal = mysqli_num_rows($sql_listProposal);


// saldo virtual influencer
$query_pemasukan = "SELECT
                        SUM(nominal) AS dana_masuk
                    FROM
                        pembayaran_influencer
                    WHERE
                    (
                        id_influencer = '$id_influencer' AND
                        konfirmasi = 1
                    )";
$sql_pemasukan = mysqli_query($koneksi, $query_pemasukan) or die(mysqli_error($koneksi));
$pemasukan = mysqli_fetch_array($sql_pemasukan, MYSQLI_ASSOC);

// tarik saldo
$query_pengeluaran = "SELECT
                        SUM(nominal) AS pengeluaran
                    FROM
                        tarik_saldo
                    WHERE
                        (
                            id_influencer = '$id_influencer' AND konfirmasi = 1
                        )";
$sql_pengeluaran = mysqli_query($koneksi, $query_pengeluaran) or die(mysqli_error($koneksi));
$pengeluaran = mysqli_fetch_array($sql_pengeluaran, MYSQLI_ASSOC);

$query_total ="SELECT
                    proposal.id_proposal,
                    proposal.id_proyek,
                    proposal.id_influencer,
                    proposal.diterima,
                    proyek.judul_proyek,
                    SUM(proyek.dana) AS total
                FROM
                    proposal
                JOIN proyek USING(id_proyek)
                JOIN kategori USING(id_kategori)
                WHERE
                    (
                        id_influencer = '$id_influencer' AND diterima = 3
                    )";
$sql_total = mysqli_query($koneksi, $query_total) or die(mysqli_error($koneksi));
$total = mysqli_fetch_array($sql_total, MYSQLI_ASSOC);
?>


<div class="container my-2">
    <div class="row">
        <div class="col-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="far fa-file-alt fa-3x float-left"></i>
                    <h5 class="card-title float-right"><?= $hitungProposalH;?> Proposal</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Proposal Proyek yang diajukan
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-list fa-3x float-left text-dark"></i>
                    <h5 class="card-title float-right"><?=$hitungProposalJ;?> Proyek Berjalan</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Proyek Yang Diterima Berjalan
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="far fa-check-square fa-3x float-left"></i>
                    <h5 class="card-title float-right"><?=$hitungProposalS;?> Proyek Selesai</h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Proyek yang telah Selesai
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-credit-card fa-3x float-left"></i>
                    <h5 class="card-title float-right"><?=rupiah($pemasukan['dana_masuk'] - $pengeluaran['pengeluaran']);?></h5>
                </div>
                <div class="card-footer text-white small bg-primary">
                    Saldo Saat ini
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">Data Proposal Proyek</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Proyek</th>
                                    <th>Oleh Perusahaan</th>
                                    <th>Kategori</th>
                                    <th>Dana</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                if($jlh_listProposal > 0):
                                    $no = 1;
                                    while($data_listProposal = mysqli_fetch_array($sql_listProposal, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td>
                                        <a href="detail-proyek.php?idproyek=<?=$data_listProposal['id_proyek'];?>" target="blank">
                                            <?=$data_listProposal['judul_proyek'];?>
                                        </a>
                                    </td>
                                    <td><?=$data_listProposal['nm_perusahaan'];?></td>
                                    <td><?=$data_listProposal['nama_kategori'];?></td>
                                    <td><?=rupiah($data_listProposal['dana']);?></td>
                                    <td><?=cek_status($data_listProposal['diterima']);?></td>
                                    <td><?=tanggal($data_listProposal['tgl_dibuat']);?></td>
                                    <td>
                                        <div class="btn-group mr-1">
                                            <a href="lihatproposal.php?id=<?=$data_listProposal['id_proposal'];?>" class="btn btn-sm btn-primary btn-block">Lihat Proposal
                                            </a>
                                        </div>
                                        
                                        <?php
                                        if($data_listProposal['diterima'] == 1):  
                                        ?>
                                        <div class="btn-group">
                                            <a href="lapor-proyek.php?lapor=<?=$data_listProposal['id_proyek'];?>" class="btn btn-success btn-sm">
                                                Lapor Proyek
                                            </a>
                                        </div>
                                        <?php
                                        elseif($data_listProposal['diterima'] == 3):  
                                        ?>
                                        <div class="btn-group">
                                            <a href="#'];?>" class="btn btn-success btn-sm disabled">
                                                Laporan Selesai
                                            </a>
                                        </div>
                                        <?php
                                        endif;  
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    endwhile;  
                                endif;
                                ?>
                                <!-- <h4>Total Dana Proyek <?=rupiah($total['total']);?></h4> -->
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
                                    <th>Pembayaran untuk Proyek</th>
                                    <th>Diajukan Oleh</th>
                                    <th>Total</th>
                                    <th>Status Pembayaran</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            $query_pembayaran = "SELECT
                                                    pembayaran_influencer.*,
                                                    proyek.judul_proyek,
                                                    perusahaan.nm_perusahaan
                                                FROM
                                                    pembayaran_influencer
                                                LEFT JOIN proyek USING(id_proyek)
                                                LEFT JOIN perusahaan USING(id_perusahaan)
                                                WHERE
                                                    id_influencer = '$id_influencer'";
                            $sql_pembayaran = mysqli_query($koneksi, $query_pembayaran);
                            $jlh_dataPembayaran = mysqli_num_rows($sql_pembayaran);

                            if($jlh_dataPembayaran > 0):
                                $no = 1;
                                while($data_pembayaran = mysqli_fetch_array($sql_pembayaran, MYSQLI_ASSOC)):
                            ?>
                                <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td><?=$data_pembayaran['no_tagihan'];?></td>
                                    <td><?=$data_pembayaran['judul_proyek'];?></td>
                                    <td><?=$data_pembayaran['nm_perusahaan'];?></td>
                                    <td><?=rupiah($data_pembayaran['nominal']);?></td>
                                    <td><?=cetakstatus_pembayaran($data_pembayaran['konfirmasi']);?></td>
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
                <div class="card-header bg-primary text-white">History Transaksi Tarik Saldo</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm font-weight-light beranda">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>No Rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            $query_tarikSaldo = "SELECT * 
                                                FROM 
                                                    tarik_saldo
                                                WHERE
                                                    id_influencer = '$id_influencer'";
                            $sql_tarikSaldo = mysqli_query($koneksi, $query_tarikSaldo);
                            $jlh_datatarikSaldo = mysqli_num_rows($sql_tarikSaldo);

                            if($jlh_datatarikSaldo > 0):
                                $no = 1;
                                while($data_tarikSaldo = mysqli_fetch_array($sql_tarikSaldo, MYSQLI_ASSOC)):
                            ?>
                                <tr>
                                    <td class="text-center"><?=$no++;?></td>
                                    <td><?=$data_tarikSaldo['no_rekening'];?></td>
                                    <td><?=$data_tarikSaldo['nama_rekening'];?></td>
                                    <td><?=rupiah($data_tarikSaldo['nominal']);?></td>
                                    <td><?=cetakstatus_pembayaran($data_tarikSaldo['konfirmasi']);?></td>
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