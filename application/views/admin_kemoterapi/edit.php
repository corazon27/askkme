<?php
// echo "<pre>";
// print_r($data);
?>
<?php if ($data->nama_faskes != '') {
    $dis = "disabled";
    $red = "readonly";
} elseif ($data->nama_faskes == '') {
    $dis = "";
    $red = "";
} ?>
<?php if ($data->a != '') {
    $dis = "disabled";
    $red = "readonly";
} elseif ($data->a == '') {
    $dis = "";
    $red = "";
} ?>
<div>
    <div class="card">
        <?= $this->session->flashdata('pesan'); ?>
        <?php unset($_SESSION['pesan']); ?>

        <div class="card-body">
            <div class="card">
                <h3 id="card_two" class="card-header">PERSYARATAN ADMINISTRASI ( KRITERIA MUTLAK )</h3>
                <div class="card-body">
                    <?php
                    if ($this->session->login_session['role'] == 'admin') { ?>
                        <form method="POST" action="<?= site_url('askk/kemoterapi/addKredensialing') ?>" enctype="multipart/form-data">
                        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
                            <form method="POST" action="<?= site_url('askk/kemoterapi/add') ?>" enctype="multipart/form-data">
                                <input type="text" name="id_nama_faskes" hidden="" value="">
                                <input type="text" name="id_nama_poli" hidden="" value="1">
                            <?php } ?>
                            <table border="0" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4">URAIAN</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td width="1%" align="center">1.</td>
                                        <td width="30%">Nama Faskes</td>
                                        <td width="1%">:</td>
                                        <td width="68%">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" readonly value="<?= $data->nama_faskes ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Nama Pemilik Faskes</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="nama_pemilik" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $data->nama_pemilik ?>">
                                                <?= form_error('nama_pemilik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Alamat </td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="alamat" value="<?= $data->alamat ?>"" aria-label=" Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>No. Telepon & Email</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="telp_email" value="<?= $data->telp_email ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td colspan="3">Dokumen Persyaratan Yang Harus Dipenuhi <b>(Mutlak)</b>:</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table border="0" width="100%" class="table">
                            </table>

                            <h3 id="card_two" class="card-header">I. PERSYARATAN MUTLAK </h3>
                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b> A. Dokumen Pendukung </b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> Surat Permohonan Kerjasama pelayanan kemoterapi kepada BPJS Kesehatan</td>
                                        <td width="1%">:</td>
                                        <?php $a = explode(',', $data->a); ?>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai1" value="0" <?= $dis ?> <?php in_array('0', $a) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai2" value="100" <?= $dis ?> <?php in_array('100', $a) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Surat Rekomendasi dari Kolegium terkait </td>
                                        <td>:</td>
                                        <?php $b = explode(',', $data->b); ?>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai3" value="0" <?= $dis ?> <?php in_array('0', $b) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai4" value="100" <?= $dis ?> <?php in_array('100', $b) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Bedah Onkologi, Rekomendasi dari PERABOI </td>
                                        <td>:</td>
                                        <?php $c = explode(',', $data->c); ?>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai5" value="0" <?= $dis ?> <?php in_array('0', $c) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai6" value="100" <?= $dis ?> <?php in_array('100', $c) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Penyakit Dalam Konsultan Hemato Onkologi, Rekomendasi dari PERHOMPEDIN </td>
                                        <td>:</td>
                                        <?php $d = explode(',', $data->d); ?>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai7" value="0" <?= $dis ?> <?php in_array('0', $d) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai8" value="100" <?= $dis ?> <?php in_array('100', $d) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Obgyn Onkologi, Rekomendasi dari HOGI </td>
                                        <td>:</td>
                                        <?php $e = explode(',', $data->e); ?>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai9" value="0" <?= $dis ?> <?php in_array('0', $e) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai10" value="100" <?= $dis ?> <?php in_array('100', $e) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Lainnya *), dengan Rekomendasi dari Kolegium </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $f = explode(',', $data->f); ?>
                                            <input type="checkbox" id="nilai11" value="0" <?= $dis ?> <?php in_array('0', $f) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai12" value="100" <?= $dis ?> <?php in_array('100', $f) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> SK Tim Onkologi (Onkologi Board) yang ditetapkan oleh Direktur Rumah Sakit </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $g = explode(',', $data->g); ?>
                                            <input type="checkbox" id="nilai13" value="0" <?= $dis ?> <?php in_array('0', $g) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai14" value="100" <?= $dis ?> <?php in_array('100', $g) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">4)</td>
                                        <td> Surat Pernyataan kesediaan mematuhi seluruh ketentuan program Jaminan Kesehatan Nasional meliputi : <br> *Kesediaan mematuhi peraturan Perundangan yang berlaku <br> *Kesediaan memberikan kemudahan akses catatan medikasi pasien <br> *Kesediaan memberikan pelaporan terhadap tindakan yang dilakukan <br> *seluruh pegawai terdaftar sebagai peserta program JKN </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $h = explode(',', $data->h); ?>
                                            <input type="checkbox" id="nilai15" value="0" <?= $dis ?> <?php in_array('0', $h) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai16" value="100" <?= $dis ?> <?php in_array('100', $h) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">5)</td>
                                        <td> Surat pengelolaan limbah B3 dari lembaga terkait </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $i = explode(',', $data->i); ?>
                                            <input type="checkbox" id="nilai17" value="0" <?= $dis ?> <?php in_array('0', $i) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai18" value="100" <?= $dis ?> <?php in_array('100', $i) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">6)</td>
                                        <td> SK Direktur penetapan Tim K3RS (Tim Keselamatan dan Kesehatan Kerja Rumah Sakit) </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $j = explode(',', $data->j); ?>
                                            <input type="checkbox" id="nilai19" value="0" <?= $dis ?> <?php in_array('0', $j) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai20" value="100" <?= $dis ?> <?php in_array('100', $j) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">7)</td>
                                        <td> SK Direktur RS tentang penetapan Ruangan Kemoterapi </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $k = explode(',', $data->k); ?>
                                            <input type="checkbox" id="nilai21" value="0" <?= $dis ?> <?php in_array('0', $k) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai22" value="100" <?= $dis ?> <?php in_array('100', $k) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="4" align="center">
                                            <h4><b>
                                                <font size="5">Upload Dokumen Pendukung</font>
                                            </b></h4>
                                        </td>
                                        <td colspan="5">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn" align="center">File</button>
                                                <input type="file" name="dokumenpendukung" />
                                            </div>
                                            <?= form_error('dokumenpendukung', '<small class="text-danger">', '</small>'); ?>
                                        </td>
                                    </tr> -->
                                </table>
                            </div>
                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>B. Sumber Daya Manusia </b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> DPJP (minimal 1) : </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $l = explode(',', $data->l); ?>
                                            <input type="checkbox" id="nilai23" value="0" <?= $dis ?> <?php in_array('0', $l) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai24" value="100" <?= $dis ?> <?php in_array('100', $l) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SIP </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $m = explode(',', $data->m); ?>
                                            <input type="checkbox" id="nilai25" value="0" <?= $dis ?> <?php in_array('0', $m) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai26" value="100" <?= $dis ?> <?php in_array('100', $m) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi lanjut kemoterapi dari Kolegium atau STR KT dari KKI </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $n = explode(',', $data->n); ?>
                                            <input type="checkbox" id="nilai27" value="0" <?= $dis ?> <?php in_array('0', $n) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai28" value="100" <?= $dis ?> <?php in_array('100', $n) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SK Kewenangan Klinis dari Direktur RS </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $o = explode(',', $data->o); ?>
                                            <input type="checkbox" id="nilai29" value="0" <?= $dis ?> <?php in_array('0', $o) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai30" value="100" <?= $dis ?> <?php in_array('100', $o) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $p = explode(',', $data->p); ?>
                                            <input type="checkbox" id="nilai31" value="0" <?= $dis ?> <?php in_array('0', $p) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai32" value="100" <?= $dis ?> <?php in_array('100', $p) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Perawat (minimal 3) : </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $q = explode(',', $data->q); ?>
                                            <input type="checkbox" id="nilai33" value="0" <?= $dis ?> <?php in_array('0', $q) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai34" value="100" <?= $dis ?> <?php in_array('100', $q) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SIK/SIPP </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $r = explode(',', $data->r); ?>
                                            <input type="checkbox" id="nilai35" value="0" <?= $dis ?> <?php in_array('0', $r) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai36" value="100" <?= $dis ?> <?php in_array('100', $r) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi keperawatan pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $s = explode(',', $data->s); ?>
                                            <input type="checkbox" id="nilai37" value="0" <?= $dis ?> <?php in_array('0', $s) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai38" value="100" <?= $dis ?> <?php in_array('100', $s) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $t = explode(',', $data->t); ?>
                                            <input type="checkbox" id="nilai39" value="0" <?= $dis ?> <?php in_array('0', $t) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai40" value="100" <?= $dis ?> <?php in_array('100', $t) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Apoteker yang memiliki sertifikat pelayanan kemoterapi (minimal 1) : </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $u = explode(',', $data->u); ?>
                                            <input type="checkbox" id="nilai41" value="0" <?= $dis ?> <?php in_array('0', $u) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai42" value="100" <?= $dis ?> <?php in_array('100', $u) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SIPA </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $v = explode(',', $data->v); ?>
                                            <input type="checkbox" id="nilai43" value="0" <?= $dis ?> <?php in_array('0', $v) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai44" value="100" <?= $dis ?> <?php in_array('100', $v) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $w = explode(',', $data->w); ?>
                                            <input type="checkbox" id="nilai45" value="0" <?= $dis ?> <?php in_array('0', $w) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai46" value="100" <?= $dis ?> <?php in_array('100', $w) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $x = explode(',', $data->x); ?>
                                            <input type="checkbox" id="nilai47" value="0" <?= $dis ?> <?php in_array('0', $x) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai48" value="100" <?= $dis ?> <?php in_array('100', $x) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>

                                    <!--  <tr>
                                        <td colspan="4" align="center">
                                            <h4><b>
                                                <font size="5">Upload Dokumen Pendukung Sumber Daya Manusia</font>
                                            </b></h4>
                                        </td>
                                        <td colspan="5">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn" align="center">File</button>
                                                <input type="file" name="dokumenpendukungsdm" />
                                            </div>
                                            <?= form_error('dokumenpendukungsdm', '<small class="text-danger">', '</small>'); ?>
                                        </td>
                                    </tr> -->
                                </table>
                            </div>
                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>C. Bangunan Ruang Kemoterapi satu atap terintegrasi </b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> Ruang Persiapan (penyiapan alkes, bahan obat, dll) : </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $y = explode(',', $data->y); ?>
                                            <input type="checkbox" id="nilai49" value="0" <?= $dis ?> <?php in_array('0', $y) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai50" value="100" <?= $dis ?> <?php in_array('100', $y) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Ruang Cuci Tangan dan ganti pakaian </td>
                                        <td width="1%">:
                                        </td>
                                        <td width="20%">
                                            <?php $z = explode(',', $data->z); ?>
                                            <input type="checkbox" id="nilai51" value="0" <?= $dis ?> <?php in_array('0', $z) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai52" value="100" <?= $dis ?> <?php in_array('100', $z) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Ruang antara (ante room), ruang antara yang menghubungkan ruang pesiapan ke ruang steril </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a1 = explode(',', $data->a1); ?>
                                            <input type="checkbox" id="nilai53" value="0" <?= $dis ?> <?php in_array('0', $a1) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai54" value="100" <?= $dis ?> <?php in_array('100', $a1) ? print "checked" : ""; ?>> ada
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">4)</td>
                                        <td> Ruang Steril (clean room) untuk Peracikan Obat kemoterapi dengan ketentuan : </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $a2 = explode(',', $data->a2); ?>
                                            <input type="checkbox" id="nilai55" value="0" <?= $dis ?> <?php in_array('0', $a2) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai56" value="100" <?= $dis ?> <?php in_array('100', $a2) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> a. </td>
                                        <td> suhu ruangan 18-22 derajat C </td>
                                        <td>:</td>
                                        <!-- <td>ada <input type="checkbox" name="" value="100"> tidak ada <input type="checkbox" name="" value="0"></td> -->
                                    </tr>
                                    <tr>
                                        <td align="right"> b. </td>
                                        <td> dilengkapi minimal High Efficiency Particulate Air (HEPA) </td>
                                        <td>:</td>
                                        <!-- <td>ada <input type="checkbox" name="" value="100"> tidak ada <input type="checkbox" name="" value="0"></td> -->
                                    </tr>
                                    <tr>
                                        <td align="right"> c. </td>
                                        <td> tekanan udara di dalam ruang lebih positif daripada di luar </td>
                                        <td>:</td>
                                        <!-- <td>ada <input type="checkbox" name="" value="100"> tidak ada <input type="checkbox" name="" value="0"></td> -->
                                    </tr>
                                    <tr>
                                        <td align="right"> d. </td>
                                        <td> memiliki pass box terletak antara ruang persiapan dan steril </td>
                                        <td>:</td>
                                        <!-- <td>ada <input type="checkbox" name="" value="100"> tidak ada <input type="checkbox" name="" value="0"></td> -->
                                    </tr>
                                    <tr>
                                        <td align="right">5)</td>
                                        <td> Sistem pengelolaan limbah medis B3 kemoterapi </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a3 = explode(',', $data->a3); ?>
                                            <input type="checkbox" id="nilai57" value="0" <?= $dis ?> <?php in_array('0', $a3) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai58" value="100" <?= $dis ?> <?php in_array('100', $a3) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">6)</td>
                                        <td> Kondisi ruangan pelayanan kemoterapi (kebersihan, kelembapan, kerapihan, terintegrasi rajal-ranap) </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a4 = explode(',', $data->a4); ?>
                                            <input type="checkbox" id="nilai59" value="0" <?= $dis ?> <?php in_array('0', $a4) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai60" value="100" <?= $dis ?> <?php in_array('100', $a4) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                                        <td colspan="4" align="center">
                                            <h4><b>
                                                <font size="5">Upload Dokumen Pendukung Bangunan Ruang Kemoterapi</font>
                                            </b></h4>
                                        </td>
                                        <td colspan="5">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn" align="center">File</button>
                                                <input type="file" name="dokumenpendukungruang" />
                                            </div>
                                            <?= form_error('dokumenpendukungruang', '<small class="text-danger">', '</small>'); ?>
                                        </td>
                                    </tr> -->
                                </table>
                            </div>
                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>D. Peralatan </b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> Alat Pelindung Diri </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a7 = explode(',', $data->a7); ?>
                                            <input type="checkbox" id="nilai61" value="0" <?= $dis ?> <?php in_array('0', $a7) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai62" value="100" <?= $dis ?> <?php in_array('100', $a7) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> a. </td>
                                        <td> Baju Pelindung terbuat dari bahan tidak tembus cairan, tidak melepaskan serat kain, lengan panjang, bermanset dan tertutup di bagian depan </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $a8 = explode(',', $data->a8); ?>
                                            <input type="checkbox" id="nilai63" value="0" <?= $dis ?> <?php in_array('0', $a8) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai64" value="100" <?= $dis ?> <?php in_array('100', $a8) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> b. </td>
                                        <td> sarung tangan terbuat dari latex dan tidak berbedak. Penggunaan harus dua lapis </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $a9 = explode(',', $data->a9); ?>
                                            <input type="checkbox" id="nilai65" value="0" <?= $dis ?> <?php in_array('0', $a9) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai66" value="100" <?= $dis ?> <?php in_array('100', $a9) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> c. </td>
                                        <td> kacamata pelindung </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $a10 = explode(',', $data->a10); ?>
                                            <input type="checkbox" id="nilai67" value="0" <?= $dis ?> <?php in_array('0', $a10) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai68" value="100" <?= $dis ?> <?php in_array('100', $a10) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> d. </td>
                                        <td> masker disposible </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <?php $a11 = explode(',', $data->a11); ?>
                                            <input type="checkbox" id="nilai69" value="0" <?= $dis ?> <?php in_array('0', $a11) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai70" value="100" <?= $dis ?> <?php in_array('100', $a11) ? print "checked" : ""; ?>> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Laminari Air Flow </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a12 = explode(',', $data->a12); ?>
                                            <input type="checkbox" id="nilai71" value="0" <?= $dis ?> <?php in_array('0', $a12) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai72" value="100" <?= $dis ?> <?php in_array('100', $a12) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    <tr>
                                        <td align="right"> - </td>
                                        <td> berfungsi dengan baik </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> - </td>
                                        <td> tekanan di dalam BSC lebih negatif dari tekanan udara di ruangan </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> - </td>
                                        <td> alat terkaliberasi secara rutin </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> - </td>
                                        <td> High Efficiency Particulate Air (HEPA) </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Pass Box </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a13 = explode(',', $data->a13); ?>
                                            <input type="checkbox" id="nilai73" value="0" <?= $dis ?> <?php in_array('0', $a13) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai74" value="100" <?= $dis ?> <?php in_array('100', $a13) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>

                                    <!--  <tr>
                                            <td colspan="4" align="center">
                                                <h4><b>
                                                    <font size="5">Upload Dokumen Pendukung Peralatan</font>
                                                </b></h4>
                                            </td>
                                            <td colspan="5">
                                                <div class="upload-btn-wrapper">
                                                    <button class="btn" align="center">File</button>
                                                    <input type="file" name="dokumenpendukungperalatan" />
                                                </div>
                                                <?= form_error('dokumenpendukungperalatan', '<small class="text-danger">', '</small>'); ?>
                                            </td>
                                        </tr> -->
                                </table>
                            </div>

                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>E. Perlengkapan Penunjang </b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> Ruang tunggu pelayanan kemoterapi </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a14 = explode(',', $data->a14); ?>
                                            <input type="checkbox" id="nilai75" value="0" <?= $dis ?> <?php in_array('0', $a14) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai76" value="100" <?= $dis ?> <?php in_array('100', $a14) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Ruang administrasi </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a15 = explode(',', $data->a15); ?>
                                            <input type="checkbox" id="nilai77" value="0" <?= $dis ?> <?php in_array('0', $a15) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai78" value="100" <?= $dis ?> <?php in_array('100', $a15) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    <tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Komputer </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a16 = explode(',', $data->a16); ?>
                                            <input type="checkbox" id="nilai79" value="0" <?= $dis ?> <?php in_array('0', $a16) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai80" value="100" <?= $dis ?> <?php in_array('100', $a16) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">4)</td>
                                        <td> Jaringan Internet </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a17 = explode(',', $data->a17); ?>
                                            <input type="checkbox" id="nilai81" value="0" <?= $dis ?> <?php in_array('0', $a17) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai82" value="100" <?= $dis ?> <?php in_array('100', $a17) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">5)</td>
                                        <td> Alat komunikasi (fixed telepon) </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a18 = explode(',', $data->a18); ?>
                                            <input type="checkbox" id="nilai83" value="0" <?= $dis ?> <?php in_array('0', $a18) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai84" value="100" <?= $dis ?> <?php in_array('100', $a18) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">6)</td>
                                        <td> Sistem administrasi Pelaporan </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <?php $a19 = explode(',', $data->a19); ?>
                                            <input type="checkbox" id="nilai85" value="0" <?= $dis ?> <?php in_array('0', $a19) ? print "checked" : ""; ?>> tidak ada
                                            <input type="checkbox" id="nilai86" value="100" <?= $dis ?> <?php in_array('100', $a19) ? print "checked" : ""; ?>> ada
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>

                                    <!-- <tr>
                                                    <td colspan="4" align="center">
                                                        <h4><b>
                                                            <font size="5">Upload Dokumen Perlengkapan Penunjang</font>
                                                        </b></h4>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="upload-btn-wrapper">
                                                            <button class="btn" align="center">File</button>
                                                            <input type="file" name="dokumenperlengkapanpenunjang" />
                                                        </div>
                                                        <?= form_error('dokumenperlengkapanpenunjang', '<small class="text-danger">', '</small>'); ?>
                                                    </td>
                                                </tr> -->

                                    <script>
                                        function hitung() {
                                            var hasil = 0;
                                            var hit1 = 0.15;
                                            var hit2 = 0.4;
                                            var hit3 = 0.10;
                                            var hit4 = 0.20;
                                            var hit5 = 0.25;
                                            var hit6 = 0.05;

                                            // JENIS PELAYANAN DAN SUMBER DAYA MANUSIA //
                                            // perhitungan satu
                                            if (document.getElementById('nilai1').checked) {
                                                skor = document.getElementById("nilai1").value;
                                            }
                                            var hasil = hit1 * parseInt(skor) * hit2;

                                            if (document.getElementById('nilai2').checked) {
                                                skor = document.getElementById("nilai2").value;
                                            }
                                            var hasil = hit1 * parseInt(skor) * hit2;
                                            // tampil satu
                                            document.getElementById("hasil").value = hasil;
                                            document.getElementById("skor").value = skor;


                                            // perhitungan dua
                                            if (document.getElementById('nilai3').checked) {
                                                skor2 = document.getElementById("nilai3").value;
                                            }
                                            var hasil2 = hit1 * parseInt(skor2) * hit2;

                                            if (document.getElementById('nilai4').checked) {
                                                skor2 = document.getElementById("nilai4").value;
                                            }
                                            var hasil2 = hit1 * parseInt(skor2) * hit2;
                                            // tampil dua
                                            document.getElementById("hasil2").value = hasil2;
                                            document.getElementById("skor2").value = skor2;

                                            // perhitungan tiga
                                            if (document.getElementById('nilai5').checked) {
                                                skor3 = document.getElementById("nilai5").value;
                                            }
                                            var hasil3 = hit1 * parseInt(skor3) * hit2;

                                            if (document.getElementById('nilai6').checked) {
                                                skor3 = document.getElementById("nilai6").value;
                                            }
                                            var hasil3 = hit1 * parseInt(skor3) * hit2;
                                            // tampil tiga
                                            document.getElementById("hasil3").value = hasil3;
                                            document.getElementById("skor3").value = skor3;

                                            // perhitungan empat (d)
                                            if (document.getElementById('nilai7').checked) {
                                                skor4 = document.getElementById("nilai7").value;
                                            }
                                            var hasil4 = hit1 * parseInt(skor4) * hit2;

                                            if (document.getElementById('nilai8').checked) {
                                                skor4 = document.getElementById("nilai8").value;
                                            }
                                            var hasil4 = hit1 * parseInt(skor4) * hit2;

                                            if (document.getElementById('nilai9').checked) {
                                                skor4 = document.getElementById("nilai9").value;
                                            }
                                            var hasil4 = hit1 * parseInt(skor4) * hit2;
                                            // tampil empat
                                            document.getElementById("hasil4").value = hasil4;
                                            document.getElementById("skor4").value = skor4;

                                            // perhitungan lima (e)
                                            if (document.getElementById('nilai10').checked) {
                                                skor5 = document.getElementById("nilai10").value;
                                            }
                                            var hasil5 = hit3 * parseInt(skor5) * hit2;

                                            if (document.getElementById('nilai11').checked) {
                                                skor5 = document.getElementById("nilai11").value;
                                            }
                                            var hasil5 = hit3 * parseInt(skor5) * hit2;

                                            if (document.getElementById('nilai12').checked) {
                                                skor5 = document.getElementById("nilai12").value;
                                            }
                                            var hasil5 = hit3 * parseInt(skor5) * hit2;
                                            // tampil lima
                                            document.getElementById("hasil5").value = hasil5;
                                            document.getElementById("skor5").value = skor5;

                                            // perhitungan enam (f)
                                            if (document.getElementById('nilai13').checked) {
                                                skor6 = document.getElementById("nilai13").value;
                                            }
                                            var hasil6 = hit3 * parseInt(skor6) * hit2;

                                            if (document.getElementById('nilai14').checked) {
                                                skor6 = document.getElementById("nilai14").value;
                                            }
                                            var hasil6 = hit3 * parseInt(skor6) * hit2;

                                            if (document.getElementById('nilai15').checked) {
                                                skor6 = document.getElementById("nilai15").value;
                                            }
                                            var hasil6 = hit3 * parseInt(skor6) * hit2;
                                            // tampil enam
                                            document.getElementById("hasil6").value = hasil6;
                                            document.getElementById("skor6").value = skor6;

                                            // perhitungan tujuh
                                            if (document.getElementById('nilai16').checked) {
                                                skor7 = document.getElementById("nilai16").value;
                                            }
                                            var hasil7 = hit3 * parseInt(skor7) * hit2;

                                            if (document.getElementById('nilai17').checked) {
                                                skor7 = document.getElementById("nilai17").value;
                                            }
                                            var hasil7 = hit3 * parseInt(skor7) * hit2;
                                            // tampil tujuh
                                            document.getElementById("hasil7").value = hasil7;
                                            document.getElementById("skor7").value = skor7;

                                            // perhitungan delapan
                                            if (document.getElementById('nilai18').checked) {
                                                skor8 = document.getElementById("nilai18").value;
                                            }
                                            var hasil8 = hit3 * parseInt(skor8) * hit2;

                                            if (document.getElementById('nilai19').checked) {
                                                skor8 = document.getElementById("nilai19").value;
                                            }
                                            var hasil8 = hit3 * parseInt(skor8) * hit2;

                                            if (document.getElementById('nilai20').checked) {
                                                skor8 = document.getElementById("nilai20").value;
                                            }
                                            var hasil8 = hit3 * parseInt(skor8) * hit2;

                                            // tampil delapan
                                            document.getElementById("hasil8").value = hasil8;
                                            document.getElementById("skor8").value = skor8;

                                            //SUB TOTAL SUMBER DAYA MANUSIA //
                                            var total = hasil + hasil2 + hasil3 + hasil4 + hasil5 + hasil6 + hasil7 + hasil8;
                                            document.getElementById("total").value = total;

                                            // KELENGKAPAN SARANA DAN PRASARANA (PERALATAN DAN BANGUNAN) //
                                            // perhitungan Sarana dan Prasarana 1A (Kepemilikan)
                                            if (document.getElementById('nilai21').checked) {
                                                skor9 = document.getElementById("nilai21").value;
                                            }
                                            var hasil9 = hit3 * parseInt(skor9) * hit2 * hit1;

                                            if (document.getElementById('nilai22').checked) {
                                                skor9 = document.getElementById("nilai22").value;
                                            }
                                            var hasil9 = hit3 * parseInt(skor9) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil9").value = hasil9;
                                            document.getElementById("skor9").value = skor9;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Peralatan Mesin HD untuk kapasitas 4 mesin HD)
                                            if (document.getElementById('nilai23').checked) {
                                                skor10 = document.getElementById("nilai23").value;
                                            }
                                            var hasil10 = hit4 * parseInt(skor10) * hit2 * hit1;

                                            if (document.getElementById('nilai24').checked) {
                                                skor10 = document.getElementById("nilai24").value;
                                            }
                                            var hasil10 = hit4 * parseInt(skor10) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil10").value = hasil10;
                                            document.getElementById("skor10").value = skor10;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Pemeriksaan Dokter/Konsultasi)
                                            if (document.getElementById('nilai25').checked) {
                                                skor11 = document.getElementById("nilai25").value;
                                            }
                                            var hasil11 = hit3 * parseInt(skor11) * hit2 * hit1;

                                            if (document.getElementById('nilai26').checked) {
                                                skor11 = document.getElementById("nilai26").value;
                                            }
                                            var hasil11 = hit3 * parseInt(skor11) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil11").value = hasil11;
                                            document.getElementById("skor11").value = skor11;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Tindakan)
                                            if (document.getElementById('nilai27').checked) {
                                                skor12 = document.getElementById("nilai27").value;
                                            }
                                            var hasil12 = hit3 * parseInt(skor12) * hit2 * hit1;

                                            if (document.getElementById('nilai28').checked) {
                                                skor12 = document.getElementById("nilai28").value;
                                            }
                                            var hasil12 = hit3 * parseInt(skor12) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil12").value = hasil12;
                                            document.getElementById("skor12").value = skor12;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Perawatan)
                                            if (document.getElementById('nilai29').checked) {
                                                skor13 = document.getElementById("nilai29").value;
                                            }
                                            var hasil13 = hit3 * parseInt(skor13) * hit2 * hit1;

                                            if (document.getElementById('nilai30').checked) {
                                                skor13 = document.getElementById("nilai30").value;
                                            }
                                            var hasil13 = hit3 * parseInt(skor13) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil13").value = hasil13;
                                            document.getElementById("skor13").value = skor13;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Sterilisasi)
                                            if (document.getElementById('nilai31').checked) {
                                                skor14 = document.getElementById("nilai31").value;
                                            }
                                            var hasil14 = hit3 * parseInt(skor14) * hit2 * hit1;

                                            if (document.getElementById('nilai32').checked) {
                                                skor14 = document.getElementById("nilai32").value;
                                            }
                                            var hasil14 = hit3 * parseInt(skor14) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil14").value = hasil14;
                                            document.getElementById("skor14").value = skor14;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Penyimpanan Obat)
                                            if (document.getElementById('nilai33').checked) {
                                                skor15 = document.getElementById("nilai33").value;
                                            }
                                            var hasil15 = hit3 * parseInt(skor15) * hit2 * hit1;

                                            if (document.getElementById('nilai34').checked) {
                                                skor15 = document.getElementById("nilai34").value;
                                            }
                                            var hasil15 = hit3 * parseInt(skor15) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil15").value = hasil15;
                                            document.getElementById("skor15").value = skor15;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Penunjang Medik)
                                            if (document.getElementById('nilai35').checked) {
                                                skor16 = document.getElementById("nilai35").value;
                                            }
                                            var hasil16 = hit3 * parseInt(skor16) * hit2 * hit1;

                                            if (document.getElementById('nilai36').checked) {
                                                skor16 = document.getElementById("nilai36").value;
                                            }
                                            var hasil16 = hit3 * parseInt(skor16) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil16").value = hasil16;
                                            document.getElementById("skor16").value = skor16;

                                            // perhitungan Sarana dan Prasarana 1A (Ruang Penunjang Medik)
                                            if (document.getElementById('nilai37').checked) {
                                                skor17 = document.getElementById("nilai37").value;
                                            }
                                            var hasil17 = hit3 * parseInt(skor17) * hit2 * hit1;

                                            if (document.getElementById('nilai38').checked) {
                                                skor17 = document.getElementById("nilai38").value;
                                            }
                                            var hasil17 = hit3 * parseInt(skor17) * hit2 * hit1;

                                            // tampil perhitungan Sarana dan Prasarana 1A
                                            document.getElementById("hasil17").value = hasil17;
                                            document.getElementById("skor17").value = skor17;

                                            // KELENGKAPAN SARANA DAN PRASARANA (PERALATAN) //
                                            // perhitungan Sarana dan Prasarana 2A (4 (empat) mesin hemodialisis siap pakai)
                                            if (document.getElementById('nilai39').checked) {
                                                skor18 = document.getElementById("nilai39").value;
                                            }
                                            var hasil18 = hit4 * parseInt(skor18) * hit2 * hit4;

                                            if (document.getElementById('nilai40').checked) {
                                                skor18 = document.getElementById("nilai40").value;
                                            }
                                            var hasil18 = hit4 * parseInt(skor18) * hit2 * hit4;

                                            if (document.getElementById('nilai41').checked) {
                                                skor18 = document.getElementById("nilai41").value;
                                            }
                                            var hasil18 = hit4 * parseInt(skor18) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil18").value = hasil18;
                                            document.getElementById("skor18").value = skor18;

                                            // perhitungan Sarana dan Prasarana 2A (Mesin hemodialisis cadangan)
                                            if (document.getElementById('nilai42').checked) {
                                                skor19 = document.getElementById("nilai42").value;
                                            }
                                            var hasil19 = hit1 * parseInt(skor19) * hit2 * hit4;

                                            if (document.getElementById('nilai43').checked) {
                                                skor19 = document.getElementById("nilai43").value;
                                            }
                                            var hasil19 = hit1 * parseInt(skor19) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil19").value = hasil19;
                                            document.getElementById("skor19").value = skor19;

                                            // perhitungan Sarana dan Prasarana 2A (Peralatan reuse dialiser manual atau otomatik)
                                            if (document.getElementById('nilai44').checked) {
                                                skor20 = document.getElementById("nilai44").value;
                                            }
                                            var hasil20 = hit1 * parseInt(skor20) * hit2 * hit4;

                                            if (document.getElementById('nilai45').checked) {
                                                skor20 = document.getElementById("nilai45").value;
                                            }
                                            var hasil20 = hit1 * parseInt(skor20) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil20").value = hasil20;
                                            document.getElementById("skor20").value = skor20;

                                            // perhitungan Sarana dan Prasarana 2A (Peralatan sterilisasi alat medis)
                                            if (document.getElementById('nilai46').checked) {
                                                skor21 = document.getElementById("nilai46").value;
                                            }
                                            var hasil21 = hit1 * parseInt(skor21) * hit2 * hit4;

                                            if (document.getElementById('nilai47').checked) {
                                                skor21 = document.getElementById("nilai47").value;
                                            }
                                            var hasil21 = hit1 * parseInt(skor21) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil21").value = hasil21;
                                            document.getElementById("skor21").value = skor21;

                                            // perhitungan Sarana dan Prasarana 2A (Peralatan pengolahan air untuk dialisis yang memenuhi standar)
                                            if (document.getElementById('nilai48').checked) {
                                                skor22 = document.getElementById("nilai48").value;
                                            }
                                            var hasil22 = hit4 * parseInt(skor22) * hit2 * hit4;

                                            if (document.getElementById('nilai49').checked) {
                                                skor22 = document.getElementById("nilai49").value;
                                            }
                                            var hasil22 = hit4 * parseInt(skor22) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil22").value = hasil22;
                                            document.getElementById("skor22").value = skor22;

                                            // perhitungan Sarana dan Prasarana 2A (Peralatan pengolahan air untuk dialisis yang memenuhi standar)
                                            if (document.getElementById('nilai50').checked) {
                                                skor23 = document.getElementById("nilai50").value;
                                            }
                                            var hasil23 = hit1 * parseInt(skor23) * hit2 * hit4;

                                            if (document.getElementById('nilai51').checked) {
                                                skor23 = document.getElementById("nilai51").value;
                                            }
                                            var hasil23 = hit1 * parseInt(skor23) * hit2 * hit4;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil23").value = hasil23;
                                            document.getElementById("skor23").value = skor23;

                                            // KELENGKAPAN SARANA DAN PRASARANA (PERALATAN Penunjang) //
                                            // perhitungan Sarana dan Prasarana 2A (Kapasitas Ruang pendaftaran)
                                            if (document.getElementById('nilai52').checked) {
                                                skor24 = document.getElementById("nilai52").value;
                                            }
                                            var hasil24 = hit5 * parseInt(skor24) * hit2 * hit3;

                                            if (document.getElementById('nilai53').checked) {
                                                skor24 = document.getElementById("nilai53").value;
                                            }
                                            var hasil24 = hit5 * parseInt(skor24) * hit2 * hit3;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil24").value = hasil24;
                                            document.getElementById("skor24").value = skor24;

                                            // perhitungan Sarana dan Prasarana 2A ( Petugas Pengentry tagihan klaim)
                                            if (document.getElementById('nilai54').checked) {
                                                skor25 = document.getElementById("nilai54").value;
                                            }
                                            var hasil25 = hit5 * parseInt(skor25) * hit2 * hit3;

                                            if (document.getElementById('nilai55').checked) {
                                                skor25 = document.getElementById("nilai55").value;
                                            }
                                            var hasil25 = hit5 * parseInt(skor25) * hit2 * hit3;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil25").value = hasil25;
                                            document.getElementById("skor25").value = skor25;

                                            // perhitungan Sarana dan Prasarana 2A (Komputer khusus untuk penagihan klaim)
                                            if (document.getElementById('nilai56').checked) {
                                                skor26 = document.getElementById("nilai56").value;
                                            }
                                            var hasil26 = hit5 * parseInt(skor26) * hit2 * hit3;

                                            if (document.getElementById('nilai57').checked) {
                                                skor26 = document.getElementById("nilai57").value;
                                            }
                                            var hasil26 = hit5 * parseInt(skor26) * hit2 * hit3;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil26").value = hasil26;
                                            document.getElementById("skor26").value = skor26;

                                            // perhitungan Sarana dan Prasarana 2A (Jaringan Internet)
                                            if (document.getElementById('nilai58').checked) {
                                                skor27 = document.getElementById("nilai58").value;
                                            }
                                            var hasil27 = hit5 * parseInt(skor27) * hit2 * hit3;

                                            if (document.getElementById('nilai59').checked) {
                                                skor27 = document.getElementById("nilai59").value;
                                            }
                                            var hasil27 = hit5 * parseInt(skor27) * hit2 * hit3;

                                            // tampil perhitungan Sarana dan Prasarana 2A
                                            document.getElementById("hasil27").value = hasil27;
                                            document.getElementById("skor27").value = skor27;

                                            // Perhitungan Pelayanan Kefarmasian//
                                            if (document.getElementById('nilai60').checked) {
                                                skor28 = document.getElementById("nilai60").value;
                                            }
                                            var hasil28 = hit6 * parseInt(skor28) * hit2;

                                            if (document.getElementById('nilai61').checked) {
                                                skor28 = document.getElementById("nilai61").value;
                                            }
                                            var hasil28 = hit6 * parseInt(skor28) * hit2;

                                            if (document.getElementById('nilai62').checked) {
                                                skor28 = document.getElementById("nilai62").value;
                                            }
                                            var hasil28 = hit6 * parseInt(skor28) * hit2;

                                            // tampil perhitungan Pelayanan Kefarmasian
                                            document.getElementById("hasil28").value = hasil28;
                                            document.getElementById("skor28").value = skor28;

                                            // Perhitungan Apoteker Penanggung Jawab//
                                            if (document.getElementById('nilai63').checked) {
                                                skor29 = document.getElementById("nilai63").value;
                                            }
                                            var hasil29 = hit6 * parseInt(skor29) * hit2;

                                            if (document.getElementById('nilai64').checked) {
                                                skor29 = document.getElementById("nilai64").value;
                                            }
                                            var hasil29 = hit6 * parseInt(skor29) * hit2;

                                            // tampil perhitungan Apoteker Penanggung Jawab
                                            document.getElementById("hasil29").value = hasil29;
                                            document.getElementById("skor29").value = skor29;

                                            // Perhitungan Asisten Apoteker//
                                            if (document.getElementById('nilai65').checked) {
                                                skor30 = document.getElementById("nilai65").value;
                                            }
                                            var hasil30 = hit6 * parseInt(skor30) * hit2;

                                            if (document.getElementById('nilai66').checked) {
                                                skor30 = document.getElementById("nilai66").value;
                                            }
                                            var hasil30 = hit6 * parseInt(skor30) * hit2;

                                            // tampil perhitungan Asisten Apoteker
                                            document.getElementById("hasil30").value = hasil30;
                                            document.getElementById("skor30").value = skor30;

                                            // Perhitungan Obat Hemapo//
                                            if (document.getElementById('nilai67').checked) {
                                                skor31 = document.getElementById("nilai67").value;
                                            }
                                            var hasil31 = hit1 * parseInt(skor31) * hit2;

                                            if (document.getElementById('nilai68').checked) {
                                                skor31 = document.getElementById("nilai68").value;
                                            }
                                            var hasil31 = hit1 * parseInt(skor31) * hit2;

                                            // tampil perhitungan Obat Hemapo
                                            document.getElementById("hasil31").value = hasil31;
                                            document.getElementById("skor31").value = skor31;

                                            // Perhitungan Pelayanan Darah//
                                            if (document.getElementById('nilai69').checked) {
                                                skor32 = document.getElementById("nilai69").value;
                                            }
                                            var hasil32 = hit6 * parseInt(skor32) * hit2;

                                            if (document.getElementById('nilai70').checked) {
                                                skor32 = document.getElementById("nilai70").value;
                                            }
                                            var hasil32 = hit6 * parseInt(skor32) * hit2;

                                            // tampil perhitungan Pelayanan Darah
                                            document.getElementById("hasil32").value = hasil32;
                                            document.getElementById("skor32").value = skor32;

                                            // Perhitungan Mempunyai mesin Hemodialisa infeksius (untuk hepatitis B dan atau HIV)//
                                            if (document.getElementById('nilai71').checked) {
                                                skor33 = document.getElementById("nilai71").value;
                                            }
                                            var hasil33 = hit1 * parseInt(skor33) * hit2;

                                            if (document.getElementById('nilai72').checked) {
                                                skor33 = document.getElementById("nilai72").value;
                                            }
                                            var hasil33 = hit1 * parseInt(skor33) * hit2;

                                            // tampil perhitungan Mempunyai mesin Hemodialisa infeksius (untuk hepatitis B dan atau HIV)
                                            document.getElementById("hasil33").value = hasil33;
                                            document.getElementById("skor33").value = skor33;

                                            // Perhitungan Ambulance//
                                            if (document.getElementById('nilai73').checked) {
                                                skor34 = document.getElementById("nilai73").value;
                                            }
                                            var hasil34 = hit6 * parseInt(skor34) * hit2;

                                            if (document.getElementById('nilai74').checked) {
                                                skor34 = document.getElementById("nilai74").value;
                                            }
                                            var hasil34 = hit6 * parseInt(skor34) * hit2;

                                            // tampil perhitungan Ambulance
                                            document.getElementById("hasil34").value = hasil34;
                                            document.getElementById("skor34").value = skor34;

                                            //SUB TOTAL SUMBER DAYA MANUSIA //
                                            var totalsarana = hasil9 + hasil10 + hasil11 + hasil12 + hasil13 + hasil14 + hasil15 + hasil16 + hasil17 + hasil18 + hasil19 + hasil20 + hasil21 + hasil22 + hasil23 + hasil24 + hasil25 + hasil26 + hasil27 + hasil28 + hasil29 + hasil30 + hasil31 + hasil32 + hasil33 + hasil34;
                                            document.getElementById("totalsarana").value = totalsarana;

                                            // Sistem Hemodialisa //
                                            // Perhitungan Sistem pemberian informasi pelayanan kepada peserta//
                                            if (document.getElementById('nilai75').checked) {
                                                skor35 = document.getElementById("nilai75").value;
                                            }
                                            var hasil35 = hit3 * parseInt(skor35) * hit3;

                                            if (document.getElementById('nilai76').checked) {
                                                skor35 = document.getElementById("nilai76").value;
                                            }
                                            var hasil35 = hit3 * parseInt(skor35) * hit3;

                                            // tampil perhitungan Sistem pemberian informasi pelayanan kepada peserta
                                            document.getElementById("hasil35").value = hasil35;
                                            document.getElementById("skor35").value = skor35;

                                            // Perhitungan Pelaksanaan permintaan persetujuan atas tindakan yang akan dilakukan (inform consent) kepada peserta atau keluarga//
                                            if (document.getElementById('nilai77').checked) {
                                                skor36 = document.getElementById("nilai77").value;
                                            }
                                            var hasil36 = hit3 * parseInt(skor36) * hit3;

                                            if (document.getElementById('nilai78').checked) {
                                                skor36 = document.getElementById("nilai78").value;
                                            }
                                            var hasil36 = hit3 * parseInt(skor36) * hit3;

                                            // tampil perhitungan Pelaksanaan permintaan persetujuan atas tindakan yang akan dilakukan (inform consent) kepada peserta atau keluarga
                                            document.getElementById("hasil36").value = hasil36;
                                            document.getElementById("skor36").value = skor36;

                                            // Perhitungan Melaksanakan pencatatan untuk penyakit-penyakit tertentu dan melaporkan kepada Dinas Kesehatan//
                                            if (document.getElementById('nilai79').checked) {
                                                skor37 = document.getElementById("nilai79").value;
                                            }
                                            var hasil37 = hit3 * parseInt(skor37) * hit3;

                                            if (document.getElementById('nilai80').checked) {
                                                skor37 = document.getElementById("nilai80").value;
                                            }
                                            var hasil37 = hit3 * parseInt(skor37) * hit3;

                                            // tampil perhitungan Melaksanakan pencatatan untuk penyakit-penyakit tertentu dan melaporkan kepada Dinas Kesehatan
                                            document.getElementById("hasil37").value = hasil37;
                                            document.getElementById("skor37").value = skor37;

                                            // Perhitungan Memiliki peraturan internal Klinik//
                                            if (document.getElementById('nilai81').checked) {
                                                skor38 = document.getElementById("nilai81").value;
                                            }
                                            var hasil38 = hit5 * parseInt(skor38) * hit3;

                                            if (document.getElementById('nilai82').checked) {
                                                skor38 = document.getElementById("nilai82").value;
                                            }
                                            var hasil38 = hit5 * parseInt(skor38) * hit3;

                                            // tampil perhitungan (dipastikan apakah ada mengatur terkait ketentuan penggantian dokter maupun kekosongan pimpinan, pengaturan kerja sama dengan pihak eksternal)
                                            document.getElementById("hasil38").value = hasil38;
                                            document.getElementById("skor38").value = skor38;

                                            // Perhitungan Memiliki Standar Prosedur Operasional//
                                            if (document.getElementById('nilai83').checked) {
                                                skor39 = document.getElementById("nilai83").value;
                                            }
                                            var hasil39 = hit5 * parseInt(skor39) * hit3;

                                            if (document.getElementById('nilai84').checked) {
                                                skor39 = document.getElementById("nilai84").value;
                                            }
                                            var hasil39 = hit5 * parseInt(skor39) * hit3;

                                            // tampil perhitungan (dipastikan apakah ada mengatur terkait SLA pelayanan medik maupun administrasi)
                                            document.getElementById("hasil39").value = hasil39;
                                            document.getElementById("skor39").value = skor39;

                                            // Perhitungan 	Melakukan audit medis internal dilakukan oleh Klinik paling sedikit satu kali dalam setahun//
                                            if (document.getElementById('nilai85').checked) {
                                                skor40 = document.getElementById("nilai85").value;
                                            }
                                            var hasil40 = hit4 * parseInt(skor40) * hit3;

                                            if (document.getElementById('nilai86').checked) {
                                                skor40 = document.getElementById("nilai86").value;
                                            }
                                            var hasil40 = hit4 * parseInt(skor40) * hit3;

                                            // tampil perhitungan 	Melakukan audit medis internal dilakukan oleh Klinik paling sedikit satu kali dalam setahun
                                            document.getElementById("hasil40").value = hasil40;
                                            document.getElementById("skor40").value = skor40;

                                            var totalsistem = hasil35 + hasil36 + hasil37 + hasil38 + hasil39 + hasil40
                                            document.getElementById("totalsistem").value = totalsistem;

                                            // KELENGKAPAN DAN ADMINISTRASI //
                                            // Perlengkapan Administrasi (Ruang Tunggu) //
                                            if (document.getElementById('nilai87').checked) {
                                                skor41 = document.getElementById("nilai87").value;
                                            }
                                            var hasil41 = hit6 * parseInt(skor41) * hit3;

                                            if (document.getElementById('nilai88').checked) {
                                                skor41 = document.getElementById("nilai88").value;
                                            }
                                            var hasil41 = hit6 * parseInt(skor41) * hit3;

                                            // tampil Perlengkapan Administrasi (Ruang Tunggu) 
                                            document.getElementById("hasil41").value = hasil41;
                                            document.getElementById("skor41").value = skor41;

                                            // Perlengkapan Administrasi (Komputer untuk penerbitan SEP) //
                                            if (document.getElementById('nilai89').checked) {
                                                skor42 = document.getElementById("nilai89").value;
                                            }
                                            var hasil42 = hit3 * parseInt(skor42) * hit3;

                                            if (document.getElementById('nilai90').checked) {
                                                skor42 = document.getElementById("nilai90").value;
                                            }
                                            var hasil42 = hit3 * parseInt(skor42) * hit3;

                                            // tampil Perlengkapan Administrasi (Komputer untuk penerbitan SEP) 
                                            document.getElementById("hasil42").value = hasil42;
                                            document.getElementById("skor42").value = skor42;

                                            // Perlengkapan Administrasi (Komputer khusus untuk penagihan klaim) //
                                            if (document.getElementById('nilai91').checked) {
                                                skor43 = document.getElementById("nilai91").value;
                                            }
                                            var hasil43 = hit3 * parseInt(skor43) * hit3;

                                            if (document.getElementById('nilai92').checked) {
                                                skor43 = document.getElementById("nilai92").value;
                                            }
                                            var hasil43 = hit3 * parseInt(skor43) * hit3;

                                            // tampil Perlengkapan Administrasi (Komputer khusus untuk penagihan klaim) 
                                            document.getElementById("hasil43").value = hasil43;
                                            document.getElementById("skor43").value = skor43;

                                            // Perlengkapan Administrasi (Jaringan Internet) //
                                            if (document.getElementById('nilai93').checked) {
                                                skor44 = document.getElementById("nilai93").value;
                                            }
                                            var hasil44 = hit3 * parseInt(skor44) * hit3;

                                            if (document.getElementById('nilai94').checked) {
                                                skor44 = document.getElementById("nilai94").value;
                                            }
                                            var hasil44 = hit3 * parseInt(skor44) * hit3;

                                            // tampil Perlengkapan Administrasi (Jaringan Internet) 
                                            document.getElementById("hasil44").value = hasil44;
                                            document.getElementById("skor44").value = skor44;

                                            // Pelayanan Administrasi
                                            // '- Petugas Pengentry tagihan klaim (INA-CBGs)/ koder //
                                            if (document.getElementById('nilai95').checked) {
                                                skor45 = document.getElementById("nilai95").value;
                                            }
                                            var hasil45 = hit3 * parseInt(skor45) * hit3;

                                            if (document.getElementById('nilai96').checked) {
                                                skor45 = document.getElementById("nilai96").value;
                                            }
                                            var hasil45 = hit3 * parseInt(skor45) * hit3;

                                            // tampil '- Petugas Pengentry tagihan klaim (INA-CBGs)/ koder
                                            document.getElementById("hasil45").value = hasil45;
                                            document.getElementById("skor45").value = skor45;

                                            // '- Petugas Pengentry tagihan klaim (INA-CBGs)/ koder //
                                            if (document.getElementById('nilai97').checked) {
                                                skor46 = document.getElementById("nilai97").value;
                                            }
                                            var hasil46 = hit3 * parseInt(skor46) * hit3;

                                            if (document.getElementById('nilai98').checked) {
                                                skor46 = document.getElementById("nilai98").value;
                                            }
                                            var hasil46 = hit3 * parseInt(skor46) * hit3;

                                            // tampil '- Petugas Pengentry tagihan klaim (INA-CBGs)/ koder
                                            document.getElementById("hasil46").value = hasil46;
                                            document.getElementById("skor46").value = skor46;

                                            // Fingerprint //
                                            if (document.getElementById('nilai99').checked) {
                                                skor47 = document.getElementById("nilai99").value;
                                            }
                                            var hasil47 = hit5 * parseInt(skor47) * hit3;

                                            if (document.getElementById('nilai100').checked) {
                                                skor47 = document.getElementById("nilai100").value;
                                            }
                                            var hasil47 = hit5 * parseInt(skor47) * hit3;

                                            // tampil Fingerprint
                                            document.getElementById("hasil47").value = hasil47;
                                            document.getElementById("skor47").value = skor47;

                                            // SOP obat kosong //
                                            if (document.getElementById('nilai101').checked) {
                                                skor48 = document.getElementById("nilai101").value;
                                            }
                                            var hasil48 = hit4 * parseInt(skor48) * hit3;

                                            if (document.getElementById('nilai102').checked) {
                                                skor48 = document.getElementById("nilai102").value;
                                            }
                                            var hasil48 = hit4 * parseInt(skor48) * hit3;

                                            // tampil SOP obat kosong
                                            document.getElementById("hasil48").value = hasil48;
                                            document.getElementById("skor48").value = skor48;

                                            var totaladm = hasil41 + hasil42 + hasil43 + hasil44 + hasil45 + hasil46 + hasil47 + hasil48;
                                            document.getElementById("totaladm").value = totaladm;

                                            var totalsemua = total + totalsarana + totalsistem + totaladm;
                                            document.getElementById("totalsemua").value = totalsemua;

                                        }
                                    </script>
                                </table>
                            </div>
                            </form>
                            <table border="2" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>

                                    <tr class="table-success">
                                        <td colspan="3" align="center">
                                            <h4><b>Self Assesment</b></h4>
                                        </td>
                                        <td colspan="3" align="center">
                                            <h4><b>Kredensialing</b></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal, Bulan, Tahun</td>
                                        <td>:</td>
                                        <td><?= $data->tgl ?></td>

                                        <td>Tanggal, Bulan, Tahun</td>
                                        <td>:</td>
                                        <td><?= $data->tgKreon ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="post" action="<?php echo base_url() ?>askk/Hasil_kredensialing_kemoterapi/updateStatus/<?= $data->id_checkbox_kemo ?>">
                                <table class="table table-striped">
                                    <?php if ($this->session->login_session['role'] == 'admin') { ?>
                                        <tr>
                                            <td>
                                                <h2>Komentar Dari BPJS</h2>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php if ($data->penilaian != '') {
                                                $dis = "disabled";
                                                $red = "readonly";
                                            } elseif ($data->penilaian == '') {
                                                $dis = "";
                                                $red = "";
                                            } ?>
                                            <td>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Masukkan Komentar</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" <?= $red ?> name="komentar"><?= $data->komentar ?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="radio-toolbar">
                                                    <?php $penilaian = explode(',', $data->penilaian); ?>
                                                    <input type="radio" class="terima" id="terima" <?= $dis ?> name="penilaian" <?php in_array('terima', $penilaian) ? print "checked" : ""; ?> <?php in_array('terimakabid', $penilaian) ? print "checked" : ""; ?> value="terima">
                                                    <label for="terima">Terima</label>
                                                    <input type="radio" class="tolak" id="tolak" <?= $dis ?> name="penilaian" <?php in_array('tolak', $penilaian) ? print "checked" : ""; ?> <?php in_array('tolakkabid', $penilaian) ? print "checked" : ""; ?> value="tolak">
                                                    <label for="tolak">Tolak</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php if ($this->session->login_session['role'] == 'admin' && $data->penilaian == '') { ?>
                                                <td><button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data dan kirim ? Data tidak bisa dirubah setelah disimpan dan dikirim !')" class="btn btn-success">Simpan & Kirim</button></td>
                                            <?php } ?>
                                        </tr>
                                </table>
                            <?php } ?>
                            </form>

                            <form method="post" action="<?php echo base_url() ?>askk/Hasil_kredensialing_kemoterapi/updateStatuskabid/<?= $data->id_checkbox_kemo ?>">
                                <table class="table table-striped">
                                    <?php if ($data->penilaian != '') { ?>
                                        <tr>
                                            <td>
                                                <h2>Komentar Dari Kepala Bidang</h2>
                                            </td>
                                        </tr>
                                        <?php if ($this->session->login_session['role'] == 'faskes') {
                                            $dis = "disabled";
                                            $red = "readonly";
                                        } elseif ($this->session->login_session['role'] == 'admin') {
                                            $dis = "";
                                            $red = "";
                                        } ?>
                                        <td>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Masukkan Komentar Kepala Bidang</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komentar"><?= $data->komentar ?></textarea>
                                            </div>
                                        </td>
                                        <tr>
                                            <td>
                                                <div class="radio-toolbar">
                                                    <?php $penilaian = explode(',', $data->penilaian); ?>
                                                    <input type="radio" class="terimakabid" id="terimakabid" <?= $dis ?> name="penilaian2" <?php in_array('terimakabid', $penilaian) ? print "checked" : ""; ?> value="terimakabid">
                                                    <label for="terimakabid">Terima</label>

                                                    <input type="radio" class="tolakkabid" id="tolakkabid" <?= $dis ?> name="penilaian2" <?php in_array('tolakkabid', $penilaian) ? print "checked" : ""; ?> value="tolakkabid">
                                                    <label for="tolakkabid">Tolak</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php if ($this->session->login_session['role'] == 'admin') { ?>
                                                <td><button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data dan kirim ? Data tidak bisa dirubah setelah disimpan dan dikirim !')" class="btn btn-success">Simpan & Kirim</button></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </form>
                            </tr>
                            </tr>
                            </table>
                </div>
                </tr>
                </table>
            </div>
            <!-- </div>
                </div>
            </div>
        </div>
    </div> -->

            <style>
                body {
                    font-family: 'Times New Roman', Times, serif;
                }

                #card_one.card-header {
                    background-color: #D7ECCE;
                    color: #3C763D;
                }

                #card_two.card-header {
                    background-color: #3175AF;
                    color: white;
                }
            </style>
            <style>
                #note_one {
                    margin-left: 425pt;
                    background: lightgreen;
                    /* font-style: normal;
        font-family: 'Times New Roman', Times, serif; */

                }

                .radio-toolbar {
                    margin: 10px;
                }

                .radio-toolbar input[type="radio"] {
                    opacity: 0;
                    position: fixed;
                    width: 0;
                    color: #FFFFFF;
                }

                /* .save-btn-wrapper {
        text-align: center;
    } */

                /* input.tolak {} */

                .radio-toolbar label {
                    display: inline-block;
                    background-color: #FFFFFF;
                    padding: 10px 20px;
                    font-family: 'Times New Roman', Times, serif;
                    color: #000000;
                    font-size: 16px;
                    border: 2px solid #444;
                    border-radius: 4px;
                }

                .radio-toolbar label:hover {
                    background-color: #FFFFFF;
                }

                .radio-toolbar input[type="radio"]:focus+label {
                    border: 2px;
                }

                .radio-toolbar input[class="terima"]:checked+label {
                    background-color: #5cb85c;
                    border-color: #FFFFFF;
                }

                .radio-toolbar input[class="tolak"]:checked+label {
                    background-color: #d9534f;
                    border-color: #FFFFFF;
                }

                .radio-toolbar {
                    margin: 10px;
                }

                .radio-toolbar input[type="radio"] {
                    opacity: 0;
                    position: fixed;
                    width: 0;
                    color: #FFFFFF;
                }

                /* .save-btn-wrapper {
        text-align: center;
    } */

                /* input.tolak {} */

                .radio-toolbar label {
                    display: inline-block;
                    background-color: #FFFFFF;
                    padding: 10px 20px;
                    font-family: 'Times New Roman', Times, serif;
                    color: #000000;
                    font-size: 16px;
                    border: 2px solid #444;
                    border-radius: 4px;
                }

                .radio-toolbar label:hover {
                    background-color: #FFFFFF;
                }

                .radio-toolbar input[type="radio"]:focus+label {
                    border: 2px;
                }

                .radio-toolbar input[class="terimakabid"]:checked+label {
                    background-color: #5cb85c;
                    border-color: #FFFFFF;
                }

                .radio-toolbar input[class="tolakkabid"]:checked+label {
                    background-color: #d9534f;
                    border-color: #FFFFFF;
                }

                body {
                    font-family: 'Times New Roman', Times, serif;
                }

                #card_one.card-header {
                    background-color: #D7ECCE;
                    color: #3C763D;
                }

                #card_two.card-header {
                    background-color: #3175AF;
                    color: white;
                }
            </style>