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
                        <a href="<?= base_url('me/nama') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_jns_faskes' => $m_nama_faskes['id_jns_faskes']]); ?>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_jns_faskes">Jenis Faskes</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="id_jns_faskes" id="id_jns_faskes" class="custom-select">
                                <option value="" selected disabled>Pilih Nama Faskes</option>
                                <?php foreach ($m_jns_faskes as $ns) : ?>
                                    <option <?= $m_nama_faskes['id_jns_faskes'] == $ns['id_jns_faskes'] ? 'selected' : ''; ?> <?= set_select('id_jns_faskes', $ns['id_jns_faskes']) ?> value="<?= $ns['id_jns_faskes'] ?>"><?= $ns['jns_nama_faskes'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('id_jns_faskes', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_faskes">Nama Faskes</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_faskes', $m_nama_faskes['nama_faskes']); ?>" name="nama_faskes" id="nama_faskes" type="text" class="form-control" placeholder="Nama Faskes...">
                        <?= form_error('nama_faskes', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_user">User</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="id_user" id="id_user" class="custom-select">
                                <option value="" selected disabled>Pilih Nama Faskes</option>
                                <?php foreach ($user as $us) : ?>
                                    <option <?= $m_nama_faskes['id_user'] == $us['id_user'] ? 'selected' : ''; ?> <?= set_select('id_user', $us['id_user']) ?> value="<?= $us['id_user'] ?>"><?= $us['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_faskes">Kode Faskes</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('kode_faskes', $m_nama_faskes['kode_faskes']); ?>" name="kode_faskes" id="kode_faskes" type="text" class="form-control" placeholder="Nama Faskes...">
                        <?= form_error('kode_faskes', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_telegram">ID Telegram</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_telegram', $m_nama_faskes['id_telegram']); ?>" name="id_telegram" id="id_telegram" type="text" class="form-control" placeholder="Nama Faskes...">
                        <?= form_error('id_telegram', '<small class="text-danger">', '</small>'); ?>
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