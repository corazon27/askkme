<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
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
        $data['title'] = "Poli";
        $data['nama_poli'] = $this->admin->get('nama_poli');
        $data['dataSelf'] = $this->admin->getdataSelf();
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('poli/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_poli', 'Nama poli', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "poli";
            $data['dataSelf'] = $this->admin->getdataSelf();
            $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('poli/add', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('nama_poli', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('askk/poli');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('askk/poli/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Poli";
            $data['nama_poli'] = $this->admin->get('nama_poli', ['id_nama_poli' => $id]);
            $data['dataSelf'] = $this->admin->getdataSelf();
            $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('poli/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('nama_poli', 'id_nama_poli', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('askk/poli');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('askk/poli/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('nama_poli', 'id_nama_poli', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('askk/poli');
    }
}
