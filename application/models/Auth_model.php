<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('user', ['username' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('user', ['username' => $username])->row_array();
        return $data['password'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function faskesdata($id)
    {
        // $q = $this->db->join('emp','emp.id = pay.emp_id')->get_where('pay', array("pay.date" => $date,"emp.status"=>"Active"));
        return $this->db->join('user a ', 'a.id_user = b.id_user')->get_where('m_nama_faskes b', ['b.id_user' => $id])->row_array();
    }

    public function cek_faskes($id_user)
    {
        $query = $this->db->get_where('m_nama_faskes', ['id_user' => $id_user]);
        return $query->num_rows();
    }
}
