<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/import_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function dok()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/importdok_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function klinik()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/klinik_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function klinik_dok()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/klinikdok_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function optik()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/optik_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }
    public function optik_dok()
    {
        $data['title'] = "Import";
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/import/optikdok_add', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    public function upload()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['H']);
                $datetat = date_create_from_format("d/m/Y", $row['I']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_jns_tng_mds' => $row['C'],
                        'nama_tng_mds'      => $row['E'],
                        'jkn_kis'      => $row['F'],
                        'id_nama_surat' => $row['D'],
                        'nomor_surat'      => $row['G'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['J'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('kreon_tm', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/');
        }
    }

    public function upload_dok()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/dok');
        } else {

            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['E']);
                $datetat = date_create_from_format("d/m/Y", $row['F']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_nama_surat' => $row['C'],
                        'nomor_surat' => $row['D'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['G'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('kreon_doc', $data);

            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/dok');
        }
    }

    public function upload_klinik()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/klinik');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['H']);
                $datetat = date_create_from_format("d/m/Y", $row['I']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_jns_tng_mds' => $row['C'],
                        'nama_tng_mds'      => $row['E'],
                        'jkn_kis'      => $row['F'],
                        'id_nama_surat' => $row['D'],
                        'nomor_surat'      => $row['G'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['J'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('klinik_tm', $data);

            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/klinik');
        }
    }

    public function upload_klinikdoc()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/klinik_dok');
        } else {

            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['E']);
                $datetat = date_create_from_format("d/m/Y", $row['F']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_nama_surat' => $row['C'],
                        'nomor_surat' => $row['D'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['G'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('klinik_doc', $data);

            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/klinik_dok');
        }
    }
    public function upload_optik()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/optik');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['H']);
                $datetat = date_create_from_format("d/m/Y", $row['I']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_jns_tng_mds' => $row['C'],
                        'nama_tng_mds'      => $row['E'],
                        'jkn_kis'      => $row['F'],
                        'id_nama_surat' => $row['D'],
                        'nomor_surat'      => $row['G'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['J'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('optik_tm', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/optik');
        }
    }

    public function upload_optikdoc()
    {
        $post = $this->input->post(null, TRUE);
        // Load plugin PHPExcel nya
        include APPPATH . 'libraries/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xlx|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('me/import/optik_dok');
        } else {

            $data_upload = $this->upload->data();

            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                $datetgl = date_create_from_format("d/m/Y", $row['B']);
                $datetmt = date_create_from_format("d/m/Y", $row['E']);
                $datetat = date_create_from_format("d/m/Y", $row['F']);
                if ($numrow > 1) {
                    array_push($data, array(
                        'id_nama_faskes' => $row['A'],
                        'tgl' => date_format($datetgl, "Y-m-d"),
                        'id_nama_surat' => $row['C'],
                        'nomor_surat' => $row['D'],
                        'tmt' => date_format($datetmt, "Y-m-d"),
                        'tat' => date_format($datetat, "Y-m-d"),
                        'sisa_hari' => $row['G'],
                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('optik_doc', $data);

            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil ter-Upload!</div>');
            //redirect halaman
            redirect('me/import/optik_dok');
        }
    }
}
