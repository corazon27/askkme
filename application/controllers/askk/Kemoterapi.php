<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kemoterapi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
    }

    private function _validasi()
    {

        $this->form_validation->set_rules('nama_pemilik', 'kolom kosong', 'required');
        $this->form_validation->set_rules('dokumenpendukung', 'Dokumen', 'callback_validate_pdf');
        $this->form_validation->set_rules('dokumenpendukungsdm', 'Dokumen', 'callback_validate_pdf_dokumenpendukungsdm');
        $this->form_validation->set_rules('dokumenpendukungruang', 'Dokumen', 'callback_validate_pdf_dokumenpendukungruang');
        $this->form_validation->set_rules('dokumenpendukungperalatan', 'Dokumen', 'callback_validate_pdf_dokumenpendukungperalatan');
        $this->form_validation->set_rules('dokumenperlengkapanpenunjang', 'Dokumen', 'callback_validate_pdf_dokumenperlengkapanpenunjang');
    }

    public function validate_pdf()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenpendukung'])) || $_FILES['dokumenpendukung']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenpendukung']) && $_FILES['dokumenpendukung']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenpendukung"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenpendukung']['type'];
            if (filesize($_FILES['dokumenpendukung']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenpendukungsdm()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenpendukungsdm'])) || $_FILES['dokumenpendukungsdm']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenpendukungsdm']) && $_FILES['dokumenpendukungsdm']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenpendukungsdm"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenpendukungsdm']['type'];
            if (filesize($_FILES['dokumenpendukungsdm']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenpendukungruang()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenpendukungruang'])) || $_FILES['dokumenpendukungruang']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenpendukungruang']) && $_FILES['dokumenpendukungruang']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenpendukungruang"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenpendukungruang']['type'];
            if (filesize($_FILES['dokumenpendukungruang']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenpendukungperalatan()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenpendukungperalatan'])) || $_FILES['dokumenpendukungperalatan']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenpendukungperalatan']) && $_FILES['dokumenpendukungperalatan']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenpendukungperalatan"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenpendukungperalatan']['type'];
            if (filesize($_FILES['dokumenpendukungperalatan']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenperlengkapanpenunjang()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenperlengkapanpenunjang'])) || $_FILES['dokumenperlengkapanpenunjang']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenperlengkapanpenunjang']) && $_FILES['dokumenperlengkapanpenunjang']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenperlengkapanpenunjang"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenperlengkapanpenunjang']['type'];
            if (filesize($_FILES['dokumenperlengkapanpenunjang']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function index($getId = null)
    {
        $id = encode_php_tags($getId);

        $data['title'] = "Dashboard";
        $data['dataSelfKM'] = $this->admin->getdataSelfKM();
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kemoterapi/data', $data);
        $this->load->view('templates/footer');
    }

    public function kredensialing($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kemoterapi/data', $data);
        $this->load->view('templates/footer');
    }

    public function addKredensialing()
    {
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $totalsemua     = $this->input->post('totalsemua');
        $id_checkbox_kemo    = $this->input->post('id_checkbox_kemo');
        $tgl = date('ymd');
        return $this->admin->updateSkorKM($id_checkbox_kemo, $totalsemua, $tgl);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.loztion='" . site_url('kemoterapi') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_kemoterapi');
    }

    public function cetak($id)
    {
        $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id)->result_array();
        $date = date('ymd');
        $data['title'] = "Cetak-" . $date;
        $this->load->view('kemoterapi/cetak', $data);
    }

    public function add($getId = null)
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $id = encode_php_tags($getId);

            $data['title'] = "Dashboard";
            $data['dataSelfKM'] = $this->admin->getdataSelfKM();
            $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
            $data['getCheckboxKM'] = $this->admin->getCheckboxKM($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kemoterapi/data', $data);
            $this->load->view('templates/footer');
        } else {
            $id     = "";
            $pemilik = $this->input->post('nama_pemilik');
            $alamat = $this->input->post('alamat');
            $telp_email = $this->input->post('telp_email');
            $id_nama_poli     = '3';
            $a     = $this->input->post('a');
            $b     = $this->input->post('b');
            $c     = $this->input->post('c');
            $d     = $this->input->post('d');
            $e     = $this->input->post('e');
            $f     = $this->input->post('f');
            $g     = $this->input->post('g');

            $h     = $this->input->post('h');
            $i     = $this->input->post('i');
            $j     = $this->input->post('j');
            $k     = $this->input->post('k');
            $l     = $this->input->post('l');
            $m     = $this->input->post('m');

            $n     = $this->input->post('n');
            $o     = $this->input->post('o');
            $p     = $this->input->post('p');
            $q     = $this->input->post('q');
            $r     = $this->input->post('r');
            $s     = $this->input->post('s');

            $t     = $this->input->post('t');
            $u     = $this->input->post('u');
            $v     = $this->input->post('v');
            $w     = $this->input->post('w');
            $x     = $this->input->post('x');
            $y     = $this->input->post('y');

            $z      = $this->input->post('z');

            $a1     = $this->input->post('a1');
            $a2     = $this->input->post('a2');
            $a3     = $this->input->post('a3');
            $a4     = $this->input->post('a4');

            $a7     = $this->input->post('a7');
            $a8     = $this->input->post('a8');
            $a9     = $this->input->post('a9');
            $a10     = $this->input->post('a10');
            $a11     = $this->input->post('a11');
            $a12     = $this->input->post('a12');
            $a13     = $this->input->post('a13');
            $a14     = $this->input->post('a14');
            $a15     = $this->input->post('a15');
            $a16     = $this->input->post('a16');
            $a17     = $this->input->post('a17');
            $a18     = $this->input->post('a18');
            $a19     = $this->input->post('a19');

            $tgl = date('Y-m-d');
            $id_nama_faskes = $this->input->post('id_nama_faskes');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenpendukung');
            $dokumenpendukung = $this->upload->data('file_name');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenpendukungsdm');
            $dokumenpendukungsdm = $this->upload->data('file_name');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenpendukungruang');
            $dokumenpendukungruang = $this->upload->data('file_name');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenpendukungperalatan');
            $dokumenpendukungperalatan = $this->upload->data('file_name');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenperlengkapanpenunjang');
            $dokumenperlengkapanpenunjang = $this->upload->data('file_name');

            $data     = array(
                'id_checkbox_kemo' => $id, 'nama_pemilik' => $pemilik, 'alamat' => $alamat, 'telp_email' => $telp_email, 'id_nama_poli' => $id_nama_poli,

                'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl,
                'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
                'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m,
                'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s,
                't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'y' => $y,
                'z' => $z,
                'a1' => $a1, 'a2' => $a2,
                'a3' => $a3, 'a4' => $a4,
                'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12, 'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18, 'a19' => $a19,
                'dokumenpendukung' => $dokumenpendukung, 'dokumenpendukungsdm' => $dokumenpendukungsdm, 'dokumenpendukungruang' => $dokumenpendukungruang, 'dokumenpendukungperalatan' => $dokumenpendukungperalatan, 'dokumenperlengkapanpenunjang' => $dokumenperlengkapanpenunjang,
            );
            $this->admin->adddataSekagusKM($data);
            // $this->admin->update('checkbox_kemo', 'id_checkbox_kemo', $id, $data);
            // if ($this->db->affected_rows() > 0) {
            //     echo "<script>alert('Data Berhasil Disimpan');
            //     window.loztion='" . site_url('kemoterapi') . "'
            //     </script>";
            // }
            set_pesan('data berhasil disimpan.');
            redirect('askk/hasil_selfassesment_kemoterapi');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiKM'] = $this->admin->statusSelfNotifikasiKM();
        $data['data'] = $this->admin->getSekagusKM($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin_kemoterapi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $id    = $id;
        $pemilik = $this->input->post('nama_pemilik');
        $alamat = $this->input->post('alamat');
        $telp_email = $this->input->post('telp_email');
        $id_nama_poli     = $this->input->post('id_nama_poli');
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');
        $f     = $this->input->post('f');
        $g     = $this->input->post('g');

        $h     = $this->input->post('h');
        $i     = $this->input->post('i');
        $j     = $this->input->post('j');
        $k     = $this->input->post('k');
        $l     = $this->input->post('l');
        $m     = $this->input->post('m');

        $n     = $this->input->post('n');
        $o     = $this->input->post('o');
        $p     = $this->input->post('p');
        $q     = $this->input->post('q');
        $r     = $this->input->post('r');
        $s     = $this->input->post('s');

        $t     = $this->input->post('t');
        $u     = $this->input->post('u');
        $v     = $this->input->post('v');
        $w     = $this->input->post('w');
        $x     = $this->input->post('x');
        $y     = $this->input->post('y');

        $z      = $this->input->post('z');

        $a1     = $this->input->post('a1');
        $a2     = $this->input->post('a2');
        $a3     = $this->input->post('a3');
        $a4     = $this->input->post('a4');

        $a5     = $this->input->post('a5');
        $a6     = $this->input->post('a6');
        $a7     = $this->input->post('a7');
        $a8     = $this->input->post('a8');
        $a9     = $this->input->post('a9');
        $a10     = $this->input->post('a10');
        $a11     = $this->input->post('a11');
        $a12     = $this->input->post('a12');
        $a13     = $this->input->post('a13');
        $a14     = $this->input->post('a14');
        $a15     = $this->input->post('a15');
        $a16     = $this->input->post('a16');
        $a17     = $this->input->post('a17');
        $a18     = $this->input->post('a18');
        $a19     = $this->input->post('a19');
        $dokumen_lama     = $this->input->post('dokumen_old');
        $dokumen_baru = @$_FILES['dokumen_new']['name'];

        $tgl = date('ymd');
        $id_nama_faskes = $this->input->post('id_nama_faskes');

        if ($dokumen_baru == null) {
            $dokumen_upload = $dokumen_lama;
        } else {
            $config['upload_path']          = './upload/sekagus/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumen_new');
            $dokumen_upload = $this->upload->data('file_name');
        }

        $data     = array(
            'id_checkbox_kemo' => $id, 'nama_pemilik' => $pemilik, 'alamat' => $alamat, 'telp_email' => $telp_email, 'id_nama_poli' => $id_nama_poli,

            'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl,
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
            'h' => $h, 'i' => $i, 'j' => $j, 'k' => $k, 'l' => $l, 'm' => $m,
            'n' => $n, 'o' => $o, 'p' => $p, 'q' => $q, 'r' => $r, 's' => $s,
            't' => $t, 'u' => $u, 'v' => $v, 'w' => $w, 'x' => $x, 'y' => $y,
            'z' => $z,
            'a1' => $a1, 'a2' => $a2, 'a3' => $a3, 'a4' => $a4,
            'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12, 'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18, 'a19' => $a19,
            'dokumen' => $dokumen_upload,
        );
        $this->admin->update('checkbox_kemo', 'id_checkbox_kemo', $id, $data);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.loztion='" . site_url('askk/hasil_selfassesment_kemoterapi') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_kemoterapi');
    }
}
