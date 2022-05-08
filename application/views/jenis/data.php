<div class="col-md-auto">
    <?= $this->session->flashdata('pesan'); ?>
    <?php unset($_SESSION['pesan']); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Jenis Faskes
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('askk/jenis/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Jenis Faskes
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
                        <th>Jenis Faskes</th>
                    </tr>
                </thead>
                <tfoot style="display: table-header-group;">
                    <tr>
                        <th>No. </th>
                        <th>Jenis Faskes</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    if ($m_jns_faskes) :
                        foreach ($m_jns_faskes as $j) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $j['jns_nama_faskes']; ?></td>
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