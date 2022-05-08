<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $data['title'] = "Jenis Faskes";
        $data['m_jns_faskes'] = $this->admin->get('m_jns_faskes');
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/jenis/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jns_nama_faskes', 'Nama Faskes', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis Faskes";
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/jenis/add', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('m_jns_faskes', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('me/jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/jenis/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis";
            $data['m_jns_faskes'] = $this->admin->get('m_jns_faskes', ['id_jns_faskes' => $id]);
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/jenis/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('m_jns_faskes', 'id_jns_faskes', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('me/jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/jenis/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('m_jns_faskes', 'id_jns_faskes', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/jenis');
    }
}
