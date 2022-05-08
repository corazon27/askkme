<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Ubah Password
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?php unset($_SESSION['pesan']); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password_lama">Password Lama</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('password_lama'); ?>" name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama...">
                        <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password_baru">Password Baru</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('password_baru'); ?>" name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru..." onkeyup="return passwordChanged();">
                        <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                        <span id="strength"><small><i>Harus terdiri dari : Simbol, Huruf kecil-besar, dan Angka</i></small></span>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="konfirmasi_password">Konfirmasi Password</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('konfirmasi_password'); ?>" name="konfirmasi_password" id="konfirmasi_password" type="password" class="form-control" placeholder="Konfirmasi Password..." onkeyup="return passwordChanged2();">
                        <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                        <span id="strength2"><small><i>Harus terdiri dari : Simbol, Huruf kecil-besar, dan Angka</i></small></span>
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
<script language="javascript">
    function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{7,}).*", "g");
        var pwd = document.getElementById("password_baru");
        if (pwd.value.length == 0) {
            strength.innerHTML = 'Type Password';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:red">8 Karakter, Huruf Besar, Angka & Simbol</span>';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Kuat..!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Biasa..!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Lemah..!</span>';
        }
    }

    function passwordChanged2() {
        var strength2 = document.getElementById('strength2');
        var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{7,}).*", "g");
        var pwd = document.getElementById("konfirmasi_password");
        if (pwd.value.length == 0) {
            strength2.innerHTML = 'Type Password';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:red">8 Karakter, Huruf Besar, Angka & Simbol</span>';
        } else if (strongRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:green">Kuat..!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength2.innerHTML = '<span style="color:orange">Biasa..!</span>';
        } else {
            strength2.innerHTML = '<span style="color:red">Lemah..!</span>';
        }
    }
</script>