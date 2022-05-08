<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Poli
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('askk/poli/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Poli
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Jenis Poli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group;">
                    <tr>
                        <th>No. </th>
                        <th>Jenis Poli</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    if ($nama_poli) :
                        foreach ($nama_poli as $s) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $s['nama_poli']; ?></td>
                                <td>
                                    <a href="<?= base_url('askk/poli/edit/') . $s['id_nama_poli'] ?>" class="btn btn-warning btn-circle btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('askk/poli/delete/') . $s['id_nama_poli'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                </td>
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
</div>
</div>