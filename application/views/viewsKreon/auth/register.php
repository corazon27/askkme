<!-- Outer Row -->
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Aplikasi Pengadaan Barang</h1>
                            <span class="text-muted">Buat Akun</span>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <?php unset($_SESSION['pesan']); ?>
                        <?= form_open('', ['class' => 'user']); ?>
                        <div class="form-group">
                            <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="password" name="password2" class="form-control form-control-user" placeholder="Konfirmasi Password">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input value="<?= set_value('nama'); ?>" type="text" name="nama" class="form-control form-control-user" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input value="<?= set_value('email'); ?>" type="text" name="email" class="form-control form-control-user" placeholder="Email">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input value="<?= set_value('no_telp'); ?>" type="text" name="no_telp" class="form-control form-control-user" placeholder="Telepon">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="1" <?= set_value('role') == 1 ? "Selected" : null ?>>Admin</option>
                                        <option value="2" <?= set_value('role') == 2 ? "Selected" : null ?>>Rumah Sakit</option>
                                        <option value="3" <?= set_value('role') == 3 ? "Selected" : null ?>>Klinik Utama</option>
                                        <option value="4" <?= set_value('role') == 4 ? "Selected" : null ?>>Optik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                        <div class="text-center mt-4">
                            <a class="small" href="<?= base_url('auth') ?>">Sudah punya akun? Login</a>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>