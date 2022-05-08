<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Nama Faskes";
        $data['user'] = $this->admin->getuser2();
        // var_dump($cek_user);
        $data['m_nama_faskes'] = $this->admin->getnamaFaskes();
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/nama/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_jns_faskes', 'Nama Faskes', 'required');
    }

    public function add()
    {
        $data['title'] = "Nama Faskes";
        $data['user'] = $this->admin->getuser2();
        $data['m_jns_faskes'] = $this->admin->getjenisFaskes();
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/nama/add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function tambahfaskes()
    {

        $jenis = $this->input->post('id_jns_faskes');
        $id = $this->input->post('id_user');
        $kode = $this->input->post('kode_faskes');
        $nama_faskes = $this->input->post('nama_faskes');
        $id_telegram = $this->input->post('id_telegram');
        $data = array(
            'id_jns_faskes' => $jenis,
            'nama_faskes' => $nama_faskes,
            'id_user' => $id,
            'kode_faskes' => $kode,
            'id_telegram' => $id_telegram,

        );
        $this->admin->addfaskes($data, 'm_nama_faskes');
        set_pesan('data berhasil disimpan');
        redirect('me/nama');
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Nama";
            $data['m_jns_faskes'] = $this->admin->getjenisFaskes();
            $data['m_nama_faskes'] = $this->admin->getnamaFaskes1($id);
            $data['user'] = $this->admin->get('user');
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/nama/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('m_nama_faskes', 'id_nama_faskes', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('me/nama');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/nama/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('m_nama_faskes', 'id_nama_faskes', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/nama');
    }
}
