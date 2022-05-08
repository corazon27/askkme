<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    private function _has_loginaskk()
    {
        if ($this->session->has_userdata('login_session_awal')) {
            redirect('auth/askk');
        }
    }

    private function _has_loginme()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('me/dashboard');
        }
    }


    public function index()
    {
        $data['title'] = "Pilih Aplikasi";
        $this->load->view('auth/indexpilih', $data);
    }

    public function askk()
    {
        $this->_has_loginaskk();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha Kosong', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['captcha'] = $this->recaptcha->getWidget();
            $data['script_captcha'] = $this->recaptcha->getScriptTag();
            $data['title'] = 'Login Aplikasi';
            $data['aplikasi'] = 'ASKK';
            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (!isset($response['success']) || $response['success'] <> true) {
                redirect('auth/askk');
            } else {
                $input = $this->input->post(null, true);
                $cek_username = $this->auth->cek_username($input['username']);
                if ($cek_username > 0) {
                    $password = $this->auth->get_password($input['username']);
                    if (password_verify($input['password'], $password)) {
                        $user_db = $this->auth->userdata($input['username']);
                        $faskes_db = $this->auth->faskesdata($user_db['id_user']);
                        $cek_faskes = $this->auth->cek_faskes($user_db['id_user']);
                        if ($user_db['role'] == 'admin') {
                            if ($user_db['is_active'] != 1) {
                                set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                                redirect('login');
                            } else {
                                $userdata = [
                                    'id' => $input['username'],
                                    'user'  => $user_db['id_user'],
                                    'role'  => $user_db['role'],
                                    'timestamp' => time()
                                ];
                                $this->session->set_userdata('login_session_askk', $userdata);
                                redirect('askk/Pilih_poli');
                            }
                        } elseif ($user_db['role'] == 'faskes') {
                            if ($cek_faskes > 0) {
                                if ($user_db['is_active'] != 1) {
                                    set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                                    redirect('login');
                                } else {
                                    $userdata = [
                                        'role'  => $faskes_db['role'],
                                        'id' => $input['username']
                                    ];
                                    $this->session->set_userdata('login_session_askk', $userdata);
                                    redirect('askk/Pilih_poli');
                                }
                            } else {
                                set_pesan('anda belum mempunyai faskes. Silahkan hubungi admin. .', false);
                                redirect('auth/askk');
                            }
                        }
                    } else {
                        set_pesan('password salah', false);
                        redirect('auth/askk');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth/askk');
                }
            }
        }
    }

    public function me()
    {
        $this->_has_loginme();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha Kosong,', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['captcha'] = $this->recaptcha->getWidget();
            $data['script_captcha'] = $this->recaptcha->getScriptTag();
            $data['title'] = 'Login Aplikasi';
            $data['aplikasi'] = 'ME';
            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (!isset($response['success']) || $response['success'] <> true) {
                redirect('auth/me');
            } else {
                $input = $this->input->post(null, true);
                $cek_username = $this->auth->cek_username($input['username']);
                if ($cek_username > 0) {
                    $password = $this->auth->get_password($input['username']);
                    if (password_verify($input['password'], $password)) {
                        $user_db = $this->auth->userdata($input['username']);
                        $faskes_db = $this->auth->faskesdata($user_db['id_user']);
                        $cek_faskes = $this->auth->cek_faskes($user_db['id_user']);
                        if ($user_db['role'] == 'admin') {
                            if ($user_db['is_active'] != 1) {
                                set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                                redirect('login');
                            } else {
                                $userdata = [
                                    'user'  => $user_db['id_user'],
                                    'role'  => $user_db['role'],
                                    'timestamp' => time()
                                ];
                                $this->session->set_userdata('login_session', $userdata);
                                set_pesan('Berhasil Login.');
                                redirect('me/dashboard');
                            }
                        } elseif ($user_db['role'] == 'faskes') {
                            if ($cek_faskes > 0) {
                                if ($user_db['is_active'] != 1) {
                                    set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                                    redirect('login');
                                } else {
                                    $userdata = [
                                        'id_nama_faskes' => $faskes_db['id_nama_faskes'],
                                        'nama_faskes'  => $faskes_db['nama_faskes'],
                                        'kode_faskes'  => $faskes_db['kode_faskes'],
                                        'nama'  => $faskes_db['nama'],
                                        'role'  => $faskes_db['role']
                                    ];
                                    // print_r($userdata);
                                    // die;
                                    $this->session->set_userdata('login_session', $userdata);
                                    set_pesan('Berhasil Login.');
                                    redirect('me/dashboard');
                                }
                            } else {
                                set_pesan('anda belum mempunyai faskes. Silahkan hubungi admin. .', false);
                                redirect('auth/me');
                            }
                        }
                    } else {
                        set_pesan('password salah', false);
                        redirect('auth/me');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth/me');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');
        $this->session->unset_userdata('login_session_askk');
        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'magelangbpjs6@gmail.com',
            'smtp_pass' => 'bpjsmagelang',
            'smtp_port' => 465,
            'TSL/SSL'   => 'Required',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('magelangbpjs6@gmail.com', 'BPJS Cabang Kota Magelang');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('ASKK ME account password request recovery');
            $this->email->message('Klik link ini untuk mereset password anda! : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Recovery Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->template->load('templates/auth', 'auth/forgot-password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mohon cek email anda jika ingin mereset password!</div>');
                set_pesan('Mohon cek email anda jika ingin mereset password!');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak valid atau belum diaktivasi!</div>');
                set_pesan('Email tidak valid atau belum diaktivasi!');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Token salah.</div>');
                set_pesan('Reset password gagal! Token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email salah.</div>');
            set_pesan('Reset password gagal! Email salah.');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->template->load('templates/auth', 'auth/change-password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbaharui silahkan login kembali!</div>');
            set_pesan('Password berhasil diperbaharui silahkan login kembali!');
            redirect('auth/forgotpassword');
        }
    }
}
