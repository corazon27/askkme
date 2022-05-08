<?= $this->session->flashdata('pesan'); ?>
<?php unset($_SESSION['pesan']); ?>
<div class="card shadow-sm border-bottom-primary ml-3 mr-3">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Tenaga Medis
                </h4>
            </div>
            <?php if (is_admin()) : ?>
                <div class="col-auto">
                    <a href="<?= base_url('me/tenaga/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Tenaga Medis
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Kode Excel</th>
                    <th>Jenis Tenaga Medis</th>
                    <?php if (is_admin()) : ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tfoot style="display: table-header-group;">
                <tr>
                    <th>No. </th>
                    <th>Kode Excel</th>
                    <th>Jenis Tenaga Medis</th>
                    <?php if (is_admin()) : ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                if ($m_jns_tng_mds) :
                    foreach ($m_jns_tng_mds as $t) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $t['id_jns_tng_mds']; ?></td>
                            <td><?= $t['jenis_tenaga_medis']; ?></td>
                            <?php if (is_admin()) : ?>
                                <td>
                                    <a href="<?= base_url('me/tenaga/edit/') . $t['id_jns_tng_mds'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('me/tenaga/delete/') . $t['id_jns_tng_mds'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>