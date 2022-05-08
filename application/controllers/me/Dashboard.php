<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Kreon_model');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        // $data['barang'] = $this->admin->count('barang');
        // $data['barang_masuk'] = $this->admin->count('barang_masuk');
        // $data['barang_keluar'] = $this->admin->count('barang_keluar');
        // $data['supplier'] = $this->admin->count('supplier');
        $data['user'] = $this->admin->count('user');

        // dashboard kreon tenaga medis
        $data['j'] = $this->admin->count('kreon_tm');
        if (userdata('role') == 'admin') {
            $array =  $data['kreon_tm2'] = $this->Kreon_model->getKreonTenagaMedis_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['kreon_tm2'] = $this->Kreon_model->getKreonTenagaMedis_namaSurat(userdata('nama_faskes'));
        }
        $jlh = count($data['kreon_tm2']);
        $data['n'] = [['id_kreon_tm' => null, 'id_nama_faskes' => null, 'id_jns_tng_mds' => null, 'nama_tng_mds' => 'tidak ada data', 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'jenis_tenaga_medis' => null, 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['kreon_tm2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['n'][$i]);
            } else {
                $data['n'][$i] = $array[$i];
            }
        }

        if (userdata('role') == 'admin') {
            $data['kreon_tm'] = $this->Kreon_model->dash_rstm();
        } elseif (userdata('role') == 'faskes') {
            $data['kreon_tm'] = $this->Kreon_model->dash_rstm(userdata('nama_faskes'));
        }

        //dashboard rs dokumen
        $data['a'] = $this->admin->count('kreon_doc');
        if (userdata('role') == 'admin') {
            $array =  $data['kreon_doc2'] = $this->Kreon_model->getKreonDoc_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['kreon_doc2'] = $this->Kreon_model->getKreonDoc_namaSurat(userdata('nama_faskes'));
        }
        // $array =  $data['kreon_doc2'] = $this->Kreon_model->getKreonDoc_namaSurat();
        $jlh = count($data['kreon_doc2']);
        $data['b'] = [['id_kreon_doc' => null, 'id_nama_faskes' => null, 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['kreon_doc2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['b'][$i]);
            } else {
                $data['b'][$i] = $array[$i];
            }
        }
        if (userdata('role') == 'admin') {
            $data['kreon_doc'] = $this->Kreon_model->dash_rsdoc();
        } elseif (userdata('role') == 'faskes') {
            $data['kreon_doc'] = $this->Kreon_model->dash_rsdoc(userdata('nama_faskes'));
        }


        // dashboard klinik tenaga medis
        $data['c'] = $this->admin->count('klinik_tm');
        if (userdata('role') == 'admin') {
            $array =  $data['klinik_tm2'] = $this->Kreon_model->getklinikTenagaMedis_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['klinik_tm2'] = $this->Kreon_model->getklinikTenagaMedis_namaSurat(userdata('nama_faskes'));
        }
        $jlh = count($data['klinik_tm2']);
        $data['d'] = [['id_kreon_tm' => null, 'id_nama_faskes' => null, 'id_jns_tng_mds' => null, 'nama_tng_mds' => 'tidak ada data', 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'jenis_tenaga_medis' => null, 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['klinik_tm2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['d'][$i]);
            } else {
                $data['d'][$i] = $array[$i];
            }
        }

        if (userdata('role') == 'admin') {
            $data['klinik_tm'] = $this->Kreon_model->dash_kliniktm();
        } elseif (userdata('role') == 'faskes') {
            $data['klinik_tm'] = $this->Kreon_model->dash_kliniktm(userdata('nama_faskes'));
        }


        //dashboard klinik dokumen
        $data['e'] = $this->admin->count('klinik_doc');
        if (userdata('role') == 'admin') {
            $array =  $data['klinik_doc2'] = $this->Kreon_model->getKlinikDoc_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['klinik_doc2'] = $this->Kreon_model->getKlinikDoc_namaSurat(userdata('nama_faskes'));
        }
        $jlh = count($data['klinik_doc2']);
        $data['f'] = [['id_klinik_doc' => null, 'id_nama_faskes' => null, 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['klinik_doc2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['f'][$i]);
            } else {
                $data['f'][$i] = $array[$i];
            }
        }

        if (userdata('role') == 'admin') {
            $data['klinik_doc'] = $this->Kreon_model->dash_klinikdoc();
        } elseif (userdata('role') == 'faskes') {
            $data['klinik_doc'] = $this->Kreon_model->dash_klinikdoc(userdata('nama_faskes'));
        }

        // dashboard optik tenaga medis
        $data['g'] = $this->admin->count('optik_tm');
        if (userdata('role') == 'admin') {
            $array =  $data['optik_tm2'] = $this->Kreon_model->getoptikTenagaMedis_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['optik_tm2'] = $this->Kreon_model->getoptikTenagaMedis_namaSurat(userdata('nama_faskes'));
        }
        $jlh = count($data['optik_tm2']);
        $data['h'] = [['id_optik_tm' => null, 'id_nama_faskes' => null, 'id_jns_tng_mds' => null, 'nama_tng_mds' => 'tidak ada data', 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'jenis_tenaga_medis' => null, 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['optik_tm2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['h'][$i]);
            } else {
                $data['h'][$i] = $array[$i];
            }
        }

        if (userdata('role') == 'admin') {
            $data['optik_tm'] = $this->Kreon_model->dash_optiktm();
        } elseif (userdata('role') == 'faskes') {
            $data['optik_tm'] = $this->Kreon_model->dash_optiktm(userdata('nama_faskes'));
        }

        //dashboard optik dokumen
        $data['i'] = $this->admin->count('optik_doc');
        if (userdata('role') == 'admin') {
            $array =  $data['optik_doc2'] = $this->Kreon_model->getoptikDoc_namaSurat();
        } elseif (userdata('role') == 'faskes') {
            $array =  $data['optik_doc2'] = $this->Kreon_model->getoptikDoc_namaSurat(userdata('nama_faskes'));
        }
        $jlh = count($data['optik_doc2']);
        $data['k'] = [['id_optik_doc' => null, 'id_nama_faskes' => null, 'id_nama_surat' => null, 'nomor_surat' => null, 'tmt' => null, 'tat' => null, 'sisa_hari' => null, 'dokumen' => null, 'nama_surat' => 'tidak ada data', 'nama_faskes' => null, 'id_jns_faskes' => null, 'kode_faskes' => null, 'id_user' => null, 'jns_nama_faskes' => null, '0' => null,]];
        for ($i = 0; $i < $jlh; $i++) {
            $sekarang_hari = date('Ymd');
            $c = null;
            $tat = $data['optik_doc2'][$i]['tat'];
            $sekarang = new DateTime($sekarang_hari);
            $masa_akif = new DateTime($tat);
            $hasil = $masa_akif->diff($sekarang)->days;
            array_push($array[$i], $hasil);
            if ($array[$i][0] >= 90) {
                unset($data['k'][$i]);
            } else {
                $data['k'][$i] = $array[$i];
            }
        }

        if (userdata('role') == 'admin') {
            $data['optik_doc'] = $this->Kreon_model->dash_optikdoc();
        } elseif (userdata('role') == 'faskes') {
            $data['optik_doc'] = $this->Kreon_model->dash_optikdoc(userdata('nama_faskes'));
        }

        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/templates/dashboard', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
}
