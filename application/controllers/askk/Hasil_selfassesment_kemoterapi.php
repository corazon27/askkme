<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_selfassesment_kemoterapi extends CI_Controller
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
        $data['dataSelfKM'] = $this->admin->getdataSelfKM();
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['title'] = "Dashboard";
        if (userdata('role') != "admin") {
            $data['user'] = $this->admin->getuser2();
            $data['checkbox_kemo2'] = $this->admin->getcheckBoxKM_namaFaskes();
        } else {
            // $data['user'] = $this->admin->getuser2();
            $data['checkbox_kemo2'] = $this->admin->getcheckBoxKM_namaFaskes();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hasil_assesment_kemoterapi/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_checkbox', 'Hasil Self Assesment', 'required|trim');
    }

    public function updateDataCheckboxKM($id)
    {
        $this->admin->updateDataCheckboxKM($id);
        set_pesan('data berhasil disimpan.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateStatus($id)
    {
        $id = $id;
        $komentar   = $this->input->post('komentar');
        $penilaian  = $this->input->post('penilaian');

        $this->admin->updateStatustolakterimaKM($id, $komentar, $penilaian);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_selfassesment_kemoterapi');
    }
}
