<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Jenis Faskes
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('askk/jenis') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_jns_faskes' => $m_jns_faskes['id_jns_faskes']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jns_nama_faskes">Nama Faskes</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jns_nama_faskes', $m_jns_faskes['jns_nama_faskes']); ?>" name="jns_nama_faskes" id="jns_nama_faskes" type="text" class="form-control" placeholder="Nama Faskes...">
                        <?= form_error('jns_nama_faskes', '<small class="text-danger">', '</small>'); ?>
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