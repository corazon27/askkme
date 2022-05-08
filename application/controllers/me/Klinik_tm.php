<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klinik_tm extends CI_Controller
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
        $data['title'] = "Tenaga Medis Klinik Utama";
        if (userdata('role') != "admin") {
            $data['user'] = $this->admin->getuser2();
            $data['klinik_tm2'] = $this->admin->getklinikTenagaMedis_namaSurat2();
        } else {
            $data['klinik_tm2'] = $this->admin->getklinikTenagaMedis_namaSurat();
        }
        $data["dokumen"] = directory_map('./upload');
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/klinik_medis/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi($mode)
    {
        if ($mode ==  'add') {
            $this->form_validation->set_rules('id_nama_faskes', 'Nama Faskes', 'required');
            $this->form_validation->set_rules('id_jns_tng_mds', 'Jenis Tenaga Medis', 'required');
            $this->form_validation->set_rules('nama_tng_mds', 'Nama Tenaga Medis', 'required');
            $this->form_validation->set_rules('jkn_kis', 'Nomor JKN-KIS', 'required');
            $this->form_validation->set_rules('id_nama_surat', 'Nama Surat', 'required');
            $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
            $this->form_validation->set_rules('tmt', 'Tmt Surat', 'required');
            $this->form_validation->set_rules('tat', 'Tat Surat', 'required');
            $this->form_validation->set_rules('sisa_hari', 'Sisa Hari', 'required');
            $this->form_validation->set_rules('dokumen', 'Document', 'callback_validate_pdf');
        } elseif ($mode == 'edit') {
            $this->form_validation->set_rules('id_nama_faskes', 'Nama Faskes', 'required');
            $this->form_validation->set_rules('id_jns_tng_mds', 'Jenis Tenaga Medis', 'required');
            $this->form_validation->set_rules('nama_tng_mds', 'Nama Tenaga Medis', 'required');
            $this->form_validation->set_rules('jkn_kis', 'Nomor JKN-KIS', 'required');
            $this->form_validation->set_rules('id_nama_surat', 'Nama Surat', 'required');
            $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'required');
            $this->form_validation->set_rules('tmt', 'Tmt Surat', 'required');
            $this->form_validation->set_rules('tat', 'Tat Surat', 'required');
            $this->form_validation->set_rules('sisa_hari', 'Sisa Hari', 'required');
            if (empty($_FILES['editdokumen']['name'])) {
            } elseif (!empty($_FILES['editdokumen']['name'])) {
                $this->form_validation->set_rules('editdokumen', 'Document', 'callback_validate_pdf_edit');
            }
        }
    }

    public function validate_pdf()
    {
        $check = TRUE;
        if ((!isset($_FILES['dokumen'])) || $_FILES['dokumen']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['dokumen']) && $_FILES['dokumen']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["dokumen"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['dokumen']['type'];
            if (filesize($_FILES['dokumen']['tmp_name']) > 5097152) {
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

    public function validate_pdf_edit()
    {
        $check = TRUE;
        if ((!isset($_FILES['editdokumen'])) || $_FILES['editdokumen']['size'] == 0) {
            $this->form_validation->set_message('validate_pdf_edit', 'Dokumen Wajib Diisi.');
            $check = FALSE;
        } else if (isset($_FILES['editdokumen']) && $_FILES['editdokumen']['size'] != 0) {
            $allowedExts = array("pdf", "docx");
            $extension = pathinfo($_FILES["editdokumen"]["name"], PATHINFO_EXTENSION); //pdf
            $type = $_FILES['editdokumen']['type'];
            if (filesize($_FILES['editdokumen']['tmp_name']) > 5097152) {
                $this->form_validation->set_message('validate_pdf_edit', 'File anda lebih dari 5MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_pdf_edit', "File tidak didukung {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }

    public function add()
    {
        $this->_validasi('add');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Tenaga Medis Klinik Utama";
            $data['user'] = $this->admin->getuser2();
            $data['jns_tng_medis'] = $this->admin->get('m_jns_tng_mds');
            $data['nama_surat'] = $this->admin->get('m_nama_surat');
            $data['nama_faskes'] = $this->admin->getdataFaskes('Klinik Utama');
            $this->session->login_session['role'];
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/klinik_medis/add', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $config['upload_path']          = './upload/klinik/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $post = $this->input->post(null, TRUE);
            $this->load->library('upload', $config);
            if (@$_FILES['dokumen']['name'] != null) {
                if ($this->upload->do_upload('dokumen')) {
                    $post['dokumen'] = $this->upload->data('file_name');
                }
            }
            if (@$_FILES['dokumen2']['name'] != null) {
                if ($this->upload->do_upload('dokumen2')) {
                    $post['dokumen2'] = $this->upload->data('file_name');
                }
            }
            $this->admin->add_klinik($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Disimpan');
                window.location='" . site_url('me/klinik_tm') . "'
                </script>";
            } else {
                $this->admin->add_klinik($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('me/klinik_tm') . "'
                    </script>";
                }
            }
        }
    }

    public function edit($getId = null)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Data Tenaga Medis Klinik Utama";
            $data['nama_surat'] = $this->admin->get('m_nama_surat');
            $data['klinik_tm'] = $this->admin->get_klinikMedis($id);
            $data['m_nama_faskes'] = $this->admin->getdataFaskes('Klinik Utama');
            $data['jns'] = $this->admin->get('m_jns_tng_mds');
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/klinik_medis/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $config['upload_path']          = './upload/klinik/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $post = $this->input->post(null, TRUE);
            $post["status_penilaian"] = 0;
            if ($_FILES['editdokumen']['name'] != null) {
                $this->load->library('upload', $config);
                if (@$_FILES['editdokumen']['name'] != null) {
                    if ($this->upload->do_upload('editdokumen')) {
                        $post['dokumen'] = $this->upload->data('file_name');
                    }
                }
                $this->admin->update_klinik($post);
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data berhasil diupdate.');
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('me/klinik_tm') . "'
                    </script>";
                } else {
                    $this->admin->update_klinik($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data Berhasil Disimpan');
                        window.location='" . site_url('me/klinik_tm') . "'
                        </script>";
                    }
                }
            }
            if ($_FILES['editdokumen2']['name'] != null) {
                $this->load->library('upload', $config);
                if (@$_FILES['editdokumen2']['name'] != null) {
                    if ($this->upload->do_upload('editdokumen2')) {
                        $post['dokumen2'] = $this->upload->data('file_name');
                    }
                }
                $this->admin->update_klinik($post);
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data berhasil diupdate.');
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('me/klinik_tm') . "'
                    </script>";
                } else {
                    $this->admin->update_klinik($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data Berhasil Disimpan');
                        window.location='" . site_url('me/klinik_tm') . "'
                        </script>";
                    }
                }
            } elseif ($_FILES['editdokumen']['name'] == null) {
                $this->admin->update_klinik($post);
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data berhasil diupdate.');
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('me/klinik_tm') . "'
                    </script>";
                }
            } elseif ($_FILES['editdokumen2']['name'] == null) {
                $this->admin->update_klinik($post);
                if ($this->db->affected_rows() > 0) {
                    set_pesan('data berhasil diupdate.');
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('me/klinik_tm') . "'
                    </script>";
                }
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('klinik_tm', 'id_klinik_tm', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/klinik_tm');
    }

    public function status($getId)
    {
        $status = $this->input->post('status');
        $komentar = $this->input->post('komentar');
        $id = encode_php_tags($getId);
        $this->admin->updateStatusKlinikTM($id, $status, $komentar);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
            set_pesan('data berhasil dinilai.');
        } else {
            echo "<script>
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
        }
    }

    public function stj($getId = null, $id_tele)
    {
        // $id_tele = '965581589';
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->get_klinikMedis($getId);
        if ($data['status_penilaian'] == 1) {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['status_penilaian'] == 2) {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ME Kredensialing Klinik (Tenaga Medis) telah diterima lengkap: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Jenis Tenaga Medis: " . $data['jenis_tenaga_medis'] . "\n");
        $massages = $massages . urlencode("Nama Tenaga Medis: " . $data['nama_tng_mds'] . "\n");
        $massages = $massages . urlencode("JKN-KIS: " . $data['jkn_kis'] . "\n");
        $massages = $massages . urlencode("Nama Surat: " . $data['nama_surat'] . "\n");
        $massages = $massages . urlencode("Nomor Surat: " . $data['nomor_surat'] . "\n");
        $massages = $massages . urlencode("TMT: " . $data['tmt'] . "\n");
        $massages = $massages . urlencode("TAT: " .  $data['tat'] . "\n");
        $massages = $massages . urlencode("Sisa Hari: " .  $data['sisa_hari'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        if ($this->db->affected_rows() > 0) {
            // $id_tele = '965581589';
            // $this->benchmark->mark('code_start');
            // for ($i = 0; $i < 50; $i++) {
            //     echo "<pre>";
            sendMessage($id_tele, $massages);
            // }
            // $this->benchmark->mark('code_end');
            // echo "<br>" . $this->benchmark->elapsed_time('code_start', 'code_end');
            // exit();
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
        }
    }

    public function tlk($getId = null, $id_tele)
    {
        $post = $this->input->post(null, TRUE);
        // print_r($getId);
        // $id = encode_php_tags($getId);
        //$this->admin->updateStatusKlinikTM($id);
        $data = $this->admin->get_klinikMedis($getId);
        if ($data['status_penilaian'] == 1) {
            $pengajuan = "Telah Disetujui";
        } elseif ($data['status_penilaian'] == 2) {
            $pengajuan = "Telah Ditolak";
        }
        $massages = urlencode("Berkas ME Kredensialing Klinik (Tenaga Medis) telah ditolak: \n");
        $massages = $massages . urlencode("Nama Faskes: " . $data['nama_faskes'] . "\n");
        $massages = $massages . urlencode("Jenis Tenaga Medis: " . $data['jenis_tenaga_medis'] . "\n");
        $massages = $massages . urlencode("Nama Tenaga Medis: " . $data['nama_tng_mds'] . "\n");
        $massages = $massages . urlencode("JKN-KIS: " . $data['jkn_kis'] . "\n");
        $massages = $massages . urlencode("Nama Surat: " . $data['nama_surat'] . "\n");
        $massages = $massages . urlencode("Nomor Surat: " . $data['nomor_surat'] . "\n");
        $massages = $massages . urlencode("TMT: " . $data['tmt'] . "\n");
        $massages = $massages . urlencode("TAT: " .  $data['tat'] . "\n");
        $massages = $massages . urlencode("Sisa Hari: " .  $data['sisa_hari'] . "\n");
        $massages = $massages . urlencode("Status Pengajuan: " . $pengajuan . "\n");
        $massages = $massages . urlencode("Komentar: " . $data['komentar'] . "\n");
        if ($this->db->affected_rows() > 0) {
            // $this->fungsi_helper->sendMessage($post['tele'], $massages);
            sendMessage($id_tele, $massages);
            echo "<script>alert('data berhasil dikirim');
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('me/klinik_tm') . "'
            </script>";
        }
    }
}
