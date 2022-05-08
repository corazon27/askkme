<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kreon_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }


    public function getLaporanKredensialingRS($limit = null, $id_jns_tng_mds = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
        }
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_jns_tng_mds != null) {
            $this->db->where('id_jns_tng_mds', $id_jns_tng_mds);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_kreon_tm', 'DESC');
        return $this->db->get('kreon_tm a')->result_array();
    }

    public function getLaporanDokumenRS($limit = null, $id_nama_surat = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
        }

        if ($limit != null) {
            $this->db->limit($limit);
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

    public function getLaporanKredensialingKlinik($limit = null, $id_jns_tng_mds = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
        }
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_jns_tng_mds != null) {
            $this->db->where('id_jns_tng_mds', $id_jns_tng_mds);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_klinik_tm', 'DESC');
        return $this->db->get('klinik_tm a')->result_array();
    }

    public function getLaporanDokumenKlinik($limit = null, $id_nama_surat = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
        }

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_nama_surat != null) {
            $this->db->where('id_nama_surat', $id_nama_surat);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_klinik_doc', 'DESC');
        return $this->db->get('klinik_doc a')->result_array();
    }

    public function getLaporanKredensialingOptik($limit = null, $id_jns_tng_mds = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
        }
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_jns_tng_mds != null) {
            $this->db->where('id_jns_tng_mds', $id_jns_tng_mds);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_optik_tm', 'DESC');
        return $this->db->get('optik_tm a')->result_array();
    }

    public function getLaporanDokumenOptik($limit = null, $id_nama_surat = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
        }

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_nama_surat != null) {
            $this->db->where('id_nama_surat', $id_nama_surat);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_optik_doc', 'DESC');
        return $this->db->get('optik_doc a')->result_array();
    }

    //edit rs
    public function get_kreonMedis($id)
    {
        $this->db->select('*');
        $this->db->join('m_jns_tng_mds b', 'b.id_jns_tng_mds = a.id_jns_tng_mds');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('a.id_kreon_tm', $id);
        return $this->db->get('kreon_tm a')->row_array();
    }

    //edit rs
    public function get_kreonDokumen($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->where('a.id_kreon_doc', $id);
        return $this->db->get('kreon_doc a')->row_array();
    }

    public function getuser2()
    {
        $this->db->select('*');
        $this->db->where('role !=', 'admin');
        return $this->db->get('user')->result_array();
    }

    public function addfaskes($data, $table)
    {
        $this->db->insert($table, $data);
        // $params['id_jns_faskes'] = $post['jns_nama_faskes'];
        // $params['kode_faskes'] = $post['kode_faskes'];
        // $params['id_user'] = $post['nama_faskes'];
        // $this->db->insert('m_nama_faskes', $params);

    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getdataFaskes($where)
    {
        $this->db->join('m_jns_faskes b', 'b.id_jns_faskes = a.id_jns_faskes');
        $this->db->where('b.jns_nama_faskes', $where);
        return $this->db->get('m_nama_faskes a')->result_array();
    }

    //add rs
    public function add($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['tgl'] = $post['tgl'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $this->db->insert('kreon_tm', $params);
    }

    //update rs
    public function update_kreon($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_kreon_tm', $post['id_kreon_tm']);
        $this->db->update('kreon_tm', $params);
    }

    //update dok rs
    public function update_doc($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_kreon_doc', $post['id_kreon_doc']);
        $this->db->update('kreon_doc', $params);
    }

    //rs
    // public function getKreonDoc_namaSurat()
    // {
    //     $this->db->select('*');
    //     $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
    //     $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
    //     $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
    //     return $this->db->get('kreon_doc a')->result_array();
    // }

    public function getKreonDoc_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('kreon_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            return $this->db->get('kreon_doc a')->result_array();
        }
    }

    //rs
    public function getKreonDoc_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('kreon_doc a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            return $this->db->get('kreon_doc a')->result_array();
        }
    }

    //rs
    public function getKreonTenagaMedis_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('kreon_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('kreon_tm a')->result_array();
        }
    }
    //rs
    public function getKreonTenagaMedis_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('kreon_tm a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('kreon_tm a')->result_array();
        }
    }

    public function dash_rstm($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('kreon_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('kreon_tm a')->result_array();
        }
    }

    public function dash_rsdoc($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('kreon_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('kreon_doc a')->result_array();
        }
    }

    public function dash_kliniktm($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('klinik_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('klinik_tm a')->result_array();
        }
    }

    public function dash_klinikdoc($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('klinik_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('klinik_doc a')->result_array();
        }
    }

    public function dash_optiktm($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('optik_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('optik_tm a')->result_array();
        }
    }

    public function dash_optikdoc($nama_faskes = null)
    {
        if ($nama_faskes != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            $this->db->where('d.nama_faskes', $nama_faskes);
            return $this->db->get('optik_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('a.status_penilaian', '0');
            return $this->db->get('optik_doc a')->result_array();
        }
    }

    public function getjenisFaskes()
    {
        // $this->db->select('*, u.nama as nama');
        // $this->db->join('user u', 'a.id_user = u.id_user');
        // $this->db->join('m_jns_faskes b', 'b.id_jns_faskes = a.id_jns_faskes');
        // return $this->db->get('m_nama_faskes a')->result_array();
        $this->db->select('*');
        return $this->db->get('m_jns_faskes')->result_array();
    }
    public function getnamaFaskes()
    {
        $this->db->select('*, u.nama as nama');
        $this->db->join('user u', 'a.id_user = u.id_user');
        $this->db->join('m_jns_faskes b', 'b.id_jns_faskes = a.id_jns_faskes');
        return $this->db->get('m_nama_faskes a')->result_array();
    }

    public function getnamaFaskes1($id)
    {
        $this->db->select('*, u.nama as nama');
        $this->db->join('user u', 'a.id_user = u.id_user');
        $this->db->join('m_jns_faskes b', 'b.id_jns_faskes = a.id_jns_faskes');
        $this->db->where('a.id_nama_faskes', $id);
        return $this->db->get('m_nama_faskes a')->row_array();
    }

    public function get_dataTenagaMedis($id)
    {
        $this->db->select('*');
        return $this->db->get('kreon_tm a')->result_array();
    }

    //edit klinik
    public function get_klinikMedis($id)
    {
        $this->db->select('*');
        $this->db->join('m_jns_tng_mds b', 'b.id_jns_tng_mds = a.id_jns_tng_mds');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('a.id_klinik_tm', $id);
        return $this->db->get('klinik_tm a')->row_array();
    }

    //edit klinik
    public function get_klinikDokumen($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->where('a.id_klinik_doc', $id);
        return $this->db->get('klinik_doc a')->row_array();
    }

    //add klinik
    public function add_klinik($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['tgl'] = $post['tgl'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $this->db->insert('klinik_tm', $params);
    }

    //add klinik
    public function add_klinikdoc($post)
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
        $this->db->insert('klinik_doc', $params);
    }

    //update klinik
    public function update_klinik($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_klinik_tm', $post['id_klinik_tm']);
        $this->db->update('klinik_tm', $params);
    }

    //update klinik
    public function update_klinikdoc($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_klinik_doc', $post['id_klinik_doc']);
        $this->db->update('klinik_doc', $params);
    }

    //klinik
    public function getKlinikDoc_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('klinik_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            return $this->db->get('klinik_doc a')->result_array();
        }
    }

    //klinik
    public function getKlinikDoc_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('klinik_doc a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            return $this->db->get('klinik_doc a')->result_array();
        }
    }

    //klinik
    public function getklinikTenagaMedis_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('klinik_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('klinik_tm a')->result_array();
        }
    }
    //klinik
    public function getklinikTenagaMedis_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('klinik_tm a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('klinik_tm a')->result_array();
        }
    }

    //edit optik
    public function get_optikMedis($id)
    {
        $this->db->select('*');
        $this->db->join('m_jns_tng_mds b', 'b.id_jns_tng_mds = a.id_jns_tng_mds');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('a.id_optik_tm', $id);
        return $this->db->get('optik_tm a')->row_array();
    }

    //edit optik
    public function get_optikDokumen($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('m_nama_surat c', 'c.id_nama_surat = a.id_nama_surat');
        $this->db->where('a.id_optik_doc', $id);
        return $this->db->get('optik_doc a')->row_array();
    }

    //add optik
    public function add_optik($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['tgl'] = $post['tgl'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $this->db->insert('optik_tm', $params);
    }

    //add optik
    public function add_optikdoc($post)
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
        $this->db->insert('optik_doc', $params);
    }

    //update optik
    public function update_optik($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_jns_tng_mds'] = $post['id_jns_tng_mds'];
        $params['nama_tng_mds'] = $post['nama_tng_mds'];
        $params['jkn_kis'] = $post['jkn_kis'];
        $params['dokumen2'] = $post['dokumen2'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_optik_tm', $post['id_optik_tm']);
        $this->db->update('optik_tm', $params);
    }

    //update optik
    public function update_optikdoc($post)
    {
        $role = $this->session->role;
        $params['id_nama_faskes'] = $post['id_nama_faskes'];
        $params['id_nama_surat'] = $post['id_nama_surat'];
        // $params['bulan'] = $post['tahun1'] . '-' . $post['bulan1'] . '-01';        
        $params['nomor_surat'] = $post['nomor_surat'];
        $params['tmt'] = $post['tmt'];
        $params['tat'] = $post['tat'];
        $params['sisa_hari'] = $post['sisa_hari'];
        $params['dokumen'] = $post['dokumen'];
        $params['status_penilaian'] = $post['status_penilaian'];
        $this->db->where('id_optik_doc', $post['id_optik_doc']);
        $this->db->update('optik_doc', $params);
    }

    //optik
    public function getoptikDoc_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('optik_doc a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes c', 'c.id_jns_faskes = d.id_jns_faskes');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            return $this->db->get('optik_doc a')->result_array();
        }
    }

    //optik
    public function getoptikDoc_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'd.id_jns_faskes= e.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('optik_doc a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            return $this->db->get('optik_doc a')->result_array();
        }
    }

    //optik
    public function getoptikTenagaMedis_namaSurat($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $where);
            return $this->db->get('optik_tm a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('optik_tm a')->result_array();
        }
    }
    //optik
    public function getoptikTenagaMedis_namaSurat2()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            $this->db->where('d.nama_faskes', $role);
            return $this->db->get('optik_tm a')->result_array();
        } elseif (userdata('role') == 'admin') {
            $this->db->select('*');
            $this->db->join('m_nama_surat b', 'b.id_nama_surat = a.id_nama_surat');
            $this->db->join('m_jns_tng_mds c', 'c.id_jns_tng_mds= a.id_jns_tng_mds');
            $this->db->join('m_nama_faskes d', 'd.id_nama_faskes= a.id_nama_faskes');
            $this->db->join('m_jns_faskes e', 'e.id_jns_faskes= d.id_jns_faskes');
            return $this->db->get('optik_tm a')->result_array();
        }
    }

    public function updateStatusKreonTM($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_kreon_tm', $id);
        $this->db->update('kreon_tm');
    }

    public function updateStatusKreonDOC($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_kreon_doc', $id);
        $this->db->update('kreon_doc');
    }

    public function updateStatusKlinikTM($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_klinik_tm', $id);
        $this->db->update('klinik_tm');
    }

    public function updateStatusKlinikDOC($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_klinik_doc', $id);
        $this->db->update('klinik_doc');
    }

    public function updateStatusOptikTM($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_optik_tm', $id);
        $this->db->update('optik_tm');
    }

    public function updateStatusOptikDOC($id, $status, $komentar)
    {
        $this->db->set('status_penilaian', $status);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_optik_doc', $id);
        $this->db->update('optik_doc');
    }
}
