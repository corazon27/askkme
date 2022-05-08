<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            <?= userdata('nama'); ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>" alt="" class="img-thumbnail rounded mb-2">
                <a href="<?= base_url('me/profile/setting'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
                <a href="<?= base_url('me/profile/ubahpassword'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Username</th>
                        <td><?= userdata('username'); ?></td>
                    </tr>
                    <?php if (is_faskes()) : ?>
                        <tr>
                            <th width="200">Kode Excel</th>
                            <td><?= userdata('id_nama_faskes'); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Email</th>
                        <td><?= userdata('email'); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?= userdata('no_telp'); ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize"><?= userdata('role'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>