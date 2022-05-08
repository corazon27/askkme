<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_admin()) {
            redirect('dashboard');
        }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "User Management";
        $data['users'] = $this->admin->getUsers(userdata('id_user'));
        $this->load->view('viewsKreon/templates/header', $data);
        $this->load->view('viewsKreon/templates/sidebar', $data);
        $this->load->view('viewsKreon/templates/topbar', $data);
        $this->load->view('viewsKreon/user/data', $data);
        $this->load->view('viewsKreon/templates/footer');
    }

    private function _validasi($mode, $id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|is_unique[user.no_telp]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|trim');
            $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        } else {
            $db = $this->admin->get('user', ['id_user' => $id]);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $no_telp = $this->input->post('no_telp', true);

            $uniq_username = $db['username'] == $username ? '' : '|is_unique[user.username]';
            $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';
            $uniq_no_telp = $db['no_telp'] == $no_telp ? '' : '|is_unique[user.no_telp]';

            $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric' . $uniq_username);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
            $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric' . $uniq_no_telp);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah User";
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/user/add', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            if ($input['role'] == 'admin') {
                $input_data = [
                    'nama'          => $input['nama'],
                    'username'      => $input['username'],
                    'email'         => $input['email'],
                    'no_telp'       => $input['no_telp'],
                    'role'          => $input['role'],
                    'password'      => password_hash($input['password'], PASSWORD_DEFAULT),
                    'created_at'    => time(),
                    'foto'          => 'user.png',
                    'is_active'     => '1'
                ];
            } else {
                $input_data = [
                    'nama'          => $input['nama'],
                    'username'      => $input['username'],
                    'email'         => $input['email'],
                    'no_telp'       => $input['no_telp'],
                    'role'          => $input['role'],
                    'password'      => password_hash($input['password'], PASSWORD_DEFAULT),
                    'created_at'    => time(),
                    'foto'          => 'user.png'
                ];
            }

            if ($this->admin->insert('user', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('me/user');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('me/user/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit', $id);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit User";
            $data['user'] = $this->admin->get('user', ['id_user' => $id]);
            $this->load->view('viewsKreon/templates/header', $data);
            $this->load->view('viewsKreon/templates/sidebar', $data);
            $this->load->view('viewsKreon/templates/topbar', $data);
            $this->load->view('viewsKreon/user/edit', $data);
            $this->load->view('viewsKreon/templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'nama'          => $input['nama'],
                'username'      => $input['username'],
                'email'         => $input['email'],
                'no_telp'       => $input['no_telp'],
                'role'          => $input['role']
            ];

            if ($this->admin->update('user', 'id_user', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('me/user');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('me/user/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('user', 'id_user', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('me/user');
    }

    public function toggle($getId)
    {
        $id = encode_php_tags($getId);
        $status = $this->admin->get('user', ['id_user' => $id])['is_active'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->admin->update('user', 'id_user', $id, ['is_active' => $toggle])) {
            set_pesan($pesan);
        }
        redirect('me/user');
    }
}
