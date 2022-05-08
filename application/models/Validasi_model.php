<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasi_model extends CI_Model
{
    public function setuju($post)
    {
        $admin = $this->fungsi->user_login()->nip;
        $params['status'] = 1;
        $params['status2'] = 1;
        $params['tgl_validasi'] = date("Y-m-d");
        $params['user_nip'] = $admin;
        $this->db->where('no_regis', $post['idsurat']);
        $this->db->update('surat', $params);
    }
    public function tolak($post)
    {
        $admin = $this->fungsi->user_login()->nip;
        $par['no_surat'] = $post['idsurat'];;
        $par['alasan'] = $post['alasan'];;
        $par['tgl_kembali'] = date("Y-m-d");
        $params['status'] = 2;
        $params['status2'] = 2;
        $params['user_nip'] = $admin;
        $this->db->trans_start();
        $this->db->insert('pengembalian', $par);
        $this->db->where('no_regis', $post['idsurat']);
        $this->db->update('surat', $params);
        $this->db->trans_complete();
    }
    public function verif($post)
    {
        $admin = $this->fungsi->user_login()->nip;
        $params['status2'] = 3;
        $this->db->where('no_regis', $post['idsurat']);
        $this->db->update('surat', $params);
    }
    public function bayar($post)
    {
        $admin = $this->fungsi->user_login()->nip;
        $params['status2'] = 4;
        $this->db->where('no_regis', $post['idsurat']);
        $this->db->update('surat', $params);
    }
}
