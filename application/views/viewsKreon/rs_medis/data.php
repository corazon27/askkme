<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card"></div>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Kredensialing Tenaga Medis Rumah Sakit
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('me/import') ?>" class="btn btn-sm btn-primary  btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Excel Tenaga Medis RS
                        </span>
                    </a>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('me/rs_tm/add') ?>" class="btn btn-sm btn-primary  btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Rumah Sakit Tenaga Medis
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Jenis Faskes </th>
                        <th>Nama Faskes</th>
                        <th>Tanggal Kredensialing</th>
                        <th>Kode Faskes</th>
                        <th>Jenis Tenaga Medis</th>
                        <th>Nama Tenaga Medis</th>
                        <th>JKN-KIS</th>
                        <th>Dokumen JKN-KIS</th>
                        <th>Nama Surat</th>
                        <th>Nomor Surat</th>
                        <th>TMT</th>
                        <th>TAT</th>
                        <th>Masa Aktif</th>
                        <th>Sisa Hari</th>
                        <th>Dokumen</th>
                        <th>Status Pengajuan</th>
                        <th>Validasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group;">
                    <tr>
                        <th>No. </th>
                        <th>Jenis Faskes </th>
                        <th>Nama Faskes</th>
                        <th>Tanggal Kredensialing</th>
                        <th>Kode Faskes</th>
                        <th>Jenis Tenaga Medis</th>
                        <th>Nama Tenaga Medis</th>
                        <th>JKN-KIS</th>
                        <th>Dokumen JKN-KIS</th>
                        <th>Nama Surat</th>
                        <th>Nomor Surat</th>
                        <th>TMT</th>
                        <th>TAT</th>
                        <th>Masa Aktif</th>
                        <th>Sisa Hari</th>
                        <th>Dokumen</th>
                        <th>Status Pengajuan</th>
                        <th>Validasi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    if ($kreon_tm2) :
                        foreach ($kreon_tm2 as $ktm) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $ktm['jns_nama_faskes']; ?></td>
                                <td><?= $ktm['nama_faskes']; ?></td>
                                <td><?= $ktm['tgl']; ?></td>
                                <td><?= $ktm['kode_faskes']; ?></td>
                                <td><?= $ktm['jenis_tenaga_medis']; ?></td>
                                <td><?= $ktm['nama_tng_mds']; ?></td>
                                <td><?= $ktm['jkn_kis']; ?></td>
                                <td><a href="<?= base_url('upload/rs/' . $ktm['dokumen2']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><?= $ktm['nama_surat']; ?></td>
                                <td><?= $ktm['nomor_surat']; ?></td>
                                <td><?= $ktm['tmt']; ?></td>
                                <td><?= $ktm['tat']; ?></td>
                                <?php
                                $sekarang_hari = date('Ymd');
                                $sekarang = new DateTime($sekarang_hari);
                                $masa_atif = new DateTime($ktm['tat']);
                                // print_r($ktm['tat']);
                                $hasil = $masa_atif->diff($sekarang)->days;
                                $tat = new DateTime($ktm['tat']);
                                $tmt = new DateTime($ktm['tmt']);
                                $masa_aktif = $tmt->diff($tat)->days; //
                                ?>
                                <td><?= $masa_aktif ?></td>
                                <td><?= $hasil ?></td>
                                <td><a href="<?= base_url('upload/rs/' . $ktm['dokumen']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><?php
                                    if ($ktm['status_penilaian'] == 0) {
                                        echo '<span class=text-warning>Menunggu Persetujuan</span>';
                                    } elseif ($ktm['status_penilaian'] == 1) {
                                        echo '<span class=text-primary>Telah Disetujui</span>';
                                    } else {
                                        echo '<span class=text-danger>Tidak Disetujui</span>';
                                    }
                                    ?> </td>
                                <td>
                                    <a class="btn btn-success btn-sm mb-2 text-light" data-toggle="modal" data-target="#modalPenilaian<?= $ktm['id_kreon_tm'] ?>" title="Penilaian"><i class="fa fa-book"></i> Hasil Penilaian</a>
                                </td>
                                <?php if ($ktm['status_penilaian'] == 0) { ?>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } elseif ($ktm['status_penilaian'] == 2) { ?>
                                    <td>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('me/rs_tm/tlk/') . $ktm['id_kreon_tm'] . '/' . $ktm['id_telegram'] ?>" class="btn btn-warning btn-circle btn-sm" title="Kirim Pesan"><i class="fas fa-paper-plane"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('me/rs_tm/edit/') . $ktm['id_kreon_tm'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('me/rs_tm/delete/') . $ktm['id_kreon_tm'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } elseif ($ktm['status_penilaian'] == 1) { ?>
                                    <td>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('me/rs_tm/stj/') . $ktm['id_kreon_tm'] . '/' . $ktm['id_telegram'] ?>" class="btn btn-warning btn-circle btn-sm" title="Kirim Pesan"><i class="fas fa-paper-plane"></i></a>
                                        <?php endif; ?>
                                    </td>
                                <?php } elseif ($ktm['status_penilaian'] == 1) { ?>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle btn-sm" title="Data sudah disetujui tidak bisa  Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Data sudah disetujui tidak bisaHapus Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } ?>

                            </tr>
                            <?php ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="20" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php if (userdata('role') == 'faskes') {
    $red = "readonly";
} else {
    $red = "";
} ?>

<!-- modal -->
<?php foreach ($kreon_tm2 as $ktm) { ?>
    <div class="modal fade" id="modalPenilaian<?= $ktm['id_kreon_tm'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('me/rs_tm/status/') . $ktm['id_kreon_tm'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Komentar</label>

                            <textarea class="form-control" name="komentar" <?= $red ?> id="message-text"><?= $ktm['komentar'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline">
                                <?php if (is_faskes()) : ?>
                                    <?php if ($ktm['status_penilaian'] == 1) { ?>
                                        <label class="form-check-label">
                                            <a class="btn btn-success btn-sm mb-2 text-light"><input type="radio" class="form-check-input" name="status" value="1">Setujui</a>
                                        </label>
                                    <?php } elseif ($ktm['status_penilaian'] == 2) { ?>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <a class="btn btn-danger btn-sm mb-2 text-light"><input type="radio" class="form-check-input" name="status" value="2">Tidak Disetujui</a>
                                </label>
                            <?php } ?>
                        <?php endif; ?>
                        <?php if (is_admin()) : ?>
                            <?php $penilaian = explode(',', $ktm['status_penilaian']); ?>
                            <label class="form-check-label">
                                <a class="btn btn-success btn-sm mb-2 text-light"><input type="radio" <?php in_array('1', $penilaian) ? print "checked" : ""; ?> class="form-check-input" name="status" value="1">Setujui</a>
                            </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <a class="btn btn-danger btn-sm mb-2 text-light"><input type="radio" <?php in_array('2', $penilaian) ? print "checked" : ""; ?> class="form-check-input" name="status" value="2">Tidak Disetujui</a>
                                </label>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if (is_admin()) : ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php } ?>