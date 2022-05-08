<?= $this->session->flashdata('pesan'); ?>
<?php unset($_SESSION['pesan']); ?>
<?php
$role = userdata('role');
if ($role == 'faskes') {
    $akses = userdata('jns_nama_faskes');
}
if ($role == 'admin' || $akses == 'Rumah Sakit') { ?>
    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Tenaga Medis Rumah Sakit</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($j >= 1) {
                                foreach ($kreon_tm as $key) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key['nama_faskes'] ?></td>
                                        <td><?= $key['jns_nama_faskes'] ?></td>
                                        <td><?= $key['nama_tng_mds'] ?></td>
                                        <td><?= $key['tmt'] ?></td>
                                        <td><?= $key['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($key['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($key['tat']);
                                        $tmt = new DateTime($key['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/rs_tm') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Tenaga Medis (Rumah Sakit) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Tenaga Medis</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($j >= 1) {
                                foreach ($n as $key) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key['nama_faskes'] ?></td>
                                        <td><?= $key['jenis_tenaga_medis'] ?></td>
                                        <td><?= $key['nama_tng_mds'] ?></td>
                                        <td><?= $key['tmt'] ?></td>
                                        <td><?= $key['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $key['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Dokumen Rumah Sakit</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($kreon_doc >= 1) {
                                foreach ($kreon_doc as $kd) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kd['nama_faskes'] ?></td>
                                        <td><?= $kd['jns_nama_faskes'] ?></td>
                                        <td><?= $kd['tmt'] ?></td>
                                        <td><?= $kd['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($kd['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($kd['tat']);
                                        $tmt = new DateTime($kd['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/rs_dokumen') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Dokumen (Rumah Sakit) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Surat</th>
                            <th>Nomor Surat</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($a >= 1) {
                                foreach ($b as $dk) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dk['nama_faskes'] ?></td>
                                        <td><?= $dk['jns_nama_faskes'] ?></td>
                                        <td><?= $dk['nama_surat'] ?></td>
                                        <td><?= $dk['nomor_surat'] ?></td>
                                        <td><?= $dk['tmt'] ?></td>
                                        <td><?= $dk['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $dk['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$role = userdata('role');
if ($role == 'faskes') {
    $akses = userdata('jns_nama_faskes');
}
if ($role == 'admin' || $akses == 'Klinik Utama') { ?>
    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Tenaga Medis Klinik Utama</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($c >= 1) {
                                foreach ($klinik_tm as $kltm) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kltm['nama_faskes'] ?></td>
                                        <td><?= $kltm['jns_nama_faskes'] ?></td>
                                        <td><?= $kltm['nama_tng_mds'] ?></td>
                                        <td><?= $kltm['tmt'] ?></td>
                                        <td><?= $kltm['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($kltm['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($kltm['tat']);
                                        $tmt = new DateTime($kltm['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/klinik_tm') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Tenaga Medis (Klinik Utama) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Tenaga Medis</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($c >= 1) {
                                foreach ($d as $kld) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kld['nama_faskes'] ?></td>
                                        <td><?= $kld['jenis_tenaga_medis'] ?></td>
                                        <td><?= $kld['nama_tng_mds'] ?></td>
                                        <td><?= $kld['tmt'] ?></td>
                                        <td><?= $kld['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $kld['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Dokumen Klinik Utama</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($e >= 1) {
                                foreach ($klinik_doc as $kldc) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kldc['nama_faskes'] ?></td>
                                        <td><?= $kldc['jns_nama_faskes'] ?></td>
                                        <td><?= $kldc['tmt'] ?></td>
                                        <td><?= $kldc['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($kldc['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($kldc['tat']);
                                        $tmt = new DateTime($kldc['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/klinik_dokumen') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Dokumen (Klinik Utama) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Surat</th>
                            <th>Nomor Surat</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($e >= 1) {
                                foreach ($f as $kldn) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kldn['nama_faskes'] ?></td>
                                        <td><?= $kldn['jns_nama_faskes'] ?></td>
                                        <td><?= $kldn['nama_surat'] ?></td>
                                        <td><?= $kldn['nomor_surat'] ?></td>
                                        <td><?= $kldn['tmt'] ?></td>
                                        <td><?= $kldn['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $kldn['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$role = userdata('role');
if ($role == 'faskes') {
    $akses = userdata('jns_nama_faskes');
}
if ($role == 'admin' || $akses == 'Optik') { ?>
    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Tenaga Medis Optik</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($g >= 1) {
                                foreach ($optik_tm as $optm) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $optm['nama_faskes'] ?></td>
                                        <td><?= $optm['jns_nama_faskes'] ?></td>
                                        <td><?= $optm['nama_tng_mds'] ?></td>
                                        <td><?= $optm['tmt'] ?></td>
                                        <td><?= $optm['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($optm['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($optm['tat']);
                                        $tmt = new DateTime($optm['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/optik_tm') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Tenaga Medis (Optik) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Tenaga Medis</th>
                            <th>Nama Tenaga Medis</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($g >= 1) {
                                foreach ($h as $opd) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $opd['nama_faskes'] ?></td>
                                        <td><?= $opd['jenis_tenaga_medis'] ?></td>
                                        <td><?= $opd['nama_tng_mds'] ?></td>
                                        <td><?= $opd['tmt'] ?></td>
                                        <td><?= $opd['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $opd['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Monitoring Data Baru Kredensialing Dokumen Optik</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Masa Aktif</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($i >= 1) {
                                foreach ($optik_doc as $opdc) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $opdc['nama_faskes'] ?></td>
                                        <td><?= $opdc['jns_nama_faskes'] ?></td>
                                        <td><?= $opdc['tmt'] ?></td>
                                        <td><?= $opdc['tat'] ?></td>
                                        <?php
                                        $sekarang_hari = date('Ymd');
                                        $sekarang = new DateTime($sekarang_hari);
                                        $masa_atif = new DateTime($opdc['tat']);
                                        $hasil = $masa_atif->diff($sekarang)->days;


                                        $tat = new DateTime($opdc['tat']);
                                        $tmt = new DateTime($opdc['tmt']);
                                        $masa_aktif = $tmt->diff($tat)->days;

                                        ?>
                                        <td><?= $masa_aktif ?></td>
                                        <td><a onclick="return confirm('Yakin ingin meninggalkan halaman?')" href="<?= base_url('me/optik_dokumen') ?>" class="btn btn-danger">Belum Divalidasi</a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-3 mr-3">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Informasi Sisa Hari Kredensialing Dokumen (Optik) Sisa Hari < 90 Hari</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <th>No. </th>
                            <th>Nama Faskes</th>
                            <th>Jenis Faskes</th>
                            <th>Nama Surat</th>
                            <th>Nomor Surat</th>
                            <th>TMT</th>
                            <th>TAT</th>
                            <th>Sisa hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            if ($i >= 1) {
                                foreach ($k as $opdd) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $opdd['nama_faskes'] ?></td>
                                        <td><?= $opdd['jns_nama_faskes'] ?></td>
                                        <td><?= $opdd['nama_surat'] ?></td>
                                        <td><?= $opdd['nomor_surat'] ?></td>
                                        <td><?= $opdd['tmt'] ?></td>
                                        <td><?= $opdd['tat'] ?></td>
                                        <td><a class="btn btn-danger text-light"><?= $opdd['0'] ?></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>