<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_klinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Kreon_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('transaksi', 'Laporan', 'required|in_list[klinik_tm,klinik_doc]');
        $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Laporan Kredensialing Klinik";
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/laporan/formklinik', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $table = $input['transaksi'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'klinik_tm') {
                $query = $this->admin->getLaporanKredensialingKlinik(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } else {
                $query = $this->admin->getLaporanDokumenKlinik(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            }
            $this->_cetak($query, $table, $tanggal);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'klinik_tm' ? 'Kredensialing Tenaga Medis Klinik Utama' : 'Dokumen Kredensialing Klinik Utama';

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

        if ($table_ == 'klinik_tm') :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(35, 7, 'Nama Faskes', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Tanggal Kredensialing', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Jenis Tenaga Medis', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Nama Tenaga Medis', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Nama Surat', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Status Pengajuan', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(35, 7, $d['nama_faskes'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['tgl'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['jenis_tenaga_medis'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['nama_tng_mds'], 1, 0, 'C');
                $pdf->Cell(60, 7, $d['nama_surat'], 1, 0, 'C');
                if ($d['status_penilaian'] == 1) {
                    $pdf->Cell(40, 7, 'Telah Disetujui', 1, 0, 'C');
                } elseif ($d['status_penilaian'] == 2) {
                    $pdf->Cell(40, 7, 'Telah Ditolak', 1, 0, 'C');
                } elseif ($d['status_penilaian'] == 0) {
                    $pdf->Cell(40, 7, 'Menunggu Persetujuan', 1, 0, 'C');
                }
                $pdf->Ln();
            }
        else :
            $pdf->Cell(15, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(50, 7, 'Nama Faskes', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Tanggal Kredensialing', 1, 0, 'C');
            $pdf->Cell(65, 7, 'Nama Surat', 1, 0, 'C');
            $pdf->Cell(45, 7, 'Nomor Surat', 1, 0, 'C');
            $pdf->Cell(40, 7, 'Status Pengajuan', 1, 0, 'C');
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(15, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(50, 7, $d['nama_faskes'], 1, 0, 'C');
                $pdf->Cell(60, 7, $d['tgl'], 1, 0, 'C');
                $pdf->Cell(65, 7, $d['nama_surat'], 1, 0, 'C');
                $pdf->Cell(45, 7, $d['nomor_surat'], 1, 0, 'C');
                if ($d['status_penilaian'] == 1) {
                    $pdf->Cell(40, 7, 'Telah Disetujui', 1, 0, 'C');
                } elseif ($d['status_penilaian'] == 2) {
                    $pdf->Cell(40, 7, 'Telah Ditolak', 1, 0, 'C');
                } elseif ($d['status_penilaian'] == 0) {
                    $pdf->Cell(40, 7, 'Menunggu Persetujuan', 1, 0, 'C');
                }
                $pdf->Ln();
            }
        endif;
        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
