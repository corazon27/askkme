<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenaga extends CI_Controller
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
        $data['title'] = "Tenaga Medis";
        $data['m_jns_tng_mds'] = $this->admin->get('m_jns_tng_mds');
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/tenaga/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('jenis_tenaga_medis', 'Jenis Tenaga Medis', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tenaga Medis";
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/tenaga/add', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('m_jns_tng_mds', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('kreon/tenaga');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kreon/tenaga/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tenaga Medis";
            $data['m_jns_tng_mds'] = $this->admin->get('m_jns_tng_mds', ['id_jns_tng_mds' => $id]);
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/tenaga/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('m_jns_tng_mds', 'id_jns_tng_mds', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('me/tenaga');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/tenaga/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('m_jns_tng_mds', 'id_jns_tng_mds', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/tenaga');
    }
}
