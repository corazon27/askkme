<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Nama Faskes
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
                <form method="POST" action="<?= base_url('me/nama/tambahfaskes') ?>" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_jns_faskes">Jenis Faskes</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <table>
                                    <select name="id_jns_faskes" id="jns_nama_faskes" class="custom-select">
                                        <option value="" selected disabled>Pilih Jenis Faskes</option>
                                        <?php foreach ($m_jns_faskes as $jf) : ?>
                                            <option <?= set_select('id_jns_faskes', $jf['id_jns_faskes']) ?> value="<?= $jf['id_jns_faskes'] ?>"><?= $jf['jns_nama_faskes'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </table>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('nama/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('id_jenis_faskes', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama_faskes">Nama Faskes</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nama_faskes'); ?>" name="nama_faskes" id="nama_faskes" type="text" class="form-control" placeholder="Nama Faskes...">
                            <?= form_error('nama_faskes', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama_faskes">User</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_user" id="nama" class="custom-select">
                                    <option value="" selected disabled>Pilih User</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option <?= set_select('id_user', $u['id_user']) ?> value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('nama/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('nama_faskes', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="kode_faskes">Kode Faskes</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('kode_faskes'); ?>" name="kode_faskes" id="kode_faskes" type="text" class="form-control" placeholder="Kode Faskes...">
                            <?= form_error('kode_faskes', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_telegram">ID Telegram</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('id_telegram'); ?>" name="id_telegram" id="id_telegram" type="text" class="form-control" placeholder="ID Telegram...">
                            <?= form_error('id_telegram', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data?')" class="btn btn-primary">Simpan</button>
                            <button type="reset" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Data?')" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>