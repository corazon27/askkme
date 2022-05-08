<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_kredensialing_kemoterapi extends CI_Controller
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
        $this->load->view('hasil_kredensialing_kemoterapi/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_checkbox_kemo', 'Hasil Kredensialing', 'required|trim');
    }

    public function updatedataCheckboxKM($id)
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
        $tgl = date('ymd');

        $this->admin->updateStatustolakterimaKM($id, $komentar, $penilaian, $tgl);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_kredensialing_kemoterapi');
    }

    public function updateStatuskabid($id)
    {
        $id = $id;
        $komentar   = $this->input->post('komentar');
        $penilaian  = $this->input->post('penilaian2');
        $tgl = date('ymd');

        $this->admin->updateStatustolakterimaKM($id, $komentar, $penilaian, $tgl);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_kredensialing_kemoterapi');
    }

    public function stj($getId = null, $id_tele)
    {
        // $id_tele = '965581589';
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->getCheckboxTeleKemo($getId);
        if ($data['penilaian'] == 'terimakabid') {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['penilaian'] == 'tolakkabid') {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ASKK Poli Kemoterapi telah diterima lengkap: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Nama Poli: " . $data['nama_poli'] . "\n");
        $massages = $massages . urlencode("Tgl Self Assesment: " . $data['tglSelf'] . "\n");
        $massages = $massages . urlencode("Tanggal Kredensialing: " .  $data['tgl'] . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        if ($this->db->affected_rows() > 0) {
            // $id_tele = '965581589';
            sendMessage($id_tele, $massages);
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('askk/Hasil_kredensialing_kemoterapi') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('askk/Hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
    }

    public function tlk($getId = null, $id_tele)
    {
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->getCheckboxTeleKemo($getId);
        if ($data['penilaian'] == 'terimakabid') {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['penilaian'] == 'tolakkabid') {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ASKK Poli Kemoterapi telah ditolak: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Nama Poli: " . $data['nama_poli'] . "\n");
        $massages = $massages . urlencode("Tgl Self Assesment: " . $data['tglSelf'] . "\n");
        $massages = $massages . urlencode("Tanggal Kredensialing: " .  $data['tgl'] . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        if ($this->db->affected_rows() > 0) {
            // $this->fungsi_helper->sendMessage($post['tele'], $massages);
            sendMessage($id_tele, $massages);
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('askk/Hasil_kredensialing_kemoterapi') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('askk/Hasil_kredensialing_kemoterapi') . "'
            </script>";
        }
    }
}
