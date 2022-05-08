<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card"></div>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Dokumen Klinik Utama
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('me/import/klinik_dok') ?>" class="btn btn-sm btn-primary  btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Excel Klinik
                        </span>
                    </a>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('me/klinik_dokumen/add') ?>" class="btn btn-sm btn-primary  btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Dokumen
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
                        <th>Jenis Faskes</th>
                        <th>Nama Faskes</th>
                        <th>Tanggal Kredensialing</th>
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
                        <th>Jenis Faskes</th>
                        <th>Nama Faskes</th>
                        <th>Tanggal Kredensialing</th>
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
                    if ($klinik_doc2) :
                        foreach ($klinik_doc2 as $kd) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $kd['jns_nama_faskes']; ?></td>
                                <td><?= $kd['nama_faskes']; ?></td>
                                <td><?= $kd['tgl']; ?></td>
                                <td><?= $kd['nama_surat']; ?></td>
                                <td><?= $kd['nomor_surat']; ?></td>
                                <td><?= $kd['tmt']; ?></td>
                                <td><?= $kd['tat']; ?></td>
                                <?php
                                $sekarang_hari = date('Ymd');
                                $sekarang = new DateTime($sekarang_hari);
                                $masa_atif = new DateTime($kd['tat']);
                                // print_r($kd['tat']);
                                $hasil = $masa_atif->diff($sekarang)->days;
                                $tat = new DateTime($kd['tat']);
                                $tmt = new DateTime($kd['tmt']);
                                $masa_aktif = $tmt->diff($tat)->days; //
                                ?>
                                <td><?= $masa_aktif ?></td>
                                <td><?= $hasil ?></td>
                                <td><a href="<?= base_url('upload/klinik_doc/' . $kd['dokumen']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><?php
                                    if ($kd['status_penilaian'] == 0) {
                                        echo '<span class=text-warning>Menunggu Persetujuan</span>';
                                    } elseif ($kd['status_penilaian'] == 1) {
                                        echo '<span class=text-primary>Telah Disetujui</span>';
                                    } else {
                                        echo '<span class=text-danger>Tidak Disetujui</span>';
                                    }
                                    ?> </td>
                                <td>
                                    <a class="btn btn-success btn-sm mb-2 text-light" data-toggle="modal" data-target="#modalPenilaian<?= $kd['id_klinik_doc'] ?>" title="Penilaian"><i class="fa fa-book"></i> Hasil Penilaian</a>
                                </td>
                                <?php if ($kd['status_penilaian'] == 0) { ?>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } elseif ($kd['status_penilaian'] == 1) { ?>
                                    <td>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('me/klinik_dokumen/stj/') . $kd['id_klinik_doc'] . '/' . $kd['id_telegram'] ?>" class="btn btn-warning btn-circle btn-sm" title="Kirim Pesan"><i class="fas fa-paper-plane"></i></a>
                                        <?php endif; ?>
                                    </td>
                                <?php } elseif ($kd['status_penilaian'] == 2) { ?>
                                    <td>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('me/klinik_dokumen/tlk/') . $kd['id_klinik_doc'] . '/' . $kd['id_telegram'] ?>" class="btn btn-warning btn-circle btn-sm" title="Kirim Pesan"><i class="fas fa-paper-plane"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('me/klinik_dokumen/edit/') . $kd['id_klinik_doc'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('me/klinik_dokumen/delete/') . $kd['id_klinik_doc'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
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
<?php foreach ($klinik_doc2 as $kd) { ?>
    <div class="modal fade" id="modalPenilaian<?= $kd['id_klinik_doc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('me/klinik_dokumen/status/') . $kd['id_klinik_doc'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Komentar</label>

                            <textarea class="form-control" name="komentar" <?= $red ?> id="message-text"><?= $kd['komentar'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline">
                                <?php if (is_faskes()) : ?>
                                    <?php if ($kd['status_penilaian'] == 1) { ?>
                                        <label class="form-check-label">
                                            <a class="btn btn-success btn-sm mb-2 text-light"><input type="radio" class="form-check-input" name="status" value="1">Setujui</a>
                                        </label>
                                    <?php } elseif ($kd['status_penilaian'] == 2) { ?>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <a class="btn btn-danger btn-sm mb-2 text-light"><input type="radio" class="form-check-input" name="status" value="2">Tidak Disetujui</a>
                                </label>
                            <?php } ?>
                        <?php endif; ?>
                        <?php if (is_admin()) : ?>
                            <?php $penilaian = explode(',', $kd['status_penilaian']); ?>
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