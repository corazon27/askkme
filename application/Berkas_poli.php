<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_poli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->model('berkas_poli_m', 'berkas');
        $this->load->library('form_validation');
    }

    public function get_tot()
    {
        $tot = $this->berkas->total_rows();
        $result['tot'] = $tot;
        $result['msg'] = "Berhasil direfresh secara realtime";
        echo json_encode($result);
    }

    public function index()
    {
        $data['title'] = "Berkas Pengajuan Dokumen Pendukung";
        if (userdata('role') != "admin") {
            $data['user'] = $this->admin->getuser2();
            $data['berkas_poli2'] = $this->admin->getBerkasPoli_namaFaskes2('berkas_poli');
        } else {
            // $data['user'] = $this->admin->getuser2();
            $data['berkas_poli2'] = $this->admin->getBerkasPoli_namaFaskes('berkas_poli');
            // $data['dataSelfBerkas'] = $this->admin->getdataSelfBerkas();
            // $data['statusSelfNotifikasiBerkas'] = $this->admin->statusSelfNotifikasiBerkas();
        }
        // $data["dokumen"] = directory_map('./upload');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berkas_poli/data', $data);
        $this->load->view('templates/footer');
    }

    private function _validasi()
    {
        // $this->form_validation->set_rules('id_user', 'Nama Faskes', 'required');
        // $this->form_validation->set_rules('id_nama_poli', 'Nama Poli', 'required');
        $this->form_validation->set_rules('nama_pengaju', 'Nama Pengaju', 'required');
        // $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
        // $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan', 'required');
        // $this->form_validation->set_rules('SK_Tim', 'SK Tim Surat', 'required');
        // $this->form_validation->set_rules('surat_pernyataan', 'Surat Pernyataan', 'required');
        // $this->form_validation->set_rules('NPWP', 'NPWP', 'required');
        // $this->form_validation->set_rules('surat_pengelolaan', 'Surat Pengelolaan', 'required');
        // $this->form_validation->set_rules('dokumen', 'Dokumen', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Berkas Pengajuan Dokumen Pendukung";
            $data['user'] = $this->admin->getuser2();
            $data['nama_faskes'] = $this->admin->get('m_nama_faskes');
            $data['nama_poli'] = $this->admin->get('nama_poli');
            // $data['dataSelfBerkas'] = $this->admin->getdataSelfBerkas();
            // $data['statusSelfNotifikasiBerkas'] = $this->admin->statusSelfNotifikasiBerkas();
            $this->session->login_session['role'];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('berkas_poli/add', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './upload/berkas_poli/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['file_size']            = 2048;
            $post = $this->input->post(null, TRUE);
            $this->load->library('upload', $config);
            if (@$_FILES['surat_permohonan']['name'] != null) {
                if ($this->upload->do_upload('surat_permohonan')) {
                    $post['surat_permohonan'] = $this->upload->data('file_name');
                    $this->admin->add_berkaspoli($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data Berhasil Disimpan');
                        window.location='" . site_url('berkas_poli') . "'
                        </script>";
                    }
                } else {
                    $error = $this->upload->display_errors();
                    echo "<script>alert($error);
                    window.location='" . site_url('berkas_poli/404') . "'
                    </script>";
                }
            } else {
                $this->admin->add_berkaspoli($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('berkas_poli') . "'
                    </script>";
                }
            }
        }
    }

    public function edit($getId = null)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Berkas Pengajuan Dokumen Pendukung";
            $data['user'] = $this->admin->get('user');
            $data['nama_poli'] = $this->admin->get('nama_poli');
            $data['berkas_poli'] = $this->admin->get_berkasPoli($id);
            // $data['dataSelfBerkas'] = $this->admin->getdataSelfBerkas();
            // $data['statusSelfNotifikasiBerkas'] = $this->admin->statusSelfNotifikasiBerkas();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('berkas_poli/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './upload/berkas_poli/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['file_size']            = 2048;
            $post = $this->input->post(null, TRUE);
            $this->load->library('upload', $config);
            if (@$_FILES['surat_permohonan']['name'] != null) {
                if ($this->upload->do_upload('surat_permohonan')) {
                    $post['surat_permohonan'] = $this->upload->data('file_name');

                    $this->admin->edit_berkaspoli($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data Berhasil Disimpan');
                        window.location='" . site_url('berkas_poli') . "'
                        </script>";
                    }
                }
            } else {
                $this->admin->edit_berkaspoli($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data Berhasil Disimpan');
                    window.location='" . site_url('berkas_poli') . "'
                    </script>";
                } else {
                    $input = $this->input->post(null, true);
                    $update = $this->admin->update('berkas_poli', 'id_berkas_poli', $id, $input);
                    if ($update) {
                        set_pesan('data berhasil');
                        redirect('berkas_poli');
                    }
                }
            }
        }
    }

    public function status($getId, $status)
    {
        $id = encode_php_tags($getId);
        $post = $this->input->post(null, TRUE);
        $this->admin->updateStatus($id, $status);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil disimpan');
            window.location='" . site_url('berkas_poli') . "'
            </script>";
        } else {
            echo "<script>
            window.location='" . site_url('berkas_poli') . "'
            </script>";
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('berkas_poli', 'id_berkas_poli', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('berkas_poli');
    }
}
