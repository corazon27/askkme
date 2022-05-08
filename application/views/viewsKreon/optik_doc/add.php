<div class="row justify-content-center">
    <div class="col-11">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header">
                <h5 id="card_one" class="card-header font-weight-bold"><i class="fas fa-book"></i><span>Form Input Data Kredensialing Rumah Sakit</span>
                    <h5>
                        <?= $this->session->flashdata('pesan'); ?>
                        <?php unset($_SESSION['pesan']); ?>
                        <form method="POST" action="<?= site_url('me/optik_dokumen/add') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="card">
                                    <h6 id="card_two" class="card-header"><i class="fas fa-clipboard-list"></i></i><span> Input Data Faskes</span> </h6>
                                    <div class="card-body">
                                        <p id="note_one" class="note-header font-weight-bold">*Pastikan Anda Sudah Lengkap Dalam Mengisi Data!</p>
                                        <div class="row form-group">
                                            <?php if ($this->session->login_session['role'] == "faskes") { ?>
                                                <input value="<?= $this->session->login_session['id_nama_faskes']; ?>" name="id_nama_faskes" type="hidden" class="form-control">
                                                <label class="col-md-3 text-md-right" for="id_nama_faskes">Nama Faskes</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input value="<?= userdata('nama_faskes') ?>" readonly class="form-control">
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <label class="col-md-3 text-md-right" for="id_nama_faskes">Nama Faskes</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <select name="id_nama_faskes" id="id_nama_faskes" class="custom-select">
                                                            <option value="" selected disabled>Pilih Nama Faskes</option>
                                                            <?php foreach ($nama_faskes as $nf) : ?>
                                                                <option <?= set_select('id_nama_faskes', $nf['id_nama_faskes']) ?> value="<?= $nf['id_nama_faskes'] ?>"><?= $nf['nama_faskes'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php if (is_admin()) : ?>
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary" href="<?= base_url('me/nama/add'); ?>"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <?= form_error('id_nama_faskes', '<small class="text-danger">', '</small>'); ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="card">
                                            <h6 id="card_two" class="card-header"><i class="fas fa-clipboard-list"></i></i><span> Input Dokumen Kredesialing</span> </h6>
                                            <div class="card-body">
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="tgl">Tanggal Kredensialing</label>
                                                    <div class="col-md-9">
                                                        <input value="<?= set_value('tgl'); ?>" name="tgl" id="tgl" type="date" class="form-control" placeholder="Masukkan tanggal surat">
                                                        <?= form_error('tgl', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="id_nama_surat">Jenis Nama Surat</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="id_nama_surat" id="id_nama_surat" class="custom-select">
                                                                <option value="" selected disabled>Pilih Jenis Nama Surat</option>
                                                                <?php foreach ($nama_surat as $ns) : ?>
                                                                    <option <?= set_select('id_nama_surat', $ns['id_nama_surat']) ?> value="<?= $ns['id_nama_surat'] ?>"><?= $ns['nama_surat'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if (is_admin()) : ?>
                                                                <div class="input-group-append">
                                                                    <a class="btn btn-primary" href="<?= base_url('me/surat/add'); ?>"><i class="fa fa-plus"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?= form_error('id_nama_surat', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="nomor_surat">Nomor Surat</label>
                                                    <div class="col-md-9">
                                                        <input value="<?= set_value('nomor_surat'); ?>" name="nomor_surat" id="nomor_surat" type="text" class="form-control" placeholder="Masukkan nomor surat">
                                                        <?= form_error('nomor_surat', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="tmt">TMT</label>
                                                    <div class="col-md-9">
                                                        <input value="<?= set_value('tmt'); ?>" name="tmt" id="tmt" type="date" class="form-control" placeholder="Masukkan tmt surat">
                                                        <?= form_error('tmt', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="tat">TAT</label>
                                                    <div class="col-md-9">
                                                        <input value="<?= set_value('tat'); ?>" name="tat" id="tat" type="date" class="form-control" placeholder="Masukkan tat surat">
                                                        <?= form_error('tat', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="sisa_hari">Masa Aktif</label>
                                                    <div class="col-md-9">
                                                        <input value="<?= set_value('sisa_hari'); ?>" readonly name="sisa_hari" id="sisa" type="text" class="form-control" placeholder="Masukkan sisa hari">
                                                        <?= form_error('sisa_hari', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <label class="col-md-3 text-md-right" for="">Dokumen</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="dokumen" size="20" class="form-control" />
                                                        <?= form_error('dokumen', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <p id="note_two" class="note-header font-weight-bold">*Max Ukuran Upload File 5MB (Hanya File PDF & Doc)</p>
                                                <div class="row form-group">
                                                    <div class="col-md-9 offset-md-3">
                                                        <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data?')" class="btn btn-primary">Simpan</button>
                                                        <button type="reset" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Data?')" class="btn btn-secondary">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
    <style>
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
            margin-left: 160pt;
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