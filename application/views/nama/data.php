<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Nama Faskes
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('askk/nama/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Nama Faskes
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Jenis Faskes</th>
                        <th>Nama Faskes</th>
                        <th>User</th>
                        <th>Kode Faskes</th>
                        <th>ID Telegram</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group;">
                    <tr>
                        <th>No. </th>
                        <th>Jenis Faskes</th>
                        <th>Nama Faskes</th>
                        <th>User</th>
                        <th>Kode Faskes</th>
                        <th>ID Telegram</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    if ($m_nama_faskes) :
                        foreach ($m_nama_faskes as $b) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['jns_nama_faskes']; ?></td>
                                <td><?= $b['nama_faskes']; ?></td>
                                <td><?= $b['nama']; ?></td>
                                <td><?= $b['kode_faskes']; ?></td>
                                <td><?= $b['id_telegram']; ?></td>
                                <td>
                                    <a href="<?= base_url('askk/nama/edit/') . $b['id_nama_faskes'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit" title="Edit Data"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('askk/nama/delete/') . $b['id_nama_faskes'] ?>" class="btn btn-danger btn-circle btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">
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