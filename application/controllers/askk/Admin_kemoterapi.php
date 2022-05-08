<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kemoterapi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library(array('form_validation'));
        $this->load->model('Admin_model', 'admin');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
    }

    public function index($getId = null)
    {
        $id = encode_php_tags($getId);
        $data['title'] = "Dashboard";
        $data['dataSelfKM'] = $this->admin->getdataSelfKM();
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_kemoterapi/data', $data);
        $this->load->view('templates/footer');
    }


    public function kredensialing($id)
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Dashboard";
            $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
            $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id)->result_array();
            // echo "<pre>";
            // print_r($data['getCheckboxKM']);
            // die;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin_kemoterapi/data', $data);
            $this->load->view('templates/footer');
        }
    }

    public function addKredensialing()
    {
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $totalsemua     = $this->input->post('totalsemua');
        $id_checkbox_kemo    = $this->input->post('id_checkbox_kemo');
        $tgl = date('ymd');
        $dokumen   = $this->input->post('dokumen');
        return $this->admin->updateSkorKM($id_checkbox_kemo, $totalsemua, $tgl, $dokumen);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('askk/hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_kredensialing_kemoterapi/');
    }

    public function cetak($id)
    {
        $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id)->row();
        $date = date('ymd');
        $data['title'] = "Cetak-" . $date;
        $this->load->view('admin_kemoterapi/cetak', $data);
    }

    public function add()
    {
        $id     = "";
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');
        $f     = $this->input->post('f');
        $g     = $this->input->post('g');

        $h     = $this->input->post('h');
        $i     = $this->input->post('i');
        $j     = $this->input->post('j');
        $k     = $this->input->post('k');
        $l     = $this->input->post('l');
        $m     = $this->input->post('m');

        $n     = $this->input->post('n');
        $o     = $this->input->post('o');
        $p     = $this->input->post('p');
        $q     = $this->input->post('q');
        $r     = $this->input->post('r');
        $s     = $this->input->post('s');

        $t     = $this->input->post('t');
        $u     = $this->input->post('u');
        $v     = $this->input->post('v');
        $w     = $this->input->post('w');
        $x     = $this->input->post('x');
        $y     = $this->input->post('y');

        $z      = $this->input->post('z');

        $a1     = $this->input->post('a1');
        $a2     = $this->input->post('a2');
        $a3     = $this->input->post('a3');
        $a4     = $this->input->post('a4');

        // $a5     = $this->input->post('a5');
        // $a6     = $this->input->post('a6');
        $a7     = $this->input->post('a7');
        $a8     = $this->input->post('a8');
        $a9     = $this->input->post('a9');
        $a10     = $this->input->post('a10');
        $a11     = $this->input->post('a11');
        $a12     = $this->input->post('a12');
        $a13     = $this->input->post('a13');
        $a14     = $this->input->post('a14');
        $a15     = $this->input->post('a15');
        $a16     = $this->input->post('a16');
        $a17     = $this->input->post('a17');
        $a18     = $this->input->post('a18');
        $a19     = $this->input->post('a19');

        $tgl = date('ymd');
        $id_user = $this->input->post('id_user');

        $data     = array(
            'id_checkbox_kemo' => $id,

            'id_user' => $id_user, 'tglSelf' => $tgl,
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
            'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m,
            'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s,
            't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'y' => $y,
            'z' => $z,
            'a1' => $a1, 'a2' => $a2,
            'a3' => $a3, 'a4' => $a4,
            'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12, 'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18, 'a19' => $a19,
        );

        $this->admin->adddataSekagusKM($data);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('askk/hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
        redirect('askk/hasil_kredensialing_kemoterapi');
    }

    public function addadmin()
    {
        $id     = "";
        $id_faskes = $this->input->post('id_checkbox_kemo');
        $pemilik = $this->input->post('nama_pemilik');
        $alamat = $this->input->post('alamat');
        $telp_email = $this->input->post('telp_email');
        $id_nama_poli     = '3';
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');
        $f     = $this->input->post('f');
        $g     = $this->input->post('g');

        $h     = $this->input->post('h');
        $i     = $this->input->post('i');
        $j     = $this->input->post('j');
        $k     = $this->input->post('k');
        $l     = $this->input->post('l');
        $m     = $this->input->post('m');

        $n     = $this->input->post('n');
        $o     = $this->input->post('o');
        $p     = $this->input->post('p');
        $q     = $this->input->post('q');
        $r     = $this->input->post('r');
        $s     = $this->input->post('s');

        $t     = $this->input->post('t');
        $u     = $this->input->post('u');
        $v     = $this->input->post('v');
        $w     = $this->input->post('w');
        $x     = $this->input->post('x');
        $y     = $this->input->post('y');

        $z      = $this->input->post('z');

        $a1     = $this->input->post('a1');
        $a2     = $this->input->post('a2');
        $a3     = $this->input->post('a3');
        $a4     = $this->input->post('a4');

        $a7     = $this->input->post('a7');
        $a8     = $this->input->post('a8');
        $a9     = $this->input->post('a9');
        $a10     = $this->input->post('a10');
        $a11     = $this->input->post('a11');
        $a12     = $this->input->post('a12');
        $a13     = $this->input->post('a13');
        $a14     = $this->input->post('a14');
        $a15     = $this->input->post('a15');
        $a16     = $this->input->post('a16');
        $a17     = $this->input->post('a17');
        $a18     = $this->input->post('a18');
        $a19     = $this->input->post('a19');

        $tgl = date('Y-m-d');

        $data     = array(
            'id_admin_checkbox_kemo' => $id, 'id_checkbox_kemo' => $id_faskes, 'nama_pemilik' => $pemilik, 'alamat' => $alamat, 'telp_email' => $telp_email, 'id_nama_poli' => $id_nama_poli,

            'tglSelf' => $tgl,
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
            'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m,
            'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s,
            't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'y' => $y,
            'z' => $z,
            'a1' => $a1, 'a2' => $a2,
            'a3' => $a3, 'a4' => $a4,
            'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12, 'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18, 'a19' => $a19,
        );
        $this->admin->adddataAdminSekagusKM($data);
        $this->admin->updatetglkreden($tgl, $id_faskes);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('askk/hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
        set_pesan('Data Berhasil Disimpan');
        redirect('askk/hasil_kredensialing_kemoterapi');
    }

    public function edit($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['data'] = $this->admin->getCheckboxKM($id)->row();
        // echo "<pre>";
        // print_r($data['data']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_kemoterapi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function editadmin($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['data'] = $this->admin->getCheckboxKMAdmin($id)->row();
        // echo "<pre>";
        // print_r($data['data']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_kemoterapi/edit_admin', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $id    = $id;
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');
        $f     = $this->input->post('f');
        $g     = $this->input->post('g');

        $h     = $this->input->post('h');
        $i     = $this->input->post('i');
        $j     = $this->input->post('j');
        $k     = $this->input->post('k');
        $l     = $this->input->post('l');
        $m     = $this->input->post('m');

        $n     = $this->input->post('n');
        $o     = $this->input->post('o');
        $p     = $this->input->post('p');
        $q     = $this->input->post('q');
        $r     = $this->input->post('r');
        $s     = $this->input->post('s');

        $t     = $this->input->post('t');
        $u     = $this->input->post('u');
        $v     = $this->input->post('v');
        $w     = $this->input->post('w');
        $x     = $this->input->post('x');
        $y     = $this->input->post('y');

        $z      = $this->input->post('z');

        $a1     = $this->input->post('a1');
        $a2     = $this->input->post('a2');
        $a3     = $this->input->post('a3');
        $a4     = $this->input->post('a4');

        // $a5     = $this->input->post('a5');
        // $a6     = $this->input->post('a6');
        $a7     = $this->input->post('a7');
        $a8     = $this->input->post('a8');
        $a9     = $this->input->post('a9');
        $a10     = $this->input->post('a10');
        $a11     = $this->input->post('a11');
        $a12     = $this->input->post('a12');
        $a13     = $this->input->post('a13');
        $a14     = $this->input->post('a14');
        $a15     = $this->input->post('a15');
        $a16     = $this->input->post('a16');
        $a17     = $this->input->post('a17');
        $a18     = $this->input->post('a18');
        $a19     = $this->input->post('a19');

        $tgl = date('ymd');
        $id_user = $this->input->post('id_user');

        $data     = array(

            'id_checkbox_kemo' => $id,
            'id_user' => $id_user, 'tgl' => $tgl,
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,  'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m,
            'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s,
            't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'y' => $y,
            'z' => $z,
            'a1' => $a1, 'a2' => $a2, 'a3' => $a3, 'a4' => $a4,
            'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12,
            'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18,
            'a19' => $a19,
        );

        $this->admin->update('checkbox_kemo', 'id_checkbox_kemo', $id, $data);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('askk/hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
        redirect('askk/hasil_kredensialing_kemoterapi');
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('checkbox_kemo', 'id_checkbox_kemo', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('askk/hasil_kredensialing_kemoterapi');
    }
}
