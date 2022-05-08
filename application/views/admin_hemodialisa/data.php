<div>
    <div class="card">
        <?= $this->session->flashdata('pesan'); ?>
        <?php unset($_SESSION['pesan']); ?>
        <?php
        if ($this->session->login_session['role'] == 'admin') { ?>
            <?php foreach ($getCheckboxHD as $cb) : ?>
                <h3 id="card_one" class="card-header" align="center"><b>FORMULIR KREDENSIALING PENGAJUAN <br> PELAYANAN POLI HEMODIALISA UNTUK <br> <?= strtoupper($cb['nama_faskes']) ?> </b></h3>
            <?php endforeach; ?>
        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
            <h3 id="card_one" class="card-header" align="center"><b>FORMULIR PENGAJUAN PELAYANAN POLI HEMODIALISA </b></h3>
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
                        <form method="POST" action="<?= site_url('askk/admin_hemodialisa/addKredensialing') ?>" enctype="multipart/form-data">
                            <?php foreach ($getCheckboxHD as $cb) : ?>
                                <input type="text" name="id_checkbox_hd" hidden="" value="<?= $cb['id_checkbox_hd']; ?>">
                            <?php endforeach; ?>
                        <?php } elseif ($this->session->login_session['role'] == 'faskes') { ?>
                            <form method="POST" action="<?= site_url('askk/admin_hemodialisa/add') ?>" enctype="multipart/form-data">
                                <input type="text" name="id_user" hidden="" value="<?= userdata('id_user'); ?>">
                            <?php } ?>
                            <table border="0" width="100%" class="table table-striped">
                                <thead>
                                </thead>
                                <tbody>
                                    <?php foreach ($getCheckboxHD as $cb) : ?>
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
                                            <td>Nama Pimpinan Faskes</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> value="<?= $cb['pimpinan_faskes']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Alamat </td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> value="<?= $cb['alamat']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>No. Telepon & Email</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> value="<?= $cb['telp_email']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Kepemilikan</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group input-group-sm mb-3">
                                                    <input type="text" class="form-control" <?= $red ?> value="<?= $cb['kepemilikan']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
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
                                        <td width="4%" align="right">a.</td>
                                        <td width="60%">Surat / Aplikasi Permohonan Kerja Sama menjadi Faskes BPJS unit pelayanan HD</td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="a" value="1"> tidak ada <input type="checkbox" name="a" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">b.</td>
                                        <td>Surat Izin Operasional Penyelenggaraan Hemodialisa</td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="b" value="1"> tidak ada <input type="checkbox" name="b" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">c.</td>
                                        <td>Surat Izin Praktik (SIP) tenaga kesehatan yang berpraktik</td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="c" value="1"> tidak ada <input type="checkbox" name="c" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">d.</td>
                                        <td>Salinan SIP Penanggung Jawab Teknis Klinik</td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="d" value="1"> tidak ada <input type="checkbox" name="d" value="0"></td>
                                    </tr>
                                </table>

                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>KOMITMEN</b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right">a.</td>
                                        <td width="60%">Tidak melakukan pungutan biaya tambahan kepada peserta diluar ketentuan yang berlaku</td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="e" value="1"> tidak ada <input type="checkbox" name="e" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">b.</td>
                                        <td>Tidak melakukan diskriminasi terhadap pasien umum ataupun pasien JKN-KIS</td>
                                        <td>:</td>
                                        <td>ada <input type="checkbox" name="f" value="1"> tidak ada <input type="checkbox" name="f" value="0"></td>
                                    </tr>
                                    <tr>
                                        <td align="right">c.</td>
                                        <td>Melaksanakan rujukan berjenjang dan program rujuk balik sesuai dengan ketentuan yang berlaku</td>
                                        <td width="1%">:</td>
                                        <td>ada <input type="checkbox" name="g" value="1"> tidak ada <input type="checkbox" name="g" value="0"></td>
                                    </tr>
                                </table>

                                <tbody>
                                    <tr>
                                        <td align="center" colspan="4"><b>CATATAN</b></td>
                                    </tr>
                                </tbody>
                                <table border="0" width="100%" class="table">
                                    <tr>
                                        <td width="4%" align="right"></td>
                                        <td>Mengacu pada regulasi yang berlaku sebagai berikut:<br>1. PMK No. 812/2010 tentang Penyelenggaraan Pelayanan Dialisis pada Fasilitas Kesehatan<br>2. Regulasi dan peraturan terkait lainnya<br><br>* Izin penyelenggaraan unit pelayanan dialisis melekat dan menjadi bagian dari izin penyelenggaraan RS <br>* Izin penyelenggaraan unit pelayanan dialisis di RS yang merupakan pengembangan pelayanan setelah beroperasinya RS harus terlebih dahulu mendapat izin Dinkes Kab/Kota<br></td>
                                        <td width="1%">:</td>
                                    </tr>
                                    <!-- <tr>
                                        <td colspan="4" align="center">
                                            <h4><b>
                                                    <font size="5">Upload Dokumen Komitmen</font>
                                                </b></h4>
                                        </td>
                                        <td colspan="5">
                                            <div class="upload-btn-wrapper">
                                                <button class="btn" align="center">File</button>
                                                <input type="file" name="dokumenkomitmen" />
                                            </div>
                                            <?= form_error('dokumenkomitmen', '<small class="text-danger">', '</small>'); ?>
                                        </td>
                                    </tr> -->
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
                                            <td align="left" colspan="4" width="70%">
                                                <h4><b>
                                                        <font size="4">A. JENIS PELAYANAN DAN SUMBER DAYA MANUSIA</font>
                                                    </b></h4>
                                            </td>
                                            <td align="center" width="5%" colspan="2"><b>BOBOT (40%)</b></td>
                                            <td width="5%"><b>SKOR</b></td>
                                            <td width="5%"><b>SKOR*BOBOT</b></td>
                                            <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                                        </tr>

                                        <tr>
                                            <td><b>A</b></td>
                                            <td colspan="3"><b>Anggota Tim Hemodialisa</b></td>
                                            <td></td>
                                            <td>
                                                <font color="green"><b>100%</b></font>
                                            </td>
                                            <td colspan="3"></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">a. Supervisor atau pengawas unit dialisis </font><br><b>*Persyaratan : Dokter Konsulen Ginjal Hipertensi (KGH)</b>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai1" value="0" name="a1" onclick="hitung()"> tidak ada
                                                <input type="checkbox" id="nilai2" value="100" name="a1" onclick="hitung()"> ada
                                            </td>
                                            <td></td>
                                            <td align="center">15%</td>
                                            <td align="center"><input type="text" id="skor" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> ada = 100</td>

                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">b. Penanggung jawab unit dialisis </font><br><b>*Persyaratan : Dokter Spesialis Penyakit Dalam <br>*Persyaratan : Dokter Spesialis Penyakit Dalam Konsultan Ginjal Hipertensi
                                                    (KGH) dan atau Dokter Penyakit Dalam bersertifikat pelatihan Hemodialisa dari
                                                    organisasi profesi</b>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai3" value="0" name="a2" onclick="hitung()"> tidak ada
                                                <input type="checkbox" id="nilai4" value="100" name="a2" onclick="hitung()"> ada
                                            </td>
                                            <td></td>
                                            <td align="center">15%</td>
                                            <td align="center"><input type="text" id="skor2" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil2" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> ada = 100</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">c. Dokter Spesialis Ginjal Hipertensi (KGH) selain supervisor atau pengawas</font></b>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai5" value="0" name="a3" onclick="hitung()"> tidak ada
                                                <input type="checkbox" id="nilai6" value="100" name="a3" onclick="hitung()"> ada
                                            </td>
                                            <td></td>
                                            <td align="center">15%</td>
                                            <td align="center"><input type="text" id="skor3" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil3" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> ada = 100</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">d. Dokter Spesialis Penyakit Dalam bersertifikat pelatihan Hemodialisa selain penanggung jawab</font>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai7" value="0" name="a4" onclick="hitung()"> tidak ada <br>
                                                <input type="checkbox" id="nilai8" value="75" name="a4" onclick="hitung()"> 1 orang <br>
                                                <input type="checkbox" id="nilai9" value="100" name="a4" onclick="hitung()"> >1 orang
                                            </td>
                                            <td></td>
                                            <td align="center">15%</td>
                                            <td align="center"><input type="text" id="skor4" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil4" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">e. Perawat mahir hemodialisa </font>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai10" value="0" name="a5" onclick="hitung()"> 1-2 orang <br>
                                                <input type="checkbox" id="nilai11" value="75" name="a5" onclick="hitung()"> 3 orang <br>
                                                <input type="checkbox" id="nilai12" value="100" name="a5" onclick="hitung()"> >3 orang
                                            </td>
                                            <td></td>
                                            <td align="center">10%</td>
                                            <td align="center"><input type="text" id="skor5" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil5" size="1" readonly=""></td>
                                            <td align="center">1-2 orang = 0<br> 3 orang = 75<br> > 3 orang = 100</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">f. Teknisi elektromedik dengan pelatihan khusus mesin dialisis </font>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai13" value="0" name="a6" onclick="hitung()"> tidak ada <br>
                                                <input type="checkbox" id="nilai14" value="75" name="a6" onclick="hitung()"> 1 orang <br>
                                                <input type="checkbox" id="nilai15" value="100" name="a6" onclick="hitung()"> >1 orang
                                            </td>
                                            <td></td>
                                            <td align="center">10%</td>
                                            <td align="center"><input type="text" id="skor6" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil6" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> 1 orang = 75<br> > 1 orang = 100</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">g. Dokter umum dengan sertifikasi HD yang dikeluarkan oleh Pusat pelatihan yang diakui Pernefri </font>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai16" value="0" name="a7" onclick="hitung()"> tidak ada
                                                <input type="checkbox" id="nilai17" value="100" name="a7" onclick="hitung()"> ada
                                            </td>
                                            <td></td>
                                            <td align="center">10%</td>
                                            <td align="center"><input type="text" id="skor7" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil7" size="1" readonly=""></td>
                                            <td align="center">tidak ada = 0<br> ada = 100</td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <font size="4">h. Ratio perawat mahir HD dengan mesin HD </font>
                                            </td>
                                            <td width="20%">
                                                <input type="checkbox" id="nilai18" value="0" name="a8" onclick="hitung()">
                                                < 3 perawat :4 mesin HD <br>
                                                    <input type="checkbox" id="nilai19" value="75" name="a8" onclick="hitung()"> 3 perawat :4 mesin HD <br>
                                                    <input type="checkbox" id="nilai20" value="100" name="a8" onclick="hitung()"> >3 perawat :4 mesin HD
                                            </td>
                                            <td></td>
                                            <td align="center">10%</td>
                                            <td align="center"><input type="text" id="skor8" size="1" readonly=""></td>
                                            <td align="center"><input type="text" id="hasil8" size="1" readonly=""></td>
                                            <td align="center">
                                                < 3 perawat :4 mesin HD=0<br> perawat :4 mesin HD = 75<br> > perawat :4 mesin HD = 100
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center"><b>
                                                    <h4>
                                                        <font size="6">SUB TOTAL SUMBER DAYA MANUSIA</font>
                                                    </h4>
                                                </b></td>
                                            <td align="center">100%</td>
                                            <td></td>
                                            <td></td>
                                            <td align="center"><input type="text" id="total" name="total" size="1"></td>
                                            <td></td>
                                        </tr>

                                        <table border="1" width="100%" class="table table-striped">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                <tr class="table-success">
                                                    <td align="left" colspan="4" width="70%">
                                                        <h4><b>
                                                                <font size="4">B. KELENGKAPAN SARANA DAN PRASARANA (PERALATAN DAN BANGUNAN)</font>
                                                            </b></h4>
                                                    </td>
                                                    <td align="center" width="5%" colspan="2"><b>BOBOT (40%)</b></td>
                                                    <td width="5%"><b>SKOR</b></td>
                                                    <td width="5%"><b>SKOR*BOBOT</b></td>
                                                    <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                                                </tr>

                                                <tr>
                                                    <td width="1%">1.</td>
                                                    <td colspan="3"><b>Bangunan</b></td>
                                                    <td bgcolor="yellow" align="center">15%</td>
                                                    <td>
                                                        <font color="green"><b>100%</b></font>
                                                    </td>
                                                    <td colspan="3"></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">a. Kepemilikan </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai21" value="50" name="a9" onclick="hitung()"> sewa
                                                        <input type="checkbox" id="nilai22" value="100" name="a9" onclick="hitung()"> hak milik
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor9" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil9" size="1" readonly=""></td>
                                                    <td align="center">sewa = 50<br> hak milik = 100</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">b. Ruang Peralatan Mesin HD untuk kapasitas 4 mesin HD </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai23" value="0" name="a10" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai24" value="100" name="a10" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">20%</td>
                                                    <td align="center"><input type="text" id="skor10" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil10" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">c. Ruang Pemeriksaan Dokter/Konsultasi</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai25" value="0" name="a11" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai26" value="100" name="a11" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor11" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil11" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">d. Ruang Tindakan</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai27" value="0" name="a12" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai28" value="100" name="a12" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor12" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil12" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">e. Ruang Perawatan</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai29" value="0" name="a13" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai30" value="100" name="a13" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor13" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil13" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">f. Ruang Sterilisasi</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai31" value="0" name="a14" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai32" value="100" name="a14" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor14" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil14" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">g. Ruang Penyimpanan Obat</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai33" value="0" name="a15" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai34" value="100" name="a15" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor15" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil15" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">h. Ruang Penunjang Medik</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai35" value="0" name="a16" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai36" value="100" name="a16" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor16" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil16" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">i. Ruang pelayanan gawat darurat</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai37" value="0" name="a17" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai38" value="100" name="a17" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">10%</td>
                                                    <td align="center"><input type="text" id="skor17" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil17" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>2</b></td>
                                                    <td colspan="2"><b>Peralatan</b></td>
                                                    <td></td>
                                                    <td bgcolor="yellow">20%</td>
                                                    <td>
                                                        <font color="green"><b>100%</b></font>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">a. 4 (empat) mesin hemodialisis siap pakai </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai39" value="50" name="a18" onclick="hitung()">
                                                        < 4 mesin HD <input type="checkbox" id="nilai40" value="75" name="a18" onclick="hitung()"> 4 mesin HD
                                                            <input type="checkbox" id="nilai41" value="100" name="a18" onclick="hitung()"> >4 mesin HD
                                                    </td>
                                                    <td></td>
                                                    <td align="center">20%</td>
                                                    <td align="center"><input type="text" id="skor18" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil18" size="1" readonly=""></td>
                                                    <td align="center">
                                                        < 4 mesin HD=50<br> 4 mesin HD = 75<br> > 4 mesin HD = 100
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">b. Mesin hemodialisis cadangan </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai42" value="0" name="a19" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai43" value="100" name="a19" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">15%</td>
                                                    <td align="center"><input type="text" id="skor19" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil19" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">c. Peralatan reuse dialiser manual atau otomatik </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai44" value="50" name="a20" onclick="hitung()"> manual
                                                        <input type="checkbox" id="nilai45" value="100" name="a20" onclick="hitung()"> otomatik
                                                    </td>
                                                    <td></td>
                                                    <td align="center">15%</td>
                                                    <td align="center"><input type="text" id="skor20" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil20" size="1" readonly=""></td>
                                                    <td align="center">manual = 50<br> otomatik = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">d. Peralatan sterilisasi alat medis</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai46" value="0" name="a21" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai47" value="100" name="a21" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">15%</td>
                                                    <td align="center"><input type="text" id="skor21" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil21" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">e. Peralatan pengolahan air untuk dialisis yang memenuhi standar </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai48" value="0" name="a22" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai49" value="100" name="a22" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">20%</td>
                                                    <td align="center"><input type="text" id="skor22" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil22" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">f. Sistem pengelolaan limbah</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai50" value="0" name="a23" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai51" value="100" name="a23" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">15%</td>
                                                    <td align="center"><input type="text" id="skor23" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil23" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>3</b></td>
                                                    <td colspan="2"><b>Perlengkapan Penunjang</b></td>
                                                    <td></td>
                                                    <td bgcolor="yellow">10%</td>
                                                    <td>
                                                        <font color="green"><b>100%</b></font>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">a. Kapasitas Ruang pendaftaran </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai52" value="50" name="a24" onclick="hitung()">
                                                        < 50 orang <input type="checkbox" id="nilai53" value="100" name="a24" onclick="hitung()"> > 50 orang
                                                    </td>
                                                    <td></td>
                                                    <td align="center">25%</td>
                                                    <td align="center"><input type="text" id="skor24" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil24" size="1" readonly=""></td>
                                                    <td align="center">
                                                        < 50 orang=50<br> > 50 orang = 100
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">b. Petugas Pengentry tagihan klaim</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai54" value="0" name="a25" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai55" value="100" name="a25" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">25%</td>
                                                    <td align="center"><input type="text" id="skor25" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil25" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">c. Komputer khusus untuk penagihan klaim </td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai56" value="0" name="a26" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai57" value="100" name="a26" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">25%</td>
                                                    <td align="center"><input type="text" id="skor26" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil26" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2">d. Jaringan Internet</td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai58" value="0" name="a27" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai59" value="100" name="a27" onclick="hitung()"> ada
                                                    </td>
                                                    <td></td>
                                                    <td align="center">25%</td>
                                                    <td align="center"><input type="text" id="skor27" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil27" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>4</b></td>
                                                    <td colspan="2"><b>Pelayanan Kefarmasian</b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai60" value="0" name="a28" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai61" value="75" name="a28" onclick="hitung()"> jejaring
                                                        <input type="checkbox" id="nilai62" value="100" name="a28" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">5%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor28" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil28" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br> jejaring = 75 <br> ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>5</b></td>
                                                    <td colspan="2"><b>Apoteker Penanggung Jawab </b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai63" value="50" name="a29" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai64" value="100" name="a29" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">5%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor29" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil29" size="1" readonly=""></td>
                                                    <td align="center">sewa = 50<br>hak milik = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>6</b></td>
                                                    <td colspan="2"><b>Asisten Apoteker </b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai65" value="0" name="a30" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai66" value="100" name="a30" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">5%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor30" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil30" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br>ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>7</b></td>
                                                    <td colspan="2"><b>Obat Hemapo </b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai67" value="0" name="a31" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai68" value="100" name="a31" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">15%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor31" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil31" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br>ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>8</b></td>
                                                    <td colspan="2"><b>Pelayanan Darah <br> Persediaan Darah untuk melakukan tranfusi</b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai69" value="0" name="a32" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai70" value="100" name="a32" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">5%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor32" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil32" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br>ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>9</b></td>
                                                    <td colspan="2"><b>Mempunyai mesin Hemodialisa infeksius (untuk hepatitis B dan atau HIV)</b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai71" value="0" name="a33" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai72" value="100" name="a33" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">15%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor33" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil33" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br>ada = 100</td>
                                                </tr>

                                                <tr>
                                                    <td><b>10</b></td>
                                                    <td colspan="2"><b>Ambulance</b></td>
                                                    <td width="20%">
                                                        <input type="checkbox" id="nilai73" value="0" name="a34" onclick="hitung()"> tidak ada
                                                        <input type="checkbox" id="nilai74" value="100" name="a34" onclick="hitung()"> ada
                                                    </td>
                                                    <td bgcolor="yellow">5%</td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="skor34" size="1" readonly=""></td>
                                                    <td align="center"><input type="text" id="hasil34" size="1" readonly=""></td>
                                                    <td align="center">tidak ada = 0<br>ada = 100</td>
                                                </tr>

                                                <!-- <tr>
                                                    <td colspan="4" align="center">
                                                        <h4><b>
                                                                <font size="5">Upload Dokumen Kelengkapan Sarana Prasarana </font>
                                                            </b></h4>
                                                    </td>
                                                    <td colspan="5">
                                                        <div class="upload-btn-wrapper">
                                                            <button class="btn" align="center">File</button>
                                                            <input type="file" name="dokumensarana" />
                                                        </div>
                                                        <?= form_error('dokumensarana', '<small class="text-danger">', '</small>'); ?>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td colspan="4" align="center"><b>
                                                            <h4>
                                                                <font size="5">SUB TOTAL KELENGKAPAN SARANA DAN PRASARANA (PERALATAN DAN BANGUNAN)</font>
                                                            </h4>
                                                        </b></td>
                                                    <td align="center">100%</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td align="center"><input type="text" id="totalsarana" name="totalsarana" size="1"></td>
                                                    <td></td>
                                                </tr>

                                                <table border="1" width="100%" class="table table-striped">
                                                    <thead>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-success">
                                                            <td align="left" colspan="4" width="70%">
                                                                <h4><b>
                                                                        <font size="4">C. SISTEM</font>
                                                                    </b></h4>
                                                            </td>
                                                            <td align="center" width="5%" colspan="2"><b>BOBOT (10%)</b></td>
                                                            <td width="5%"><b>SKOR</b></td>
                                                            <td width="5%"><b>SKOR*BOBOT</b></td>
                                                            <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td colspan="3"><b>Sistem Hemodialisa</b></td>
                                                            <td></td>
                                                            <td>
                                                                <font color="green"><b>100%</b></font>
                                                            </td>
                                                            <td colspan="3"></td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>1</b></td>
                                                            <td colspan="2"><b>Sistem pemberian informasi pelayanan kepada peserta</b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai75" value="0" name="a35" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai76" value="100" name="a35" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">10%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor35" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil35" size="1" readonly=""></td>
                                                            <td align="center">tidak ada = 0<br> ada = 100</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>2</b></td>
                                                            <td colspan="2"><b>Pelaksanaan permintaan persetujuan atas tindakan yang akan dilakukan (inform consent) kepada peserta atau keluarga</b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai77" value="0" name="a36" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai78" value="100" name="a36" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">10%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor36" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil36" size="1" readonly=""></td>
                                                            <td align="center">tidak ada = 0<br> ada = 100</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>3</b></td>
                                                            <td colspan="2"><b>Melaksanakan pencatatan untuk penyakit-penyakit tertentu dan melaporkan kepada Dinas Kesehatan </b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai79" value="0" name="a37" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai80" value="100" name="a37" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">10%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor37" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil37" size="1" readonly=""></td>
                                                            <td align="center">tidak ada = 0<br> ada = 100</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>4</b></td>
                                                            <td colspan="2"><b>Memiliki peraturan internal Klinik <br> (dipastikan apakah ada mengatur terkait ketentuan penggantian dokter maupun kekosongan pimpinan, pengaturan kerja sama dengan pihak eksternal) </b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai81" value="0" name="a38" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai82" value="100" name="a38" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">25%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor38" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil38" size="1" readonly=""></td>
                                                            <td align="center">tidak ada = 0<br>ada = 100</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>5</b></td>
                                                            <td colspan="2"><b>Memiliki Standar Prosedur Operasional <br> (dipastikan apakah ada mengatur terkait SLA pelayanan medik maupun administrasi)</b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai83" value="0" name="a39" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai84" value="100" name="a39" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">25%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor39" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil39" size="1" readonly=""></td>
                                                            <td align="center">tidak ada = 0<br>ada = 100</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>6</b></td>
                                                            <td colspan="2"><b>Melakukan audit medis internal dilakukan oleh Klinik paling sedikit satu kali dalam setahun</b></td>
                                                            <td width="20%">
                                                                <input type="checkbox" id="nilai85" value="0" name="a40" onclick="hitung()"> tidak ada
                                                                <input type="checkbox" id="nilai86" value="100" name="a40" onclick="hitung()"> ada
                                                            </td>
                                                            <td bgcolor="yellow">20%</td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="skor40" size="1" readonly=""></td>
                                                            <td align="center"><input type="text" id="hasil40" size="1" readonly=""></td>
                                                            <td align="center">tidak dilakukan = 0<br>dilakukan = 100</td>
                                                        </tr>

                                                        <!-- <tr>
                                                            <td colspan="4" align="center">
                                                                <h4><b>
                                                                        <font size="5">Upload Dokumen Pendukung </font>
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

                                                        <tr>
                                                            <td colspan="4" align="center">
                                                                <h4><b>SUB TOTAL SISTEM</b></h4>
                                                            </td>
                                                            <td align="center">100%</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="center"><input type="text" id="totalsistem" name="totalsistem" size="1"></td>
                                                            <td></td>
                                                        </tr>

                                                        <table border="1" width="100%" class="table table-striped">
                                                            <thead>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="table-success">
                                                                    <td align="left" colspan="4" width="70%">
                                                                        <h4><b>
                                                                                <font size="4">D. KELENGKAPAN DAN ADMINISTRASI </font>
                                                                            </b></h4>
                                                                    </td>
                                                                    <td align="center" width="5%" colspan="2"><b>BOBOT (10%)</b></td>
                                                                    <td width="5%"><b>SKOR</b></td>
                                                                    <td width="5%"><b>SKOR*BOBOT</b></td>
                                                                    <td align="center" width="15%"><b>KRITERIA PENILAIAN</b></td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="3"><b>Kelengkapan & Administrasi</b></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <font color="green"><b>100%</b></font>
                                                                    </td>
                                                                    <td colspan="3"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>1</b></td>
                                                                    <td colspan="2"><b>Perlengkapan Administrasi</b></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">a. Ruang Tunggu </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai87" value="50" name="a41" onclick="hitung()">
                                                                        Menampung < 10 orang <input type="checkbox" id="nilai88" value="100" name="a41" onclick="hitung()"> Menampung > 10 orang
                                                                    </td>
                                                                    <td bgcolor="yellow">5%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor41" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil41" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        < 10 orang=50<br> > 10 orang = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">b. Komputer untuk penerbitan SEP </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai89" value="75" name="a42" onclick="hitung()">
                                                                        1 buah <input type="checkbox" id="nilai90" value="100" name="a42" onclick="hitung()"> > 1 buah
                                                                    </td>
                                                                    <td bgcolor="yellow">10%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor42" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil42" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        1 buah = 75<br> > 1 buah = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">c. Komputer khusus untuk penagihan klaim </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai91" value="75" name="a43" onclick="hitung()">
                                                                        1 buah <input type="checkbox" id="nilai92" value="100" name="a43" onclick="hitung()"> > 1 buah
                                                                    </td>
                                                                    <td bgcolor="yellow">10%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor43" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil43" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        1 buah = 75<br> > 1 buah = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">d. Jaringan Internet </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai93" value="75" name="a44" onclick="hitung()">
                                                                        1 buah <input type="checkbox" id="nilai94" value="100" name="a44" onclick="hitung()"> > 1 buah
                                                                    </td>
                                                                    <td bgcolor="yellow">10%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor44" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil44" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        1 buah = 75<br> > 1 buah = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>2</b></td>
                                                                    <td colspan="2"><b>Pelayanan Administrasi</b></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">'- Petugas Pengentry tagihan klaim (INA-CBGs)/ koder </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai95" value="75" name="a45" onclick="hitung()">
                                                                        1 orang <input type="checkbox" id="nilai96" value="100" name="a45" onclick="hitung()"> > 1 orang
                                                                    </td>
                                                                    <td bgcolor="yellow">10%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor45" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil45" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        < 1 orang=75<br> > 1 orang = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan="2">'- Petugas Pengentry dan Pencetak SEP </td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai97" value="75" name="a46" onclick="hitung()">
                                                                        1 orang <input type="checkbox" id="nilai98" value="100" name="a46" onclick="hitung()"> > 1 orang
                                                                    </td>
                                                                    <td bgcolor="yellow">10%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor46" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil46" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        1 orang = 75<br> > 1 orang = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>3</b></td>
                                                                    <td colspan="2"><b>Finger print</b></td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai99" value="0" name="a47" onclick="hitung()">
                                                                        tidak ada <input type="checkbox" id="nilai100" value="100" name="a47" onclick="hitung()"> ada
                                                                    </td>
                                                                    <td bgcolor="yellow">25%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor47" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil47" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        tidak ada 0<br> ada = 100
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>4</b></td>
                                                                    <td colspan="2"><b>Memiliki SOP obat kosong</b></td>
                                                                    <td width="20%">
                                                                        <input type="checkbox" id="nilai101" value="0" name="a48" onclick="hitung()">
                                                                        tidak bersedia <input type="checkbox" id="nilai102" value="100" name="a48" onclick="hitung()"> bersedia
                                                                    </td>
                                                                    <td bgcolor="yellow">20%</td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="skor48" size="1" readonly=""></td>
                                                                    <td align="center"><input type="text" id="hasil48" size="1" readonly=""></td>
                                                                    <td align="center">
                                                                        tidak bersedia = 0<br> bersedia = 100
                                                                    </td>
                                                                </tr>

                                                                <!-- <tr>
                                                                    <td colspan="4" align="center">
                                                                        <h4><b>
                                                                                <font size="5">Upload Dokumen Kelengkapan dan Administrasi </font>
                                                                            </b></h4>
                                                                    </td>
                                                                    <td colspan="5">
                                                                        <div class="upload-btn-wrapper">
                                                                            <button class="btn" align="center">File</button>
                                                                            <input type="file" name="dokumenadm" />
                                                                        </div>
                                                                        <?= form_error('dokumenadm', '<small class="text-danger">', '</small>'); ?>
                                                                    </td>
                                                                </tr> -->

                                                                <tr>
                                                                    <td colspan="4" align="center">
                                                                        <h4><b>SUB TOTAL KELENGKAPAN DAN ADMINISTRASI </b></h4>
                                                                    </td>
                                                                    <td align="center">100%</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td align="center"><input type="text" id="totaladm" name="totaladm" size="1"></td>
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
                                                            </tbody>
                                                    </tbody>
                                            </tbody>
                                    </tbody>
                                </table>
                                </table>
                                </table>
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