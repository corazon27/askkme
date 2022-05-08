<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('me/rs_tm') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <p id="note_one" class="note-header font-weight-bold">*Pastikan Anda Sudah Lengkap Dalam Mengisi Data!</p>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?php unset($_SESSION['pesan']); ?>
                    <?= form_open('', [], ['id_kreon_tm' => $kreon_tm['id_kreon_tm']]); ?>
                    <input value="<?= set_value('id_kreon_tm', $kreon_tm['id_kreon_tm']); ?>" name="id_kreon_tm" id="id_kreon_tm" type="hidden" class="form-control" placeholder="Nama Faskes...">
                    <?= form_error('id_kreon_tm', '<small class="text-danger">', '</small>'); ?>

                    <?php if (is_faskes()) { ?>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="id_nama_faskes">Nama Faskes</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="<?= userdata('nama_faskes'); ?>" readonly id="id_nama_faskes" type="text" class="form-control" placeholder="Masukkan Nama Tenaga Medis">
                                        <input value="<?= userdata('id_nama_faskes'); ?>" hidden name="id_nama_faskes" readonly id="id_nama_faskes" type="text" class="form-control" placeholder="Masukkan Nama Tenaga Medis">
                                    </div>
                                </div>
                                <?= form_error('id_nama_faskes', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="id_nama_faskes">Nama Faskes</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select name="id_nama_faskes" id="id_nama_faskes" class="custom-select">
                                        <option value="" selected disabled>Pilih Nama Faskes</option>
                                        <?php foreach ($m_nama_faskes as $nf) : ?>
                                            <option <?= $kreon_tm['id_nama_faskes'] == $nf['id_nama_faskes'] ? 'selected' : ''; ?> <?= set_select('id_nama_faskes', $nf['id_nama_faskes']) ?> value="<?= $nf['id_nama_faskes'] ?>"><?= $nf['nama_faskes'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?= form_error('id_nama_faskes', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_jns_tng_mds">Jenis Tenaga Medis</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_jns_tng_mds" id="id_jns_tng_mds" class="custom-select">
                                    <option value="" selected disabled>Pilih Jenis Tenaga Medis</option>
                                    <?php foreach ($jns as $js) : ?>
                                        <option <?= $kreon_tm['id_jns_tng_mds'] == $js['id_jns_tng_mds'] ? 'selected' : ''; ?> <?= set_select('id_jns_tng_mds', $js['id_jns_tng_mds']) ?> value="<?= $js['id_jns_tng_mds'] ?>"><?= $js['jenis_tenaga_medis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_jns_tng_mds', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama_tng_mds">Nama Tenaga Medis</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nama_tng_mds', $kreon_tm['nama_tng_mds']); ?>" name="nama_tng_mds" id="nama_tng_mds" type="text" class="form-control" placeholder="Nama Tenaga Medis...">
                            <?= form_error('nama_tng_mds', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="jkn_kis">Terdaftar Sebagai Peserta JKN-KIS?</label>
                        <label for="jkn_kis_1" id="jkn1" class="kis1">
                            <?php echo form_radio('jkn_kis', "Ya", set_checkbox('jkn_kis', "Ya", $kreon_tm['jkn_kis'] == 'Ya' ? true : false), "id='jkn_kis_1'"); ?> Ya </label>
                        <label for="jkn_kis_2" id="jkn2" class="kis2">
                            <?php echo form_radio('jkn_kis', "Tidak", set_checkbox('jkn_kis', "Tidak", $kreon_tm['jkn_kis'] == 'Tidak' ? true : false), "id='jkn_kis_2'"); ?> Tidak </label>
                    </div>

                    <p id="note_three" class="note-header font-weight-bold">*Jika mempunyai JKN-KIS, silahkan upload berkas JKN-KIS! Kalau tidak punya kosongi saja kolom upload dokumen JKN-KIS</p>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="">Dokumen Lama JKN-KIS</label>
                        <div class="col-md-9">
                            <input readonly="" type="text" value="<?= set_value('dokumen2', $kreon_tm['dokumen2']); ?>" name="dokumen2" id="dokumen2" class="form-control" placeholder="Dokumen JKN-KIS">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="">Dokumen Baru JKN-KIS</label>
                        <div class="col-md-9">
                            <input type="file" name="editdokumen2" size="20" class="form-control" />
                            <?= form_error('editdokumen2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_nama_surat">Nama Surat</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_nama_surat" id="id_nama_surat" class="custom-select">
                                    <option value="" selected disabled>Pilih Nama Surat</option>
                                    <?php foreach ($nama_surat as $ns) : ?>
                                        <option <?= $kreon_tm['id_nama_surat'] == $ns['id_nama_surat'] ? 'selected' : ''; ?> <?= set_select('id_nama_surat', $ns['id_nama_surat']) ?> value="<?= $ns['id_nama_surat'] ?>"><?= $ns['nama_surat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_nama_faskes', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nomor_surat">Nomor Surat</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nomor_surat', $kreon_tm['nomor_surat']); ?>" name="nomor_surat" id="nomor_surat" type="text" class="form-control" placeholder="Nomor Surat...">
                            <?= form_error('nomor_surat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tmt">TMT</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tmt', $kreon_tm['tmt']); ?>" name="tmt" id="tmt" type="date" class="form-control" placeholder="TMT...">
                            <?= form_error('tmt', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tat">TAT</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tat', $kreon_tm['tat']); ?>" name="tat" id="tat" type="date" class="form-control" placeholder="TAT...">
                            <?= form_error('tat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="sisa_hari">Masa Aktif</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('sisa_hari', $kreon_tm['sisa_hari']); ?>" readonly name="sisa_hari" id="sisa" type="text" class="form-control" placeholder="Sisa Hari...">
                            <?= form_error('sisa_hari', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="">Dokumen Lama</label>
                        <div class="col-md-9">
                            <input readonly="" type="text" value="<?= set_value('dokumen', $kreon_tm['dokumen']); ?>" name="dokumen" id="dokumen" class="form-control" placeholder="dokumen">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="">Dokumen Baru </label>
                        <div class="col-md-9">
                            <input type="file" name="editdokumen" size="20" class="form-control" />
                            <?= form_error('editdokumen', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <p id="note_two" class="note-header font-weight-bold">*Silahkan upload jika dokumen lama anda terjadi kesalahan<br>*Kosongi jika tidak ada kesalahan Upload<br>*Max Ukuran Upload File 5MB (Hanya File PDF & Doc)</p>

                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data?')" class="btn btn-primary">Simpan</button>
                            <button type="reset" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Data?')" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    #jkn1.kis1 {
        margin-left: 20px;
    }

    #jkn2.kis2 {
        margin-left: 20px;
    }

    #note_three.note-header {
        font-size: 12px;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        margin-left: 70pt;
        font-weight: bold;
        line-height: normal;
        color: red;
    }

    #card_one.card-header {
        background-color: #D7ECCE;
        color: #3C763D;
    }

    #card_two.card-header {
        background-color: #3175AF;
        color: white;
    }

    #note_one.note-header {
        font-size: 11px;
        margin-left: 15pt;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        line-height: normal;
        color: red;
    }

    #note_two.note-header {
        font-size: 11px;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        margin-left: 125pt;
        font-weight: bold;
        line-height: normal;
        color: red;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#tat").change(function cari() {
            var tmt = $("#tmt").val();
            var tat = $("#tat").val();
            console.log(tmt);
            console.log(tat);

            var DateDiff = {

                inDays: function(d1, d2) {
                    var t2 = d2.getTime();
                    var t1 = d1.getTime();

                    return parseInt((t2 - t1) / (24 * 3600 * 1000));
                }
            }
            var d1 = new Date(tmt);
            var d2 = new Date(tat);

            var sisa = (DateDiff.inDays(d1, d2)) + " Hari";
            document.getElementById("sisa").value = sisa;
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
    $(".custom-select").select2();
</script>