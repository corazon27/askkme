<div>
    <div class="card">
        <?= $this->session->flashdata('pesan'); ?>
        <?php unset($_SESSION['pesan']); ?>
        <?php
        if ($this->session->login_session['role'] == 'admin') { ?>
            <?php foreach ($getCheckboxKM as $cb) : ?>
                <h3 id="card_one" class="card-header" align="center"><b>FORMULIR KREDENSIALING PENGAJUAN <br> PELAYANAN POLI KEMOTERAPI UNTUK <br> <?= strtoupper($cb['nama_faskes']) ?> </b></h3>
            <?php endforeach; ?>
        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
            <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN PELAYANAN POLI KEMOTERAPI </b></h3>
        <?php } ?>
        <tr>
            <?php if ($cb['nama_faskes'] != '') {
                $dis = "disabled";
                $red = "readonly";
            } elseif ($cb['nama_faskes'] == '') {
                $dis = "";
                $red = "";
            } ?>
        </tr>

        <div class="card-body">
            <div class="card">
                <h3 id="card_two" class="card-header">I. PERSYARATAN ADMINISTRASI ( KRITERIA MUTLAK )</h3>
                <div class="card-body">
                    <?php
                    if ($this->session->login_session['role'] == 'admin') { ?>
                        <form method="POST" action="<?= site_url('askk/admin_kemoterapi/addadmin') ?>" enctype="multipart/form-data">
                            <?php foreach ($getCheckboxKM as $cb) : ?>
                                <input type="text" name="id_checkbox_kemo" hidden="" value="<?= $cb['id_checkbox_kemo']; ?>">
                            <?php endforeach; ?>
                        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
                            <form method="POST" action="<?= site_url('askk/admin_kemoterapi/add') ?>" enctype="multipart/form-data">
                                <input type="text" name="id_user" hidden="" value="<?= userdata('id_user'); ?>">
                            <?php } ?>
                            <table border="0" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <?php foreach ($getCheckboxKM as $cb) : ?>
                                        <tr>
                                            <td align="center" colspan="4">URAIAN</td>
                                        </tr>
                                        <tr>
                                            <td width="1%" align="center">1.</td>
                                            <td width="30%">Nama Faskes</td>
                                            <td width="1%">:</td>
                                            <td width="68%">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> value="<?= $cb['nama_faskes']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Pemilik Faskes</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> name="nama_pemilik" value="<?= $cb['nama_pemilik']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Alamat </td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> name="alamat" value="<?= $cb['alamat']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>No. Telepon & Email</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> name="telp_email" value="<?= $cb['telp_email']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <h3 id="card_two" class="card-header">I. PERSYARATAN MUTLAK</h3>
                            <div class="card-body">
                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>DOKUMEN PENDUKUNG</b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">1)</td>
                                        <td width="60%"> Surat Permohonan Kerjasama pelayanan kemoterapi kepada BPJS Kesehatan</td>
                                        <td width="1%">:</td>
                                        <td> ada <input type="checkbox" name="a" value="100"> tidak ada <input type="checkbox" name="a" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="b" value="100"> tidak ada <input type="checkbox" name="b" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="c" value="100"> tidak ada <input type="checkbox" name="c" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Penyakit Dalam Konsultan Hemato Onkologi, Rekomendasi dari PERHOMPEDIN </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="d" value="100"> tidak ada <input type="checkbox" name="d" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Obgyn Onkologi, Rekomendasi dari HOGI </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="e" value="100"> tidak ada <input type="checkbox" name="e" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> DPJP Spesialis Lainnya *), dengan Rekomendasi dari Kolegium </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="f" value="100"> tidak ada <input type="checkbox" name="f" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> SK Tim Onkologi (Onkologi Board) yang ditetapkan oleh Direktur Rumah Sakit </td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="g" value="100"> tidak ada <input type="checkbox" name="g" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="h" value="100"> tidak ada <input type="checkbox" name="h" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="i" value="100"> tidak ada <input type="checkbox" name="i" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="j" value="100"> tidak ada <input type="checkbox" name="j" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="k" value="100"> tidak ada <input type="checkbox" name="k" value="0"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <?php if (is_faskes()) : ?>
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
                                    <?php endif; ?>
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
                                        <td> ada <input type="checkbox" name="l" value="100"> tidak ada <input type="checkbox" name="l" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="m" value="100"> tidak ada <input type="checkbox" name="m" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi lanjut kemoterapi dari Kolegium atau STR KT dari KKI </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="n" value="100"> tidak ada <input type="checkbox" name="n" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> SK Kewenangan Klinis dari Direktur RS </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="o" value="100"> tidak ada <input type="checkbox" name="o" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="p" value="100"> tidak ada <input type="checkbox" name="p" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Perawat (minimal 3) : </td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="q" value="100"> tidak ada <input type="checkbox" name="q" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="r" value="100"> tidak ada <input type="checkbox" name="r" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi keperawatan pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="s" value="100"> tidak ada <input type="checkbox" name="s" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="t" value="100"> tidak ada <input type="checkbox" name="t" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">3)</td>
                                        <td> Apoteker yang memiliki sertifikat pelayanan kemoterapi (minimal 1) : </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="u" value="100"> tidak ada <input type="checkbox" name="u" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="v" value="100"> tidak ada <input type="checkbox" name="v" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Sertifikat kompetensi pelayanan kemoterapi yang Sah dan Diakui </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="w" value="100"> tidak ada <input type="checkbox" name="w" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> '- </td>
                                        <td> Status Tenaga Purna Waktu </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="x" value="100"> tidak ada <input type="checkbox" name="x" value="0"></td>
                                    </tr>

                                    <?php if (is_faskes()) : ?>
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
                                    <?php endif; ?>
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
                                        <td> ada <input type="checkbox" name="y" value="100"> tidak ada <input type="checkbox" name="y" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="z" value="100"> tidak ada <input type="checkbox" name="z" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a1" value="100"> tidak ada <input type="checkbox" name="a1" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a2" value="100"> tidak ada <input type="checkbox" name="a2" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a3" value="100"> tidak ada <input type="checkbox" name="a3" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a4" value="100"> tidak ada <input type="checkbox" name="a4" value="0"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <?php if (is_faskes()) : ?>
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
                                    <?php endif; ?>
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
                                        <td> ada <input type="checkbox" name="a7" value="100"> tidak ada <input type="checkbox" name="a7" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a8" value="100"> tidak ada <input type="checkbox" name="a8" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> b. </td>
                                        <td> sarung tangan terbuat dari latex dan tidak berbedak. Penggunaan harus dua lapis </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="a9" value="100"> tidak ada <input type="checkbox" name="a9" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> c. </td>
                                        <td> kacamata pelindung </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="a10" value="100"> tidak ada <input type="checkbox" name="a10" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> d. </td>
                                        <td> masker disposible </td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="a11" value="100"> tidak ada <input type="checkbox" name="a11" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">2)</td>
                                        <td> Laminari Air Flow </td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="a12" value="100"> tidak ada <input type="checkbox" name="a12" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a13" value="100"> tidak ada <input type="checkbox" name="a13" value="0"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <?php if (is_faskes()) : ?>
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
                                    <?php endif; ?>
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
                                        <td> ada <input type="checkbox" name="a14" value="100"> tidak ada <input type="checkbox" name="a14" value="0"></td>
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
                                        <td> ada <input type="checkbox" name="a15" value="100"> tidak ada <input type="checkbox" name="a15" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a16" value="100"> tidak ada <input type="checkbox" name="a16" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a17" value="100"> tidak ada <input type="checkbox" name="a17" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a18" value="100"> tidak ada <input type="checkbox" name="a18" value="0"></td>
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
                                        <td>ada <input type="checkbox" name="a19" value="100"> tidak ada <input type="checkbox" name="a19" value="0"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <font color="green"><b> WAJIB </b></font>
                                        </td>
                                    </tr>
                                    <?php if (is_faskes()) : ?>
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
                                    <?php endif; ?>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-striped">
    <tr>
        <td><button id="note_one" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data dan kirim ? Data tidak bisa dirubah setelah disimpan dan dikirim !?')" class="btn btn-success">Simpan & Kirim</button></td>
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