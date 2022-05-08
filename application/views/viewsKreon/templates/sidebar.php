<!-- Page Wrapper -->

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-white sidebar sidebar-light accordion shadow-sm" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex text-white align-items-center bg-primary justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <i class="fas fa-university"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ASKK ME</div>
        </a>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" id="dashboard">
            <a class="nav-link" href="<?= base_url('me/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <div class="sidebar-heading">
            Data Master
        </div>

        <!-- Nav Item - Dashboard -->
        <?php if (is_admin()) : ?>
            <li class="nav-item" id="usermanagement">
                <a class="nav-link pb-0" href="<?= base_url('me/user'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
        <?php endif; ?>


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>ME</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master ME:</h6>
                    <?php if (is_admin()) : ?>
                        <a class="collapse-item" id="namaFaskes" href="<?= base_url('me/nama'); ?>">Nama Faskes</a>
                    <?php endif; ?>
                    <a class="collapse-item" id="jenisFaskes" href="<?= base_url('me/jenis'); ?>">Jenis Faskes</a>
                    <a class="collapse-item" id="jenisTenagaMedis" href="<?= base_url('me/tenaga'); ?>">Jenis Tenaga Medis</a>
                    <a class="collapse-item" id="namaSurat" href="<?= base_url('me/surat'); ?>">Nama Surat</a>
                </div>
            </div>

        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <?php
        $role = userdata('role');
        if ($role == 'faskes') {
            $akses = userdata('jns_nama_faskes');
        }
        if ($role == 'admin' || $akses == 'Rumah Sakit') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Kredensialing Rumah Sakit
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('me/RS_tm'); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Tenaga Medis</span>
                </a>
            </li>
            <li class="nav-item" id="dokrumahSakit">
                <a class="nav-link pb-0" href="<?= base_url('me/RS_dokumen'); ?>">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Dokumen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('me/laporan'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php } ?>

        <?php
        if ($role == 'admin' || $akses == 'Klinik Utama') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Kredensialing Klinik Utama
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dataTenagaMedisKU">
                <a class="nav-link pb-0" href="<?= base_url('me/klinik_tm'); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Tenaga Medis</span>
                </a>
            </li>
            <li class="nav-item" id="dokklinikUtama">
                <a class="nav-link pb-0" href="<?= base_url('me/klinik_dokumen'); ?>">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Dokumen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('me/laporan_klinik'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php } ?>

        <?php
        if ($role == 'admin' || $akses == 'Optik') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Kredensialing Optik
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dataTenagaMedisOptik">
                <a class="nav-link pb-0" href="<?= base_url('me/optik_tm'); ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Tenaga Medis</span>
                </a>
            </li>
            <li class="nav-item" id="dokOptik">
                <a class="nav-link pb-0" href="<?= base_url('me/optik_dokumen'); ?>">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Dokumen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('me/laporan_optik'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        <?php } ?>

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Report
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('laporan'); ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Laporan</span>
            </a>
        </li> -->
        <!-- Divider -->
        <!-- <hr class="sidebar-divider d-none d-md-block"> -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->