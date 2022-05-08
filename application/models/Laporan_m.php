<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    public function getLaporanKredensialingRS($limit = null, $id_nama_faskes = null, $id_jns_tng_mds = null, $id_nama_surat = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
        $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
        $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
        $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
        $this->db->where('d.nama_faskes');
        return $this->db->get('kreon_tm a')->result_array();
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_nama_faskes != null) {
            $this->db->where('id_nama_faskes', $id_nama_faskes);
        }
        if ($id_jns_tng_mds != null) {
            $this->db->where('id_jns_tng_mds', $id_jns_tng_mds);
        }
        if ($id_nama_surat != null) {
            $this->db->where('id_nama_surat', $id_nama_surat);
        }
        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_kreon_tm', 'DESC');
        return $this->db->get('kreon_tm a')->result_array();
    }

    public function getLaporanDokumenRS($limit = null, $id_nama_faskes = null, $id_nama_surat = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
        $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
        $this->db->where('d.nama_faskes');
        return $this->db->get('kreon_doc a')->result_array();
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_nama_faskes != null) {
            $this->db->where('id_nama_faskes', $id_nama_faskes);
        }
        if ($id_nama_surat != null) {
            $this->db->where('id_nama_surat', $id_nama_surat);
        }
        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_kreon_doc', 'DESC');
        return $this->db->get('kreon_doc a')->result_array();
    }
}
