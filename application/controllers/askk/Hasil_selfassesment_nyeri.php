<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_selfassesment_nyeri extends CI_Controller
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
        $data['dataSelf'] = $this->admin->getdataSelf();
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $data['title'] = "Dashboard";
        if (userdata('role') != "admin") {
            $data['user'] = $this->admin->getuser2();
            $data['checkbox2'] = $this->admin->getcheckBox_namaFaskes();
        } else {
            // $data['user'] = $this->admin->getuser2();
            $data['checkbox2'] = $this->admin->getcheckBox_namaFaskes();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hasil_assesment_nyeri/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_checkbox', 'Hasil Self Assesment', 'required|trim');
    }

    public function updatedataCheckbox($id)
    {
        $this->admin->updateDataCheckbox($id);
        set_pesan('data berhasil disimpan.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateStatus($id)
    {
        $id = $id;
        $komentar   = $this->input->post('komentar');
        $penilaian  = $this->input->post('penilaian');

        $this->admin->updateStatustolakterima($id, $komentar, $penilaian);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_selfassesment_nyeri');
    }
}
