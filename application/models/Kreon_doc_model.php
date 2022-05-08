<?php
defined('BASEPATH') or exit('No script access allowed');

class Kreon_doc_model extends CI_Model
{
    public function add($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['tgl'] = $post['tgl'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $this->db->insert('kreon_doc', $params);
    }
}
