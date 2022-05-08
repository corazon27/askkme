<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nyeri extends CI_Controller
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
        $this->form_validation->set_rules('dokumen', 'Document', 'callback_validate_pdf');
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

    public function index($getId = null)
    {
        $id = encode_php_tags($getId);

        $data['title'] = "Dashboard";
        $data['dataSelf'] = $this->admin->getdataSelf();
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $data['getCheckbox'] = $this->admin->getCheckbox($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nyeri/data', $data);
        $this->load->view('templates/footer');
    }

    public function kredensialing($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $data['getCheckbox'] = $this->admin->getCheckbox($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nyeri/data', $data);
        $this->load->view('templates/footer');
    }

    public function addKredensialing()
    {
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $totalsemua     = $this->input->post('totalsemua');
        $id_checkbox    = $this->input->post('id_checkbox');
        $tgl = date('ymd');
        return $this->admin->updateSkor($id_checkbox, $totalsemua, $tgl);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('nyeri') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_nyeri');
    }

    public function cetak($id)
    {
        $data['getCheckbox'] = $this->admin->getCheckbox($id);
        $date = date('ymd');
        $data['title'] = "Cetak-" . $date;
        $this->load->view('nyeri/cetak', $data);
    }

    public function add($getId = null)
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $id = encode_php_tags($getId);

            $data['title'] = "Dashboard";
            $data['dataSelf'] = $this->admin->getdataSelf();
            $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
            $data['getCheckbox'] = $this->admin->getCheckbox($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('nyeri/data', $data);
            $this->load->view('templates/footer');
        } else {
            $id     = "";
            $pemilik = $this->input->post('nama_pemilik');
            $alamat = $this->input->post('alamat');
            $telp_email = $this->input->post('telp_email');
            $totalsemua     = $this->input->post('totalsemua');
            $id_nama_poli     = $this->input->post('id_nama_poli');
            $a     = $this->input->post('a');
            $b     = $this->input->post('b');
            $c     = $this->input->post('c');
            $d     = $this->input->post('d');
            $e     = $this->input->post('e');

            $aaa     = $this->input->post('aaa');
            $aab     = $this->input->post('aab');
            $aac    = $this->input->post('aac');
            $aad     = $this->input->post('aad');
            $aae     = $this->input->post('aae');
            $aaf     = $this->input->post('aaf');

            $aba     = $this->input->post('aba');
            $abb     = $this->input->post('abb');
            $abc     = $this->input->post('abc');
            $abd     = $this->input->post('abd');
            $abe     = $this->input->post('abe');
            $abf     = $this->input->post('abf');

            $aca     = $this->input->post('aca');
            $acb     = $this->input->post('acb');
            $acc     = $this->input->post('acc');
            $acd     = $this->input->post('acd');
            $ace     = $this->input->post('ace');
            $acf     = $this->input->post('acf');

            $ca      = $this->input->post('ca');

            $b1a     = $this->input->post('b1a');
            $b1b     = $this->input->post('b1b');
            $b1c     = $this->input->post('b1c');
            $b1d     = $this->input->post('b1d');

            $b2a     = $this->input->post('b2a');
            $b2b     = $this->input->post('b2b');
            $b2c     = $this->input->post('b2c');
            $b2d     = $this->input->post('b2d');
            $b2e     = $this->input->post('b2e');
            $b2f     = $this->input->post('b2f');
            $b2g     = $this->input->post('b2g');
            $b2h     = $this->input->post('b2h');
            $b2i     = $this->input->post('b2i');
            $b2j     = $this->input->post('b2j');
            $b2k     = $this->input->post('b2k');
            $b2l     = $this->input->post('b2l');
            $b2m     = $this->input->post('b2m');
            $b2n     = $this->input->post('b2n');
            $b2o     = $this->input->post('b2o');
            $b2p     = $this->input->post('b2p');
            $b2q     = $this->input->post('b2q');

            $bba     = $this->input->post('bba');
            $bb1     = $this->input->post('bb1');
            $bb2     = $this->input->post('bb2');
            $bb3     = $this->input->post('bb3');
            $bb4     = $this->input->post('bb4');
            $bb5     = $this->input->post('bb5');
            $bb6     = $this->input->post('bb6');
            $bb7     = $this->input->post('bb7');
            $bb8     = $this->input->post('bb8');
            $bb9     = $this->input->post('bb9');
            $bb10    = $this->input->post('bb10');
            $bb11    = $this->input->post('bb11');
            $bb12    = $this->input->post('bb12');

            $bba1    = $this->input->post('bba1');
            $bbb     = $this->input->post('bbb');
            $bbc     = $this->input->post('bbc');
            $bbd     = $this->input->post('bbd');
            $bbe     = $this->input->post('bbe');
            $bbf     = $this->input->post('bbf');
            $tgl = date('ymd');
            $id_nama_faskes = $this->input->post('id_nama_faskes');

            $config['upload_path']          = './upload/askk/';
            $config['allowed_types']        = 'docx|pdf|';
            $config['max_size']            = 5048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('dokumen');
            $dokumen = $this->upload->data('file_name');

            $data     = array(
                'id_checkbox' => $id, 'nama_pemilik' => $pemilik, 'alamat' => $alamat, 'telp_email' => $telp_email, 'id_nama_poli' => $id_nama_poli,

                'hasilSkor' => $totalsemua, 'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl,
                'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e,
                'aaa' => $aaa, 'aab' => $aab, 'aac' => $aac, 'aad' => $aad, 'aae' => $aae, 'aaf' => $aaf,
                'aba' => $aba, 'abb' => $abb, 'abc' => $abc, 'abd' => $abd, 'abe' => $abe, 'abf' => $abf,
                'aca' => $aca, 'acb' => $acb, 'acc' => $acc, 'acd' => $acd, 'ace' => $ace, 'acf' => $acf,
                'ca' => $ca,
                'b1a' => $b1a, 'b1b' => $b1b, 'b1c' => $b1c, 'b1d' => $b1d,
                'b2a' => $b2a, 'b2b' => $b2b, 'b2c' => $b2c, 'b2d' => $b2d, 'b2e' => $b2e, 'b2f' => $b2f, 'b2g' => $b2g, 'b2h' => $b2h, 'b2i' => $b2i, 'b2j' => $b2j, 'b2k' => $b2k, 'b2l' => $b2l, 'b2m' => $b2m, 'b2n' => $b2n, 'b2o' => $b2o, 'b2p' => $b2p, 'b2q' => $b2q,
                'bba' => $bba, 'bb1' => $bb1, 'bb2' => $bb2, 'bb3' => $bb3, 'bb4' => $bb4, 'bb5' => $bb5, 'bb6' => $bb6, 'bb7' => $bb7, 'bb8' => $bb8, 'bb9' => $bb9, 'bb10' => $bb10, 'bb11' => $bb11, 'bb12' => $bb12,
                'bba1' => $bba1, 'bbb' => $bbb, 'bbc' => $bbc, 'bbd' => $bbd, 'bbe' => $bbe, 'bbf' => $bbf,
                'dokumen' => $dokumen,
            );
            $this->admin->adddataSekagus($data);
            $this->admin->update('checkbox', 'id_checkbox', $id, $data);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Disimpan');
                window.location='" . site_url('nyeri') . "'
                </script>";
            }
            set_pesan('data berhasil disimpan.');
            redirect('askk/hasil_selfassesment_nyeri');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Dashboard";
        $data['statusSelfNotifikasi'] = $this->admin->statusSelfNotifikasi();
        $data['data'] = $this->admin->getSekagus($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('nyeri/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $id    = $id;
        $pemilik = $this->input->post('nama_pemilik');
        $alamat = $this->input->post('alamat');
        $telp_email = $this->input->post('telp_email');
        $totalsemua     = $this->input->post('totalsemua');
        $id_nama_poli     = $this->input->post('id_nama_poli');
        $a     = $this->input->post('a');
        $b     = $this->input->post('b');
        $c     = $this->input->post('c');
        $d     = $this->input->post('d');
        $e     = $this->input->post('e');

        $aaa     = $this->input->post('aaa');
        $aab     = $this->input->post('aab');
        $aac     = $this->input->post('aac');
        $aad     = $this->input->post('aad');
        $aae     = $this->input->post('aae');
        $aaf     = $this->input->post('aaf');

        $aba     = $this->input->post('aba');
        $abb     = $this->input->post('abb');
        $abc     = $this->input->post('abc');
        $abd     = $this->input->post('abd');
        $abe     = $this->input->post('abe');
        $abf     = $this->input->post('abf');

        $aca     = $this->input->post('aca');
        $acb     = $this->input->post('acb');
        $acc     = $this->input->post('acc');
        $acd     = $this->input->post('acd');
        $ace     = $this->input->post('ace');
        $acf     = $this->input->post('acf');

        $ca      = $this->input->post('ca');

        $b1a     = $this->input->post('b1a');
        $b1b     = $this->input->post('b1b');
        $b1c     = $this->input->post('b1c');
        $b1d     = $this->input->post('b1d');

        $b2a     = $this->input->post('b2a');
        $b2b     = $this->input->post('b2b');
        $b2c     = $this->input->post('b2c');
        $b2d     = $this->input->post('b2d');
        $b2e     = $this->input->post('b2e');
        $b2f     = $this->input->post('b2f');
        $b2g     = $this->input->post('b2g');
        $b2h     = $this->input->post('b2h');
        $b2i     = $this->input->post('b2i');
        $b2j     = $this->input->post('b2j');
        $b2k     = $this->input->post('b2k');
        $b2l     = $this->input->post('b2l');
        $b2m     = $this->input->post('b2m');
        $b2n     = $this->input->post('b2n');
        $b2o     = $this->input->post('b2o');
        $b2p     = $this->input->post('b2p');
        $b2q     = $this->input->post('b2q');

        $bba     = $this->input->post('bba');
        $bb1     = $this->input->post('bb1');
        $bb2     = $this->input->post('bb2');
        $bb3     = $this->input->post('bb3');
        $bb4     = $this->input->post('bb4');
        $bb5     = $this->input->post('bb5');
        $bb6     = $this->input->post('bb6');
        $bb7     = $this->input->post('bb7');
        $bb8     = $this->input->post('bb8');
        $bb9     = $this->input->post('bb9');
        $bb10    = $this->input->post('bb10');
        $bb11    = $this->input->post('bb11');
        $bb12    = $this->input->post('bb12');

        $bba1    = $this->input->post('bba1');
        $bbb     = $this->input->post('bbb');
        $bbc     = $this->input->post('bbc');
        $bbd     = $this->input->post('bbd');
        $bbe     = $this->input->post('bbe');
        $bbf     = $this->input->post('bbf');
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

            'id_checkbox' => $id,
            'nama_pemilik' => $pemilik, 'alamat' => $alamat, 'telp_email' => $telp_email, 'id_nama_poli' => $id_nama_poli,
            'hasilSkor' => $totalsemua, 'id_nama_faskes' => $id_nama_faskes, 'tgl' => $tgl, 'penilaian' => '',
            'a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e,
            'aaa' => $aaa, 'aab' => $aab, 'aac' => $aac, 'aad' => $aad, 'aae' => $aae, 'aaf' => $aaf,
            'aba' => $aba, 'abb' => $abb, 'abc' => $abc, 'abd' => $abd, 'abe' => $abe, 'abf' => $abf,
            'aca' => $aca, 'acb' => $acb, 'acc' => $acc, 'acd' => $acd, 'ace' => $ace, 'acf' => $acf,
            'ca' => $ca,
            'b1a' => $b1a, 'b1b' => $b1b, 'b1c' => $b1c, 'b1d' => $b1d,
            'b2a' => $b2a, 'b2b' => $b2b, 'b2c' => $b2c, 'b2d' => $b2d, 'b2e' => $b2e, 'b2f' => $b2f, 'b2g' => $b2g, 'b2h' => $b2h, 'b2i' => $b2i, 'b2j' => $b2j, 'b2k' => $b2k, 'b2l' => $b2l, 'b2m' => $b2m, 'b2n' => $b2n, 'b2o' => $b2o, 'b2p' => $b2p, 'b2q' => $b2q,
            'bba' => $bba, 'bb1' => $bb1, 'bb2' => $bb2, 'bb3' => $bb3, 'bb4' => $bb4, 'bb5' => $bb5, 'bb6' => $bb6, 'bb7' => $bb7, 'bb8' => $bb8, 'bb9' => $bb9, 'bb10' => $bb10, 'bb11' => $bb11, 'bb12' => $bb12,
            'bba1' => $bba1, 'bbb' => $bbb, 'bbc' => $bbc, 'bbd' => $bbd, 'bbe' => $bbe, 'bbf' => $bbf,
            'dokumen' => $dokumen_upload,
        );
        $this->admin->update('checkbox', 'id_checkbox', $id, $data);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');
            window.location='" . site_url('askk/hasil_selfassesment_nyeri') . "'
            </script>";
        }
        set_pesan('data berhasil disimpan.');
        redirect('askk/hasil_selfassesment_nyeri');
    }
}
