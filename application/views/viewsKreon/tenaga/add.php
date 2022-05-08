<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Tenaga Medis
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('me/tenaga') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_tenaga_medis">Jenis Faskes</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jenis_tenaga_medis'); ?>" name="jenis_tenaga_medis" id="jenis_tenaga_medis" type="text" class="form-control" placeholder="Jenis Tenaga Medis...">
                        <?= form_error('jenis_tenaga_medis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data?')" class="btn btn-primary">Simpan</button>
                        <button type="reset" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Data?')" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>