<div>
    <div class="card">
        <?= $this->session->flashdata('pesan'); ?>
        <?php unset($_SESSION['pesan']); ?>
        <?php
        if ($this->session->login_session['role'] == 'admin') { ?>
            <?php foreach ($getCheckbox as $cb) : ?>
                <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN <br> PELAYANAN POLI KEMOTERAPI UNTUK <br> <?= $cb['nama']; ?> </b></h3>
            <?php endforeach; ?>
        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
            <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN PELAYANAN POLI KEMOTERAPI</b></h3>
        <?php } ?>

        <div class="card-body">
            <div class="card">
                <h3 id="card_two" class="card-header">PERSYARATAN ADMINISTRASI ( KRITERIA MUTLAK )</h3>
                <div class="card-body">
                    <?php
                    if ($this->session->login_session['role'] == 'admin') { ?>
                        <form method="POST" action="<?= site_url('askk/kemoterapi/addKredensialing') ?>" enctype="multipart/form-data">
                            <?php foreach ($getCheckbox as $cb) : ?>
                                <input type="text" name="id_checkbox" hidden="" value="<?= $cb['id_checkbox']; ?>">
                            <?php endforeach; ?>
                        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
                            <form method="POST" action="<?= site_url('askk/kemoterapi/add') ?>" enctype="multipart/form-data">
                                <input type="text" name="id_nama_faskes" hidden="" value="<?= userdata('id_nama_faskes'); ?>">
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
                                                <input type="text" readonly value="<?= userdata('nama_faskes'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                <input type="text" class="form-control" name="nama_pemilik" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                <input type="text" class="form-control" name="alamat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                                <input type="text" class="form-control" name="telp_email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                        <td width="20%">
                                            <input type="checkbox" id="nilai1" value="0" name="a" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai2" value="100" name="a" onclick="hitung()"> ada
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
                                        <td width="20%">
                                            <input type="checkbox" id="nilai3" value="0" name="b" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai4" value="100" name="b" onclick="hitung()"> ada
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
                                        <td width="20%">
                                            <input type="checkbox" id="nilai5" value="0" name="c" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai6" value="100" name="c" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Penyakit Dalam Konsultan Hemato Onkologi, Rekomendasi dari PERHOMPEDIN </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai7" value="0" name="d" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai8" value="100" name="d" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Obgyn Onkologi, Rekomendasi dari HOGI </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai9" value="0" name="e" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai10" value="100" name="e" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Lainnya *), dengan Rekomendasi dari Kolegium </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai11" value="0" name="f" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai12" value="100" name="f" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> SK Tim Onkologi (Onkologi Board) yang ditetapkan oleh Direktur Rumah Sakit </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai13" value="0" name="g" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai14" value="100" name="g" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai15" value="0" name="h" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai16" value="100" name="h" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai17" value="0" name="i" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai18" value="100" name="i" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai19" value="0" name="j" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai20" value="100" name="j" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai21" value="0" name="k" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai22" value="100" name="k" onclick="hitung()"> ada
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
                                    </tr>
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
                                            <input type="checkbox" id="nilai23" value="0" name="l" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai24" value="100" name="l" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai25" value="0" name="m" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai26" value="100" name="m" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi lanjut kemoterapi dari Kolegium atau STR KT dari KKI </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai27" value="0" name="n" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai28" value="100" name="n" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SK Kewenangan Klinis dari Direktur RS </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai29" value="0" name="o" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai30" value="100" name="o" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai31" value="0" name="p" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai32" value="100" name="p" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Perawat (minimal 3) : </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai33" value="0" name="q" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai34" value="100" name="q" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai35" value="0" name="r" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai36" value="100" name="r" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi keperawatan pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai37" value="0" name="s" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai38" value="100" name="s" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai39" value="0" name="t" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai40" value="100" name="t" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Apoteker yang memiliki sertifikat pelayanan kemoterapi (minimal 1) : </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai41" value="0" name="u" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai42" value="100" name="u" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai43" value="0" name="v" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai44" value="100" name="v" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai45" value="0" name="w" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai46" value="100" name="w" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai47" value="0" name="x" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai48" value="100" name="x" onclick="hitung()"> ada
                                        </td>
                                    </tr>

                                    <tr>
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
                                    </tr>
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
                                            <input type="checkbox" id="nilai49" value="0" name="y" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai50" value="100" name="y" onclick="hitung()"> ada
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
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai51" value="0" name="z" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai52" value="100" name="z" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai53" value="0" name="a1" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai54" value="100" name="a1" onclick="hitung()"> ada
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
                                        <td> Ruang Steril (clean room) untuk Peracikan Obat kemoterapi dengan ketentuan : </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai55" value="0" name="a2" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai56" value="100" name="a2" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai57" value="0" name="a3" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai58" value="100" name="a3" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai59" value="0" name="a4" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai60" value="100" name="a4" onclick="hitung()"> ada
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
                                    </tr>
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
                                            <input type="checkbox" id="nilai61" value="0" name="a7" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai62" value="100" name="a7" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai63" value="0" name="a8" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai64" value="100" name="a8" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> b. </td>
                                        <td> sarung tangan terbuat dari latex dan tidak berbedak. Penggunaan harus dua lapis </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai65" value="0" name="a9" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai66" value="100" name="a9" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> c. </td>
                                        <td> kacamata pelindung </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai67" value="0" name="a10" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai68" value="100" name="a10" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"> d. </td>
                                        <td> masker disposible </td>
                                        <td>:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai69" value="0" name="a11" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai70" value="100" name="a11" onclick="hitung()"> ada
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Laminari Air Flow </td>
                                        <td width="1%">:</td>
                                        <td width="20%">
                                            <input type="checkbox" id="nilai71" value="0" name="a12" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai72" value="100" name="a12" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai73" value="0" name="a13" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai74" value="100" name="a13" onclick="hitung()"> ada
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
                                    </tr>
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
                                            <input type="checkbox" id="nilai75" value="0" name="a14" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai76" value="100" name="a14" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai77" value="0" name="a15" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai78" value="100" name="a15" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai79" value="0" name="a16" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai80" value="100" name="a16" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai81" value="0" name="a17" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai82" value="100" name="a17" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai83" value="0" name="a18" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai84" value="100" name="a18" onclick="hitung()"> ada
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
                                            <input type="checkbox" id="nilai85" value="0" name="a19" onclick="hitung()"> tidak ada
                                            <input type="checkbox" id="nilai86" value="100" name="a19" onclick="hitung()"> ada
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
                                    </tr>

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
                            <!-- akhir BAB I -->
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