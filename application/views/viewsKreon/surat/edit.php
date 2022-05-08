<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Tenaga Medis
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('me/surat') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?php unset($_SESSION['pesan']); ?>
                <?= form_open('', [], ['id_nama_surat' => $m_nama_surat['id_nama_surat']]); ?>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_surat">Nama Surat</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_surat', $m_nama_surat['nama_surat']); ?>" name="nama_surat" id="nama_surat" type="text" class="form-control" placeholder="Nama Surat...">
                        <?= form_error('nama_surat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>