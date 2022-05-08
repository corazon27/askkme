<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
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
        $data['title'] = "Surat";
        $data['m_nama_surat'] = $this->admin->get('m_nama_surat');
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/surat/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Surat";
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/surat/add', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('m_nama_surat', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('me/surat');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/surat/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Surat";
            $data['m_nama_surat'] = $this->admin->get('m_nama_surat', ['id_nama_surat' => $id]);
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/surat/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('m_nama_surat', 'id_nama_surat', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('me/surat');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/surat/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('m_nama_surat', 'id_nama_surat', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/surat');
    }
}
