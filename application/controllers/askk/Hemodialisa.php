<?php
defined('BASEPATH') or exit('No direct script a15ess allowed');

class Hemodialisa extends CI_Controller
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

        $this->form_validation->set_rules('pimpinan_faskes', 'Kolom Kosong', 'required');
        $this->form_validation->set_rules('dokumenkomitmen', 'Dokumen', 'callback_validate_pdf');
        $this->form_validation->set_rules('dokumensarana', 'Dokumen', 'callback_validate_pdf_dokumensarana');
        $this->form_validation->set_rules('dokumenpendukung', 'Dokumen', 'callback_validate_pdf_dokumenpendukung');
        $this->form_validation->set_rules('dokumenadm', 'Dokumen', 'callback_validate_pdf_dokumenadministrasi');
    }

    public function validate_pdf()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenkomitmen'])) || $_FILES['dokumenkomitmen']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'dokumenkomitmen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenkomitmen']) && $_FILES['dokumenkomitmen']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenkomitmen"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenkomitmen']['type'];
            if (filesize($_FILES['dokumenkomitmen']['tmp_name']) > 5097152) {
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

    public function validate_pdf_dokumensarana()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumensarana'])) || $_FILES['dokumensarana']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf_dokumensarana', 'dokumensarana Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumensarana']) && $_FILES['dokumensarana']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumensarana"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumensarana']['type'];
            if (filesize($_FILES['dokumensarana']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf_dokumensarana', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf_dokumensarana', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenpendukung()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenpendukung'])) || $_FILES['dokumenpendukung']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf_dokumenpendukung', 'dokumenpendukung Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenpendukung']) && $_FILES['dokumenpendukung']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenpendukung"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenpendukung']['type'];
            if (filesize($_FILES['dokumenpendukung']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf_dokumenpendukung', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf_dokumenpendukung', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function validate_pdf_dokumenadministrasi()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumenadm'])) || $_FILES['dokumenadm']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf_dokumenadministrasi', 'dokumenadm Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumenadm']) && $_FILES['dokumenadm']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumenadm"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumenadm']['type'];
            if (filesize($_FILES['dokumenadm']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf_dokumenadministrasi', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf_dokumenadministrasi', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function index($getId = null)
    {
        $id = encode_php_tags($getId);

        $data['title'] = "Dashboard";
        $data['dataSelfHD'] = $this->admin->getdataSelfHD();
        $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
        $data['getCheckboxHD'] = $this->admin->getCheckboxHD($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hemodialisa/data', $data);
        $this->load->view('templates/footer');
    }

    public function kredensialing($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
        $data['getCheckboxHD'] = $this->admin->getCheckboxHD($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hemodialisa/data', $data);
        $this->load->view('templates/footer');
    }

    public function addKredensialing()
    {
        $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
        $totalsemua     = $this->input->post('totalsemua');
        $id_checkbox_hd    = $this->input->post('id_checkbox_hd');
        $tgl = date('ymd');
        return $this->admin->updateSkorHD($id_checkbox_hd, $totalsemua, $tgl);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.loa19tion='" . site_url('hemodialisa') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_hemodialisa');
    }

    public function cetak($id)
    {
        $data['getCheckboxHD'] = $this->admin->getCheckboxHD($id);
        $date = date('ymd');
        $data['title'] = "Cetak-" . $date;
        $this->load->view('hemodialisa/cetak', $data);
    }

    public function add($getId = null)
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $id = encode_php_tags($getId);

            $data['title'] = "Dashboard";
            $data['dataSelfHD'] = $this->admin->getdataSelfHD();
            $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
            $data['getCheckboxHD'] = $this->admin->getCheckboxHD($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hemodialisa/data', $data);
            $this->load->view('templates/footer');
        } else {
            $id     = "";
            $pimpinan = $this->input->post('pimpinan_faskes');
            $alamat = $this->input->post('alamat');
            $telp_email = $this->input->post('telp_email');
            $kepemilikan = $this->input->post('kepemilikan');
            $totalsemua     = $this->input->post('totalsemua');
            $id_nama_poli     = '2';
            $a     = $this->input->post('a');
            $b     = $this->input->post('b');
            $c     = $this->input->post('c');
            $d     = $this->input->post('d');
            $e     = $this->input->post('e');
            $f     = $this->input->post('f');
            $g     = $this->input->post('g');

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

            $a19      = $this->input->post('a19');

            $a20     = $this->input->post('a20');
            $a21     = $this->input->post('a21');
            $a22     = $this->input->post('a22');
            $a23     = $this->input->post('a23');

            $a24     = $this->input->post('a24');
            $a25     = $this->input->post('a25');
            $a26     = $this->input->post('a26');
            $a27     = $this->input->post('a27');
            $a28     = $this->input->post('a28');
            $a29     = $this->input->post('a29');
            $a30     = $this->input->post('a30');
            $a31     = $this->input->post('a31');
            $a32     = $this->input->post('a32');
            $a33     = $this->input->post('a33');
            $a34     = $this->input->post('a34');
            $a35     = $this->input->post('a35');
            $a36     = $this->input->post('a36');
            $a37     = $this->input->post('a37');
            $a38     = $this->input->post('a38');
            $a39     = $this->input->post('a39');
            $a40     = $this->input->post('a40');

            $a41     = $this->input->post('a41');
            $a42     = $this->input->post('a42');
            $a43     = $this->input->post('a43');
            $a44     = $this->input->post('a44');
            $a45     = $this->input->post('a45');
            $a46     = $this->input->post('a46');
            $a47     = $this->input->post('a47');
            $a48     = $this->input->post('a48');

            $tgl = date('Y-m-d');
            $id_nama_faskes = $this->input->post('id_nama_faskes');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumenkomitmen');
            $dokumenkomitmen = $this->upload->data('file_name');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumensarana');
            $dokumensarana = $this->upload->data('file_name');

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
            $this->upload->do_upload('dokumenadm');
            $dokumenadm = $this->upload->data('file_name');

            $data     = array(
                'id_checkbox_hd' => $id, 'pimpinan_faskes' => $pimpinan, 'alamat' => $alamat, 'telp_email' => $telp_email, 'kepemilikan' => $kepemilikan,  'id_nama_poli' => $id_nama_poli,

                'hasilSkor' => $totalsemua, 'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl,
                'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
                'a1' => $a1, 'a2' => $a2, 'a3' => $a3, 'a4' => $a4, 'a5' => $a5, 'a6' => $a6,
                'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12,
                'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18,
                'a19' => $a19,
                'a20' => $a20, 'a21' => $a21, 'a22' => $a22, 'a23' => $a23,
                'a24' => $a24, 'a25' => $a25, 'a26' => $a26, 'a27' => $a27, 'a28' => $a28, 'a29' => $a29, 'a30' => $a30, 'a31' => $a31, 'a32' => $a32, 'a33' => $a33, 'a34' => $a34, 'a35' => $a35, 'a36' => $a36, 'a37' => $a37, 'a38' => $a38, 'a39' => $a39, 'a40' => $a40,
                'a41' => $a41, 'a42' => $a42, 'a43' => $a43, 'a44' => $a44, 'a45' => $a45, 'a46' => $a46, 'a47' => $a47, 'a48' => $a48,
                'dokumenkomitmen' => $dokumenkomitmen, 'dokumensarana' => $dokumensarana, 'dokumenpendukung' => $dokumenpendukung, 'dokumenadm' => $dokumenadm,
            );
            $this->admin->adddataSekagusHD($data);
            // $this->admin->update('checkbox_hd', 'id_checkbox_hd', $id, $data);
            // if ($this->db->affected_rows() > 0) {
            //     echo "<script>alert('Data Berhasil Disimpan');
            //     window.loa19tion='" . site_url('hemodialisa') . "'
            //     </script>";
            // }
            set_pesan('data berhasil disimpan.');
            redirect('askk/hasil_selfassesment_hemodialisa');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasiHD'] = $this->admin->statusSelfNotifikasiHD();
        $data['data'] = $this->admin->getSekagusHD($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hemodialisa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $id    = $id;
        $pimpinan = $this->input->post('pimpinan_faskes');
        $alamat = $this->input->post('alamat');
        $telp_email = $this->input->post('telp_email');
        $kepemilikan = $this->input->post('kepemilikan');
        $totalsemua     = $this->input->post('totalsemua');
        $id_nama_poli     = '2';
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');
        $f     = $this->input->post('f');
        $g     = $this->input->post('g');

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

        $a19      = $this->input->post('a19');

        $a20     = $this->input->post('a20');
        $a21     = $this->input->post('a21');
        $a22     = $this->input->post('a22');
        $a23     = $this->input->post('a23');

        $a24     = $this->input->post('a24');
        $a25     = $this->input->post('a25');
        $a26     = $this->input->post('a26');
        $a27     = $this->input->post('a27');
        $a28     = $this->input->post('a28');
        $a29     = $this->input->post('a29');
        $a30     = $this->input->post('a30');
        $a31     = $this->input->post('a31');
        $a32     = $this->input->post('a32');
        $a33     = $this->input->post('a33');
        $a34     = $this->input->post('a34');
        $a35     = $this->input->post('a35');
        $a36     = $this->input->post('a36');
        $a37     = $this->input->post('a37');
        $a38     = $this->input->post('a38');
        $a39     = $this->input->post('a39');
        $a40     = $this->input->post('a40');

        $a41     = $this->input->post('a41');
        $a42     = $this->input->post('a42');
        $a43     = $this->input->post('a43');
        $a44     = $this->input->post('a44');
        $a45     = $this->input->post('a45');
        $a46     = $this->input->post('a46');
        $a47     = $this->input->post('a47');
        $a48     = $this->input->post('a48');

        $dokumen_lama     = $this->input->post('dokumen_old');
        $dokumen_baru = @$_FILES['dokumen_new']['name'];

        $tgl = date('ymd');
        $id_nama_faskes = $this->input->post('id_nama_faskes');
        $totalsemua     = $this->input->post('totalsemua');


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
            'id_checkbox_hd' => $id, 'pimpinan_faskes' => $pimpinan, 'alamat' => $alamat, 'telp_email' => $telp_email, 'kepemilikan' => $kepemilikan,  'id_nama_poli' => $id_nama_poli,

            'hasilSkor' => $totalsemua, 'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl,
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g,
            'a1' => $a1, 'a2' => $a2, 'a3' => $a3, 'a4' => $a4, 'a5' => $a5, 'a6' => $a6,
            'a7' => $a7, 'a8' => $a8, 'a9' => $a9, 'a10' => $a10, 'a11' => $a11, 'a12' => $a12,
            'a13' => $a13, 'a14' => $a14, 'a15' => $a15, 'a16' => $a16, 'a17' => $a17, 'a18' => $a18,
            'a19' => $a19,
            'a20' => $a20, 'a21' => $a21, 'a22' => $a22, 'a23' => $a23,
            'a24' => $a24, 'a25' => $a25, 'a26' => $a26, 'a27' => $a27, 'a28' => $a28, 'a29' => $a29, 'a30' => $a30, 'a31' => $a31, 'a32' => $a32, 'a33' => $a33, 'a34' => $a34, 'a35' => $a35, 'a36' => $a36, 'a37' => $a37, 'a38' => $a38, 'a39' => $a39, 'a40' => $a40,
            'a41' => $a41, 'a42' => $a42, 'a43' => $a43, 'a44' => $a44, 'a45' => $a45, 'a46' => $a46, 'a47' => $a47, 'a48' => $a48,
            'dokumen' => $dokumen_upload,
        );
        $this->admin->update('checkbox_hd', 'id_checkbox_hd', $id, $data);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.loa19tion='" . site_url('askk/hasil_selfassesment_hemodialisa') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_hemodialisa');
    }
}
