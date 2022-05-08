<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $poli =  $this->session->login_session['poli'];
        $data['title'] = "Dashboard";
        $data['dataSelf'] = $this->admin->getdataSelf();
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        if (userdata('role') != "admin") {
            $user = userdata('id_nama_faskes');
            $data['totalPengajuan'] = $this->admin->count('checkbox', 'id_nama_faskes', $user);
            $data['user'] = $this->admin->getuser2();
            $data['checkbox2'] = $this->admin->getcheckBox_dashboard();

            if ($poli == 'hemodialisa') {
                $user = userdata('id_nama_faskes');
                $data['totalPengajuan'] = $this->admin->count('checkbox', 'id_nama_faskes', $user);
                $data['user'] = $this->admin->getuser2();
                $data['checkbox2'] = $this->admin->getcheckBoxHD_dashboard();
            } elseif ($poli == 'nyeri') {
                $user = userdata('id_nama_faskes');
                $data['totalPengajuan'] = $this->admin->count('checkbox', 'id_nama_faskes', $user);
                $data['user'] = $this->admin->getuser2();
                $data['checkbox2'] = $this->admin->getcheckBox_dashboard();
            } elseif ($poli == 'kemoterapi') {
                $user = userdata('id_nama_faskes');
                $data['totalPengajuan'] = $this->admin->count('checkbox', 'id_nama_faskes', $user);
                $data['user'] = $this->admin->getuser2();
                $data['checkbox2'] = $this->admin->getcheckBoxKM_dashboard();
            }
        } else {
            if ($poli == 'hemodialisa') {
                $data['totalPengajuan'] = $this->admin->count('checkbox');
                $data['checkbox2'] = $this->admin->getcheckBoxHD_dashboard();
            } elseif ($poli == 'nyeri') {
                $data['totalPengajuan'] = $this->admin->count('checkbox');
                $data['checkbox2'] = $this->admin->getcheckBox_dashboard();
            } elseif ($poli == 'kemoterapi') {
                $data['totalPengajuan'] = $this->admin->count('checkbox');
                $data['checkbox2'] = $this->admin->getcheckBoxKM_dashboard();
            }
        }

        if (userdata('role') != "admin") {
            $user = userdata('id_nama_faskes');
            $data['user'] = $this->admin->getuser2();
        } else {
        }
        $data['user'] = $this->admin->count('user');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
