<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_kredensialing_hemodialisa extends CI_Controller
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
        $data['dataSelfHD'] = $this->admin->getdataSelfHD();
        $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
        $data['title'] = "Dashboard";
        if (userdata('role') != "admin") {
            $data['user'] = $this->admin->getuser2();
            $data['checkbox_hd2'] = $this->admin->getcheckBoxHD_namaFaskes();
        } else {
            // $data['user'] = $this->admin->getuser2();
            $data['checkbox_hd2'] = $this->admin->getcheckBoxHD_namaFaskes();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hasil_kredensialing_hemodialisa/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('id_checkbox_hd', 'Hasil Kredensialing', 'required|trim');
    }

    public function updatedataCheckboxHD($id)
    {
        $this->admin->updateDataCheckboxHD($id);
        set_pesan('data berhasil disimpan.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateStatus($id)
    {
        $id = $id;
        $komentar   = $this->input->post('komentar');
        $penilaian  = $this->input->post('penilaian');

        $this->admin->updateStatustolakterimaHD($id, $komentar, $penilaian);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_kredensialing_hemodialisa');
    }

    public function updateStatuskabid($id)
    {
        $id = $id;
        $komentar   = $this->input->post('komentar');
        $penilaian  = $this->input->post('penilaian2');

        $this->admin->updateStatustolakterimaHD($id, $komentar, $penilaian);
        set_pesan('data berhasil disimpan.');
        redirect('askk/Hasil_kredensialing_hemodialisa');
    }

    public function stj($getId = null, $id_tele)
    {
        // $id_tele = '965581589';
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->getCheckboxTeleHD($getId);
        if ($data['penilaian'] == 'terimakabid') {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['penilaian'] == 'tolakkabid') {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ASKK Poli Hemodialisa telah diterima lengkap: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Nama Poli: " . $data['nama_poli'] . "\n");
        $massages = $massages . urlencode("Tgl Self Assesment: " . $data['tglSelf'] . "\n");
        $massages = $massages . urlencode("Hasil Skor Assesment: " . $data['hasilSkor'] . "\n");
        $massages = $massages . urlencode("Hasil Penghitungan BPJS: " .  $data['hasilBpjs'] . "\n");
        $massages = $massages . urlencode("Tanggal Kredensialing: " .  $data['tgKreon'] . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        if ($this->db->affected_rows() > 0) {
            // $id_tele = '965581589';
            sendMessage($id_tele, $massages);
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('askk/Hasil_kredensialing_hemodialisa') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('askk/Hasil_kredensialing_hemodialisa') . "'
            </script>";
        }
    }

    public function tlk($getId = null, $id_tele)
    {
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->getCheckboxTeleHD($getId);
        if ($data['penilaian'] == 'terimakabid') {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['penilaian'] == 'tolakkabid') {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ASKK Poli Hemodialisa telah ditolak lengkap: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Nama Poli: " . $data['nama_poli'] . "\n");
        $massages = $massages . urlencode("Tgl Self Assesment: " . $data['tglSelf'] . "\n");
        $massages = $massages . urlencode("Hasil Skor Assesment: " . $data['hasilSkor'] . "\n");
        $massages = $massages . urlencode("Hasil Penghitungan BPJS: " .  $data['hasilBpjs'] . "\n");
        $massages = $massages . urlencode("Tanggal Kredensialing: " .  $data['tgKreon'] . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        if ($this->db->affected_rows() > 0) {
            // $this->fungsi_helper->sendMessage($post['tele'], $massages);
            sendMessage($id_tele, $massages);
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('askk/Hasil_kredensialing_hemodialisa') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('askk/Hasil_kredensialing_hemodialisa') . "'
            </script>";
        }
    }
}
