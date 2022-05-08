<!-- Outer Row -->
<div class="row justify-content-center mt-3 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Aplikasi <?= $aplikasi; ?></h1>
                                <span class="text-muted">Login</span>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                            <?php unset($_SESSION['pesan']); ?>
                            <?= form_open('', ['class' => 'user']); ?>
                            <div class="form-group">
                                <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $captcha ?>
                                <?= form_error('g-recaptcha-response', '<small class="text-danger">', '</small>'); ?>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>

                            <div class="text-center">
                                <a id="forgot-password" class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                            </div>
                            <!-- <p id="note_one" class="note-header">*Kreon Adalah Aplikasi Bantu Untuk FKRTL Dalam Melakukan Pengajuan Layanan Baru</p> -->
                            <!-- <div class="text-center mt-4">
                                <a class="small" href="<?= base_url('register') ?>">Buat Akun!</a>
                            </div> -->
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #note_one.note-header {
        font-size: 12px;
        margin-top: 8pt;
        margin-left: 9pt;
        font-style: normal;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        line-height: normal;
        color: red;
    }
</style>

<style>
    #forgot-password.small {
        margin-bottom: 50px;
        font-size: medium;
    }
</style>