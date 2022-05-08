<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Hasil Penilaian Pengajuan Layanan Baru Poli Hemodialisa
                    </h4>
                </div>
                <!-- <div class="col-auto">
                    <a href="<?= base_url('jenis/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Jenis Faskes
                        </span>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <?php if (is_admin()) : ?>
                            <th>Nama Faskes</th>
                        <?php endif; ?>
                        <th>Nama Poli</th>
                        <th>Tanggal Self Assesment</th>
                        <th>Hasil Skor Assesment</th>
                        <th>Dokumen Komitmen</th>
                        <th>Dokumen Sarana</th>
                        <th>Dokumen Pendukung</th>
                        <th>Dokumen Administrasi</th>
                        <th>Hasil Perhitungan BPJS</th>
                        <th>Tanggal Kredensialing</th>
                        <th>Komentar</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group;">
                    <tr>
                        <th>No. </th>
                        <?php if (is_admin()) : ?>
                            <th>Nama Faskes</th>
                        <?php endif; ?>
                        <th>Nama Poli</th>
                        <th>Tanggal Self Assesment</th>
                        <th>Hasil Skor Assesment</th>
                        <th>Dokumen Komitmen</th>
                        <th>Dokumen Sarana</th>
                        <th>Dokumen Pendukung</th>
                        <th>Dokumen Administrasi</th>
                        <th>Hasil Perhitungan BPJS</th>
                        <th>Tanggal Kredensialing</th>
                        <th>Komentar</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    if ($checkbox_hd2) :
                        foreach ($checkbox_hd2 as $j) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $j['nama_faskes']; ?></td>
                                <td><?= $j['nama_poli']; ?></td>
                                <td><?= $j['tgl']; ?></td>
                                <td><?= $j['hasilSkor']; ?></td>
                                <td><a href="<?= base_url('upload/askk/' . $j['dokumenkomitmen']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><a href="<?= base_url('upload/askk/' . $j['dokumensarana']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><a href="<?= base_url('upload/askk/' . $j['dokumenpendukung']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><a href="<?= base_url('upload/askk/' . $j['dokumenadm']) ?>" class="btn btn-primary btn-sm m-b-10 m-l-5" target="_blank">PDF</a></td>
                                <td><?= $j['hasilBpjs']; ?></td>
                                <td><?= $j['tgKreon']; ?></td>
                                <td><?php if ($j['penilaian'] == 'terimakabid' || $j['penilaian'] == 'tolakkabid') { ?><?= $j['komentar']; ?><?php } ?></td>
                                <td>
                                    <?php
                                    if ($j['penilaian'] == 'terimakabid') {
                                        $type = 'btn-success';
                                        $text = 'Telah Disetujui';
                                    } elseif ($j['penilaian'] == 'tolakkabid') {
                                        $type = 'btn-danger';
                                        $text = 'Di Tolak';
                                    } else {
                                        $type = 'btn-warning';
                                        $text = 'Belum Dinilai';
                                    }
                                    ?>
                                    <button type="button" class="btn <?= $type ?> "><?= $text ?></button>
                                </td>
                                <td>
                                    <a href="<?= base_url('askk/admin_hemodialisa/edit/' . $j['id_checkbox_hd']) ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                    <?php if (is_admin()) : ?>
                                        <a href="<?= base_url('askk/admin_hemodialisa/kredensialing/' . $j['id_checkbox_hd']) ?>" class="btn btn-warning btn-sm mb-2" target="_blank"><i class="fas fa-fw fa-pencil-alt"></i> Kredensialing</a>
                                    <?php endif; ?>
                                    <a href="<?= base_url('askk/admin_hemodialisa/cetak/' .  $j['id_checkbox_hd']) ?>" class="btn btn-success btn-sm mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a><br>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('askk/admin_hemodialisa/delete/' .  $j['id_checkbox_hd']) ?>" class="btn btn-danger btn-sm mb-2"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                    <?php if ($j['penilaian'] == 'terimakabid') { ?>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/Hasil_kredensialing_hemodialisa/stj/') . $j['id_checkbox_hd'] . '/' . $j['id_telegram'] ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fas fa-paper-plane"></i> Kirim Pesan Telegram</a>
                                        <?php endif; ?>
                                    <?php } elseif ($j['penilaian'] == 'tolakkabid') { ?>
                                        <?php if (is_admin()) : ?>
                                            <a href="<?= base_url('askk/Hasil_kredensialing_hemodialisa/tlk/') . $j['id_checkbox_hd'] . '/' . $j['id_telegram'] ?>" class="btn btn-primary btn-sm mb-2" target="_blank"><i class="fas fa-paper-plane"></i> Kirim Pesan Telegram</a>
                                        <?php endif; ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="15" class="text-center">
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