<div>
    <div class="card">
        <?= $this->session->flashdata('pesan'); ?>
        <?php unset($_SESSION['pesan']); ?>
        <?php
        if ($this->session->login_session['role'] == 'admin') { ?>
            <?php foreach ($getCheckbox as $cb) : ?>
                <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN <br> PELAYANAN POLI NYERI UNTUK <br> <?= $cb['nama']; ?> </b></h3>
            <?php endforeach; ?>
        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
            <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN PELAYANAN POLI NYERI </b></h3>
        <?php } ?>

        <div class="card-body">
            <div class="card">
                <h3 id="card_two" class="card-header">I. PERSYARATAN ADMINISTRASI ( KRITERIA MUTLAK )</h3>
                <div class="card-body">
                    <?php
                    if ($this->session->login_session['role'] == 'admin') { ?>
                        <form method="POST" action="<?= site_url('askk/nyeri/addKredensialing') ?>" enctype="multipart/form-data">
                            <?php foreach ($getCheckbox as $cb) : ?>
                                <input type="text" name="id_checkbox" hidden="" value="<?= $cb['id_checkbox']; ?>">
                            <?php endforeach; ?>
                        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
                            <form method="POST" action="<?= site_url('askk/nyeri/add') ?>" enctype="multipart/form-data">
                                <input type="text" name="id_nama_faskes" hidden="" value="<?= userdata('id_nama_faskes'); ?>">
                                <input type="text" name="id_nama_poli" hidden="" value="1">
                            <?php } ?>
                            <table border="0" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4">URAIAN</td>
                                    </tr>
                                    <tr>
                                        <td width="1%" align="center">1.</td>
                                        <td width="30%">Nama Faskes</td>
                                        <td width="1%">:</td>
                                        <td width="68%">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" readonly value="<?= userdata('nama_faskes'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Nama Pemilik Faskes</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="nama_pemilik" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                <?= form_error('nama_pemilik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Alamat </td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="alamat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>No. Telepon & Email</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" name="telp_email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td colspan="3">Dokumen Pendukung</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table border="0" width="100%" class="table">
                                <tr>
                                    <td width="4%" align="right">a.</td>
                                    <td width="60%">Surat Permohonan Kerjasama pelayanan poli nyeri kepada BPJS Kesehatan</td>
                                    <td width="1%">:</td>
                                    <td>ada <input type="checkbox" name="a" value="1"> tidak ada <input type="checkbox" name="a" value="0"></td>
                                </tr>
                                <tr>
                                    <td align="right">b.</td>
                                    <td>SK Tim Nyeri yang ditetapkan oleh Direktur Rumah Sakit</td>
                                    <td>:</td>
                                    <td>ada <input type="checkbox" name="b" value="1"> tidak ada <input type="checkbox" name="b" value="0"></td>
                                </tr>
                                <tr>
                                    <td align="right">c.</td>
                                    <td>Surat Pernyataan kesediaan mematuhi seluruh ketentuan program Jaminan Kesehatan Nasional meliputi :<br>*Kesediaan mematuhi peraturan Perundangan yang berlaku<br>*Kesediaan memberikan kemudahan akses catatan medikasi pasien<br>*Kesediaan memberikan pelaporan terhadap tindakan yang dilakukan<br>*seluruh pegawai terdaftar sebagai peserta program JKN</td>
                                    <td width="1%">:</td>
                                    <td>ada <input type="checkbox" name="c" value="1"> tidak ada <input type="checkbox" name="c" value="0"></td>
                                </tr>
                                <tr>
                                    <td align="right">d.</td>
                                    <td>Nomor Pokok Wajib Pajak Badan atas nama Faskes</td>
                                    <td>:</td>
                                    <td>ada <input type="checkbox" name="d" value="1"> tidak ada <input type="checkbox" name="d" value="0"></td>
                                </tr>
                                <tr>
                                    <td align="right">e.</td>
                                    <td>Surat pengelolaan limbah dari lembaga terkait</td>
                                    <td>:</td>
                                    <td>ada <input type="checkbox" name="e" value="1"> tidak ada <input type="checkbox" name="e" value="0"></td>
                                </tr>
                            </table>

                            <table border="0" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="1%" align="center"></td>
                                        <td width="30%" colspan="2"><b>Keterangan</b>
                                            <ul>
                                                <li>Persyaratan administrasi (kriteria mutlak) harus dipenuhi oleh setiap calon Faskes yang mengajukan proses kerja sama</li>
                                                <li>Penilaian terhadap kriteria teknis dapat dilakukan setelah seluruh persyaratan administrasi terpenuhi.</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                </div>
                <!-- akhir BAB I -->

                <!-- awal BAB 2 -->
                <h3 id="card_two" class="card-header">II. PERSYARATAN TEKNIS</h3>
                <div class="card-body">

                    <table border="1" width="100%" class="table table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td align="left" colspan="4" width="70%"><b>KRITERIA<b><br>A. SUMBER DAYA MANUSIA DAN STANDAR OPERASIONAL UNIT LAYANAN NYERI<b></td>
                                <td align="center" width="5%" colspan="2"><b>BOBOT (50%)</b></td>
                                <td width="5%"><b>SKOR</b></td>
                                <td width="5%"><b>SKOR*BOBOT</b></td>
                                <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                            </tr>

                            <tr>
                                <td width="1%">1.</td>
                                <td colspan="3">Ketenagaan/Sumber Daya Manusia</td>
                                <td align="center">100%</td>
                                <td></td>
                                <td colspan="3"></td>
                            </tr>

                            <tr>
                                <td><b>A</b></td>
                                <td colspan="8"><b>Anggota Tim Nyeri</b></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">a. Dokter Spesialis Anestesiologi dengan SIP yang berlaku </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai1" value="0" name="aaa" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai2" value="75" name="aaa" onclick="hitung()"> 1 orang<br>
                                    <input type="checkbox" id="nilai3" value="100" name="aaa" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">b. Dokter Spesialis Neurologi dengan SIP yang berlaku </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai4" value="0" name="aab" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai5" value="75" name="aab" onclick="hitung()"> 1 orang <br>
                                    <input type="checkbox" id="nilai6" value="100" name="aab" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor2" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil2" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">c. Dokter Spesialis Ortopedi dengan SIP yang berlaku </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai7" value="0" name="aac" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai8" value="75" name="aac" onclick="hitung()"> 1 orang <br>
                                    <input type="checkbox" id="nilai9" value="100" name="aac" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor3" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil3" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">d. Dokter Spesialis Bedah Saraf dengan SIP yang berlaku </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai10" value="0" name="aad" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai11" value="75" name="aad" onclick="hitung()"> 1 orang <br>
                                    <input type="checkbox" id="nilai12" value="100" name="aad" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor4" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil4" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">e. Dokter Spesialis Kedokteran Fisik dan Rehabilitasi dengan SIP yang berlaku </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai13" value="0" name="aae" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai14" value="75" name="aae" onclick="hitung()"> 1 orang <br>
                                    <input type="checkbox" id="nilai15" value="100" name="aae" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor5" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil5" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">f. Dokter Spesialis lain dengan SIP yang berlaku <br> -Dokter Spesialis....<br> -Dokter Spesialis.... </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai16" value="0" name="aaf" onclick="hitung()"> tidak ada <br>
                                    <input type="checkbox" id="nilai17" value="75" name="aaf" onclick="hitung()"> 1 orang <br>
                                    <input type="checkbox" id="nilai18" value="100" name="aaf" onclick="hitung()"> >1 orang
                                </td>
                                <td></td>
                                <td align="center">2%</td>
                                <td align="center"><input type="text" id="skor6" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil6" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                            </tr>
                            <tr>
                                <td><b>B</b></td>
                                <td colspan="8"><b>Sertifikat Kompetensi Penanganan Nyeri dari Kolegium Profesi</b></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">a. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis Anestesiologi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai19" value="0" name="aba" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai20" value="100" name="aba" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor7" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil7" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">b. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis Neurologi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai21" value="0" name="abb" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai22" value="100" name="abb" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor8" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil8" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">c. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis Ortopedi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai23" value="0" name="abc" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai24" value="100" name="abc" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor9" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil9" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">d. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis Bedah Saraf </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai25" value="0" name="abd" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai26" value="100" name="abd" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor10" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil10" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">e. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis Kedokteran Fisik dan Rehabilitasi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai27" value="0" name="abe" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai28" value="100" name="abe" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor11" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil11" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">f. Sertifikat Kompetensi Penanganan Nyeri Dokter Spesialis lain </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai29" value="0" name="abf" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai30" value="100" name="abf" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">2%</td>
                                <td align="center"><input type="text" id="skor12" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil12" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>

                            </tr>

                            <tr>
                                <td><b>C</b></td>
                                <td colspan="8"><b>Penugasan Klinis (clinical appointment ) oleh Direktur Rumah Sakit</b><br>catatan: clinical appointment sebelumnya telah melalui kredensial kewenangan klinis dan komite medik</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">a. Penugasan Klinis (clinical appointment) Dokter Spesialis Anestesiologi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai31" value="0" name="aca" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai32" value="100" name="aca" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor13" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil13" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">b.Penugasan Klinis (clinical appointment) Dokter Spesialis Neurologi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai33" value="0" name="acb" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai34" value="100" name="acb" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor14" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil14" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">c. Penugasan Klinis (clinical appointment) Dokter Spesialis Ortopedi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai35" value="0" name="acc" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai36" value="100" name="acc" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor15" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil15" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">d. Penugasan Klinis (clinical appointment) Dokter Spesialis Bedah Saraf </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai37" value="0" name="acd" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai38" value="100" name="acd" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor16" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil16" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">e. Penugasan Klinis (clinical appointment) Dokter Spesialis Kedokteran Fisik dan Rehabilitasi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai39" value="0" name="ace" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai40" value="100" name="ace" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor17" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil17" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">f. Penugasan Klinis (clinical appointment) Dokter Spesialis lain</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai41" value="0" name="acf" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai42" value="100" name="acf" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">2%</td>
                                <td align="center"><input type="text" id="skor18" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil18" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td><b>C</b></td>
                                <td colspan="8"><b>STANDAR OPERASIONAL UNIT LAYANAN NYERI</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">a. Terdapat Standar Operasional Unit Layanan Nyeri sesuai Keputusan Menteri Kesehatan Nomor HK.01.07/MENKES/418/2019 tentang Pedoman Nasional Pelayanan Kedokteran Tata Laksana Nyeri </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai43" value="0" name="ca" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai44" value="100" name="ca" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">10%</td>
                                <td align="center"><input type="text" id="skor19" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil19" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center"><b>
                                        <h4>SUB TOTAL SUMBER DAYA MANUSIA DAN STANDAR OPERASIOAL UNIT LAYANAN NYERI</h4>
                                    </b></td>
                                <td align="center">100%</td>
                                <td></td>
                                <td></td>
                                <td align="center"><input type="text" id="total" name="total" size="1"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <table border="1" width="100%" class="table table-striped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr class="table-success">
                                <td align="left" colspan="4" width="70%">
                                    <h4><b>B. SARANA DAN PRASARANA</b></h4>
                                </td>
                                <td align="center" width="5%" colspan="2"><b>BOBOT (50%)</b></td>
                                <td width="5%"><b>SKOR</b></td>
                                <td width="5%"><b>SKOR*BOBOT</b></td>
                                <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                            </tr>

                            <tr>
                                <td width="1%">1.</td>
                                <td colspan="3"><b>Ruangan Unit Layanan Nyeri</b></td>
                                <td bgcolor="yellow" align="center">25%</td>
                                <td>
                                    <font color="green"><b>100%</b></font>
                                </td>
                                <td colspan="3"></td>
                            </tr>

                            <tr>
                                <td><b></b></td>
                                <td colspan="8">Dalam satu area memiliki ruangan :</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">a. Ruang tunggu pasien </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai45" value="0" name="b1a" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai46" value="100" name="b1a" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">25%</td>
                                <td align="center"><input type="text" id="skor20" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil20" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">b. Ruang Periksa Pasien </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai47" value="0" name="b1b" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai48" value="100" name="b1b" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">25%</td>
                                <td align="center"><input type="text" id="skor21" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil21" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">c. Ruang tindakan</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai49" value="0" name="b1c" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai50" value="100" name="b1c" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">25%</td>
                                <td align="center"><input type="text" id="skor22" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil22" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">d. Ruang pemulihan</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai51" value="0" name="b1d" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai52" value="100" name="b1d" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">25%</td>
                                <td align="center"><input type="text" id="skor23" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil23" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td><b>2</b></td>
                                <td colspan="2"><b>Perlengkapan</b></td>
                                <td></td>
                                <td bgcolor="yellow">25%</td>
                                <td>
                                    <font color="green"><b>100%</b></font>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>A</b></td>
                                <td colspan="2">a. Alat untuk penilaian skala nyeri </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai53" value="0" name="b2a" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai54" value="100" name="b2a" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor24" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil24" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">b. Peralatan dasar </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai55" value="0" name="b2b" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai56" value="100" name="b2b" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor25" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil25" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">c. Peralatan untuk resusitasi jantung paru </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai57" value="0" name="b2c" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai58" value="100" name="b2c" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor26" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil26" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">d. Fluoroscope. C-arm</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai59" value="0" name="b2d" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai60" value="100" name="b2d" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor27" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil27" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">e. Mesin ultrasonografi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai61" value="0" name="b2e" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai62" value="100" name="b2e" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor28" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil28" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">f. Berbagai jenis dan ukuran jarum dan diposible syringe</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai63" value="0" name="b2f" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai64" value="100" name="b2f" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor29" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil29" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">g. Jarum radiofrequency</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai65" value="0" name="b2g" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai66" value="100" name="b2g" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor30" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil30" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">h. Jarum Laser</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai67" value="0" name="b2h" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai68" value="100" name="b2h" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor31" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil31" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">i. Intravenous Line Kit</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai69" value="0" name="b2i" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai70" value="100" name="b2i" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor32" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil32" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">j. Peralatan Proteksi Radiasi</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai71" value="0" name="b2j" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai72" value="100" name="b2j" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor33" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil33" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">k. Meja operasi/tindakan</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai73" value="0" name="b2k" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai74" value="100" name="b2k" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor34" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil34" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">l. Mesin radiofrekuensi</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai75" value="0" name="b2l" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai76" value="100" name="b2l" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor35" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil35" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">m. Peripheral nerve simulator</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai77" value="0" name="b2m" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai78" value="100" name="b2m" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor36" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil36" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">n. Mesin patient controlled analgesia</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai79" value="0" name="b2n" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai80" value="100" name="b2n" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor37" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil37" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">o. Berbagai jenis dan ukuran jarum dan diposible syringe</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai81" value="0" name="b2o" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai82" value="100" name="b2o" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor38" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil38" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">p. Berbagai jenis dan ukuran jarum dan diposible syringe</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai83" value="0" name="b2p" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai84" value="100" name="b2p" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">6%</td>
                                <td align="center"><input type="text" id="skor39" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil39" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">q. Tempat pembuangan sampah medis</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai85" value="0" name="b2q" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai86" value="100" name="b2q" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">5%</td>
                                <td align="center"><input type="text" id="skor40" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil40" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td><b>B</b></td>
                                <td colspan="2"><b>Obat - obatan dan bahan</b></td>
                                <td></td>
                                <td bgcolor="yellow">25%</td>
                                <td>
                                    <font color="green"><b>100%</b></font>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>a.</td>
                                <td colspan="2">Obat analgesik NSAID, opioid dan ajuvan</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai87" value="0" name="bba" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai88" value="100" name="bba" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">10%</td>
                                <td align="center"><input type="text" id="skor41" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil41" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td>b.</td>
                                <td colspan="2">Obat Injeksi</td>
                                <td></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">1) Steroid injeksi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai89" value="0" name="bb1" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai90" value="100" name="bb1" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor42" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil42" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">2) Dextrose 5-15% untuk proloterapi </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai91" value="0" name="bb2" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai92" value="100" name="bb2" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor43" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil43" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">3) Botolinum toxin</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai93" value="0" name="bb3" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai94" value="100" name="bb3" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor44" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil44" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">4) Hyaluronidase</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai95" value="0" name="bb4" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai96" value="100" name="bb4" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor45" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil45" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">5) Anastesi lokal</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai97" value="0" name="bb5" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai98" value="100" name="bb5" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor46" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil46" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">6) Antibiotik</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai99" value="0" name="bb6" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai100" value="100" name="bb6" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">7%</td>
                                <td align="center"><input type="text" id="skor47" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil47" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">7) Neurolitik</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai101" value="0" name="bb7" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai102" value="100" name="bb7" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor48" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil48" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">8) Kontras</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai103" value="0" name="bb8" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai104" value="100" name="bb8" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor49" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil49" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">9) Kyphoplasty kit</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai105" value="0" name="bb9" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai106" value="100" name="bb9" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor50" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil50" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">10) Kit PLDD (percutaneous laser discectomy)</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai107" value="0" name="bb10" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai108" value="100" name="bb10" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor51" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil51" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">11) Kit Disc FX</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai109" value="0" name="bb11" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai110" value="100" name="bb11" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor52" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil52" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">12) Spinal cord stimulator</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai111" value="0" name="bb12" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai112" value="100" name="bb12" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">8%</td>
                                <td align="center"><input type="text" id="skor53" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil53" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>
                            <tr>
                                <td><b>B</b></td>
                                <td colspan="2"><b>Perlengkapan Penunjang</b></td>
                                <td></td>
                                <td bgcolor="yellow">25%</td>
                                <td>
                                    <font color="green"><b>100%</b></font>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">a. Kapasitas ruang tunggu</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai113" value="50" name="bba1" onclick="hitung()">
                                    < 3 orang <input type="checkbox" id="nilai114" value="75" name="bba1" onclick="hitung()"> 3 -5 orang
                                        <input type="checkbox" id="nilai115" value="100" name="bba1" onclick="hitung()"> >5 orang
                                </td>
                                <td></td>
                                <td align="center">17%</td>
                                <td align="center"><input type="text" id="skor54" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil54" size="1" readonly=""></td>
                                <td align="center">
                                    < 3 orang=50<br> 3 - 5 = 75<br> >5 = 100
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">b. Ruang administrasi</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai116" value="0" name="bbb" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai117" value="100" name="bbb" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">16%</td>
                                <td align="center"><input type="text" id="skor55" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil55" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">c. Komputer </td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai118" value="0" name="bbc" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai119" value="100" name="bbc" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">17%</td>
                                <td align="center"><input type="text" id="skor56" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil56" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">d. Jaringan Internet</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai120" value="0" name="bbd" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai121" value="100" name="bbd" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">16%</td>
                                <td align="center"><input type="text" id="skor57" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil57" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">e. Alat komunikasi (fixed telepon)</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai122" value="0" name="bbe" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai123" value="100" name="bbe" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">17%</td>
                                <td align="center"><input type="text" id="skor58" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil58" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td colspan="2">f. Sistem administrasi Pelaporan</td>
                                <td width="20%">
                                    <input type="checkbox" id="nilai124" value="0" name="bbf" onclick="hitung()"> tidak ada
                                    <input type="checkbox" id="nilai125" value="100" name="bbf" onclick="hitung()"> ada
                                </td>
                                <td></td>
                                <td align="center">17%</td>
                                <td align="center"><input type="text" id="skor59" size="1" readonly=""></td>
                                <td align="center"><input type="text" id="hasil59" size="1" readonly=""></td>
                                <td align="center">tidak ada = 0<br> ada = 100</td>
                            </tr>


                            <tr>
                                <td colspan="4" align="center">
                                    <h4><b>UPLOAD BERKAS SARANA DAN PRASARANA</b></h4>
                                </td>
                                <td colspan="5">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn">File</button>
                                        <input type="file" name="dokumen" />
                                    </div>
                                    <?= form_error('dokumen', '<small class="text-danger">', '</small>'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <h4><b>SUB TOTAL SARANA DAN PRASARANA</b></h4>
                                </td>
                                <td align="center">100%</td>
                                <td></td>
                                <td></td>
                                <td align="center"><input type="text" id="total2" size="1"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center">
                                    <h4><b> TOTAL </b></h4>
                                </td>
                                <td align="center">100%</td>
                                <td></td>
                                <td></td>
                                <td align="center"><input type="text" id="totalsemua" name=" totalsemua" size="1"></td>
                                <td></td>
                            </tr>

                            <script>
                                function hitung() {
                                    var hasil = 0;
                                    var hit1 = 0.06;
                                    var hit2 = 0.5;
                                    var hit3 = 0.05;
                                    var hit4 = 0.02;
                                    var hit5 = 0.25;
                                    var hit6 = 0.25;
                                    var hit9 = 0.1;


                                    // perhitungan satu
                                    if (document.getElementById('nilai1').checked) {
                                        skor = document.getElementById("nilai1").value;
                                    }
                                    var hasil = hit1 * parseInt(skor) * hit2;

                                    if (document.getElementById('nilai2').checked) {
                                        skor = document.getElementById("nilai2").value;
                                    }
                                    var hasil = hit1 * parseInt(skor) * hit2;

                                    if (document.getElementById('nilai3').checked) {
                                        skor = document.getElementById("nilai3").value;
                                    }
                                    var hasil = hit1 * parseInt(skor) * hit2;
                                    // tampil satu
                                    document.getElementById("hasil").value = hasil;
                                    document.getElementById("skor").value = skor;


                                    // perhitungan dua
                                    if (document.getElementById('nilai4').checked) {
                                        skor2 = document.getElementById("nilai4").value;
                                    }
                                    var hasil2 = hit1 * parseInt(skor2) * hit2;

                                    if (document.getElementById('nilai5').checked) {
                                        skor2 = document.getElementById("nilai5").value;
                                    }
                                    var hasil2 = hit1 * parseInt(skor2) * hit2;

                                    if (document.getElementById('nilai6').checked) {
                                        skor2 = document.getElementById("nilai6").value;
                                    }
                                    var hasil2 = hit1 * parseInt(skor2) * hit2;
                                    // tampil dua
                                    document.getElementById("hasil2").value = hasil2;
                                    document.getElementById("skor2").value = skor2;

                                    // perhitungan tiga
                                    if (document.getElementById('nilai7').checked) {
                                        skor3 = document.getElementById("nilai7").value;
                                    }
                                    var hasil3 = hit3 * parseInt(skor3) * hit2;

                                    if (document.getElementById('nilai8').checked) {
                                        skor3 = document.getElementById("nilai8").value;
                                    }
                                    var hasil3 = hit3 * parseInt(skor3) * hit2;

                                    if (document.getElementById('nilai9').checked) {
                                        skor3 = document.getElementById("nilai9").value;
                                    }
                                    var hasil3 = hit3 * parseInt(skor3) * hit2;
                                    // tampil tiga
                                    document.getElementById("hasil3").value = hasil3;
                                    document.getElementById("skor3").value = skor3;

                                    // perhitungan empat (d)
                                    if (document.getElementById('nilai10').checked) {
                                        skor4 = document.getElementById("nilai10").value;
                                    }
                                    var hasil4 = hit1 * parseInt(skor4) * hit2;

                                    if (document.getElementById('nilai11').checked) {
                                        skor4 = document.getElementById("nilai11").value;
                                    }
                                    var hasil4 = hit1 * parseInt(skor4) * hit2;

                                    if (document.getElementById('nilai12').checked) {
                                        skor4 = document.getElementById("nilai12").value;
                                    }
                                    var hasil4 = hit1 * parseInt(skor4) * hit2;
                                    // tampil empat
                                    document.getElementById("hasil4").value = hasil4;
                                    document.getElementById("skor4").value = skor4;

                                    // perhitungan lima (e)
                                    if (document.getElementById('nilai13').checked) {
                                        skor5 = document.getElementById("nilai13").value;
                                    }
                                    var hasil5 = hit3 * parseInt(skor5) * hit2;

                                    if (document.getElementById('nilai14').checked) {
                                        skor5 = document.getElementById("nilai14").value;
                                    }
                                    var hasil5 = hit3 * parseInt(skor5) * hit2;

                                    if (document.getElementById('nilai15').checked) {
                                        skor5 = document.getElementById("nilai15").value;
                                    }
                                    var hasil5 = hit3 * parseInt(skor5) * hit2;
                                    // tampil lima
                                    document.getElementById("hasil5").value = hasil5;
                                    document.getElementById("skor5").value = skor5;

                                    // perhitungan enam (f)
                                    if (document.getElementById('nilai16').checked) {
                                        skor6 = document.getElementById("nilai16").value;
                                    }
                                    var hasil6 = hit4 * parseInt(skor6) * hit2;

                                    if (document.getElementById('nilai17').checked) {
                                        skor6 = document.getElementById("nilai17").value;
                                    }
                                    var hasil6 = hit4 * parseInt(skor6) * hit2;

                                    if (document.getElementById('nilai18').checked) {
                                        skor6 = document.getElementById("nilai18").value;
                                    }
                                    var hasil6 = hit4 * parseInt(skor6) * hit2;
                                    // tampil lima
                                    document.getElementById("hasil6").value = hasil6;
                                    document.getElementById("skor6").value = skor6;

                                    // perhitungan satu (a.B)
                                    if (document.getElementById('nilai19').checked) {
                                        skor7 = document.getElementById("nilai19").value;
                                    }
                                    var hasil7 = hit1 * parseInt(skor7) * hit2;

                                    if (document.getElementById('nilai20').checked) {
                                        skor7 = document.getElementById("nilai20").value;
                                    }
                                    var hasil7 = hit1 * parseInt(skor7) * hit2;

                                    // tampil satu B
                                    document.getElementById("hasil7").value = hasil7;
                                    document.getElementById("skor7").value = skor7;

                                    // perhitungan dua (b.B)
                                    if (document.getElementById('nilai21').checked) {
                                        skor8 = document.getElementById("nilai21").value;
                                    }
                                    var hasil8 = hit1 * parseInt(skor8) * hit2;

                                    if (document.getElementById('nilai22').checked) {
                                        skor8 = document.getElementById("nilai22").value;
                                    }
                                    var hasil8 = hit1 * parseInt(skor8) * hit2;

                                    // tampil dua B
                                    document.getElementById("hasil8").value = hasil8;
                                    document.getElementById("skor8").value = skor8;

                                    // perhitungan tiga (c.B)
                                    if (document.getElementById('nilai23').checked) {
                                        skor9 = document.getElementById("nilai23").value;
                                    }
                                    var hasil9 = hit1 * parseInt(skor9) * hit2;

                                    if (document.getElementById('nilai24').checked) {
                                        skor9 = document.getElementById("nilai24").value;
                                    }
                                    var hasil9 = hit1 * parseInt(skor9) * hit2;

                                    // tampil tiga B
                                    document.getElementById("hasil9").value = hasil9;
                                    document.getElementById("skor9").value = skor9;

                                    // perhitungan empat (d.B)
                                    if (document.getElementById('nilai25').checked) {
                                        skor10 = document.getElementById("nilai25").value;
                                    }
                                    var hasil10 = hit3 * parseInt(skor10) * hit2;

                                    if (document.getElementById('nilai26').checked) {
                                        skor10 = document.getElementById("nilai26").value;
                                    }
                                    var hasil10 = hit3 * parseInt(skor10) * hit2;

                                    // tampil empat B
                                    document.getElementById("hasil10").value = hasil10;
                                    document.getElementById("skor10").value = skor10;

                                    // perhitungan lima (e.B)
                                    if (document.getElementById('nilai27').checked) {
                                        skor11 = document.getElementById("nilai27").value;
                                    }
                                    var hasil11 = hit3 * parseInt(skor11) * hit2;

                                    if (document.getElementById('nilai28').checked) {
                                        skor11 = document.getElementById("nilai28").value;
                                    }
                                    var hasil11 = hit3 * parseInt(skor11) * hit2;

                                    // tampil lima B
                                    document.getElementById("hasil11").value = hasil11;
                                    document.getElementById("skor11").value = skor11;

                                    // perhitungan enam (f.B)
                                    if (document.getElementById('nilai29').checked) {
                                        skor12 = document.getElementById("nilai29").value;
                                    }
                                    var hasil12 = hit4 * parseInt(skor12) * hit2;

                                    if (document.getElementById('nilai30').checked) {
                                        skor12 = document.getElementById("nilai30").value;
                                    }
                                    var hasil12 = hit4 * parseInt(skor12) * hit2;

                                    // tampil enam B
                                    document.getElementById("hasil12").value = hasil12;
                                    document.getElementById("skor12").value = skor12;

                                    // perhitungan satu (a.C)
                                    if (document.getElementById('nilai31').checked) {
                                        skor13 = document.getElementById("nilai31").value;
                                    }
                                    var hasil13 = hit1 * parseInt(skor13) * hit2;

                                    if (document.getElementById('nilai32').checked) {
                                        skor13 = document.getElementById("nilai32").value;
                                    }
                                    var hasil13 = hit1 * parseInt(skor13) * hit2;

                                    // tampil satu C
                                    document.getElementById("hasil13").value = hasil13;
                                    document.getElementById("skor13").value = skor13;

                                    // perhitungan dua (b.C)
                                    if (document.getElementById('nilai33').checked) {
                                        skor14 = document.getElementById("nilai33").value;
                                    }
                                    var hasil14 = hit1 * parseInt(skor14) * hit2;

                                    if (document.getElementById('nilai34').checked) {
                                        skor14 = document.getElementById("nilai34").value;
                                    }
                                    var hasil14 = hit1 * parseInt(skor14) * hit2;

                                    // tampil dua C
                                    document.getElementById("hasil14").value = hasil14;
                                    document.getElementById("skor14").value = skor14;

                                    // perhitungan tiga (c.C)
                                    if (document.getElementById('nilai35').checked) {
                                        skor15 = document.getElementById("nilai35").value;
                                    }
                                    var hasil15 = hit3 * parseInt(skor15) * hit2;

                                    if (document.getElementById('nilai36').checked) {
                                        skor15 = document.getElementById("nilai36").value;
                                    }
                                    var hasil15 = hit3 * parseInt(skor15) * hit2;

                                    // tampil tiga C
                                    document.getElementById("hasil15").value = hasil15;
                                    document.getElementById("skor15").value = skor15;

                                    // perhitungan empat (d.C)
                                    if (document.getElementById('nilai37').checked) {
                                        skor16 = document.getElementById("nilai37").value;
                                    }
                                    var hasil16 = hit1 * parseInt(skor16) * hit2;

                                    if (document.getElementById('nilai38').checked) {
                                        skor16 = document.getElementById("nilai38").value;
                                    }
                                    var hasil16 = hit1 * parseInt(skor16) * hit2;

                                    // tampil empat C
                                    document.getElementById("hasil16").value = hasil16;
                                    document.getElementById("skor16").value = skor16;

                                    // perhitungan lima (e.C)
                                    if (document.getElementById('nilai39').checked) {
                                        skor17 = document.getElementById("nilai39").value;
                                    }
                                    var hasil17 = hit3 * parseInt(skor17) * hit2;

                                    if (document.getElementById('nilai40').checked) {
                                        skor17 = document.getElementById("nilai40").value;
                                    }
                                    var hasil17 = hit3 * parseInt(skor17) * hit2;

                                    // tampil lima C
                                    document.getElementById("hasil17").value = hasil17;
                                    document.getElementById("skor17").value = skor17;

                                    // perhitungan enam (f.C)
                                    if (document.getElementById('nilai41').checked) {
                                        skor18 = document.getElementById("nilai41").value;
                                    }
                                    var hasil18 = hit4 * parseInt(skor18) * hit2;

                                    if (document.getElementById('nilai42').checked) {
                                        skor18 = document.getElementById("nilai42").value;
                                    }
                                    var hasil18 = hit4 * parseInt(skor18) * hit2;

                                    // tampil enam C
                                    document.getElementById("hasil18").value = hasil18;
                                    document.getElementById("skor18").value = skor18;

                                    // perhitungan tujuh (f.C)
                                    if (document.getElementById('nilai43').checked) {
                                        skor19 = document.getElementById("nilai43").value;
                                    }
                                    var hasil19 = hit9 * parseInt(skor19) * hit2;

                                    if (document.getElementById('nilai44').checked) {
                                        skor19 = document.getElementById("nilai44").value;
                                    }
                                    var hasil19 = hit9 * parseInt(skor19) * hit2;

                                    // tampil tujuh C
                                    document.getElementById("hasil19").value = hasil19;
                                    document.getElementById("skor19").value = skor19;

                                    // perhitungan Sarana dan Prasarana 1A
                                    if (document.getElementById('nilai45').checked) {
                                        skor20 = document.getElementById("nilai45").value;
                                    }
                                    var hasil20 = hit5 * parseInt(skor20) * hit2 * hit6;

                                    if (document.getElementById('nilai46').checked) {
                                        skor20 = document.getElementById("nilai46").value;
                                    }
                                    var hasil20 = hit5 * parseInt(skor20) * hit2 * hit6;

                                    // tampil perhitungan Sarana dan Prasarana 1A
                                    document.getElementById("hasil20").value = hasil20;
                                    document.getElementById("skor20").value = skor20;

                                    // perhitungan Sarana dan Prasarana 2A
                                    if (document.getElementById('nilai47').checked) {
                                        skor21 = document.getElementById("nilai47").value;
                                    }
                                    var hasil21 = hit5 * parseInt(skor21) * hit2 * hit6;

                                    if (document.getElementById('nilai48').checked) {
                                        skor21 = document.getElementById("nilai48").value;
                                    }
                                    var hasil21 = hit5 * parseInt(skor21) * hit2 * hit6;

                                    // tampil perhitungan Sarana dan Prasarana 2A
                                    document.getElementById("hasil21").value = hasil21;
                                    document.getElementById("skor21").value = skor21;

                                    // perhitungan Sarana dan Prasarana 3A
                                    if (document.getElementById('nilai49').checked) {
                                        skor22 = document.getElementById("nilai49").value;
                                    }
                                    var hasil22 = hit5 * parseInt(skor22) * hit2 * hit6;

                                    if (document.getElementById('nilai50').checked) {
                                        skor22 = document.getElementById("nilai50").value;
                                    }
                                    var hasil22 = hit5 * parseInt(skor22) * hit2 * hit6;

                                    // tampil perhitungan Sarana dan Prasarana 3A
                                    document.getElementById("hasil22").value = hasil22;
                                    document.getElementById("skor22").value = skor22;

                                    // perhitungan Sarana dan Prasarana 3A
                                    if (document.getElementById('nilai49').checked) {
                                        skor22 = document.getElementById("nilai49").value;
                                    }
                                    var hasil22 = hit5 * parseInt(skor22) * hit2 * hit6;

                                    if (document.getElementById('nilai50').checked) {
                                        skor22 = document.getElementById("nilai50").value;
                                    }
                                    var hasil22 = hit5 * parseInt(skor22) * hit2 * hit6;

                                    // tampil perhitungan Sarana dan Prasarana 3A
                                    document.getElementById("hasil22").value = hasil22;
                                    document.getElementById("skor22").value = skor22;

                                    // perhitungan Sarana dan Prasarana 4A
                                    if (document.getElementById('nilai51').checked) {
                                        skor23 = document.getElementById("nilai51").value;
                                    }
                                    var hasil23 = hit5 * parseInt(skor23) * hit2 * hit6;

                                    if (document.getElementById('nilai52').checked) {
                                        skor23 = document.getElementById("nilai52").value;
                                    }
                                    var hasil23 = hit5 * parseInt(skor23) * hit2 * hit6;

                                    // tampil perhitungan Sarana dan Prasarana 4A
                                    document.getElementById("hasil23").value = hasil23;
                                    document.getElementById("skor23").value = skor23;

                                    var hit7 = 0.06;

                                    // perhitungan Perlengkapan 1
                                    if (document.getElementById('nilai53').checked) {
                                        skor24 = document.getElementById("nilai53").value;
                                    }
                                    var hasil24 = hit5 * parseInt(skor24) * hit2 * hit7;

                                    if (document.getElementById('nilai54').checked) {
                                        skor24 = document.getElementById("nilai54").value;
                                    }
                                    var hasil24 = hit5 * parseInt(skor24) * hit2 * hit7;

                                    // tampil Perlengkapan 1
                                    document.getElementById("hasil24").value = hasil24;
                                    document.getElementById("skor24").value = skor24;

                                    // perhitungan Perlengkapan 2
                                    if (document.getElementById('nilai55').checked) {
                                        skor25 = document.getElementById("nilai55").value;
                                    }
                                    var hasil25 = hit5 * parseInt(skor25) * hit2 * hit7;

                                    if (document.getElementById('nilai56').checked) {
                                        skor25 = document.getElementById("nilai56").value;
                                    }
                                    var hasil25 = hit5 * parseInt(skor25) * hit2 * hit7;

                                    // tampil Perlengkapan 2
                                    document.getElementById("hasil25").value = hasil25;
                                    document.getElementById("skor25").value = skor25;

                                    // perhitungan Perlengkapan 3
                                    if (document.getElementById('nilai57').checked) {
                                        skor26 = document.getElementById("nilai57").value;
                                    }
                                    var hasil26 = hit5 * parseInt(skor26) * hit2 * hit7;

                                    if (document.getElementById('nilai58').checked) {
                                        skor26 = document.getElementById("nilai58").value;
                                    }
                                    var hasil26 = hit5 * parseInt(skor26) * hit2 * hit7;

                                    // tampil Perlengkapan 3
                                    document.getElementById("hasil26").value = hasil26;
                                    document.getElementById("skor26").value = skor26;

                                    // perhitungan Perlengkapan 4
                                    if (document.getElementById('nilai59').checked) {
                                        skor27 = document.getElementById("nilai59").value;
                                    }
                                    var hasil27 = hit5 * parseInt(skor27) * hit2 * hit7;

                                    if (document.getElementById('nilai60').checked) {
                                        skor27 = document.getElementById("nilai60").value;
                                    }
                                    var hasil27 = hit5 * parseInt(skor27) * hit2 * hit7;

                                    // tampil Perlengkapan 4
                                    document.getElementById("hasil27").value = hasil27;
                                    document.getElementById("skor27").value = skor27;

                                    // perhitungan Perlengkapan 5
                                    if (document.getElementById('nilai61').checked) {
                                        skor28 = document.getElementById("nilai61").value;
                                    }
                                    var hasil28 = hit5 * parseInt(skor28) * hit2 * hit7;

                                    if (document.getElementById('nilai62').checked) {
                                        skor28 = document.getElementById("nilai62").value;
                                    }
                                    var hasil28 = hit5 * parseInt(skor28) * hit2 * hit7;

                                    // tampil Perlengkapan 5
                                    document.getElementById("hasil28").value = hasil28;
                                    document.getElementById("skor28").value = skor28;

                                    // perhitungan Perlengkapan 6
                                    if (document.getElementById('nilai63').checked) {
                                        skor29 = document.getElementById("nilai63").value;
                                    }
                                    var hasil29 = hit5 * parseInt(skor29) * hit2 * hit7;

                                    if (document.getElementById('nilai64').checked) {
                                        skor29 = document.getElementById("nilai64").value;
                                    }
                                    var hasil29 = hit5 * parseInt(skor29) * hit2 * hit7;

                                    // tampil Perlengkapan 6
                                    document.getElementById("hasil29").value = hasil29;
                                    document.getElementById("skor29").value = skor29;

                                    // perhitungan Perlengkapan 7
                                    if (document.getElementById('nilai65').checked) {
                                        skor30 = document.getElementById("nilai65").value;
                                    }
                                    var hasil30 = hit5 * parseInt(skor30) * hit2 * hit7;

                                    if (document.getElementById('nilai66').checked) {
                                        skor30 = document.getElementById("nilai66").value;
                                    }
                                    var hasil30 = hit5 * parseInt(skor30) * hit2 * hit7;

                                    // tampil Perlengkapan 7
                                    document.getElementById("hasil30").value = hasil30;
                                    document.getElementById("skor30").value = skor30;

                                    // perhitungan Perlengkapan 8
                                    if (document.getElementById('nilai67').checked) {
                                        skor31 = document.getElementById("nilai67").value;
                                    }
                                    var hasil31 = hit5 * parseInt(skor31) * hit2 * hit7;

                                    if (document.getElementById('nilai68').checked) {
                                        skor31 = document.getElementById("nilai68").value;
                                    }
                                    var hasil31 = hit5 * parseInt(skor31) * hit2 * hit7;

                                    // tampil Perlengkapan 8
                                    document.getElementById("hasil31").value = hasil31;
                                    document.getElementById("skor31").value = skor31;

                                    var hit8 = 0.05;
                                    // perhitungan Perlengkapan 9 (5%)
                                    if (document.getElementById('nilai69').checked) {
                                        skor32 = document.getElementById("nilai69").value;
                                    }
                                    var hasil32 = hit5 * parseInt(skor32) * hit2 * hit8;

                                    if (document.getElementById('nilai70').checked) {
                                        skor32 = document.getElementById("nilai70").value;
                                    }
                                    var hasil32 = hit5 * parseInt(skor32) * hit2 * hit8;

                                    // tampil Perlengkapan 9
                                    document.getElementById("hasil32").value = hasil32;
                                    document.getElementById("skor32").value = skor32;

                                    // perhitungan Perlengkapan 10
                                    if (document.getElementById('nilai71').checked) {
                                        skor33 = document.getElementById("nilai71").value;
                                    }
                                    var hasil33 = hit5 * parseInt(skor33) * hit2 * hit7;

                                    if (document.getElementById('nilai72').checked) {
                                        skor33 = document.getElementById("nilai72").value;
                                    }
                                    var hasil33 = hit5 * parseInt(skor33) * hit2 * hit7;

                                    // tampil Perlengkapan 10
                                    document.getElementById("hasil33").value = hasil33;
                                    document.getElementById("skor33").value = skor33;

                                    // perhitungan Perlengkapan 11
                                    if (document.getElementById('nilai73').checked) {
                                        skor34 = document.getElementById("nilai73").value;
                                    }
                                    var hasil34 = hit5 * parseInt(skor34) * hit2 * hit7;

                                    if (document.getElementById('nilai74').checked) {
                                        skor34 = document.getElementById("nilai74").value;
                                    }
                                    var hasil34 = hit5 * parseInt(skor34) * hit2 * hit7;

                                    // tampil Perlengkapan 11
                                    document.getElementById("hasil34").value = hasil34;
                                    document.getElementById("skor34").value = skor34;

                                    // perhitungan Perlengkapan 12
                                    if (document.getElementById('nilai75').checked) {
                                        skor35 = document.getElementById("nilai75").value;
                                    }
                                    var hasil35 = hit5 * parseInt(skor35) * hit2 * hit7;

                                    if (document.getElementById('nilai76').checked) {
                                        skor35 = document.getElementById("nilai76").value;
                                    }
                                    var hasil35 = hit5 * parseInt(skor35) * hit2 * hit7;

                                    // tampil Perlengkapan 12
                                    document.getElementById("hasil35").value = hasil35;
                                    document.getElementById("skor35").value = skor35;

                                    // perhitungan Perlengkapan 13
                                    if (document.getElementById('nilai77').checked) {
                                        skor36 = document.getElementById("nilai77").value;
                                    }
                                    var hasil36 = hit5 * parseInt(skor36) * hit2 * hit7;

                                    if (document.getElementById('nilai78').checked) {
                                        skor36 = document.getElementById("nilai78").value;
                                    }
                                    var hasil36 = hit5 * parseInt(skor36) * hit2 * hit7;

                                    // tampil Perlengkapan 13
                                    document.getElementById("hasil36").value = hasil36;
                                    document.getElementById("skor36").value = skor36;

                                    // perhitungan Perlengkapan 14
                                    if (document.getElementById('nilai79').checked) {
                                        skor37 = document.getElementById("nilai79").value;
                                    }
                                    var hasil37 = hit5 * parseInt(skor37) * hit2 * hit7;

                                    if (document.getElementById('nilai80').checked) {
                                        skor37 = document.getElementById("nilai80").value;
                                    }
                                    var hasil37 = hit5 * parseInt(skor37) * hit2 * hit7;

                                    // tampil Perlengkapan 14
                                    document.getElementById("hasil37").value = hasil37;
                                    document.getElementById("skor37").value = skor37;

                                    // perhitungan Perlengkapan 15
                                    if (document.getElementById('nilai81').checked) {
                                        skor38 = document.getElementById("nilai81").value;
                                    }
                                    var hasil38 = hit5 * parseInt(skor38) * hit2 * hit7;

                                    if (document.getElementById('nilai82').checked) {
                                        skor38 = document.getElementById("nilai82").value;
                                    }
                                    var hasil38 = hit5 * parseInt(skor38) * hit2 * hit7;

                                    // tampil Perlengkapan 15
                                    document.getElementById("hasil38").value = hasil38;
                                    document.getElementById("skor38").value = skor38;

                                    // perhitungan Perlengkapan 16
                                    if (document.getElementById('nilai83').checked) {
                                        skor39 = document.getElementById("nilai83").value;
                                    }
                                    var hasil39 = hit5 * parseInt(skor39) * hit2 * hit7;

                                    if (document.getElementById('nilai84').checked) {
                                        skor39 = document.getElementById("nilai84").value;
                                    }
                                    var hasil39 = hit5 * parseInt(skor39) * hit2 * hit7;

                                    // tampil Perlengkapan 16
                                    document.getElementById("hasil39").value = hasil39;
                                    document.getElementById("skor39").value = skor39;

                                    // perhitungan Perlengkapan 17 (5%)
                                    if (document.getElementById('nilai85').checked) {
                                        skor40 = document.getElementById("nilai85").value;
                                    }
                                    var hasil40 = hit5 * parseInt(skor40) * hit2 * hit8;

                                    if (document.getElementById('nilai86').checked) {
                                        skor40 = document.getElementById("nilai86").value;
                                    }
                                    var hasil40 = hit5 * parseInt(skor40) * hit2 * hit8;

                                    // tampil Perlengkapan 17
                                    document.getElementById("hasil40").value = hasil40;
                                    document.getElementById("skor40").value = skor40;

                                    // perhitungan obat -obatan a (10%)											
                                    if (document.getElementById('nilai87').checked) {
                                        skor41 = document.getElementById("nilai85").value;
                                    }
                                    var hasil41 = hit5 * parseInt(skor41) * hit2 * hit9;

                                    if (document.getElementById('nilai88').checked) {
                                        skor41 = document.getElementById("nilai86").value;
                                    }
                                    var hasil41 = hit5 * parseInt(skor41) * hit2 * hit9;

                                    // tampil obat -obatan a (10%)
                                    document.getElementById("hasil41").value = hasil41;
                                    document.getElementById("skor41").value = skor41;

                                    // perhitungan obat -obatan a (10%)
                                    if (document.getElementById('nilai87').checked) {
                                        skor41 = document.getElementById("nilai87").value;
                                    }
                                    var hasil41 = hit5 * parseInt(skor41) * hit2 * hit9;

                                    if (document.getElementById('nilai88').checked) {
                                        skor41 = document.getElementById("nilai88").value;
                                    }
                                    var hasil41 = hit5 * parseInt(skor41) * hit2 * hit9;

                                    // tampil obat -obatan a (10%)
                                    document.getElementById("hasil41").value = hasil41;
                                    document.getElementById("skor41").value = skor41;

                                    // perhitungan obat -obatan b1 (7%)
                                    var hit10 = 0.07;
                                    if (document.getElementById('nilai89').checked) {
                                        skor42 = document.getElementById("nilai89").value;
                                    }
                                    var hasil42 = hit5 * parseInt(skor42) * hit2 * hit10;

                                    if (document.getElementById('nilai90').checked) {
                                        skor42 = document.getElementById("nilai90").value;
                                    }
                                    var hasil42 = hit5 * parseInt(skor42) * hit2 * hit10;

                                    // tampil obat -obatan b1 (7%)
                                    document.getElementById("hasil42").value = hasil42;
                                    document.getElementById("skor42").value = skor42;

                                    // perhitungan obat -obatan b2 (7%)
                                    if (document.getElementById('nilai91').checked) {
                                        skor43 = document.getElementById("nilai91").value;
                                    }
                                    var hasil43 = hit5 * parseInt(skor43) * hit2 * hit10;

                                    if (document.getElementById('nilai92').checked) {
                                        skor43 = document.getElementById("nilai92").value;
                                    }
                                    var hasil43 = hit5 * parseInt(skor43) * hit2 * hit10;

                                    // tampil obat -obatan b2 (7%)
                                    document.getElementById("hasil43").value = hasil43;
                                    document.getElementById("skor43").value = skor43;

                                    // perhitungan obat -obatan b3 (7%)
                                    if (document.getElementById('nilai93').checked) {
                                        skor44 = document.getElementById("nilai91").value;
                                    }
                                    var hasil44 = hit5 * parseInt(skor44) * hit2 * hit10;

                                    if (document.getElementById('nilai94').checked) {
                                        skor44 = document.getElementById("nilai92").value;
                                    }
                                    var hasil44 = hit5 * parseInt(skor44) * hit2 * hit10;

                                    // tampil obat -obatan b3 (7%)
                                    document.getElementById("hasil44").value = hasil44;
                                    document.getElementById("skor44").value = skor44;

                                    // perhitungan obat -obatan b4 (7%)
                                    if (document.getElementById('nilai95').checked) {
                                        skor45 = document.getElementById("nilai95").value;
                                    }
                                    var hasil45 = hit5 * parseInt(skor45) * hit2 * hit10;

                                    if (document.getElementById('nilai96').checked) {
                                        skor45 = document.getElementById("nilai96").value;
                                    }
                                    var hasil45 = hit5 * parseInt(skor45) * hit2 * hit10;

                                    // tampil obat -obatan b4 (7%)
                                    document.getElementById("hasil45").value = hasil45;
                                    document.getElementById("skor45").value = skor45;

                                    // perhitungan obat -obatan b5 (7%)
                                    if (document.getElementById('nilai97').checked) {
                                        skor46 = document.getElementById("nilai97").value;
                                    }
                                    var hasil46 = hit5 * parseInt(skor46) * hit2 * hit10;

                                    if (document.getElementById('nilai98').checked) {
                                        skor46 = document.getElementById("nilai98").value;
                                    }
                                    var hasil46 = hit5 * parseInt(skor46) * hit2 * hit10;

                                    // tampil obat -obatan b3 (7%)
                                    document.getElementById("hasil46").value = hasil46;
                                    document.getElementById("skor46").value = skor46;

                                    // perhitungan obat -obatan b6 (7%)
                                    if (document.getElementById('nilai99').checked) {
                                        skor47 = document.getElementById("nilai99").value;
                                    }
                                    var hasil47 = hit5 * parseInt(skor47) * hit2 * hit10;

                                    if (document.getElementById('nilai100').checked) {
                                        skor47 = document.getElementById("nilai100").value;
                                    }
                                    var hasil47 = hit5 * parseInt(skor47) * hit2 * hit10;

                                    // tampil obat -obatan b6 (7%)
                                    document.getElementById("hasil47").value = hasil47;
                                    document.getElementById("skor47").value = skor47;

                                    var hit11 = 0.08;
                                    // perhitungan obat -obatan b7 (8%)
                                    if (document.getElementById('nilai101').checked) {
                                        skor48 = document.getElementById("nilai101").value;
                                    }
                                    var hasil48 = hit5 * parseInt(skor48) * hit2 * hit11;

                                    if (document.getElementById('nilai102').checked) {
                                        skor48 = document.getElementById("nilai102").value;
                                    }
                                    var hasil48 = hit5 * parseInt(skor48) * hit2 * hit11;

                                    // tampil obat -obatan b7 (8%)
                                    document.getElementById("hasil48").value = hasil48;
                                    document.getElementById("skor48").value = skor48;

                                    // perhitungan obat -obatan b8 (8%)
                                    if (document.getElementById('nilai103').checked) {
                                        skor49 = document.getElementById("nilai103").value;
                                    }
                                    var hasil49 = hit5 * parseInt(skor49) * hit2 * hit11;

                                    if (document.getElementById('nilai104').checked) {
                                        skor49 = document.getElementById("nilai104").value;
                                    }
                                    var hasil49 = hit5 * parseInt(skor49) * hit2 * hit11;

                                    // tampil obat -obatan b8 (8%)
                                    document.getElementById("hasil49").value = hasil49;
                                    document.getElementById("skor49").value = skor49;

                                    // perhitungan obat -obatan b9 (8%)
                                    if (document.getElementById('nilai105').checked) {
                                        skor50 = document.getElementById("nilai105").value;
                                    }
                                    var hasil50 = hit5 * parseInt(skor50) * hit2 * hit11;

                                    if (document.getElementById('nilai106').checked) {
                                        skor50 = document.getElementById("nilai106").value;
                                    }
                                    var hasil50 = hit5 * parseInt(skor50) * hit2 * hit11;

                                    // tampil obat -obatan b9 (8%)
                                    document.getElementById("hasil50").value = hasil50;
                                    document.getElementById("skor50").value = skor50;

                                    // perhitungan obat -obatan b10 (8%)
                                    if (document.getElementById('nilai107').checked) {
                                        skor51 = document.getElementById("nilai107").value;
                                    }
                                    var hasil51 = hit5 * parseInt(skor51) * hit2 * hit11;

                                    if (document.getElementById('nilai108').checked) {
                                        skor51 = document.getElementById("nilai108").value;
                                    }
                                    var hasil51 = hit5 * parseInt(skor51) * hit2 * hit11;

                                    // tampil obat -obatan b10 (8%)
                                    document.getElementById("hasil51").value = hasil51;
                                    document.getElementById("skor51").value = skor51;

                                    // perhitungan obat -obatan b11 (8%)
                                    if (document.getElementById('nilai109').checked) {
                                        skor52 = document.getElementById("nilai109").value;
                                    }
                                    var hasil52 = hit5 * parseInt(skor52) * hit2 * hit11;

                                    if (document.getElementById('nilai110').checked) {
                                        skor52 = document.getElementById("nilai110").value;
                                    }
                                    var hasil52 = hit5 * parseInt(skor52) * hit2 * hit11;

                                    // tampil obat -obatan b11 (8%)
                                    document.getElementById("hasil52").value = hasil52;
                                    document.getElementById("skor52").value = skor52;

                                    // perhitungan obat -obatan b12 (8%)
                                    if (document.getElementById('nilai111').checked) {
                                        skor53 = document.getElementById("nilai111").value;
                                    }
                                    var hasil53 = hit5 * parseInt(skor53) * hit2 * hit11;

                                    if (document.getElementById('nilai112').checked) {
                                        skor53 = document.getElementById("nilai112").value;
                                    }
                                    var hasil53 = hit5 * parseInt(skor53) * hit2 * hit11;

                                    // tampil obat -obatan b12 (8%)
                                    document.getElementById("hasil53").value = hasil53;
                                    document.getElementById("skor53").value = skor53;

                                    // perhitungan Perlengkapan Penunjang a (17%)
                                    var hit12 = 0.17;
                                    if (document.getElementById('nilai113').checked) {
                                        skor54 = document.getElementById("nilai113").value;
                                    }
                                    var hasil54 = hit12 * parseInt(skor54) * hit2 * hit5;

                                    if (document.getElementById('nilai114').checked) {
                                        skor54 = document.getElementById("nilai114").value;
                                    }
                                    var hasil54 = hit12 * parseInt(skor54) * hit2 * hit5;

                                    if (document.getElementById('nilai115').checked) {
                                        skor54 = document.getElementById("nilai115").value;
                                    }
                                    var hasil54 = hit12 * parseInt(skor54) * hit2 * hit5;
                                    // tampil perhitungan Perlengkapan Penunjang a (17%)
                                    document.getElementById("hasil54").value = hasil54;
                                    document.getElementById("skor54").value = skor54;

                                    // perhitungan Perlengkapan Penunjang b (16%)
                                    var hit13 = 0.16;
                                    if (document.getElementById('nilai116').checked) {
                                        skor55 = document.getElementById("nilai116").value;
                                    }
                                    var hasil55 = hit5 * parseInt(skor55) * hit2 * hit13;

                                    if (document.getElementById('nilai117').checked) {
                                        skor55 = document.getElementById("nilai117").value;
                                    }
                                    var hasil55 = hit5 * parseInt(skor55) * hit2 * hit13;

                                    // tampil Perlengkapan Penunjang b (16%)
                                    document.getElementById("hasil55").value = hasil55;
                                    document.getElementById("skor55").value = skor55;

                                    // perhitungan Perlengkapan Penunjang c (17%)
                                    if (document.getElementById('nilai118').checked) {
                                        skor56 = document.getElementById("nilai118").value;
                                    }
                                    var hasil56 = hit5 * parseInt(skor56) * hit2 * hit12;

                                    if (document.getElementById('nilai119').checked) {
                                        skor56 = document.getElementById("nilai119").value;
                                    }
                                    var hasil56 = hit5 * parseInt(skor56) * hit2 * hit12;

                                    // tampil Perlengkapan Penunjang c (17%)
                                    document.getElementById("hasil56").value = hasil56;
                                    document.getElementById("skor56").value = skor56;

                                    // perhitungan Perlengkapan Penunjang d (16%)
                                    if (document.getElementById('nilai120').checked) {
                                        skor57 = document.getElementById("nilai120").value;
                                    }
                                    var hasil57 = hit5 * parseInt(skor57) * hit2 * hit13;

                                    if (document.getElementById('nilai121').checked) {
                                        skor57 = document.getElementById("nilai121").value;
                                    }
                                    var hasil57 = hit5 * parseInt(skor57) * hit2 * hit13;

                                    // tampil Perlengkapan Penunjang d (16%)
                                    document.getElementById("hasil57").value = hasil57;
                                    document.getElementById("skor57").value = skor57;

                                    // perhitungan Perlengkapan Penunjang c (17%)
                                    if (document.getElementById('nilai122').checked) {
                                        skor58 = document.getElementById("nilai118").value;
                                    }
                                    var hasil58 = hit5 * parseInt(skor58) * hit2 * hit12;

                                    if (document.getElementById('nilai123').checked) {
                                        skor58 = document.getElementById("nilai119").value;
                                    }
                                    var hasil58 = hit5 * parseInt(skor58) * hit2 * hit12;

                                    // tampil Perlengkapan Penunjang c (17%)
                                    document.getElementById("hasil58").value = hasil58;
                                    document.getElementById("skor58").value = skor58;

                                    // perhitungan Perlengkapan Penunjang c (17%)
                                    if (document.getElementById('nilai124').checked) {
                                        skor59 = document.getElementById("nilai124").value;
                                    }
                                    var hasil59 = hit5 * parseInt(skor59) * hit2 * hit12;

                                    if (document.getElementById('nilai125').checked) {
                                        skor59 = document.getElementById("nilai125").value;
                                    }
                                    var hasil59 = hit5 * parseInt(skor59) * hit2 * hit12;

                                    // tampil Perlengkapan Penunjang c (17%)
                                    document.getElementById("hasil59").value = hasil59;
                                    document.getElementById("skor59").value = skor59;

                                    // total sub
                                    var total = hasil + hasil2 + hasil3 + hasil4 + hasil5 + hasil6 + hasil7 + hasil8 + hasil9 + hasil10 + hasil11 + hasil12 + hasil13 + hasil14 + hasil15 +
                                        hasil16 + hasil17 + hasil18 + hasil19;
                                    document.getElementById("total").value = total;

                                    var total2 = hasil20 + hasil21 + hasil22 + hasil23 + hasil24 + hasil25 + hasil26 + hasil27 + hasil28 + hasil29 + hasil30 + hasil31 + hasil32 + hasil33 + hasil34 +
                                        hasil35 + hasil36 + hasil37 + hasil38 + hasil39 + hasil40 + hasil41 + hasil42 + hasil43 + hasil44 + hasil45 + hasil46 + hasil47 + hasil48 + hasil49 + hasil50 + hasil51 +
                                        hasil52 + hasil53 + hasil54 + hasil55 + hasil56 + hasil57 + hasil58 + hasil59;
                                    document.getElementById("total2").value = total2;

                                    var totalsemua = total + total2;
                                    document.getElementById("totalsemua").value = totalsemua;

                                }
                            </script>

                        </tbody>
                    </table>
                    <table class="table table-striped">
                        <tr>
                            <td><button id="note_one" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data dan kirim ? Data tidak bisa dirubah setelah disimpan dan dikirim !')" class="btn btn-success">Simpan & Kirim</button></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    #note_one {
        margin-left: 325pt;
        background: lightgreen;
        /* font-style: normal;
        font-family: 'Times New Roman', Times, serif; */

    }

    .btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
</style>