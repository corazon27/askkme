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

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('askk/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <?php if (is_admin()) : ?>
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/user'); ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="#sub-item-1" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>ASKK</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master ASKK:</h6>
                        <a class="collapse-item" href="<?= base_url('askk/jenis'); ?>">Jenis Faskes</a>
                        <a class="collapse-item" href="<?= base_url('askk/nama'); ?>">Nama Faskes</a>
                        <a class="collapse-item" href="<?= base_url('askk/poli'); ?>">Jenis Poli</a>
                        <!-- <a class="collapse-item" href="<?= base_url('tenaga'); ?>">Jenis Tenaga Medis</a>
                        <a class="collapse-item" href="<?= base_url('surat'); ?>">Nama Surat</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($this->session->login_session['poli'] == 'nyeri') : ?>
                <div class="sidebar-heading">
                    Kredensialing Poli Nyeri
                </div>

                <!-- Nav Item - Dashboard -->
                <!--  <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/kredensialing'); ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Krendensialing</span>
                </a>
            </li> -->
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_kredensialing_nyeri'); ?>">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Hasil Penilaian PLB</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/laporan'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider mb-3 mt-3">
            <?php endif; ?>

            <!-- Heading -->
            <?php if ($this->session->login_session['poli'] == 'hemodialisa') : ?>
                <div class="sidebar-heading">
                    Kredensialing Poli Hemodialisa
                </div>

                <!-- Nav Item - Dashboard -->
                <!--  <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/kredensialing'); ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Krendensialing</span>
                </a>
            </li> -->
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_kredensialing_hemodialisa'); ?>">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Hasil Penilaian PLB</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/laporan_hemodialisa'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block mb-3 mt-3">
            <?php endif; ?>

            <!-- Heading -->
            <?php if ($this->session->login_session['poli'] == 'kemoterapi') : ?>
                <div class="sidebar-heading">
                    Kredensialing Poli Kemoterapi
                </div>

                <!-- Nav Item - Dashboard -->
                <!--  <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/kredensialing'); ?>">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Krendensialing</span>
                </a>
            </li> -->
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_kredensialing_kemoterapi'); ?>">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span>Hasil Penilaian PLB</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="<?= base_url('askk/laporan_kemo'); ?>">
                        <i class="fas fa-fw fa-print"></i>
                        <span>Cetak Laporan</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block mb-3 mt-3">
            <?php endif; ?>
        <?php endif; ?>
        <!-- Heading -->
        <!--  <div class="sidebar-heading">
            Poli
        </div>
 -->
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed " href="#sub-item-2" data-toggle="collapse" data-target="#collapseMasterBerkas" aria-expanded="true" aria-controls="collapseMaster">
                <i class="fas fa-fw fa-file-archive"></i>
                <span>Berkas Pengajuan</span>
            </a>
            <div id="collapseMasterBerkas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master Berkas Pengajuan:</h6>
                    <a class="collapse-item" href="<?= base_url('askk/berkas_poli'); ?>">Dokumen Sarana dan <br> Prasarana</a>
                </div>
            </div>
        </li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->


        <!-- Heading -->
        <?php if (is_faskes() && $this->session->login_session['poli'] == 'nyeri') : ?>
            <div class="sidebar-heading">
                Assesment Poli nyeri
            </div>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/nyeri'); ?>">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_selfassesment_nyeri'); ?>">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Hasil Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/laporan'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block mb-3 mt-3">
        <?php endif; ?>

        <?php if (is_faskes() && $this->session->login_session['poli'] == 'hemodialisa') : ?>
            <!-- HEMODIALISA -->
            <div class="sidebar-heading">
                Assesment Poli Hemodialisa
            </div>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/hemodialisa'); ?>">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_selfassesment_hemodialisa'); ?>">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Hasil Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/laporan_hemodialisa'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block mb-3 mt-3">
        <?php endif; ?>

        <?php if (is_faskes() && $this->session->login_session['poli'] == 'kemoterapi') : ?>
            <!-- KEMOTERAPI -->
            <div class="sidebar-heading">
                Assesment Poli Kemoterapi
            </div>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/kemoterapi'); ?>">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                    <span>Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/Hasil_selfassesment_kemoterapi'); ?>">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Hasil Self Assessment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('askk/laporan_kemo'); ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block mb-3 mt-3">
        <?php endif; ?>


        <!-- <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('kreon_dokumen'); ?>">
                <i class="fas fa-fw fa-download"></i>
                <span>Dokumen</span>
            </a>
        </li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Kredensialing Klinik Utama
        </div> -->

        <!-- Nav Item - Dashboard -->
        <!-- <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('klinik_tm'); ?>">
                <i class="fas fa-fw fa-download"></i>
                <span>Data Tenaga Medis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('klinik_dokumen'); ?>">
                <i class="fas fa-fw fa-download"></i>
                <span>Dokumen</span>
            </a>
        </li> -->


        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Kredensialing Optik
        </div> -->

        <!-- Nav Item - Dashboard -->
        <!-- <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('optik_tm'); ?>">
                <i class="fas fa-fw fa-download"></i>
                <span>Data Tenaga Medis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('optik_dokumen'); ?>">
                <i class="fas fa-fw fa-download"></i>
                <span>Dokumen</span>
            </a>
        </li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

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


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar