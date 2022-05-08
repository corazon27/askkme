<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getLaporanKredensialingNyeri($limit = null, $id_nama_faskes = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        }
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_nama_faskes != null) {
            $this->db->where('id_nama_faskes', $id_nama_faskes);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_checkbox', 'DESC');
        return $this->db->get('checkbox a')->result_array();
    }

    public function getLaporanKredensialingHemodialisa($limit = null, $id_nama_faskes = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        }

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_nama_faskes != null) {
            $this->db->where('id_nama_faskes', $id_nama_faskes);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_checkbox_hd', 'DESC');
        return $this->db->get('checkbox_hd a')->result_array();
    }

    public function getLaporanKredensialingKemo($limit = null, $id_nama_faskes = null, $range = null)
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        }

        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($id_nama_faskes != null) {
            $this->db->where('id_nama_faskes', $id_nama_faskes);
        }

        if ($range != null) {
            $this->db->where('tgl' . ' >=', $range['mulai']);
            $this->db->where('tgl' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_checkbox_kemo', 'DESC');
        return $this->db->get('checkbox_kemo a')->result_array();
    }

    public function getdataFaskes($faskesId)
    {
        $this->db->select('*');
        $this->db->join('user b', 'a.id_user = b.id_user');
        $this->db->join('m_jns_faskes c', 'a.id_jns_faskes = c.id_jns_faskes');
        $this->db->where('id_nama_faskes', $faskesId);
        return $this->db->get('m_nama_faskes a')->row_array();
    }

    public function getdataFaskes1($faskesId)
    {
        $this->db->join('m_jns_faskes b', 'b.id_jns_faskes = a.id_jns_faskes');
        $this->db->where('b.jns_nama_faskes', $faskesId);
        return $this->db->get('m_nama_faskes a')->result_array();
    }

    public function count($table, $where = null, $id = null)
    {
        if ($where != null) {
            $this->db->where($where, $id);
            return $this->db->count_all_results($table);
        } else {
            return $this->db->count_all($table);
        }
    }

    // Poli Nyeri //
    public function getCheckbox($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox', $id);
        return $this->db->get('checkbox a')->result_array();
    }

    public function getCheckboxTele($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox', $id);
        return $this->db->get('checkbox a')->row_array();
    }
    public function getCheckboxTeleHD($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox_hd', $id);
        return $this->db->get('checkbox_hd a')->row_array();
    }
    public function getCheckboxTeleKemo($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox_kemo', $id);
        return $this->db->get('checkbox_kemo a')->row_array();
    }

    public function updateSkor($id, $skor, $tgl)
    {
        $this->db->set('hasilBpjs', $skor);
        $this->db->set('tgKreon', $tgl);
        $this->db->where('id_checkbox', $id);
        $this->db->update('checkbox');
    }

    public function adddataSekagus($data)
    {
        $this->db->insert('checkbox', $data);
    }

    public function getSekagus($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'b.id_nama_poli = a.id_nama_poli');
        $this->db->where('id_checkbox', $id);
        return $this->db->get('checkbox a');
    }

    public function updateDataCheckbox($id)
    {
        $query = "UPDATE checkbox SET statusSelf = '1' WHERE checkbox.id_checkbox = $id";
        return $this->db->query($query);
    }

    public function statusSelfNotifikasi()
    {
        $query = "SELECT COUNT(id_checkbox) AS statusSelf FROM checkbox WHERE statusSelf=0;";
        $result = $this->db->query($query);
        return $result->row()->statusSelf;
    }

    public function getdataSelf()
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('statusSelf', '0');
        $this->db->order_by("tglSelf", "DESC");
        return $this->db->get('checkbox a')->result_array();
    }

    public function updateStatustolakterima($id, $komentar, $penilaian)
    {
        $this->db->set('komentar', $komentar);
        $this->db->set('status_penilaian', '1');
        $this->db->set('penilaian', $penilaian);
        $this->db->where('id_checkbox', $id);
        $this->db->update('checkbox');
    }

    public function getcheckBox_namaFaskes()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox a')->result_array();
        }
    }

    public function getcheckBox_dashboard()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox a')->result_array();
        }
    }

    public function getcheckBoxHD_dashboard()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox_hd a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox_hd a')->result_array();
        }
    }
    // Poli Nyeri //

    // Poli Hemodialisa //
    public function getCheckboxHD($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox_hd', $id);
        return $this->db->get('checkbox_hd a')->result_array();
    }

    public function getcheckBoxHD_namaFaskes()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox_hd a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox_hd a')->result_array();
        }
    }

    public function adddataSekagusHD($data)
    {
        $this->db->insert('checkbox_hd', $data);
    }

    public function getSekagusHD($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'b.id_nama_poli = a.id_nama_poli');
        $this->db->where('id_checkbox_hd', $id);
        return $this->db->get('checkbox_hd a');
    }

    public function updateDataCheckboxHD($id)
    {
        $query = "UPDATE checkbox_hd SET statusSelf = '1' WHERE checkbox_hd.id_checkbox_hd = $id";
        return $this->db->query($query);
    }

    public function statusSelfNotifikasiHD()
    {
        $query = "SELECT COUNT(id_checkbox_hd) AS statusSelf FROM checkbox_hd WHERE statusSelf=0;";
        $result = $this->db->query($query);
        return $result->row()->statusSelf;
    }

    public function getdataSelfHD()
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('statusSelf', '0');
        $this->db->order_by("tglSelf", "DESC");
        return $this->db->get('checkbox_hd a')->result_array();
    }

    public function updateStatustolakterimaHD($id, $komentar, $penilaian)
    {
        $this->db->set('komentar', $komentar);
        $this->db->set('status_penilaian', '1');
        $this->db->set('penilaian', $penilaian);
        $this->db->where('id_checkbox_hd', $id);
        $this->db->update('checkbox_hd');
    }

    public function updateSkorHD($id, $skor, $tgl)
    {
        $this->db->set('hasilBpjs', $skor);
        $this->db->set('tgKreon', $tgl);
        $this->db->where('id_checkbox_hd', $id);
        $this->db->update('checkbox_hd');
    }
    // Poli Hemodialisa //

    // Poli Kemoterapi //
    public function getCheckboxKM($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox_kemo', $id);
        return $this->db->get('checkbox_kemo a');
    }

    public function getCheckboxKMAdmin($id)
    {
        $this->db->select('*');
        // $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
        $this->db->where('id_checkbox_kemo', $id);
        return $this->db->get('admin_checkbox_kemo a');
    }

    public function getcheckBoxKM_namaFaskes()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox_kemo a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox_kemo a')->result_array();
        }
    }

    public function getcheckBoxKM_dashboard()
    {
        if (userdata('role') != 'admin') {
            $role = userdata('nama_faskes');
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            $this->db->where('c.nama_faskes', $role);
            return $this->db->get('checkbox_kemo a')->result_array();
        } else {
            $this->db->select('*');
            $this->db->where('penilaian', '');
            $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
            $this->db->join('nama_poli b', 'a.id_nama_poli = b.id_nama_poli');
            return $this->db->get('checkbox_kemo a')->result_array();
        }
    }

    public function adddataAdminSekagusKM($data)
    {
        $this->db->insert('admin_checkbox_kemo', $data);
    }

    public function updatetglkreden($tgl, $id_faskes)
    {
        // UPDATE `checkbox_kemo` SET `tgKreon` = '2021-12-30' WHERE `checkbox_kemo`.`id_checkbox_kemo` = 10;
        $query = "UPDATE `checkbox_kemo` SET `tgKreon` = '$tgl' WHERE `checkbox_kemo`.`id_checkbox_kemo` = $id_faskes";
        return $this->db->query($query);
    }

    public function adddataSekagusKM($data)
    {
        $this->db->insert('checkbox_kemo', $data);
    }

    public function getSekagusKM($id)
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes c', 'c.id_nama_faskes = a.id_nama_faskes');
        $this->db->join('nama_poli b', 'b.id_nama_poli = a.id_nama_poli');
        $this->db->where('id_checkbox_kemo', $id);
        return $this->db->get('checkbox_kemo a');
    }

    public function updateDataCheckboxKM($id)
    {
        $query = "UPDATE checkbox_kemo SET statusSelf = '1' WHERE checkbox_kemo.id_checkbox_kemo = $id";
        return $this->db->query($query);
    }

    public function statusSelfNotifikasiKM()
    {
        $query = "SELECT COUNT(id_checkbox_kemo) AS statusSelf FROM checkbox_kemo WHERE statusSelf=0;";
        $result = $this->db->query($query);
        return $result->row()->statusSelf;
    }

    public function getdataSelfKM()
    {
        $this->db->select('*');
        $this->db->join('m_nama_faskes b', 'b.id_nama_faskes = a.id_nama_faskes');
        $this->db->where('statusSelf', '0');
        $this->db->order_by("tgl", "DESC");
        return $this->db->get('checkbox_kemo a')->result_array();
    }

    public function updateStatustolakterimaKM($id, $komentar, $penilaian, $tgl)
    {
        $this->db->set('komentar', $komentar);
        $this->db->set('status_penilaian', '1');
        $this->db->set('penilaian', $penilaian);
        $this->db->set('tgl', $tgl);
        $this->db->where('id_checkbox_kemo', $id);
        $this->db->update('checkbox_kemo');
    }

    public function updateSkorKM($id, $skor, $tgl)
    {
        $this->db->set('hasilBpjs', $skor);
        $this->db->set('tgKreon', $tgl);
        $this->db->where('id_checkbox_kemo', $id);
        $this->db->update('checkbox_kemo');
    }
    // Poli Kemoterapi //

    public function getjenisFaskes()
    {
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

    public function updateStatus($id, $status)
    {
        $query = "UPDATE berkas_poli SET is_status = $status WHERE `berkas_poli`.`id_berkas_poli` = $id";
        return $this->db->query($query);
    }
}
