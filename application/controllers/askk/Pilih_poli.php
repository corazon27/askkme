<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilih_poli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login_askk();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Pilih Poli";
        $this->load->view('pilihpoli/data', $data);
    }

    public function aksi()
    {
        if ($this->session->login_session_askk['role'] == 'admin') {
            $poli    = $this->input->post('poli');
            $username = $this->session->login_session_askk['id'];
            $user_db = $this->auth->userdata($username);
            $userdata = [
                'user'  => $user_db['id_user'],
                'role'  => $user_db['role'],
                'timestamp' => time(),
                'poli'  => $poli
            ];
            $this->session->set_userdata('login_session', $userdata);
            set_pesan('Login Berhasil');
            redirect('askk/dashboard');
            set_pesan('Berhasil Login.');
        } else {
            $username = $this->session->login_session_askk['id'];
            $user_db = $this->auth->userdata($username);
            $faskes_db = $this->auth->faskesdata($user_db['id_user']);
            $poli    = $this->input->post('poli');
            $userdata = [
                'id_nama_faskes' => $faskes_db['id_nama_faskes'],
                'nama_faskes'  => $faskes_db['nama_faskes'],
                'kode_faskes'  => $faskes_db['kode_faskes'],
                'nama'  => $faskes_db['nama'],
                'role'  => $faskes_db['role'],
                'poli'  => $poli
            ];
            $this->session->set_userdata('login_session', $userdata);
            set_pesan('Login Berhasil');
            redirect('askk/dashboard');
            set_pesan('Berhasil Login.');
        }
    }
}
