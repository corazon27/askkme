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
        $data['dataSelf'] = $this->admin->getdataSelf();
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        // $this->load->model('Jenis_model');
        // $data = array(
        //     'list_data'    => $this->Jenis_model->getData()
        // );
        // $this->load->view('import_excel.php', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jenis/data', $data);
        $this->load->view('templates/footer');
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
            $data['dataSelf'] = $this->admin->getdataSelf();
            $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenis/add', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('m_jns_faskes', $input);
            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('askk/jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('askk/jenis/add');
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
            $data['dataSelf'] = $this->admin->getdataSelf();
            $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenis/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('m_jns_faskes', 'id_jns_faskes', $id, $input);
            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('askk/jenis');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('askk/jenis/add');
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
        redirect('askk/jenis');
    }
}
