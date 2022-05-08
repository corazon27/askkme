<?php $this->session->unset_userdata("page");
$params = array(
    'page' => "Import Data"
);
$this->session->set_userdata($params);
?>
<div class="row">
    <div class="col-auto ml-3 mb-4">
        <a href="<?= base_url('me/klinik_dokumen') ?>" class="btn btn-sm btn-secondary btn-icon-split">
            <span class="icon">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">
                Kembali
            </span>
        </a>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <?php echo $this->session->flashdata('notif') ?>
            <form method="POST" action="<?= site_url('me/import/upload_klinikdoc') ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1">UNGGAH FILE EXCEL</label>
                    <input type="file" name="userfile" class="form-control" required>
                </div>

                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin menyimpan data?')" class="btn btn-primary ml-3">Upload</button>
                <button type="reset" onclick="return confirm('Apakah Anda Yakin Ingin Mereset Data?')" class="btn btn-secondary ml-2">Reset</button>
            </form>
        </div>
    </div>
</div>