<?= $this->session->flashdata('pesan'); ?>
<?php unset($_SESSION['pesan']); ?>
<div class="row ml-3">
    <?php if (is_admin()) : ?>
        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><b>Total Pengajuan Self Assesment</b></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPengajuan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Supplier</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <?php if (is_admin()) : ?>
        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="row ml-3 mr-3">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">Hasil Self Assesment</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <?php $poli =  $this->session->login_session['poli']; ?>
                        <th>No. </th>
                        <?php if (is_admin()) : ?>
                            <th>Nama Faskes</th>
                        <?php endif; ?>
                        <th>Nama Poli</th>
                        <th>Tanggal Self Assesment</th>
                        <?php if ($poli == 'nyeri' || $poli == 'hemodialisa') { ?>
                            <th>Hasil Skor Assesment</th>
                        <?php } ?>
                        <th>Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $no = 1;
                        foreach ($checkbox2 as $j) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <?php if (is_admin()) : ?>
                                    <td><?= $j['nama_faskes']; ?></td>
                                <?php endif; ?>
                                <td><?= $j['nama_poli']; ?></td>
                                <td><?= $j['tgl']; ?></td>
                                <?php if ($poli == 'nyeri' || $poli == 'hemodialisa') { ?>
                                    <td><?= $j['hasilSkor']; ?></td>
                                <?php } ?>
                                <td>
                                    <?php
                                    if ($j['penilaian'] == 'terima') {
                                        $type = 'btn-success';
                                        $text = 'Telah Disetujui';
                                    } elseif ($j['penilaian'] == 'tolak') {
                                        $type = 'btn-danger';
                                        $text = 'Di Tolak';
                                    } else {
                                        $type = 'btn-warning';
                                        $text = 'Belum Dinilai';
                                    }
                                    ?>
                                    <button type="button" class="btn <?= $type ?> "><?= $text ?></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>