<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_m extends CI_Model
{
    public function rekaprs()
    {
        $this->db->select('*');
        return $this->db->get('kreon_tm')->result_array();
    }
    // public function plastik()
    // {

    //     $query = $this->db->query("select sum(t.jml_setor) as plastik from unit u join desa d on u.id_desa=d.id_desa join ketua k on u.id_unit=k.id_unit join user s on s.id_unit=u.id_unit join setor t on t.id_admin=s.id_admin left join kategori g on g.id_kategori=t.id_kategori  where g.id_kategori=1 group by u.nama_unit;");
    //     return $query;
    // }
    // public function kaleng()
    // {

    //     $query = $this->db->query("select sum(t.jml_setor) as kaleng from unit u join desa d on u.id_desa=d.id_desa join ketua k on u.id_unit=k.id_unit join user s on s.id_unit=u.id_unit join setor t on t.id_admin=s.id_admin right join kategori g on g.id_kategori=t.id_kategori where g.id_kategori=2 group by u.nama_unit,g.id_kategori;");
    //     return $query;
    // }
}
