<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_hemodialisa extends CI_Controller
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
        $this->form_validation->set_rules('transaksi', 'Laporan', 'required|in_list[checkbox_hd]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan Kredensialing Hemodialisa";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/formhd', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = $this->admin->getLaporanKredensialingHemodialisa(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = 'Kredensialing Poli Hemodialisa';

        $pdf = new FPDF();
        $pdf->AddPage('L', 'A4');
        $pdf->Image('assets/img/bpjs2.png', 82, 5, 30);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(290, 7, '', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 20);
        $pdf->Cell(290, 7, 'BPJS KOTA MAGELANG', 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 8);
        $pdf->Cell(290, 7, 'Jl. Jend. Gatot Soebroto No.2, Seneng Satu, Jurangombo Sel., Kec. Magelang Sel., Kota Magelang, Jawa Tengah 56172', 0, 1, 'C');
        $pdf->Line(10, 30, 305, 30);
        $pdf->Ln(10);

        // $pdf->AddPage('P', 'Letter');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(290, 7, 'Laporan ' . ucfirst($table), 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(290, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        $total = 0;
        $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Nama Faskes', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Nama Poli', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Tgl Self Assesment', 1, 0, 'C');
        $pdf->Cell(45, 7, 'Hasil Self Assesment', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Hasil Skor BPJS', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Tgl Kredensialing', 1, 0, 'C');
        $pdf->Cell(40, 7, 'Status Pengajuan', 1, 0, 'C');
        $pdf->Ln();

        $no = 1;
        foreach ($data as $d) {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
            $pdf->Cell(40, 7, $d['nama_faskes'], 1, 0, 'C');
            $pdf->Cell(35, 7, $d['nama_poli'], 1, 0, 'C');
            $pdf->Cell(40, 7, $d['tgl'], 1, 0, 'C');
            $pdf->Cell(45, 7, $d['hasilSkor'], 1, 0, 'C');
            $pdf->Cell(40, 7, $d['hasilBpjs'], 1, 0, 'C');
            $pdf->Cell(35, 7, $d['tgKreon'], 1, 0, 'C');
            if ($d['penilaian'] == 'terimakabid') {
                $pdf->Cell(40, 7, 'Telah Disetujui', 1, 0, 'C');
            } elseif ($d['penilaian'] == 'tolakkabid') {
                $pdf->Cell(40, 7, 'Telah Ditolak', 1, 0, 'C');
            } elseif ($d['status_penilaian'] == 0) {
                $pdf->Cell(40, 7, 'Belum Dinilai', 1, 0, 'C');
            }
            $pdf->Ln();
        }

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
